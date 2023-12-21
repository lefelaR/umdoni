<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use \Components\Cognito;
use App\Models\Profile;
use Components\Context;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use App\Models\User;



class Authentication extends \Core\Controller
{




  public function indexAction()
  {

    echo "hello from the login controller";
    //    view::render('authentication/login.php', array() ,'authentication');
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
    $clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
    $userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
    $region = $_ENV['AWS_REGION'];

    $client = new CognitoIdentityProviderClient([
      'version' => 'latest',
      'region'  => $region,
      'credentials' => [
        'key'    => 'AKIA3FVMIL3UXGIEI3WH',
        'secret' => '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',
    ],
    ]);

    try {
      $result = $client->forgotPassword([
        'ClientId' =>  $clientId,
        'Username' => $data['username']
      ]);
      
      if ($result) {
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
    $isLoggedin = $context->isLoggedIn;

    $clientId = '68jf7vhidstpf7fj9h0ic3fo19';
    $userPoolId = 'eu-central-1_Y7oAKlw6X';
    $region = 'eu-central-1';

    $client = new CognitoIdentityProviderClient([
      'version' => 'latest',
      'region'  => $region,
      'credentials' => [
        'key'    => 'AKIA3FVMIL3UXGIEI3WH',
        'secret' => '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',
    ],
    ]);

    try {
      $result =$client->confirmForgotPassword([
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

    $clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
    $userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
    $region = $_ENV['AWS_REGION'];
   

    $client = new CognitoIdentityProviderClient([
      'version' => 'latest',
      'region'  => $region,
      'credentials' => [
        'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
    ],
    ]);

    try {
      $result = $client->adminInitiateAuth([
        'AuthFlow' => 'ADMIN_NO_SRP_AUTH',
        'ClientId' => $clientId,
        'UserPoolId' => $userPoolId,
        'AuthParameters' => [
          'USERNAME' => $data['username'],
          'PASSWORD' => $data['password'],
        ],
      ]);
      $accessToken = $result->get('AuthenticationResult')['AccessToken'];
      
      if ($accessToken) {
        $_SESSION['token'] = $accessToken;
        $isLoggedin  = Profile::Login($data);
        if ($isLoggedin == true) {
          redirect('dashboard/index/index');
        } else {
          $context->errors['message'] = 'Login & Password error!!!';
          redirect('authentication/login');
        }
      }
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      redirect('authentication/login');
    }
  }


  public function register()
  {
      global $context;
      if (isset($_POST)) $data = $_POST;

      $clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
      $userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
      $region = $_ENV['AWS_REGION'];

      $client = new CognitoIdentityProviderClient([
        'version' => 'latest',
        'region'  => $region,
        'credentials' => [
          'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
          'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
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
        $data['UserSub'] = $result['UserSub'];
        $user = User::Save($data);
        $_SESSION['success'] = ['message' => 'Registration Successfull, please find your authentication code in your email inbox'];
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

    $clientId = $_ENV['AWS_COGNITO_CLIENT_ID'];
    $userPoolId = $_ENV['AWS_COGNITO_USER_POOL_ID'];
    $region = $_ENV['AWS_REGION'];

    $client = new CognitoIdentityProviderClient([
      'version' => 'latest',
      'region'  => $region,
      'credentials' => [
        'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
    ],
    ]);
    try {
      
      $result = $client->confirmSignUp([
        'ClientId' => $clientId,
        'Username' => $data['username'],
        'ConfirmationCode' => $data['code'],
      ]);

      if(count($result)){
        $data['status'] = true;
        $confirm = User::VerifyeUser($data);
      }

      $_SESSION['success'] = ['message' => 'You have been verified'];

      redirect('authentication/login');
    } catch (\Throwable $th) {
      $_SESSION['error'] = ['message' => $th->getMessage()];
      throw $th;
    }

  }



  public function logoutAction()
  {
    session_destroy();
    $logout = new Context();
    $logout->setLoggedIn(false);
   
    setcookie("auth", "", time() - 3600, '/');
   
    redirect('/');
  }
}


