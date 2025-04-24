<?php

use Core\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected $router;

    protected function setUp(): void
    {
        $this->router = new Router();
    }

    public function testAddRoute()
    {
        // Add a route
        $this->router->add('/posts/{id}', ['controller' => 'Posts', 'action' => 'show']);

        // Get the routes
        $routes = $this->router->getRoutes();

        // Assert that the route has been added
        $this->assertArrayHasKey('/^posts\/(?P<id>[a-z-]+)$/i', $routes);
        $this->assertEquals(['controller' => 'Posts', 'action' => 'show'], $routes['/^posts\/(?P<id>[a-z-]+)$/i']);
    }

    public function testMatchRoute()
    {
        // Add a route
        $this->router->add('/posts/{id}', ['controller' => 'Posts', 'action' => 'show']);

        // Test matching a valid URL
        $result = $this->router->match('/posts/123');
        $this->assertTrue($result);
        $this->assertEquals(['controller' => 'Posts', 'action' => 'show', 'id' => '123'], $this->router->getParams());

        // Test matching an invalid URL
        $result = $this->router->match('/non-existent-route');
        $this->assertFalse($result);
    }

    public function testDispatchValidRoute()
    {
        // Mock the controller class and its method
        $controllerMock = $this->getMockBuilder('App\Controllers\Posts')
            ->disableOriginalConstructor()
            ->getMock();
        $controllerMock->expects($this->once())
            ->method('show');

        // Add the route
        $this->router->add('/posts/{id}', ['controller' => 'Posts', 'action' => 'show']);

        // Match the route
        $this->router->match('/posts/123');
        $this->router->dispatch('/posts/123');
    }

    public function testDispatchInvalidRoute()
    {
        // Add an invalid route
        $this->router->add('/posts/{id}', ['controller' => 'Posts', 'action' => 'show']);

        // Test dispatch with an invalid URL
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No route matched.');
        $this->router->dispatch('/non-existent-route');
    }

    public function testDispatchControllerNotFound()
    {
        // Add a route with a non-existent controller
        $this->router->add('/posts/{id}', ['controller' => 'NonExistentController', 'action' => 'show']);

        // Test dispatching with a non-existent controller
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Controller class App\Controllers\NonExistentController not found');
        $this->router->dispatch('/posts/123');
    }

    public function testDispatchMethodNotFound()
    {
        // Add a route with a valid controller but an invalid method
        $this->router->add('/posts/{id}', ['controller' => 'Posts', 'action' => 'invalidMethod']);

        // Test dispatching with an invalid method
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Method invalidMethod (in controller App\Controllers\Posts) not found');
        $this->router->dispatch('/posts/123');
    }

    public function testConvertToStudlyCaps()
    {
        $this->assertEquals('PostAuthors', $this->router->convertToStudlyCaps('post-authors'));
    }

    public function testConvertToCamelCase()
    {
        $this->assertEquals('postAuthors', $this->router->convertToCamelCase('post-authors'));
    }
}
