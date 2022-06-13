<?php
spl_autoload_register("Autoloader");
function Autoloader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'auth') !== false || strpos($url, 'product') !== false)
        $path = "../classes/";
    else if (strpos($url, 'sql') !== false)
        $path = "../../src/classes/";
    else if (strpos($url, 'process') !== false)
        $path = "../classes/";
    else
        $path = "../../classes/";

    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath))
        return false;

    include_once $fullPath;
}
