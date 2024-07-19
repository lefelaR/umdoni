<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\LogsModel;


class Logs extends \Core\Controller
{

    public function indexAction()
    {   
        $logs = LogsModel::Get();

        view::render('dashboard/logs/index.php', $logs, 'dashboard');
    }
  
    protected function before()
    {
       enable_authorize();
        //log in actibvity log()
    }

    protected function after()
    {
    }

}