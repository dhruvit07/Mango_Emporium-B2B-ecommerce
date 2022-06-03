
<?php
session_start();
require "../includes/class-autoload.inc.php";


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../public/e404.html");
    exit();
}

if (isset($_POST['submit'])) {
    //Data Fetch
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_pass = md5($password);

    $_login = new auth($email, $password, $encrypted_pass);
    $bool = $_login->login();
    //Query

    if ($bool) {
        // echo "";
        header("location: ../public/index");
    } else {
        $error = true;
        $_SESSION['error'] = "Incorrect Credentials!";
        header("location: ../public/auth?error");
        exit();
    }
}
?>



