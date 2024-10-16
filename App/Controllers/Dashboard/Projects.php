<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\ProjectsModel;
use App\Models\Request;
use Aws\S3\S3Client;
use \Components\AwsAuthentications;

class Projects extends \Core\Controller
{



    public function __construct()
    {
    }

    public function indexAction()
    {

        $projects = ProjectsModel::Get();

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
            $project = ProjectsModel::getById($id);
        } else
            $project = array();
        view::render('dashboard/projects/add.php', $project, 'dashboard');
    }


    public function saveAction()
    {
        global $context;

        if (isset($_FILES)) {
            $bucketName =  (new AwsAuthentications())->getBucketName();
            $awsAccessKeyId =   (new AwsAuthentications())->getAwsAccessKeyId();
            $awsSecretAccessKey =  (new AwsAuthentications())->getAwsSecretAccessKey();
            $region =  (new AwsAuthentications())->getRegion(); 
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
            $id =  ProjectsModel::Save($data);
            $_SESSION['success'] = ['message' => 'successfully added record!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];  
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
            $id =  ProjectsModel::update($data);
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
            ProjectsModel::Delete($id);
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
