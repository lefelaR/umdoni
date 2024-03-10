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
use Aws\S3\S3Client;
use App\Models\RolesModel;

class Permissions extends \Core\Controller
{

    public function indexAction()
    {   
        $roles = RolesModel::getAll();
        view::render('dashboard/permissions/index.php', $roles, 'dashboard');
    }
  

    public function addAction()
    {   
        $data = getPostData();
        if(isset($data['id']))
        {
            $id = $data['id'];
            $role = RolesModel::getById($id);
        }else
            $role = array();
        view::render('dashboard/permissions/add.php', $role, 'dashboard');
    }


    public function save()
    {   
        global $context;

        if (isset($_POST)) $data = $_POST;

    try{
        $id = RolesModel::Save($data);
        $_SESSION['success'] = ['message' => 'successfully added record!'];
    }catch(\Throwable $th)
    {
        $_SESSION['error'] = ['message' => $th->getMessage()]; 
    }
       redirect('dashboard/permissions/index');
    }


    
    public function deleteAction()
    {
        $id = $_GET['id'];
        try 
        {
          RolesModel::Delete($id);
          $_SESSION['success'] = ['message' => 'record deleted!'];
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()]; 
        }
        redirect('dashboard/permissions/index');
    }


    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
    }

}