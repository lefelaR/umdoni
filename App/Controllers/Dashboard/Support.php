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
use Aws\S3\S3Client;


class Support extends \Core\Controller
{

    public function indexAction()
    {   
        $support = array();
        view::render('dashboard/support/index.php', $support, 'dashboard');
    }
  

    public function helpAction()
    {   
        $support = array();
        view::render('dashboard/support/help.php', $support, 'dashboard');
    }
  
    public function contactAction()
    {   
        $support = array();
        view::render('dashboard/support/contact.php', $support, 'dashboard');
    }
  

    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
    }

}