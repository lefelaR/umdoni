<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\TenderModel;
use Components\DownloadPdf;
use DateTime;
use Aws\S3\S3Client;
use Components\UploadToSite;
use App\Models\RfpModel;

use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class Rfps extends \Core\Controller
{

    private $bucketName;
    private $awsAccessKeyId;
    private $clientId;
    private $userPoolId;
    private $region;
    private $awsSecretAccessKey;



    public function __construct()
    {
        $this->awsAccessKeyId  = $_ENV['AWS_ACCESS_KEY_ID'];
        $this->clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
        $this->userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
        $this->region = $_ENV['AWS_REGION'];
        $this->awsSecretAccessKey  =  $_ENV['AWS_SECRET_ACCESS_KEY'];
        $this->bucketName = $_ENV['BUCKET_NAME'];
    }

    public function indexAction()
    {
        $rfps = RfpModel::Get();
        view::render('dashboard/rfps/index.php', $rfps, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();

        if (isset($data['id'])) {
            $id = $data['id'];
            $rfp = RfpModel::getRfpById($id);
        } else
            $rfp = array();
        view::render('dashboard/rfps/add.php', $rfp, 'dashboard');
    }


    public function saveAction()
    {
        global $context;
        $result = null;
        if (isset($_FILES)) {
            $destination = UploadToSite::upload($_FILES);
        }
        if (isset($_POST)) $data = $_POST;
        $data['status'] = 1;
        $data['createdAt'] = $data['createdAt'];
        $data['isActive'] = 1;
        $data['location'] = $destination;
        $data['updatedBy'] =  $_SESSION['profile']['username'];

        try {
            $id =  RfpModel::Save($data);
            $_SESSION['success'] = ['message' => 'successfully added record!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/rfps/index');
    }

    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  RfpModel::Update($data);
            $_SESSION['success'] = ['message' => 'successfully updated record!'];
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/tenders/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            RfpModel::Delete($id);
            $_SESSION['success'] = ['message' => 'successfully deleted record!'];
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
