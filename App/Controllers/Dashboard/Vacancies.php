<?php


/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\Service;
use App\Models\VacancyModel;
use Components\UploadToSite;



class Vacancies extends \Core\Controller
{

    public function indexAction()
    {
        $services = VacancyModel::GET();
        view::render('dashboard/vacancies/index.php', $services, 'dashboard');
    }



    public function addAction()
    {
        $data = getPostData();

        if(isset($data['id']))
        {
            $id = $data['id'];
            $service = VacancyModel::getById($id);
        }else
            $service = array();
        view::render('dashboard/vacancies/add.php', $service, 'dashboard');
    }


    public function saveAction()
    {
        global $context;

        if (isset($_FILES)) {
            $destination = UploadToSite::upload($_FILES);
        } 

        if(isset($_POST)) $data = $_POST;
        $date['createdAt'] = date("Y-m-d H:i:s");
        $data['isActive'] = 1;
        $data['location'] =  substr($destination,1);
        try 
        {
          $id =  VacancyModel::Save($data);   
        } catch (\Throwable $th) 
        {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/vacancies/index');
    }

    public function updateAction()
    {
        $data = $_POST;

        $data['updatedAt'] = date("Y-m-d H:i:s");
       

        try 
        {
          $id =  Service::updateService($data);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/vacancies/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try 
        {
            VacancyModel::Delete($id);
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
        redirect('dashboard/vacancies/index');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
