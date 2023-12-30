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
use App\Models\Emails;

class Contact extends \Core\Controller
{

    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {
 

        view::render(
            'contact/index.php',
            $context = [],
            'default'
        );
    }


    public function saveAction()
    {
       if (isset($_POST)) {
            $item = $_POST;
            $item['createdAt'] = date("Y-m-d H:i:s");
            $id =  Emails::Save($item);

            // $mail = new PHPMailer(true);
            // $mail->setFrom('elisha@isutech.co.za', 'Mailer');
            // $mail->Subject = 'Umdoni';
            // $mail->Body ="this is for reference use only";
            // $mail->addAddress('rakgew@gmail.co.za', 'Joe User'); 
            // $mail->send();

        }
        redirect('contact/index');
    }


    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
    }
}
