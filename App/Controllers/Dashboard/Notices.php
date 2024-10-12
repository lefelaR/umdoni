<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use Aws\S3\S3Client;
use App\Models\NoticeModel;
use Components\UploadToSite;


class Notices extends \Core\Controller
{



    public function __construct()
    {
  
    }

    public function indexAction()
    {
        $notices = NoticeModel::getAll();
        view::render('dashboard/notices/index.php', $notices, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $notices = NoticeModel::getById($id);
        } else
            $notices = array();
        view::render('dashboard/notices/add.php',  $notices, 'dashboard');
    }


    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;

        if (isset($_FILES)) {
            $destination = UploadToSite::upload($_FILES);
        }

        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['img_file'] =  isset($aFile['name']['name']) ? $_FILES['name']['name'] : "";
        $data['location'] = isset($destination) ?  $destination : "";
        $data['createdAt'] = date("Y-m-d H:i:s");
  
        try {
            $id =  NoticeModel::Save($data);
            $_SESSION['success'] = ['message' => 'Success'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/notices/index');
    }


    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  NoticeModel::update($data);
            $_SESSION['success'] = ['message' => 'success'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
            echo $th->getMessage();
        }
        redirect('dashboard/notices/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            NoticeModel::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/notices/index');
    }

    public function eventsAction()
    {

        view::render('dashboard/notices/events.php',  $context = [], 'dashboard');
    }

    public function projectsAction()
    {
        view::render('dashboard/notices/projects.php',  $context = [], 'dashboard');
    }

    public function noticesAction()
    {
        view::render('dashboard/notices/notices.php',  $context = [], 'dashboard');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
