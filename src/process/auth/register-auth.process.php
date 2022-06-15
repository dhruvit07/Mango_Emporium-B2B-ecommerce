<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// Imports
session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../../../public/e404.html");
    exit();
}
if (isset($_POST['resend'])) {
    goto email;
}

if (isset($_POST['submit'])) {

    //Data Fetch
    $name = $_POST['name'];
    $email = $_POST['email'];
    $businessType = $_POST['business-type'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $phone = $_POST['number'];

    $_register = new auth();

    if ($_register->emailExist($email)) {
        $_SESSION['error'] = " Email Exist!";
        header('location: ../../../public/auth/?register&error_r');
        exit();
    } else {

        // OTP Generation
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["business-type"] = $businessType;
        $_SESSION["password"] = $password;
        $_SESSION["phone"] = $phone;
        email:
        $_register = new auth();
        $otp = rand(000000, 999999);
        $bool = $_register->otpInsert($otp,  $_SESSION["email"]);
        if ($bool) {
            try {
                // Sending Otp Through Mail
                require $phpPath . 'src/phpmail/emailconfig.inc.php';

                $mail->addAddress($email, 'Person Name'); // Add a recipient

                // $mail->addReplyTo('info@example.com', 'Information');
                $mail->isHTML(true); // Set email format to HTML

                $mail->Subject = 'OTP';
                // Message
                $mail->Body .= '<h3 style="color:black;">OTP:- ' . $otp . '</h3>';

                $mail->isHTML(true);                                  //Set email format to HTML

                if ($mail->send()) {
                    $_SESSION['access'] = true;
                    header("location: ../../../public/auth/verify");
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $_SESSION['error'] = "Otp Send Failed!";
                header("location: ../../../public/auth/?register&error_r");
            }
        } else {
            echo "error";
        }
    }
}
