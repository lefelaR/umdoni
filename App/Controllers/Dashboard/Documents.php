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
use App\Models\Document;
use Aws\S3\S3Client;




class Documents extends \Core\Controller
{
    public function indexAction()
    {
        $documents = Document::GET();
        view::render('dashboard/documents/index.php',$documents , 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $document = Document::getDocumentById($id);
        } else
            $document = array();
        view::render('dashboard/documents/add.php', $document, 'dashboard');
    }

    public function saveAction()
    {

        $loggedinUser = $_SESSION['profile'];

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
            $key = "documents/";

            $file = $_FILES;
            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";


            try {

                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key' => $key.$objectKey,
                    'SourceFile' => $filePath,
                    'ACL'    => 'public-read',
                ]);
            } catch (\Throwable $th) {
                echo "Error uploading file: " .  $th->getMessage();
            }
        }
        if (isset($_POST)) $data = $_POST;
        $data['isActive'] = 1;
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        $data['updatedBy'] = $loggedinUser['username'];

        try {
            $id =  Document::Save($data);
            $_SESSION['success'] = ['message' => "Document has been saved"];
        } catch (\Throwable $th) {
            $_SESSION['errors'] = ['message' => $th->getMessage()];
        }
        
        redirect('dashboard/documents/index');
    }

    public function updateAction()
    {
        $data = $_POST;
        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Document::update($data);
            $_SESSION['success'] = ['message' => "Document has been updated"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => "Document has been saved"];
        }
        redirect('dashboard/documents/index');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
           $idStatus = Document::Delete($id);
           if($idStatus > 0){
            $_SESSION['success'] = ['message' => "Document has been removed"];
           }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/documents/index');
    }


    public function reportsAction()
    {
        view::render('dashboard/documents/reports.php', $context = [], 'dashboard');
    }


    public function Action()
    {

        view::render('dashboard/documents/reports.php', $context = [], 'dashboard');
    }












    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
