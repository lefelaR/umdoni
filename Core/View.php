<?php

namespace Core;

/**
 * View
 *
 * PHP version 5.4
 */

 class View
{

    protected  $layouts = [];

    /** 
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     * @return void
     */

    
    public static function render($view, $args = [], $layout = null)
    {
        global $context;
        
        extract($args, EXTR_SKIP);
     
  
        $context = (object) array_merge( (array)$context, array( 'data' => $args ) );

        $file = "../App/Views/$view";  
        /**find the contents of the layout file */
        $layoutcontent = view::getLayout($layout);
        
        $view = view::getPageContent($file);
        if (is_readable($file)) 
        {       
            $page = str_replace("{{content}}", $view, $layoutcontent);
            echo $page;
        }
         else 
            throw new \Exception("$file not found");
    }

   
    public static function getLayout($layout)
    {  
        ob_start();
            include_once "../public/layouts/$layout"."Layout.php"; // get the layout
        return ob_get_clean();
    }
  

     public static function getPageContent($file)
    {
        ob_start();
            include_once $file; // get the layout
        return  ob_get_clean();
    }
  

    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($template, $args);
    }

}
