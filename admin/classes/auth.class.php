<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("location: ../../public/e404.html");
    exit();
}
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
class auth extends config
{
    private $email;
    private $password;
    private $encrypted_pass;

    function __construct($email = "", $password = "")
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
        $this->encrypted_pass = md5($this->password);
    }
    public function login()
    {

        $login_sql = "SELECT * FROM `admin` WHERE email = '$this->email' AND a_password = '$this->encrypted_pass';";
        $result = $this->conn->query($login_sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['auth-key'] = "a3643d46a8a4b9ae9e2d932df39d312f";
            }
            return true;
        } else {
            return false;
        }
    }

    // public function emailExist($email)
    // {
    //     $sql = "SELECT * FROM `user` WHERE u_email='$email'";
    //     $result = mysqli_query($this->conn, $sql);
    //     $row = mysqli_fetch_assoc($result);
    //     if ($row > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function register($name, $email, $password, $phone)
    // {
    //     $this->name = $name;
    //     $this->phone = $phone;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->encrypted_pass = md5($this->password);

    //     $insert_sql = "INSERT INTO `user`(`u_name`,`u_contact`, `u_email`,`u_password`) VALUES
    //     ('$this->name','$this->phone','$this->email','$this->encrypted_pass')";

    //     $result = $this->conn->query($insert_sql);

    //     if ($result) {
    //         return  true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function otpInsert($otp, $email)
    // {
    //     $insert_sql = "INSERT INTO `otp`(`email`,`otp`) VALUES  ('$email','$otp')";
    //     $result = $this->conn->query($insert_sql);
    //     if ($result) {
    //         return  true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function otpFetch($email)
    // {
    //     $insert_sql = "SELECT otp FROM `otp` WHERE email = '$email';";
    //     $result = $this->conn->query($insert_sql);
    //     if ($result->num_rows > 0) {
    //         $otp = array();
    //         $i = 0;
    //         while ($row = $result->fetch_assoc()) {
    //             $otp[$i] = $row['otp'];
    //             $i++;
    //         }
    //         return $otp;
    //     } else {
    //         return false;
    //     }
    // }
    // public function otpDelete($email)
    // {
    //     $insert_sql = "DELETE FROM `otp` WHERE `otp`.`email` = '$email';";
    //     $result = $this->conn->query($insert_sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function insertToken($token, $expDate, $email)
    // {
    //     $sqli = "INSERT INTO `pwd_reset` (`reset_link_token`, `exp_date`, `reset_email`) VALUES ('$token', '$expDate', '$email');";
    //     $update = mysqli_query($this->conn, $sqli);

    //     if ($update) {
    //         return true;
    //     }
    //     return false;
    // }

    // public function fetchToken($token, $email)
    // {
    //     if ($query = $this->conn->query("SELECT * FROM `pwd_reset` WHERE reset_link_token='$token' and reset_email ='$email' ")) {
    //         return $query;
    //     } else {
    //         return false;
    //     }
    // }

    // public function deleteToken($email)
    // {
    //     if ($result = $this->conn->query("DELETE FROM `pwd_reset` WHERE `pwd_reset`.`reset_email` = '$email'"))
    //         return true;
    //     else
    //         return false;
    // }
    // public function updatePassword($password, $email)
    // {

    //     if ($result = $this->conn->query("UPDATE `user` set  u_password='$password' WHERE  u_email='$email'"))
    //         return true;
    //     else
    //         return false;
    // }
}
