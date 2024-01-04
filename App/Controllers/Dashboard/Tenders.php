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
use App\Models\Request;
use App\Models\Tender;
use DateTime;

class Tenders extends \Core\Controller
{

    public function indexAction()
    {
        $services = Service::getAll();
        view::render('dashboard/tenders/index.php', $services, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();

        if (isset($data['id'])) {
            $id = $data['id'];
            $service = Service::getServiceById($id);
        } else
            $service = array();
        view::render('dashboard/tenders/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {
        global $context;

        if (isset($_POST)) $data = $_POST;
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['isActive'] = 1;
        $data['updatedBy'] =  $_SESSION['profile']['username'];
        try {
            $id =  Tender::Save($data);
        } catch (\Throwable $th) {
            $_SESSION['errors'] = ['message' => $th->getMessage()];
            print_r($th->getMessage());
            die;
        }
        redirect('dashboard/tenders/index');
    }

    public function updateAction()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");


        try {
            $id =  Service::updateService($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/tenders/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Service::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/tenders/index');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
