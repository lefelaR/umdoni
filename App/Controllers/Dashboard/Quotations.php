<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;


use \Core\View;
use App\Models\Service;
use App\Models\QuotationsModel;
use Aws\S3\S3Client;
use Components\UploadToSite;

class Quotations extends \Core\Controller
{

    
    private $bucketName;
    private $awsAccessKeyId;
    private $clientId;
    private $userPoolId;
    private $region;
    private $awsSecretAccessKey; 
    private $Component;


    public function __construct()
    {
        $this->awsAccessKeyId  = $_ENV['AWS_ACCESS_KEY_ID'];
        $this->clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
        $this->userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
        $this->region = $_ENV['AWS_REGION'];
        $this->awsSecretAccessKey  =  $_ENV['AWS_SECRET_ACCESS_KEY'];
        $this->bucketName = $_ENV['BUCKET_NAME'];
        $this->Component = "quotations";
    }
    public function indexAction()
    {
      
        $quotation = QuotationsModel::getAll();
        view::render('dashboard/quotations/index.php', $quotation, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();
        if(isset($data['id']))
        {
            $id = $data['id'];
            $service = QuotationsModel::getById($id);
        }else
            $service = array();
        view::render('dashboard/quotations/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {
        global $context;
        $objectKey = ""; 
             if (isset($_FILES)) {
                $destination = UploadToSite::upload($_FILES,  $this->Component);
            }
        if (isset($_POST)) $data = $_POST;
        $data['status'] = 1;
        $data['createdAt'] = $data['createdAt'];
        $data['isActive'] = 1;
        $data['location'] = $destination;
        $data['updatedBy'] =  $_SESSION['profile']['username'];

        // generate a refernce
        try {
            $id =  QuotationsModel::Save($data);

            $_SESSION['success'] = ['message' => 'successfully added record!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];          
        }
        redirect('dashboard/quotations/index');
    }

    public function getByStatusAction()
{
    $status = $_GET['status']; // Get the status from the query parameter
    $quotations = QuotationsModel::getByStatus($status);
    View::render('dashboard/quotations/index.php', $quotations, 'dashboard');
}

public function updateStatusAction()
{
    $data = getPostData();
    $id = $data['id'];
    $status = $data['status'];

    try {
        QuotationsModel::updateStatus($id, $status);
        $_SESSION['success'] = ['message' => 'Quotation status updated successfully!'];
    } catch (\Throwable $th) {
        $_SESSION['error'] = ['message' => $th->getMessage()];
    }

    redirect('dashboard/quotations/index');
}

public static function getStatusName($status)
{
    switch ($status) {
        case 'current':
            return 'Current';
        case 'open':
            return 'Open';
        case 'awarded':
            return 'Awarded';
        default:
            return 'Unknown';
    }
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
        redirect('dashboard/quotations/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try 
        {
            QuotationsModel::Delete($id);
          
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/quotations/index');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
