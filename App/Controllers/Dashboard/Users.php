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
use App\Models\UserModel;
use Aws\S3\S3Client;
use App\Models\Roles;


class Users extends \Core\Controller
{
    public function indexAction()
    {
        
        if(isset($_POST) && count($_POST) > 0){
            $data = $_POST;
            $id = $data['user_id'];
            $users = Profile::getById($id);    
        }
        else{
        $users = Profile::getAll();
        }
        view::render('dashboard/users/index.php',  $users, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if(isset($data['id'])) 
        {
            $id = $data['id'];
            $user = UserModel::getUser($id);
           
        }else
            $user = array();
        view::render('dashboard/users/add.php',  $user, 'dashboard');
    }

    public function updateAction()
    {
        $data = $_POST;
        try 
        {
            $id =  UserModel::UpdateUser($data);
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
          $id =  UserModel::Save($data);
            
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
            UserModel::Delete($id);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/users/list');
    }

public function detailsAction()
{
    
    $id = getPostData();
    if(isset($id)) $id = $id['id'];
    $user = UserModel::getUser($id);
    view::render('dashboard/users/details.php',  $user, 'dashboard');
}





public function manageuserAction()
{
    $data = $_POST;
    $locked = [
        'false' => '1',
        'true' => '0' 
    ];
    $data['locked'] = $locked[$data['locked']];
    try{
       $id = UserModel::ChangeStatus($data);
       redirect('dashboard/users/index');

    }catch(\Throwable $th)
    {
        echo $th->getMessage();
    }
}


    public function manageroleAction()
    {
        $data = $_POST;
        try{
            UserModel::ChangeRole($data);
            redirect('dashboard/users/index');
        }catch(\Throwable $th)
        {
            echo $th->getMessage();
        }
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