<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';

session_start();
if(!function_exists("Autoloader"))
{
  require $phpPath . 'includes/class-autoload.inc.php';
}


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../../../public/e404.html");
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
        header("location: ../../../public/");
    } else {
        $error = true;
        $_SESSION['error'] = "Incorrect Credentials!";
        header("location: ../../../public/auth/?error");
        exit();
    }
}
?>



