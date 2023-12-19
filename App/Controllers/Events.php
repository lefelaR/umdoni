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
use  App\Models\Event;

class Events extends \Core\Controller
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
        $event = Event::getAll();
     
        view::render('events/index.php', $event, 'default');
    }


    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $event = Event::getEvent($id);
        }else{
            $event = array();
        }
        view::render('events/details.php', $event, 'default');
    }

    /**
     * After filter
     * @return void
     */

    protected function after()
    {
       
    }
}
