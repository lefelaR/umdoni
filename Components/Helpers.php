<?php

  function url($string = '')
    {
        global $context;
        $siteroot = $context->siteroot.'public';
        if (strpos($string, '.')) $string = '/' . $string;
        return   $siteroot . $string;          
    }       



    function buildurl($string)
    {
        global $context;
        return $context->siteroot . $string;
    }

    function redirect($url)
    {
        if (isset($url)) {
            ob_clean();
            Header('Location: ' . buildurl($url));
            die();
        }
    }

    function enable_authorize($role = null)
    {
        $ret = false;
        global $context;
    
        if (isset($context->isLoggedIn))
            {
            if($context->isLoggedIn == false){
                $context->isLoggedIn = true ;
                 return redirect('authentication/login');
                }
            }
        else if (isset($context->isLoggedIn) && $context->isLoggedIn == true) // 
        {
            return;
        }
     
    }
    

    function useClass($classname)
    {

        $classes = explode(',', $classname);
        foreach ($classes as $item) {
            $class = $item;
            if (contains($item, '/')) {
                $items = explode('/', $item);
                $class = $items[1];
            }
    
            if (class_exists($class) == false) {
                global $context;
                if (file_exists($context->siteroot . 'components/' . trim($item) . '.php')) {
                    require $context->siteroot . 'components/' . trim($item) . '.php';
                } else {
                    require  'api/v1/components/' . trim($item) . '.php';
                }
            }
        }
    }


    function getCrumbs() 
    {
        $url = $_SERVER['QUERY_STRING'];
        $url = explode('/',$url);
        return $url;
    }


    function getPostData()
   {
        return   $_GET; 
   }

   function getFile()
   {
    return $_FILES;
   }

   function formatDate($date)
   {
        $formatedDate = date_format($date,'Y-m-d');
       return $date;
   }

   function logout()
   {
    setcookie("auth", null, time() - 3600 , '/');
    redirect("");
   }
?>

   
