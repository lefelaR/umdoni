<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\UserModel;
use App\Models\Newsletter;



class Newsletters extends \Core\Controller
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
        $newsletters = Newsletter::Get();
        view::render('dashboard/newsletters/index.php',  $newsletters, 'dashboard');
    }

    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $newsletter = Newsletter::GetById($id);
        } else
            $newsletter = array();
        view::render('dashboard/newsletters/add.php',  $newsletter, 'dashboard');
    }

    public function updateAction()
    {
        $data = $_POST;
        try {
            $id =  Newsletter::Update($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/newsletters/list');
    }


    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            UserModel::Delete($id);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        redirect('dashboard/newsletters/list');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
        // echo "(after)";
    }
}
