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
        $annualreports = Document::GET();
        view::render('documents/annualreports.php', $annualreports, 'default');
    }

    public function wardprofileAction()
    {
        $wardprofile = Document::GET();
        view::render('documents/wardprofile.php', $wardprofile, 'default');
    }

    public function idpAction()
    {
        $idp = Document::GET();
        view::render('documents/idp.php', $idp, 'default');
    }


    public function policiesAction()
    {
        $policies = Document::GET();
        view::render('documents/policies.php', $policies, 'default');
    }

    public function budgetAction()
    {
        $budget = Document::GET();
        view::render('documents/budget.php', $budget, 'default');
    }

    public function valuationrollAction()
    {
        $valuationroll = Document::GET();
        view::render('documents/valuationroll.php', $valuationroll, 'default');
    }

    public function internalauditAction()
    {
        $internalaudit = Document::GET();
        view::render('documents/internalaudit.php', $internalaudit, 'default');
    }


    public function councilminutesAction()
    {
        $councilminutes = Document::GET();
        view::render('documents/councilminutes.php', $councilminutes, 'default');
    }
    
    public function servicedeliveryAction()
    {
        $servicedelivery = Document::GET();
        view::render('documents/servicedelivery.php', $servicedelivery, 'default');
    }


    public function ledAction()
    {
        $led = Document::GET();
        view::render('documents/led.php', $led, 'default');
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
