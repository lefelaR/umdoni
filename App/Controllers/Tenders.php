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
use  App\Models\RolesModel;
use App\Models\TenderModel;
use App\Models\Quotation;
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
        $context = array();
        $tenders = TenderModel::Get();
        $quotations = Quotation::getAll();
        $context['tenders']= $tenders;
        $context['quotations']= $quotations;
        view::render('tenders/index.php', $context, 'default');
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