<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\CouncillorModel;
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

/**
 * *****************************
 * COUNCIL
 * *****************************
 */
    public function indexAction()
    {
        // $councillors = CouncillorModel::GET();
        $councillors = array();
        var_dump($councillors); die;
        
        view::render('dashboard/councillors/index.php', $councillors, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $councillors = CouncillorModel::getCouncillorById($id);
        } else
            $councillors = array();
        view::render('dashboard/councillors/add.php', $councillors, 'dashboard');
    }

    public function saveAction()
    {
        global $context;
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

            $id =  CouncillorModel::Save($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Councillor successfully Added"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/index');
    }


    public function updateAction()
    {

        if (isset($_FILES) && $_FILES['name']['size'] > 0) 
        {
            $bucketName =  $this->bucketName;
            $awsAccessKeyId = $this->awsAccessKeyId;
            $awsSecretAccessKey =  $this->awsSecretAccessKey;
            $region =   $this->region; // Change to your desired region

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
        if (isset($_POST)) $data = $_POST;
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
            $id =  CouncillorModel::update($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/index');
    }
 
    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            CouncillorModel::Delete($id);
            $_SESSION['success'] =  ['message' => "Councillor successfully deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/index');
    }


    /**
     ************************************* 
     * SENIOR MANAGEMENT / AADMINISTRATION
     * ***********************************
     */
    public function seniorAction()
    {
        $managers = CouncillorModel::getSeniors();

        view::render('dashboard/councillors/senior.php', $managers, 'dashboard');
    }


    public function saddAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $seniorMan = CouncillorModel::getSeniorManById($id);
        } else {
            $seniorMan = array();
        }
        view::render('dashboard/councillors/sadd.php', $seniorMan, 'dashboard');
    }


    public function savemanAction()
    {
        global $context;
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

            $id =  CouncillorModel::SaveMan($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Record created successfully"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/senior');
    }


    public function updateManAction()
    {

        if (isset($_FILES) && $_FILES['name']['size'] > 0) 
        {
        
            $bucketName = $this-> bucketName;
            $awsAccessKeyId = $this-> awsAccessKeyId;
            $awsSecretAccessKey = $this->awsSecretAccessKey;
            $region = $this->region;

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
            $id =  CouncillorModel::UpdateMan($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/senior');
    }



    public function deleteManAction()
    {
        $id = $_GET['id'];
        try {
            CouncillorModel::DeleteMan($id);
            $_SESSION['success'] =  ['message' => "Councillor successfully deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/senior');
    }


    /**
     * **************************************
     * EXCO
     * **************************************
     */

    public function excoAction()
    {
        $exco = CouncillorModel::getExco();

        view::render('dashboard/councillors/exco.php', $exco, 'dashboard');
    }


    public function eaddAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $exco = CouncillorModel::getExcoById($id);
        } else {
            $exco = array();
        }
        view::render('dashboard/councillors/eadd.php', $exco, 'dashboard');
    }


    public function saveExcoAction()
    {
        global $context;
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

            $id =  CouncillorModel::saveExco($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Record created successfully"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/senior');
    }


    public function updateManAction()
    {

        if (isset($_FILES) && $_FILES['name']['size'] > 0) 
        {
        
            $bucketName = $this-> bucketName;
            $awsAccessKeyId = $this-> awsAccessKeyId;
            $awsSecretAccessKey = $this->awsSecretAccessKey;
            $region = $this->region;

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
            $id =  CouncillorModel::UpdateExco($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/senior');
    }



    public function deleteExcoAction()
    {
        $id = $_GET['id'];
        try {
            CouncillorModel::DeleteExco($id);
            $_SESSION['success'] =  ['message' => "Councillor successfully deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/councillors/senior');
    }

 

    protected function before()
    {
        // enable_authorize();
    }

    protected function after()
    {
        echo '..';
    }
}
