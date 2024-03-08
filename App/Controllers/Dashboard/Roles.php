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

class Roles extends \Core\Controller
{

    public function indexAction()
    {   
        $roles = RolesModel::getAll();
        view::render('dashboard/roles/index.php', $roles, 'dashboard');
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
        view::render('dashboard/roles/add.php', $role, 'dashboard');
    }


    public function save()
    {   
        $roles = RolesModel::getAll();
        view::render('dashboard/roles/index.php', $roles, 'dashboard');
    }

    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
    }

}