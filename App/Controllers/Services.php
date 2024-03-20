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
use App\Models\Meeting;
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

          if(isset($id))
          {
            // send email
            $mail = new PHPMailer();
            $mail->From = "rakgew@gmail.com"; 
            $mail->FromName = "Rakheoana"; //To address and name 
            $mail->addAddress("elisha@isutech.co.za", "Elisha");//Recipient name is optional
            $mail->addAddress("rakgew+2@gmail.com"); //Address to which recipient will reply  
            $mail->isHTML(true); 
            $mail->Subject = "Email test"; 
            $mail->Body = "<i>Mail body in HTML</i>";
             
            if(!$mail->send()) {
                $_SESSION['success'] = ['message' => "Thank you for your service request"];
            }else{
                $_SESSION['error'] = ['message' => "Email not sent"];
            }
          }
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

        $meetings = Meeting::getAll();

        view::render('services/meetings.php', $meetings, 'default');
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