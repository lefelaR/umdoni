<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */
namespace App\Controllers;

use \Core\View;
use App\Models\QuotationsModel;

 

class Quotations extends \Core\Controller
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
        $quotations = QuotationsModel::getAll();
        view::render('quotations/index.php', $quotations, 'default');
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