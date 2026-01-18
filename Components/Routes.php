<?php

namespace Components;

use Core\Router;

/**
 * Routes Configuration
 * 
 * Centralizes all route definitions for the application
 */
class Routes
{
    /**
     * Router instance
     * @var Router
     */
    private $router;

    /**
     * Constructor
     * 
     * @param Router $router Router instance
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Load all routes
     * 
     * @return void
     */
    public function load()
    {
        $this->loadApiRoutes();
        $this->loadRegularRoutes();
    }

    /**
     * Load API routes
     * 
     * API routes must be added before regular routes to ensure proper matching
     * 
     * @return void
     */
    private function loadApiRoutes()
    {
   
        // Special API routes (must come before generic routes)
        $this->router->add('api/v1/news', [
            'api' => 'api',
            'version' => 'v1',
            'controller' => 'News',
            'action' => 'index'
        ]);

        $this->router->add('api/v1/councillors/exco', [
            'api' => 'api',
            'version' => 'v1',
            'controller' => 'Councillors',
            'action' => 'exco'
        ]);

        $this->router->add('api/v1/councillors/seniors', [
            'api' => 'api',
            'version' => 'v1',
            'controller' => 'Councillors',
            'action' => 'seniors'
        ]);



        // Generic API routes
        $this->router->add('api/v1/{controller}', [
            'api' => 'api',
            'version' => 'v1',
            'action' => 'index'
        ]);

        $this->router->add('api/v1/{controller}/{id:\d+}', [
            'api' => 'api',
            'version' => 'v1',
            'action' => 'show'
        ]);

        $this->router->add('api/v1/{controller}/create', [
            'api' => 'api',
            'version' => 'v1',
            'action' => 'create'
        ]);

        $this->router->add('api/v1/{controller}/{id:\d+}/update', [
            'api' => 'api',
            'version' => 'v1',
            'action' => 'update'
        ]);

        $this->router->add('api/v1/{controller}/{id:\d+}/delete', [
            'api' => 'api',
            'version' => 'v1',
            'action' => 'delete'
        ]);
    }

    /**
     * Load regular application routes
     * 
     * @return void
     */
    private function loadRegularRoutes()
    {
        // Home page
        $this->router->add('', [
            'controller' => 'Index',
            'action' => 'index'
        ]);

        // Generic controller/action routes
        $this->router->add('{controller}/{action}');
        $this->router->add('{controller}/{id:\d+}/{action}');

        // Admin namespace routes
        $this->router->add('admin/{controller}/{action}', [
            'namespace' => 'Admin'
        ]);

        // Dashboard namespace routes
        $this->router->add('dashboard/{controller}/{action}', [
            'namespace' => 'Dashboard'
        ]);

        $this->router->add('dashboard/{controller}/{action}/{id:\d+}', [
            'namespace' => 'Dashboard'
        ]);
    }
}
