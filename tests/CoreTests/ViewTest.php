<?php

use PHPUnit\Framework\TestCase;
use Core\View;

class ViewTest extends TestCase
{
    protected $view;

    protected function setUp(): void
    {
        $this->view = new View();
    }

    public function testRender()
    {
        $this->expectOutputString('Hello, World!');
        
        // Mock the global context
        global $context;
        $context = new stdClass();

        // Create a temporary view file
        $viewFile = '../App/Views/testView.php';
        file_put_contents($viewFile, 'Hello, {{name}}!');

        // Create a temporary layout file
        $layoutFile = '../public/layouts/testLayoutLayout.php';
        file_put_contents($layoutFile, '{{content}}');

        // Call the render method
        View::render('testView.php', ['name' => 'World'], 'testLayout');

        // Clean up
        unlink($viewFile);
        unlink($layoutFile);
    }

    public function testGetLayout()
    {
        // Create a temporary layout file
        $layoutFile = '../public/layouts/testLayoutLayout.php';
        file_put_contents($layoutFile, 'Layout Content');

        // Call the getLayout method
        $layoutContent = View::getLayout('testLayout');

        // Assert the layout content
        $this->assertEquals('Layout Content', $layoutContent);

        // Clean up
        unlink($layoutFile);
    }

    public function testGetPageContent()
    {
        // Create a temporary view file
        $viewFile = '../App/Views/testView.php';
        file_put_contents($viewFile, 'Page Content');

        // Call the getPageContent method
        $pageContent = View::getPageContent($viewFile);

        // Assert the page content
        $this->assertEquals('Page Content', $pageContent);

        // Clean up
        unlink($viewFile);
    }

    public function testRenderTemplate()
    {
        // Mock the Twig environment
        $twigMock = $this->createMock(\Twig_Environment::class);
        $twigMock->expects($this->once())
                 ->method('render')
                 ->with('testTemplate.twig', ['name' => 'World'])
                 ->willReturn('Hello, World!');

        // Set the Twig environment
        $reflection = new \ReflectionClass(View::class);
        $property = $reflection->getProperty('twig');
        $property->setAccessible(true);
        $property->setValue(null, $twigMock);

        // Call the renderTemplate method
        $this->expectOutputString('Hello, World!');
        View::renderTemplate('testTemplate.twig', ['name' => 'World']);
    }
}
