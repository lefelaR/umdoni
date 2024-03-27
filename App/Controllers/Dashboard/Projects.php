<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\Project;
use App\Models\Request;
use Aws\S3\S3Client;

class Projects extends \Core\Controller
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

        $projects = Project::Get();

        view::render('dashboard/projects/index.php', $projects, 'dashboard');
    }

    public function requestsAction()
    {
        $requests = Request::getAll();
        view::render('dashboard/services/requests.php', $requests, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();

        if (isset($data['id'])) {
            $id = $data['id'];
            $project = Project::getById($id);
        } else
            $project = array();
        view::render('dashboard/projects/add.php', $project, 'dashboard');
    }


    public function saveAction()
    {
        global $context;

        if (isset($_FILES)) {
            $bucketName = $this->bucketName;
            $awsAccessKeyId =   $this->awsAccessKeyId;
            $awsSecretAccessKey =  $this->awsSecretAccessKey;
            $region =  $this->region;
            $loc = '';

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $region,
                'credentials' => [
                    'key' => $awsAccessKeyId,
                    'secret' => $awsSecretAccessKey,
                ],
            ]);

            $file = $_FILES;
            $filePath = $file['image']['tmp_name'];
            $objectKey = $file['image']['name'];

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
        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['img_file'] =  isset($result) ? $objectKey : "";
        $data['location'] = isset($result) ? $result['ObjectURL'] : "";

        try {
            $id =  Project::Save($data);
           
        } catch (\Throwable $th) {
          echo  $th->getMessage();
        }
        redirect('dashboard/projects/index');
    }

    public function updateAction()
    {

        $data = $_POST;

        if (isset($_FILES) && $_FILES['image']['size'] > 0) {
            $bucketName = $this->bucketName;
            $awsAccessKeyId =   $this->awsAccessKeyId;
            $awsSecretAccessKey =  $this->awsSecretAccessKey;
            $region =  $this->region;
            $loc = '';

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
            $filePath = $file['image']['tmp_name'];
            $objectKey = $file['image']['name'];

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
            $data['img_file'] =  isset($result) ? $objectKey : "";
            $data['location'] = isset($result) ? $result['ObjectURL'] : "";
        }
       
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Project::update($data);
            if ($id) $_SESSION['success'] = ['message' => "Updated"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/projects/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Project::Delete($id);
            $_SESSION['success'] = ['message' => "Deleted"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/projects/index');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
