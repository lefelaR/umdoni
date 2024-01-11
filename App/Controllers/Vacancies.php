<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use  App\Models\Post;
use  App\Models\Roles;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
use App\Models\Vacancy;

class Vacancies extends \Core\Controller
{

    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {


        view::render('vacancies/index.php', $events= array(), 'default');
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
