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
use App\Models\Document;

class Documents extends \Core\Controller
{

    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    public function indexAction()
    {
        view::render('documents/index.php', $context = [], 'default');
    }

    public function detailsAction()
    {

        $data = getPostData();
        if(isset($data['id']))
        {
            $id = $data['id'];
            $category = $data['category'];

            $document = Document::GetById($id,$category);
        }else $document = array();

        view::render('documents/details.php', $document, 'default');
    }

    public function newslettersAction()
    {
        $newsletters = Document::GET();
        view::render('documents/newsletters.php', $newsletters, 'default');
    }

    public function annualreportsAction()
    {
        $newsletters = Document::GET();
        view::render('documents/annualreports.php', $newsletters, 'default');
    }

    public function wardprofileAction()
    {
        $newsletters = Document::GET();
        view::render('documents/wardprofile.php', $newsletters, 'default');
    }

    public function idpAction()
    {
        $newsletters = Document::GET();
        view::render('documents/idp.php', $newsletters, 'default');
    }


    public function policiesAction()
    {
        $newsletters = Document::GET();
        view::render('documents/policies.php', $newsletters, 'default');
    }

    public function budgetAction()
    {
        $newsletters = Document::GET();
        view::render('documents/budget.php', $newsletters, 'default');
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
