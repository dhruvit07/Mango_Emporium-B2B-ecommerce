<?php
// Imports
session_start();
require "../includes/class-autoload.inc.php";
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../../public/e404.html");
    exit();
}

if (isset($_POST['submit'])) {

    //Data Fetch
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $phone = $_POST['number'];

    $_register = new auth();


    if ($_register->emailExist($email)) {
        $_SESSION['error'] = " Email Exist!";
        echo '<script>window.location.href = "../../public/auth/?register&error_r"</script>';
        exit();
    } else {

        // OTP Generation
        $otp = rand(000000, 999999);
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["phone"] = $phone;

       $bool = $_register->otpInsert($otp,$email);
        if($bool)
        {
        try {
            // Sending Otp Through Mail
            require '../../src/phpmail/emailconfig.inc.php';

            $mail->addAddress($email, 'Person Name'); // Add a recipient

            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->isHTML(true); // Set email format to HTML

            $mail->Subject = 'OTP';
            // Message
            $mail->Body .= '<h3 style="color:black;">OTP:- ' . $otp . '</h3>';

            $mail->isHTML(true);                                  //Set email format to HTML

            if ($mail->send()) {
                $_SESSION['access'] = true;
                header("location: ../../public/auth/verify");
            } 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $_SESSION['error'] = "Otp Send Failed!";
                header("location: ../../public/auth/?register&error_r");
        }
    }
    else{
        echo "error";
    }
}
}

