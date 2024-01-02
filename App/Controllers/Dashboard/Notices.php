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
use App\Models\User;
use App\Models\Notice;
use Intervention\Image\ImageManagerStatic as Image;

class Notices extends \Core\Controller
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
        $notices = Notice::getAll();
        view::render('dashboard/notices/index.php', $notices, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $notices = Notice::getById($id);
        } else
            $notices = array();
        view::render('dashboard/notices/add.php',  $notices, 'dashboard');
    }


    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES)) {

            $bucketName = $this->bucketName;
            $awsAccessKeyId = $this->awsAccessKeyId;
            $awsSecretAccessKey = $this->awsSecretAccessKey;
            $region = $this->region; // Change to your desired region

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

                    // resize the file
                    $image = Image::make($filePath);
                    // $image->crop(636, 358, 25, 25);
                    $resizedImageBinary =   $image->resize(null, 358, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // Convert image to binary
                    $resizedImageBinary = $image->encode('jpg')->getEncoded();

                    try {
                        // Upload the file to S3
                        $result = $s3->putObject([
                            'Bucket' => $bucketName,
                            'Key' => $objectKey,
                            'Body'   => $resizedImageBinary,
                            'ACL'    => 'public-read',
                        ]);
                    } catch (\Throwable $e) {
                        echo "Error uploading file: " . $e->getMessage();
                    }
                }
            }
        }

        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        $data['createdAt'] = date("Y-m-d H:i:s");
        // $data['updatedBy'] = 
        try {
            $id =  Notice::Save($data);
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
            $id =  Notice::update($data);
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
            Notice::Delete($id);
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
