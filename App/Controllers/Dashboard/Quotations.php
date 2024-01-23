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
use App\Models\Quotation;
use Aws\S3\S3Client;


class Quotations extends \Core\Controller
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
        $quotation = Quotation::getAll();
        view::render('dashboard/quotations/index.php', $quotation, 'dashboard');
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
        view::render('dashboard/quotations/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {
        global $context;
        $objectKey = ""; 

        if (isset($_FILES)) {
            $bucketName = $this->bucketName;
            $awsAccessKeyId =   $this->awsAccessKeyId;
            $awsSecretAccessKey =  $this->awsSecretAccessKey;
            $region =  $this->region; // Change to your desired region

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $region,
                'credentials' => [
                    'key' => $awsAccessKeyId,
                    'secret' => $awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;

            if (count($file) > 0) {
                $filePath = $file['name']['tmp_name'];
                $objectKey = $file['name']['name'];

                if ($objectKey !== "") {
                    try {
                        $result = $s3->putObject([
                            'Bucket' => $bucketName,
                            'Key' => $objectKey,
                            'SourceFile' => $filePath,
                        ]);
                    } catch (\Throwable $th) {
                        echo "Error uploading file: " .  $th->getMessage();
                    }
                }
            }
        }

        if (isset($_POST)) $data = $_POST;

        $data['status'] = 1;
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['isActive'] = 1;
        $data['img_file'] = $objectKey;
        $data['location'] = isset($result['ObjectURL']) ? $result['ObjectURL'] : "";
        $data['updatedBy'] =  $_SESSION['profile']['username'];


        // generate a refernce



        try {
            $id =  Quotation::Save($data);
            $_SESSION['success'] = ['message' => 'successfully added record!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];          
        }
        redirect('dashboard/quotations/index');
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
          Service::Delete($id);
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
