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

// API Routes (must be added before regular routes)
$router->add('api/v1/health', ['api' => 'api', 'version' => 'v1', 'controller' => 'Health', 'action' => 'index']);
$router->add('api/v1/{controller}', ['api' => 'api', 'version' => 'v1', 'action' => 'index']);
$router->add('api/v1/{controller}/{id:\d+}', ['api' => 'api', 'version' => 'v1', 'action' => 'show']);
$router->add('api/v1/{controller}/create', ['api' => 'api', 'version' => 'v1', 'action' => 'create']);
$router->add('api/v1/{controller}/{id:\d+}/update', ['api' => 'api', 'version' => 'v1', 'action' => 'update']);
$router->add('api/v1/{controller}/{id:\d+}/delete', ['api' => 'api', 'version' => 'v1', 'action' => 'delete']);

// Regular routes
$router->add('', ['controller' => 'Index', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('dashboard/{controller}/{action}', ['namespace' => 'Dashboard']);
$router->add('dashboard/{controller}/{action}/{id:\d+}', ['namespace' => 'Dashboard']);

$url = $_SERVER['QUERY_STRING'];
global $context;
if (!isset($context) && empty($context)) {    // call the class
    $context = new Context('', '', '', '');
}

$router->dispatch($url);
