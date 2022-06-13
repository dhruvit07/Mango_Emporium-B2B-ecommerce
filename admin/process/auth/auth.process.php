<?php
require 'C:/xampp/htdocs/project-1/admin/includes/path-config.inc.php';
session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: " . $htmlPath . "/public/e404.html");
    exit();
}

$auth = new auth(trim($_POST['email']), trim($_POST['password']));
$bool = $auth->login();

if ($bool) {
    // echo "";
    header('location: ' . $htmlPath . '/public/');
} else {
    $error = true;
    $_SESSION['msg'] = "Incorrect Credentials!";
    header("location: " . $htmlPath . "/public/auth/?msg&a3643d46a8a4b9ae9e2d932df39d312f");
    exit();
}
