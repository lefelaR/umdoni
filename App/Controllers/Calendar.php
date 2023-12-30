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
use App\Models\CalendarModel;

class Calendar extends \Core\Controller
{

    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {

        $events = CalendarModel::getAll();

        view::render('calendar/index.php', $events, 'default');
    }

    public function detailsAction()
    {
         $data = getPostData();
                 if(isset($data['id'])){
            $id = $data['id'];
            $results = CalendarModel::getAll();
            foreach ($results as $key => $result) {
                if($result["id"] == $id) $calendar = $result;
            }
           
        }else{
            $calendar = array();
        }

        view::render(
            'calendar/details.php',
            $calendar,
            'default'
        );
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
