<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;
use \Core\View;
use App\Models\Councillor;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
 

class Councillors extends \Core\Controller
{
 
    protected function before()
    {
        //return false;
    }

    public function indexAction()
    {
        $data['councillors']  = Councillor::GET();
        view::render('councillors/index.php', $data, 'default');
    }

    public function administrationAction()
    {
        $data['managers'] = Councillor::getSeniors();
        view::render('councillors/administration.php', $data, 'default');
    }
    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }
}