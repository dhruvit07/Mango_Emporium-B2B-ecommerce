<?php

spl_autoload_register("Autoloader");

function Autoloader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'auth') !== false)
        $path = "../../classes/";
    else if (strpos($url, 'process') !== false)
        $path = "../classes/";
    else if (strpos($url, 'user') !== false || strpos($url, 'store') !== false)
        $path = "../../src/classes/";
    else if (strpos($url, 'includes') !== false)
        $path = "../src/classes/";
    else
        $path = "";

    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath))
        return false;

    include_once $fullPath;
}
