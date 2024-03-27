<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use  App\Models\EventModel;

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
        $event = EventModel::getAll();
     
        view::render('events/index.php', $event, 'default');
    }


    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $event = EventModel::getEvent($id);
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
