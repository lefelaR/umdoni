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


class Logs extends \Core\Controller
{

    public function indexAction()
    {   
        $logs = array();
        view::render('dashboard/logs/index.php', $logs, 'dashboard');
    }
  
    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
    }

}