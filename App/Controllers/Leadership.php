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
 

class Leadership extends \Core\Controller
{
  /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
    }

    public function indexAction()
    {
        view::render('leadership/index.php', $context =array(), 'default');
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