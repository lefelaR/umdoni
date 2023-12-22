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
use App\Models\Councillor;
use Aws\S3\S3Client;


class Councillors extends \Core\Controller
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
        $councillors = Councillor::GET();
        view::render('dashboard/councillors/index.php', $councillors, 'dashboard');
    }
    public function seniorAction()
    {
        $managers = Councillor::getSeniors();

        view::render('dashboard/councillors/senior.php', $managers, 'dashboard');
    }
    public function saddAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $seniorMan = Councillor::getSeniorManById($id);
        } else {
            $seniorMan = array();
        }
        view::render('dashboard/councillors/sadd.php', $seniorMan, 'dashboard');
    }
    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $councillors = Councillor::getCouncillorById($id);
        } else
            $councillors = array();
        view::render('dashboard/councillors/add.php', $councillors, 'dashboard');
    }

    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES)) {

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $this->region,
                'credentials' => [
                    'key' => $this->awsAccessKeyId,
                    'secret' => $this->awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;

            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";
            try {
                // Upload the file to S3
                $result = $s3->putObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $objectKey,
                    'SourceFile' => $filePath,
                ]);
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }

        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        try {

            $id =  Councillor::Save($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Councillor successfully Added"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/index');
    }


    public function savemanAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES)) {

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $this->region,
                'credentials' => [
                    'key' => $this->awsAccessKeyId,
                    'secret' => $this->awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;

            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";
            try {
                // Upload the file to S3
                $result = $s3->putObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $objectKey,
                    'SourceFile' => $filePath,
                ]);
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }

        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        try {

            $id =  Councillor::SaveMan($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Record created successfully"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => "Unable to save record!"];
        }
        redirect('dashboard/councillors/senior');
    }



    public function updateAction()
    {

        if (isset($_FILES) && $_FILES['name']['size'] > 0) {
            // upload
            $bucketName = 'umdoni-document-bucket';
            $awsAccessKeyId = 'AKIA3FVMIL3UXGIEI3WH';
            $awsSecretAccessKey = '/yXhJ3sHfpl0Ykp/ZCv59VdHAXxiXoc2gAAP3XZa';
            $region = 'eu-central-1'; // Change to your desired region

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $region,
                'credentials' => [
                    'key' => $awsAccessKeyId,
                    'secret' => $awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;
            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";


            try {
                // Upload the file to S3
                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $objectKey,
                    'SourceFile' => $filePath,
                ]);
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        // if($_FILES)
        if (isset($_FILES) && $_FILES['name']['size'] > 0) {
            $data['img_file'] = isset($objectKey) ? $objectKey : "";
            $data['location'] = isset($result['ObjectURL']) ? $result['ObjectURL'] : "";
        } else {
            $data['img_file'] = null;
            $data['location'] = null;
        }
        try {
            $id =  Councillor::update($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/index');
    }




    public function updateManAction()
    {

        if (isset($_FILES) && $_FILES['name']['size'] > 0) {
            // upload
            $bucketName = 'umdoni-document-bucket';
            $awsAccessKeyId = 'AKIA3FVMIL3UXGIEI3WH';
            $awsSecretAccessKey = '/yXhJ3sHfpl0Ykp/ZCv59VdHAXxiXoc2gAAP3XZa';
            $region = 'eu-central-1'; // Change to your desired region

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $region,
                'credentials' => [
                    'key' => $awsAccessKeyId,
                    'secret' => $awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;
            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";


            try {
                // Upload the file to S3
                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $objectKey,
                    'SourceFile' => $filePath,
                ]);
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        // if($_FILES)
        if (isset($_FILES) && $_FILES['name']['size'] > 0) {
            $data['img_file'] = isset($objectKey) ? $objectKey : "";
            $data['location'] = isset($result['ObjectURL']) ? $result['ObjectURL'] : "";
        } else {
            $data['img_file'] = null;
            $data['location'] = null;
        }
        try {
            $id =  Councillor::UpdateMan($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/senior');
    }



    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Councillor::Delete($id);
            $_SESSION['success'] =  ['message' => "Councillor successfully deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/index');
    }

    public function deleteManAction()
    {
        $id = $_GET['id'];
        try {
            Councillor::DeleteMan($id);
            $_SESSION['success'] =  ['message' => "Councillor successfully deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/senior');
    }


    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
        echo '..';
    }
}
