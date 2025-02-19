<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use App\Models\Requests;
use \Core\View;
use App\Models\User;
use App\Models\Service;
use App\Models\RolesModel;
use DateTime;
use Aws\S3\S3Client;
use App\Models\SettingsModel;

class Settings extends \Core\Controller
{

    public function __construct() {
     
    }

    public function indexAction()
    {
        $services = SettingsModel::get();
        if(!empty($services)){
            $services = unserialize($services['settings']);
        }
        view::render('dashboard/settings/index.php', $services, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();

        if(isset($data['id']))
        {
            $id = $data['id'];
            $service = Service::getServiceById($id);
        }else
            $service = array();
        view::render('dashboard/tenders/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {
        global $context;

        if(isset($_POST)) $data = $_POST;
        $date['createdAt'] = date("Y-m-d H:i:s");
        try 
        {
          $id =  Service::Save($data);   
        } catch (\Throwable $th) 
        {
            $_SESSION['errors'] = ['message' => $th->getMessage()];
           print_r($th->getMessage()); die;
        }
        redirect('dashboard/tenders/index');
    }

    public function updateAction()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");
       

        try 
        {
          $id =  Service::updateService($data);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/tenders/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try 
        {
          Service::Delete($id);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/tenders/index');
    }

    public function rolesAction()
    {
        $roles = RolesModel::getAll();

        view::render('dashboard/settings/roles/index.php', $roles, 'dashboard');
    }

    public function permissionsAction()
    {
        view::render('dashboard/settings/permissions.php', array(), 'dashboard');
    }



    public function profile(){

        $data = getPostData();
        
        if(!empty($data))
        {
            $postData['settings'] = serialize($data);
        }

        SettingsModel::update($data);
    }


    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
