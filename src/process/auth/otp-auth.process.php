<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}

session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../../../public/e404.html");
    exit();
}

//Data Fetch
$_register = new auth();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$businessType = $_SESSION["business-type"];
$otp = $_register->otpFetch($email);
$password = $_SESSION["password"];
$phone = $_SESSION["phone"];
$otpv = $_POST['otp'];
$encrypted_pass = md5($password);
$otp_correct = false;
foreach ($otp as $value) {
    if ($value == $otpv) {
        $otp_correct = true;
    }
}
if ($otp_correct) {
    //Query
    $bool = $_register->register($name, $email, $password, $phone, $businessType);
    if ($bool) {
        // echo "";
        $_SESSION['error'] = " Registered Sucessfully!";
        unset($_SESSION['access']);
        header("location: ../../../public/auth/?error");
    } else {
        $error = true;
        $_SESSION['error'] = $bool->error;
        header("location: ../../../public/auth/?error");
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
    header("location: ../../../public/auth/verify?error");
}
