<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Profile;
use App\Models\UserModel;
use Aws\S3\S3Client;

class User extends \Core\Controller
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

    protected function before()
    {
            enable_authorize();
    }


    public function indexAction()
    {
        global $context;
        $session_profile =  $_SESSION['profile'];
        $profile_id = $session_profile['user_id'];
        // get data from databae
        if(count($session_profile) > 0){
            $profile  = Profile::getUser($session_profile['email']);
            foreach ($profile as $key => $value) {
                if($value['user_id'] === $profile_id){
                    $profile = $value;
                }
            }
        }

        view::render('admin/user/index.php', $profile, 'dashboard');
    }
  

    public function update()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");
        try {
            $id =  UserModel::UpdateUser($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('admin/user/index');
    }


    public function updateImage()
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


    protected function after()
    {
  
    }

}