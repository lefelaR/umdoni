<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers;
use \Core\View;


 

class Rfps extends \Core\Controller
{
  /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        enable_authorize();
    }

    public function indexAction()
    {
        // $tenders = TenderModel::Get();
        $rfps = [];
        view::render('rfp/index.php', $rfps, 'default');
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