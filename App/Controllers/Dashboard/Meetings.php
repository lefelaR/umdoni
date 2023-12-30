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
use App\Models\Meeting;


class Meetings extends \Core\Controller
{

    public function indexAction()
    {
       
        // get information from the model and inject it into the viewport
        //    name an object that will carry all dashboard items

        $meetings = Meeting::getAll();
        view::render('dashboard/meetings/index.php', $meetings , 'dashboard');
    }
  
    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
       
    }

}