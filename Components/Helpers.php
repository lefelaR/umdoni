<?php


use Symfony\Component\VarDumper\VarDumper;

function url($string = '')
{
    global $context;
    $siteroot = $context->siteroot . 'public';
    if (strpos($string, '.'))
        $string = '/' . $string;
    return $siteroot . $string;
}


function findInPublic($string)
{
    return 'public/' . $string;
}

function buildurl($string)
{
    global $context;
    return $context->siteroot . $string;
}

function redirect($url)
{
    if (isset($url)) {
        // ob_clean();
        Header('Location: ' . buildurl($url));
        die();
    }
}


function enable_authorize($role = null)
{
    $ret = false;
    global $context;
    if (isset($context->isLoggedIn)) {
        if ($context->isLoggedIn == false) {
            return redirect('authentication/login');
        }
    } else if (isset($context->isLoggedIn) && $context->isLoggedIn == true) {
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
                require 'api/v1/components/' . trim($item) . '.php';
            }
        }
    }
}



function getYear()
{
    return date('Y');
}

function getMonth()
{
    return date('m');
}

function getCrumbs()
{
    $url = $_SERVER['QUERY_STRING'];
    $url = explode('/', $url);
    return $url;
}


function getPostData()
{
    return $_GET;
}


function getPostParams()
{
    return $_POST;
}

function getFile()
{
    return $_FILES;
}

function formatDate($date = null)
{
    if (is_null($date)) 
    {
        $date = date('d-m-Y');
    }

    $dateTime = new DateTime($date);
    $formatedDate = date_format($dateTime, 'd  M Y' );
    return $formatedDate;
}

function formatToStandardDate($date): string
{

    $dateTime = new DateTime($date);
    $formatedDate = date_format($dateTime, 'd-m-Y' );
    return $formatedDate;
}

function formatTimeDiff($start, $end): string
{
    $diff = $end->diff($start);

    return $diff;
}
function timeAgo($time): string
{
    $time = new DateTime($time);
    $now = new DateTime();
    $diff = $now->diff($time);

    $timeUnits = [
        "year" => $diff->y,
        "month" => $diff->m,
        "day" => $diff->d,
        "hour" => $diff->h,
        "minute" => $diff->i,
        "second" => $diff->s,
    ];

    foreach ($timeUnits as $unit => $value) {
        if ($value > 0) {
            $pluralize = $value > 1 ? 's' : '';
            return $value . ' ' . $unit . $pluralize . ' ago';
        }
    }

    return 'Just now';
}


function logout()
{
    setcookie("auth", null, time() - 3600, '/');
    redirect("/");
}


function isUrlReachable($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true); // HEAD request only
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Set timeout to avoid hanging
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode >= 200 && $httpCode < 400; // Success codes (200-399)
}