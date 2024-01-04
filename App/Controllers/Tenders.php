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
use App\Models\Tender;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
 

class Tenders extends \Core\Controller
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

        $tenders = Tender::Get();
        view::render('tenders/index.php', $context =array(), 'default');
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