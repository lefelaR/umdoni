<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;
use \Core\View;
use App\Models\Profile;
use Components\Context;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use App\Models\UserModel;
use App\Models\RolesModel;
use Aws\Exception\AwsException;
use App\Models\LogsModel;


class Authentication extends \Core\Controller
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
    echo "hello from the login controller";
    redirect('dashboard/index/index');
  }

  public function loginAction()
  {
    global $context;
    if (isset($context->isLoggedIn) &&  $context->isLoggedIn == true) {
      redirect('dashboard/index/index');
    }
    view::render('authentication/login.php', array(), 'authentication');
  }



  public function signupAction()
  {
    view::render('authentication/signup.php', array(), 'authentication');
  }

  public function codeAction()
  {
    view::render('authentication/code.php', array(), 'authentication');
  }

  public function forgotpasswordAction()
  {
    view::render('authentication/forgotpassword.php', array(), 'authentication');
  }


  public function request()
  {
    global $context;

    if (isset($_POST)) $data = $_POST;
    $isLoggedin = $context->isLoggedIn;
    $clientId = $this->clientId;
    $userPoolId = $this->userPoolId;
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
      $result = $client->forgotPassword([
        'ClientId' =>  $clientId,
        'Username' => $data['username']
      ]);
      if ($result) {
        $_SESSION['username'] = $data['username'];
        redirect('authentication/resetpassword');
      } else {
        $context->errors['message'] = 'Login & Password error!!!';
        redirect('authentication/login');
      }
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/login');
    }
  }

  public function reset()
  {
    global $context;
    if (isset($_POST)) $data = $_POST;

    if(isset($_SESSION['username'])) $data['username'] = $_SESSION['username'];

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
        redirect('authentication/login');
      } else {
        $context->errors['message'] = 'Login & Password error!!!';
        redirect('authentication/login');
      }
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/login');
    }
  }

  public function resetpasswordAction()
  {

    view::render('authentication/resetpassword.php', array(), 'authentication');
  }


  /**
   * butle functions below
   */

  public function authenticate()
  {
    global $context;
    if (isset($_POST)) $data = $_POST;
    $isLoggedin = $context->isLoggedIn;
    try {
        $isLoggedin  = Profile::Login($data);
        if ($isLoggedin == true) { 
        // get the role
          $role = RolesModel::GetById($context->profile[0]['role_id']);

          if(isset($role)) $_SESSION['role'] = $role;
          redirect('dashboard/index/index');
        } else {
          $_SESSION['error'] = ['message' => 'Your account is locked, please contact your Administrator to gain accecss!'];
          redirect('authentication/login');
        }
      
    } catch (\Throwable  $aw) {
      $errMsg = $aw->getMessage();  
        $_SESSION['error'] = ['message'=>$errMsg];

      redirect('authentication/login');
    }
  }


  public function register()
  {
    global $context;
    if (isset($_POST)) $data = $_POST;
    $clientId = $this->clientId;
    $userPoolId = $this->userPoolId;
    $region = $this->region;

    $client = new CognitoIdentityProviderClient([
      'version' => 'latest',
      'region'  => $region,
      'credentials' => [
        'key'    => 'AKIA4Y2PS6FVQSB7BW6X',
        'secret' => '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',
      ],
    ]);

    try {
      $result  =  $client->signUp([
        'ClientId' => $clientId,
        'Username' => $data['email'],
        'Password' => $data['password'],
        'UserAttributes' => [
          [
            'Name' => 'name',
            'Value' => $data['username']
          ]
        ],
      ]);

      if ($result) {
        //   create user
        $data['createdAt'] = date("Y-m-d H:i:s");
        $data['status'] = 0;
        $data['locked'] = 1;
        $data['role_id'] = 2;
        $data['UserSub'] = $result['UserSub'];
 
        $exists = Profile::getUser($data);
        if (!empty($exists)) {
        $user = UserModel::Save($data);
        $_SESSION['success'] = ['message' => 'Registration Successfull, please find your authentication code in your email inbox'];
        } else {
          $_SESSION['error'] = ['message' => 'This email already exists, please try resetting your password.'];
          return false;
        }
      }

      redirect('authentication/code');
    } catch (\Throwable $th) {

      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/signup');
    }
  }


  public function verifyAction()
  {
    global $context;
    if (isset($_POST)) $data = $_POST;
    $clientId = $this->clientId;
    $userPoolId = $this->userPoolId;
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
      $result = $client->confirmSignUp([
        'ClientId' => $clientId,
        'Username' => $data['username'],
        'ConfirmationCode' => $data['code'],
      ]);
      if (count($result)) {
        $data['status'] = true;
        $confirm = UserModel::VerifyeUser($data);
      }
      $_SESSION['success'] = ['message' => 'You have been verified'];
      redirect('authentication/login');
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/code');
    }
  }


  public function updatePassword()
  {
    global $context;
    if (isset($_POST)) $data = $_POST;
    $clientId = $this->clientId;
    $userPoolId = $this->userPoolId;
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
      $result = $client->confirmSignUp([
        'ClientId' => $clientId,
        'Username' => $data['username'],
        'ConfirmationCode' => $data['code'],
      ]);
      if (count($result)) {
        $data['status'] = true;
        $confirm = UserModel::VerifyeUser($data);
      }
      $_SESSION['success'] = ['message' => 'You have been verified'];
      redirect('authentication/login');
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/code');
    }
  }

  public function logoutAction()
  {
    global $context;

    LogsModel::UserLogout($_SESSION['profile']);

    session_destroy();
    $logout = new Context();
    $logout->setLoggedIn(false);
    setcookie("auth", "", time() - 3600, '/');
    redirect('/authentication/login');
  }
}