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
use Aws\S3\S3Client;

class User extends \Core\Controller
{

    protected function before()
    {
            enable_authorize();
    }


    public function indexAction()
    {
        global $context;
        $profile =  $_SESSION['profile'];
        view::render('admin/user/index.php', $profile, 'dashboard');
    }
  

    protected function after()
    {
  
    }

}