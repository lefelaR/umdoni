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
use App\Models\Request;
use Aws\S3\S3Client;
use \Components\AwsAuthentications;
class Services extends \Core\Controller
{


    public function __construct()
    { 
    }



    public function indexAction()
    {
$services = Service::getAll();

        view::render('dashboard/services/index.php', $services, 'dashboard');
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
            $service = Service::getServiceById($id);
        } else
            $service = array();
        view::render('dashboard/services/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {

        global $context;

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
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['img_file'] = isset($objectKey)? $objectKey: '';
        $data['location'] = isset($result['ObjectURL']) ? $result['ObjectURL'] : '';
        $data['createdBy'] = $_SESSION['profile']['username'];

        try {
            $id =  Service::Save($data);
            if ($id) {
                $_SESSION['success'] =  ['message' => "Service successfully Added"];
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/services/index');
    }
    
    }

    public function updateAction()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  Service::updateService($data);
            $_SESSION['success'] =  ['message' => "Service updated"];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] =  ['message' => $th->getMessage()];
        }
        redirect('dashboard/services/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            Service::Delete($id);

            $_SESSION['success'] =  ['message' => "Service deleted"];
        } catch (\Throwable $th) {
            echo $th->getMessage();

            $_SESSION['error'] =  ['message' => $th->getMessage()];
        }
        redirect('dashboard/services/index');
    }


    public function checkAction()
    {
        $id = $_GET['id'];
        try {
            $respose = Request::Delete($id);
            if ($respose) {
                $_SESSION['success'] =  ['message' => "Service request resolved"];
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] =  ['message' => $th->getMessage()];
        }
        redirect('dashboard/services/requests');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
