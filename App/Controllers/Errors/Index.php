<?php

/**
 * @author : rakheoana lefela
 * @date : 16th dec 2021
 * 
 * Front Controller/ hadles all the incoming requests to site
 */

namespace App\Controllers;

use \Core\View;


class Index extends \Core\Controller
{
 
    public function error_400($e)
    {
        View::render('errors',$e, 'default');
    }
}