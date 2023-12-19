<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\User;
use App\Models\Newsletter;



class Newsletters extends \Core\Controller
{

    public function indexAction()
    {
        $newsletters = Newsletter::Get();
        view::render('dashboard/newsletters/index.php',  $newsletters, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if(isset($data['id'])) 
        {
            $id = $data['id'];
            $user = Newsletter::getUser($id);
        }else
            $user = array();
        view::render('dashboard/newsletters/add.php',  $newsletter, 'dashboard');
    }

    public function updateAction()
    {
        $data = $_POST;
        try 
        {
          $id =  Newsletter::UpdateUser($data);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/newsletters/list');
    }
   

    public function deleteAction()
    {
        $id = $_GET['id'];
        try 
        {
          User::Delete($id);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/newsletters/list');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
        // echo "(after)";
    }

}

?>