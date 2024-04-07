<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\Newsletter;
use Aws\S3\S3Client;

class Publications extends \Core\Controller
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
        $newsletters = Newsletter::Get();

        view::render('dashboard/publications/index.php',  $newsletters, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $newsletter = Newsletter::GetById($id);
        } else
            $newsletter = array();
        view::render('dashboard/publications/add.php',  $newsletter, 'dashboard');
    }

    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES) && $_FILES['name']['size'] > 0) {
            $bucketName =  $this->bucketName;
            $awsAccessKeyId = $this->awsAccessKeyId;
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
            if (count($file) > 0) {
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
                } catch (\Throwable $e) {
                    echo "Error uploading file: " . $e->getMessage();
                }
            }
        }

        if (isset($_POST)) $data = $_POST;
        $data['publisher'] = (isset($_SESSION['profile']['username'])) ? $_SESSION['profile']['username'] : "";
        $data['isActive'] = 1;
        $data['img_file'] =  isset($result) ? $objectKey : "";
        $data['location'] = isset($result) ? $result['ObjectURL'] : "";
        $data['createdAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Newsletter::Save($data);
        } catch (\Throwable $th) {
            $_SESSION['errors'] = ['message' => $th->getMessage()];
            print_r($th->getMessage());
            die;
        }
        redirect('dashboard/publications/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Newsletter::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/publications/index');
    }


    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
        // echo "(after)";
    }
}
