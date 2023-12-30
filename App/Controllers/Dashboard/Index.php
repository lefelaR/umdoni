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

class Index extends \Core\Controller
{

    public function indexAction()
    {

        print_r('here');
        die;

        // get logged in user information
        $AuthenticatedUser  = $_SESSION['profile'];
        $dashboard = array();
        $users = User::getUser($AuthenticatedUser['user_id']);
        $projects = Project::Get();
        $services = Request::getAll();
        $events = Event::getAll();
        $notices = Notice::getAll();

        $dashboard['users'] = $users;
        $dashboard['requests'] = $services;
        $dashboard['projects'] = $projects;
        $dashboard['events'] = $events;
        $dashboard['notices'] = $notices;

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
