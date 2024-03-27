<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use Components\DownloadPdf;
use App\Models\RolesModel;

class Roles extends \Core\Controller
{

    public function indexAction()
    {
        $roles = RolesModel::getAll();
        view::render('dashboard/roles/index.php', $roles, 'dashboard');
    }


    public function addAction()
    {
        $data = getPostData();
        if (isset($data['id'])) {
            $id = $data['id'];
            $role = RolesModel::getById($id);
            $role  = $role[0];
        } else
            $role = array();
        view::render('dashboard/roles/add.php', $role, 'dashboard');
    }


    public function save()
    {
        global $context;

        if (isset($_POST)) {
            $data['name'] = $_POST['name'];
            array_shift($_POST);
            array_shift($_POST);
            $data['permissions'] = json_encode($_POST);
        }

        try {

            $id = RolesModel::Save($data);
            $_SESSION['success'] = ['message' => 'successfully added record!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }

        redirect('dashboard/roles/index');
    }


    public function update()
    {

        $id = $_POST['id'];
        $data['name'] = $_POST['name'];
        array_shift($_POST);
        array_shift($_POST);
        $data['permissions'] = json_encode($_POST);


        try {
            RolesModel::Update($id, $data);
            $_SESSION['success'] = ['message' => 'Quotation status updated successfully!'];
        } catch (\Throwable $th) {
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }

        redirect('dashboard/roles/index');
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        try {
            RolesModel::Delete($id);
            $_SESSION['success'] = ['message' => 'record deleted!'];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $_SESSION['error'] = ['message' => $th->getMessage()];
        }
        redirect('dashboard/roles/index');
    }

    public function download()
    {
        $roles = RolesModel::getAll();
        $html = DownloadPdf::convertHtml($roles);
         DownloadPdf::SavePdf($html);
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
