<?php
/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;

 

class Search extends \Core\Controller
{
 
    protected function before()
    {
        //return false;
    }

    public function indexAction()
    {
        view::render('search/index.php', 
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