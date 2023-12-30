<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\Profile;
use App\Models\User;
use App\Models\Countries;

class Users extends \Core\Controller
{
    public function indexAction()
    {
        $users = Profile::getAll();
        view::render('dashboard/users/index.php',  $users, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if(isset($data['id'])) 
        {
            $id = $data['id'];
            $user = User::getUser($id);
           
        }else
            $user = array();
        view::render('dashboard/users/add.php',  $user, 'dashboard');
    }

    public function updateAction()
    {
        $data = $_POST;
        try 
        {
          $id =  User::UpdateUser($data);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/users/list');
    }
   

    public function saveAction()
    {
        global $context;

        if(isset($_POST))   $data = $_POST;
        try 
        {
          $id =  User::Save($data);
            
        } catch (\Throwable $th) 
        {
            $_SESSION['errors'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/users/list');
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
        redirect('dashboard/users/list');
    }


    // public function regions()
    // {
    //     $regions = array();
    //     $id = $_GET['ProvinceID'];
    //     try 
    //     {
    //         $regions = countries::getRegion($id);
    //         $regions = array_column($regions, 'RegionName', 'RegionID');
    //     } catch (\Throwable $th) 
    //     {
    //         echo $th->getMessage();
    //     }
    //   return $regions;

    // }


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