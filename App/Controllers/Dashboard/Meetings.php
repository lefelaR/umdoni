<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Dashboard;
use \Core\View;
use App\Models\User;
use App\Models\Meeting;
use Aws\S3\S3Client;


class Meetings extends \Core\Controller
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
       
        // get information from the model and inject it into the viewport
        //    name an object that will carry all dashboard items

        $meetings = Meeting::getAll();
        view::render('dashboard/meetings/index.php', $meetings , 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $meeting = Meeting::getMeeting($id);
        } else $meeting = array();
        view::render('dashboard/meetings/add.php',  $meeting, 'dashboard');
    }
  

    public function saveAction()
    {
        global $context;

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
        $data['isActive'] = 1;
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['img_file'] =  isset($result) ? $objectKey : "";
        $data['location'] = isset($result) ? $result['ObjectURL'] : "";
        $data['updatedBy'] = $_SESSION['profile']['username'];

        try {
            $id =  Meeting::Save($data);
            $_SESSION['success'] = ['message' => "Success!"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/meetings/index');
    }


    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Meeting::Update($data);

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/meetings/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Meeting::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/meetings/index');
    }


    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
       
    }

}