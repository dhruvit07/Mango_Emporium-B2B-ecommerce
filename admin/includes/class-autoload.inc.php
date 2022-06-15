<?php
spl_autoload_register("Autoloader");
function Autoloader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


    if (strpos($url, 'auth') !== false)
        $path = "../../classes/";
    else if (strpos($url, 'process') !== false || strpos($url, 'includes') !== false || strpos($url, 'templates') !== false || strpos($url, 'public') !== false)
        $path = "../classes/";
    else
        $path = "";

    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath))
        return false;

    include_once $fullPath;
}
