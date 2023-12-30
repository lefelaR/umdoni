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
use App\Models\Service; 
use App\Models\Request;

class Services extends \Core\Controller
{
 
    protected function before()
    {
      
    }

    public function indexAction()
    { 

        $services = Service::getAll();
        view::render('services/index.php', $services, 'default');
    }

    public function requestAction()
    {

        $data = getPostData();
        if(isset($data['service'])){
            $id = $data['service'];
            $requests = Request::getRequestById($id);
        }else{
            $requests  = Service::getAll();
        }

        view::render('services/request.php', 
        $requests , 'default');
    }

    public function saveAction()
    {
        $id = "";

        if(isset($_POST)){
            $data = $_POST;
            $data['createdAt'] = date("Y-m-d H:i:s");
            $data['status'] = 1;
          $id = Request::Save($data);
        $_SESSION['success'] = ['message' => "Thank you for your service request"];
        }
        redirect("services/request");
    }
    

    public function directoryAction()
    {
        view::render('services/directory.php', 
        $context =[], 'default');
    }

    
    public function politicalAction()
    {
        view::render('services/political.php', 
        $context =[], 'default');
    }

    public function administrativeAction()
    {
        view::render('services/administrative.php', 
        $context =[], 'default');
    }


    public function meetingsAction()
    {
        view::render('services/meetings.php', 
        $context =[], 'default');
    }


    public function serviceinfoAction()
    {

        $data = getPostData();
        if(isset($data['service'])){
            $id = $data['service'];
            $requests = Request::getRequestById($id);
        }else{
            $requests  = Service::getAll();
        }

        view::render('services/serviceinfo.php', 
        $requests , 'default');
    }

    public function infoAction()
    {
        view::render('services/info.php', 
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