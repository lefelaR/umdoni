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
use App\Models\Agenda;
use Aws\S3\S3Client;


class Agendas extends \Core\Controller
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

        $agendas = Agenda::Get();
        view::render('dashboard/agendas/index.php', $agendas , 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $agenda = Agenda::GetById($id);
        } else $agenda = array();
        view::render('dashboard/agendas/add.php',  $agenda, 'dashboard');
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
            $id =  Agenda::Save($data);
            $_SESSION['success'] = ['message' => "Success!"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/agendas/index');
    }


    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Agenda::Update($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/agendas/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Agenda::Delete($id);
            $_SESSION['success'] = ['message' => "Success!"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/agendas/index');
    }



    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
       
    }

}