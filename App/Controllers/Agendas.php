<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;
use \Core\View;
use  App\Models\Roles;
use  App\Models\NewsModel;

use App\Models\Agenda;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
 

class Agendas extends \Core\Controller
{
 
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {

        $agendas = Agenda::getAll();

        view::render('agendas/index.php', $agendas, 'default');
    }

    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $agendas = Agenda::getAgenda($id);
        }else{
            $agendas = array();
        }

        view::render('agendas/details.php', $agendas, 'default');
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