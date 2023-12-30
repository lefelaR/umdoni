<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\Project;
use App\Models\Service;
use App\Models\Request;
use Aws\S3\S3Client;

class Projects extends \Core\Controller
{

    public function indexAction()
    {

        $projects = Project::Get();

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
            $project = Project::getById($id);
        } else
            $project = array();
        view::render('dashboard/projects/add.php', $project, 'dashboard');
    }


    public function saveAction()
    {
        global $context;


        if (isset($_FILES)) {
            $bucketName = 'umdoni-document-bucket';
            $awsAccessKeyId = 'AKIA3FVMIL3UXGIEI3WH';
            $awsSecretAccessKey = '/yXhJ3sHfpl0Ykp/ZCv59VdHAXxiXoc2gAAP3XZa';
            $region = 'eu-central-1'; // Change to your desired region
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
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['img_file'] =  isset($result) ? $objectKey : "";
        $data['location'] = isset($result) ? $result['ObjectURL'] : "";

        try {
            $id =  Project::Save($data);
            $_SESSION['success'] = ['message' => "Success!"];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/projects/index');
    }

    public function updateAction()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");

        try {
            $id =  Project::update($data);
            if($id) $_SESSION['success'] = ['message' => "Updated"];
        } catch (\Throwable $th) {
            $_SESSION['success'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/projects/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Project::Delete($id);
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
