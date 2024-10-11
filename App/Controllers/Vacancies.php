<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use App\Models\VacancyModel;

class Vacancies extends \Core\Controller
{

    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {

        $vacancies = VacancyModel::GET();
        view::render('vacancies/index.php', $vacancies, 'default');
    }

    public function detailsAction()
    {
        $data = getPostData();

        if(isset($data['id'])){
            $id = $data['id'];
            $vacancy = VacancyModel::getById($id);
         
        }else{
            $vacancy = array();
        }
        view::render('vacancies/details.php', $vacancy, 'default');
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
