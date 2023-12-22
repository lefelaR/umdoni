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
 

class Departments extends \Core\Controller
{
 
    protected function before()
    {
        //return false;
    }

    public function indexAction()
    {
        view::render('departments/index.php', 
        $context =[], 'default');
    }

    public function managerAction()
    {
        view::render('departments/manager.php', 
        $context =[], 'default');
    }

    public function financeAction()
    {
        view::render('departments/finance.php', 
        $context =[], 'default');
    }

    public function corporateAction()
    {
        view::render('departments/corporate.php', 
        $context =[], 'default');
    }
    
    public function technicalAction()
    {
        view::render('departments/technical.php', 
        $context =[], 'default');
    }

    public function communityAction()
    {
        view::render('departments/community.php', 
        $context =[], 'default');
    }

    public function planningAction()
    {
        view::render('departments/planning.php', 
        $context =[], 'default');
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