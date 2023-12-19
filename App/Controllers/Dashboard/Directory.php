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


class Directory extends \Core\Controller
{

    public function indexAction()
    {
       
        // get information from the model and inject it into the viewport
        //    name an object that will carry all dashboard items
        $dashboard = array();
        $users = User::getAll();
        $dashboard['users'] = $users;

        view::render('dashboard/directory/index.php', $dashboard , 'dashboard');
    }
  
    protected function before()
    {
       enable_authorize();
    }

    protected function after()
    {
       
    }

}