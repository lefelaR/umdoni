<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use App\Models\AgendaModel;

 

class Agendas extends \Core\Controller
{
 
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {

        $agendas = AgendaModel::Get();

        view::render('agendas/index.php', $agendas, 'default');
    }

    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $agendas = AgendaModel::GetById($id);
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