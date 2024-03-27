<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;
use App\Models\Emails;

class Contact extends \Core\Controller
{

    protected function before()
    {
   
    }

    public function indexAction()
    {
 

        view::render(
            'contact/index.php',
            $context = [],
            'default'
        );
    }


    public function saveAction()
    {
       if (isset($_POST)) {
            $item = $_POST;
            $item['createdAt'] = date("Y-m-d H:i:s");
            $id =  Emails::Save($item);
        }
        redirect('contact/index');
    }


    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
    }
}
