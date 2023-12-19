<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */
/**
 * Composer
 */

 use Components\Context;
require '../vendor/autoload.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
/**
 * Twig
 */
// Twig_Autoloader::register();
/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
/**
 * get helper function
 */


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Index', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('dashboard/{controller}/{action}', ['namespace' => 'Dashboard']);
$router->add('dashboard/{controller}/{action}/{id:\d+}', ['namespace' => 'Dashboard']);

$url = $_SERVER['QUERY_STRING'];

global $context;

if(!isset($context) && empty($context))
{    // call the class
    $context = new Context('','','','');
}


$router->dispatch($url);


