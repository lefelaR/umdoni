<?php
global $context;
$root = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$gpsarray = explode('/' ,$root);
    if(count($gpsarray) > 4 || count($gpsarray) < 2 )
    {
        if (in_array("authentication", $gpsarray))
        {
           // include 'includes/frontendfooter.php';
        }else{
            include 'includes/backendfooter.php';
        }
    }else{
        include 'includes/frontendfooter.php';
    }
?>