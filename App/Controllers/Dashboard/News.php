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
use App\Models\Councillor;

use Intervention\Image\ImageManagerStatic as Image;

class News extends \Core\Controller
{

    public function indexAction()
    {

        $news = NewsModel::getAll();

        view::render('dashboard/news/index.php', $news, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $news = NewsModel::getnewsById($id);
        } else
            $news = array();
        view::render('dashboard/news/add.php',  $news, 'dashboard');
    }

    public function saveAction()
    {
        global $context;
        // check file and send to aws s3;
        if (isset($_FILES)) {

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

              
                
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
            
        }

        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        $data['createdAt'] = date("Y-m-d H:i:s");
        // $data['updatedBy'] = 
        try {
            $id =  NewsModel::Save($data);
            $_SESSION['success'] = ['message' => 'success'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
         
        }
        redirect('dashboard/news/index');
    }


    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Councillor::update($data);

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/councillors/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            NewsModel::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
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
