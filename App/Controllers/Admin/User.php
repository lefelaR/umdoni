<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Admin;
use \Core\View;
use \Core\Session;
use App\Models\Profile;
use App\Models\UserModel;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

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
            // enable_authorize();
    }


    public function indexAction()
    {
        global $context;
        $session_profile = (new Session)->getProfile();
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
  

    public function changeAction()
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
        view::render('admin/user/change.php', $profile, 'dashboard');
    }
  
    public function requestchange()
    {

        if(isset($_POST)){
    
        $data = $_POST;
        $clientId = $this->clientId;
        $bucketName = $this->bucketName;
        $awsAccessKeyId =   $this->awsAccessKeyId;
        $awsSecretAccessKey =  $this->awsSecretAccessKey;
        $region =  $this->region; // Change to your desired region
     
        
        $client = new CognitoIdentityProviderClient([
            'version' => 'latest',
            'region'  => $region,
            'credentials' => [
              'key'    => $this->awsAccessKeyId,
              'secret' => $this->awsSecretAccessKey,
            ],
          ]);

          try {
            $result = $client->forgotPassword([
              'ClientId' =>  $clientId,
              'Username' => $data['username']
             ]);
            if ($result) {
            return $result;
            } else {
                return $result;
            }
          } catch (\Throwable $th) {
           return $th;
          }
        }

    }


    public function reset()
    {
      global $context;
      if (isset($_POST)) $data = $_POST;
  
      if(isset($_SESSION['profile'])) $data['username'] = $_SESSION['profile']['email'];
  
      $clientId = $this->clientId;
      $region = $this->region;
      $client = new CognitoIdentityProviderClient([
        'version' => 'latest',
        'region'  => $region,
        'credentials' => [
          'key'    => $this->awsAccessKeyId,
          'secret' => $this->awsSecretAccessKey,
        ],
      ]);
  
      try {
        $result = $client->confirmForgotPassword([
          'ClientId' => $clientId,
          'ConfirmationCode' => $data['code'],
          'Password' => $data['password'],
          'Username' => $data['username']
        ]);
  
        if ($result) {
          redirect('admin/user/index');
        } else {
          $context->errors['message'] = 'Login & Password error!!!';
          redirect('admin/user/change');
        }
      } catch (\Throwable $th) {
        $_SESSION['error'] = ['message' => $th->getMessage()];
        redirect('admin/user/index');
      }
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

        if (isset($_FILES)) {

            $s3 = new S3Client([
                'version' => 'latest',
                'region' => $this->region,
                'credentials' => [
                    'key' => $this->awsAccessKeyId,
                    'secret' => $this->awsSecretAccessKey,
                ],
            ]);
            $file = $_FILES;

            $filePath = $file['name']['tmp_name'];
            $objectKey = $file['name']['name'];
            $loc = "";

            try {
                // Upload the file to S3
                $result = $s3->putObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $objectKey,
                    'SourceFile' => $filePath,
                ]);
            } catch (Exception $e) {
                echo "Error uploading file: " . $e->getMessage();
            }
        }

        if(isset($_POST)) $data = $_POST;

        $data['img_file'] = $objectKey;
        $data['location'] = $result['ObjectURL'];
        try {
            $id =  UserModel::UpdateImage($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('admin/user/index');
    }


    protected function after()
    {
  
    }

}