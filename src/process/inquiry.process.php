<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE)
    session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if (isset($_POST['product-inquiry'])) {
    $productId = $_POST["id"];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $desc = $_POST['description'];
    $inquiryObj = new inquiry();
    $result = $inquiryObj->sendInquiry($productId, $email, $contact, $desc);
    // print_r($_POST);
    if ($result) {
        $_SESSION['msg'] = "Inquiry Sent Successfully!!";
        header('location: ' . $htmlPath . '/public/store/?msg');
        exit();
    } else {
        $_SESSION['msg'] = "Inquiry Not Sent!!";
        header('location: ' . $htmlPath . '/public/store/?msg');
        exit();
    }
}
if (isset($_POST['direct-inquiry'])) {
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $desc = $_POST['description'];
    $inquiryObj = new inquiry();
    $result = $inquiryObj->sendInquiry($productId, $email, $contact, $desc);
    // print_r($_POST);
    if ($result) {
        $_SESSION['msg'] = "Inquiry Sent Successfully!!";
        header('location: ' . $htmlPath . '/public/store/?msg');
        exit();
    } else {
        $_SESSION['msg'] = "Inquiry Not Sent!!";
        header('location: ' . $htmlPath . '/public/store/?msg');
        exit();
    }
}
