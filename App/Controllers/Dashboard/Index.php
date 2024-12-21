<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers\Dashboard;

use App\Repositories\Service;
use \Core\View;
use \Core\Session;

use App\Models\Profile;
use App\Models\Request;
use App\Models\ProjectsModel;
use App\Models\EventModel;
use App\Repositories\NoticeRepository;
use App\Models\UserModel;


class Index extends \Core\Controller
{


    public function indexAction()
    {
        $dashboard = array();
        // get logged in user information
       
        
        $AuthenticatedUser =  (new Session)->getProfile();
        // check for user role
        $profile_id = $AuthenticatedUser['user_id'];
        if (count($AuthenticatedUser) > 0) {
            $profile = Profile::getUser($AuthenticatedUser['email']);
            foreach ($profile as $key => $value) {
                if ($value['user_id'] === $profile_id) {
                    $profile = $value;
                }
            }
        }
        $dashboard['users'] = UserModel::getUser($profile_id);
        $dashboard['requests'] = Request::getAll();
        $dashboard['projects'] = ProjectsModel::Get();
        $dashboard['events'] = EventModel::getAll();
        $dashboard['notices'] = NoticeRepository::getAll();
        $dashboard['requests'] = Request::getAll();
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
