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
use App\Models\Project;
 

class Projects extends \Core\Controller
{

  /**
     * Before filter
     *
     * @return void
     */
 
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {

         $projects = Project::Get();
        view::render('projects/index.php', $projects, 'default');
    }

    public function detailsAction()
    {
        $data = getPostData();
        if(isset($data['id'])){
            $id = $data['id'];
            $project = Project::getById($id);
        }else{
            $project = array();
         }
        view::render('projects/details.php', $project, 'default');
    }


    public function policyAction()
    {
        view::render('index/privacy-policy.php', $context =[], 'default');
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