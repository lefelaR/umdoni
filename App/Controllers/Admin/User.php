<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers\Admin;
use \Core\View;




class User extends \Core\Controller
{

    public function indexAction()
    {
        view::render('admin/user/index.php', array(), 'dashboard');
    }
  
    protected function before()
    {
  
    }

    protected function after()
    {
  
    }

}