<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use \Core\View;
use App\Models\User;
use App\Models\Profile;
use App\Models\Request;
use App\Models\Project;
use App\Models\Event;
use App\Models\Notice;
use App\Models\UserModel;
use Aws\S3\S3Client;

class Index extends \Core\Controller
{

    public function indexAction()
    {
        $dashboard = array();

        // get logged in user information
        $AuthenticatedUser  = $_SESSION['profile'];
        $profile_id = $AuthenticatedUser['user_id'];

        if(count($AuthenticatedUser) > 0){
            $profile  = Profile::getUser($AuthenticatedUser['email']);
            foreach ($profile as $key => $value) {
                if($value['user_id'] === $profile_id){
                    $profile = $value;
                }
            }
        }

       
        
        $users = UserModel::getUser($AuthenticatedUser['user_id']);

        $projects = Project::Get();
        $services = Request::getAll();
        $events = Event::getAll();
        $notices = Notice::getAll();

        $dashboard['users'] = $users;
        $dashboard['requests'] = $services;
        $dashboard['projects'] = $projects;
        $dashboard['events'] = $events;
        $dashboard['notices'] = $notices;
        $dashboard['profile'] = $profile;
        $profile['profile'] = $AuthenticatedUser;
        view::render('dashboard/index.php', $dashboard, 'dashboard');
    }

    protected function before()
    {
        enable_authorize();
    }

    protected function after()
    {
    }
}
