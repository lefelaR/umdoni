<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;
use \Core\View;
use App\Models\CouncillorModel;

 

class Councillors extends \Core\Controller
{
    protected function before()
    {
   
    }

    public function indexAction()
    {
        $data = array();
        view::render('councillors/index.php', $data, 'default');
    }

    public function excoAction()
    {
        $data  = CouncillorModel::GetExco();
        view::render('councillors/exco.php', $data, 'default');
    }

    public function councilAction()
    {
        $data['councillors']  = CouncillorModel::GET();
        view::render('councillors/council.php', $data, 'default');
    }

    public function administrationAction()
    {
        $data['managers'] = CouncillorModel::getSeniors();
        view::render('councillors/administration.php', $data, 'default');
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