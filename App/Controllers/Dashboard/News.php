<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */


namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\NewsModel;
use Aws\S3\S3Client;
use \Components\AwsAuthentications;

class News extends \Core\Controller
{




    public function __construct()
    {
    
    }

    public function indexAction()
    {

        $news = NewsModel::Get();

        view::render('dashboard/news/index.php', $news, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $news = NewsModel::GetById($id);
        } else
            $news = array();
        view::render('dashboard/news/add.php',  $news, 'dashboard');
    }

    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES)) {

            $bucketName =  (new AwsAuthentications())->getBucketName();
            $awsAccessKeyId =   (new AwsAuthentications())->getAwsAccessKeyId();
            $awsSecretAccessKey =  (new AwsAuthentications())->getAwsSecretAccessKey();
            $region =  (new AwsAuthentications())->getRegion(); 

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

            if (isset($_POST)) $data = $_POST;
            $data['isActive'] = 1;
            $data['img_file'] = $objectKey;
            $data['location'] = $result['ObjectURL'];
            $data['createdAt'] = date("Y-m-d H:i:s");
            // $data['createdBy'] = $_SESSION['profile']['username'];
            
            try {
                $id =  NewsModel::Save($data);
                $_SESSION['success'] = ['message' => 'success!'];
            } catch (\Throwable $th) {
                $_SESSION['error'] = ['message' => $th->getMessage()];
            }
            redirect('dashboard/news/index');
        }
    }

    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  NewsModel::Update($data);
            $_SESSION['success'] = ['message' => 'success'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/news/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            NewsModel::Delete($id);
            $_SESSION['success'] = ['message' => 'Deleted'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/news/index');
    }


    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
