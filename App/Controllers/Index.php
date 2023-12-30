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
use  App\Models\NewsModel;


class Index extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */

    protected function before()
    {
        //return false;
    }

    public function indexAction()
    {


        $data['news'] =  NewsModel::getAll();

            view::render('index/index.php', $data, 'default');
    }


    public function termsAction()
    {

            view::render('index/termsofservice.php', $data=[], 'default');
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
