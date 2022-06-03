<?php
require "../includes/class-autoload.inc.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../public/e404.html");
    exit();
}

//Data Fetch
$_register = new auth();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$otp = $_register->otpFetch($email);
$password = $_SESSION["password"];
$phone = $_SESSION["phone"];
$otpv = $_POST['otp'];
$encrypted_pass = md5($password);

if ($otp == $otpv) {
    //Query
    $bool = $_register->register($name,$email,$password,$phone);
                if ($bool) {
                    // echo "";
                    $_SESSION['error'] = " Registered Sucessfully!";
                    header("location: ../public/auth?error");
                } else {
                    $error = true;
                    $_SESSION['error'] = "Registration Error!";
                    header("location: ../public/auth?error");
                    exit();
                }

    // unset($_SESSION['OTP']);
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    unset($_SESSION['phone']);
    $_register->otpDelete($email);
    // session_destroy();
} else {
//    unlink($_SESSION['fileDestination']);
    $_SESSION['error'] = "Incorrect OTP!";
    echo $otp;
      header("location: ../public/verify?error");

}
