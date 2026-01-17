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
use Components\Routes;

use Dotenv\Dotenv;

use Rollbar\Rollbar;
use Rollbar\Payload\Level;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;




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
 * Error handling with Sentry
 */

\Sentry\init([
  'dsn' => 'https://eb3c74cd1c591c6ece9c2984821145e5@o4509340293791744.ingest.de.sentry.io/4509340295495760',
]);


try {
  $this->functionFailsForSure();
} catch (\Throwable $exception) {
  \Sentry\captureException($exception);
}
/**
 * get helper function
 */
try {
    $dotenv = Dotenv::createImmutable('../');
    $dotenv->load();
} catch (\Throwable $th) {
    throw $th;
}


/**
 * Routing
 */
$router = new Core\Router();

// Load all routes
$routes = new Routes($router);
$routes->load();

$url = $_SERVER['QUERY_STRING'];
global $context;
if (!isset($context) && empty($context)) {    // call the class
    $context = new Context('', '', '', '');
}

$router->dispatch($url);
