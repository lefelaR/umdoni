<?php
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

function getFile()
{
    return $_FILES;
}

function formatDate($date)
{
    $dateTime = new DateTime($date);
    $formatedDate = date_format($dateTime, 'd-m-Y' );
    return $formatedDate;
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

function dd($dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die;
}

function dump($dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
}

function logout()
{
    setcookie("auth", null, time() - 3600, '/');
    redirect("/");
}
