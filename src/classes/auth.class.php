<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';

if (defined("require")) {
    require $phpPath . "src/classes/config.class.php";
}
class auth
{
    private $name;
    private $email;
    private $phone;
    private $password;
    private $encrypted_pass;

    public $conn;
    function __construct($email = "", $password = "", $encrypted_pass = "")
    {
        $db = new config();
        $this->conn = $db->conn;
        $this->email = $email;
        $this->password = $password;
        $this->encrypted_pass = md5($this->password);
    }
    public function login()
    {

        $login_sql = "SELECT * FROM `user` WHERE u_email='$this->email' AND u_password = '$this->encrypted_pass'";
        $result = $this->conn->query($login_sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $u_id = $row['u_id'];
                $u_email = $row['u_email'];
                $u_name = $row['u_name'];
                // $u_img = $row['u_img'];

                $_SESSION['loggedin'] = true;
                $_SESSION['u_id'] = $u_id;
                $_SESSION['u_email'] = $u_email;
                $_SESSION['u_name'] = $u_name;
                // $_SESSION['u_img'] = $u_img;
            }
            return true;
        } else {
            return false;
        }
    }

    public function emailExist($email)
    {
        $sql = "SELECT * FROM `user` WHERE u_email='$email'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($name, $email, $password, $phone, $businessType)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->encrypted_pass = md5($this->password);

        $insert_sql = "INSERT INTO `user`(`u_name`,`business_type`,`u_contact`, `u_email`,`u_password`) VALUES
        ('$this->name','$businessType','$this->phone','$this->email','$this->encrypted_pass')";

        $result = $this->conn->query($insert_sql);

        if ($result) {
            return  true;
        } else {
            return $this->conn;
        }
    }

    public function otpInsert($otp, $email)
    {
        $insert_sql = "INSERT INTO `otp`(`email`,`otp`) VALUES  ('$email','$otp')";
        $result = $this->conn->query($insert_sql);
        if ($result) {
            return  true;
        } else {
            return false;
        }
    }
    public function otpFetch($email)
    {
        $insert_sql = "SELECT otp FROM `otp` WHERE email = '$email';";
        $result = $this->conn->query($insert_sql);
        if ($result->num_rows > 0) {
            $otp = array();
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $otp[$i] = $row['otp'];
                $i++;
            }
            return $otp;
        } else {
            return false;
        }
    }
    public function otpDelete($email)
    {
        $insert_sql = "DELETE FROM `otp` WHERE `otp`.`email` = '$email';";
        $result = $this->conn->query($insert_sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToken($token, $expDate, $email)
    {
        $sqli = "INSERT INTO `pwd_reset` (`reset_link_token`, `exp_date`, `reset_email`) VALUES ('$token', '$expDate', '$email');";
        $update = mysqli_query($this->conn, $sqli);

        if ($update) {
            return true;
        }
        return false;
    }

    public function fetchToken($token, $email)
    {
        if ($query = $this->conn->query("SELECT * FROM `pwd_reset` WHERE reset_link_token='$token' and reset_email ='$email' ")) {
            return $query;
        } else {
            return false;
        }
    }

    public function deleteToken($email)
    {
        if ($result = $this->conn->query("DELETE FROM `pwd_reset` WHERE `pwd_reset`.`reset_email` = '$email'"))
            return true;
        else
            return false;
    }
    public function updatePassword($password, $email)
    {

        if ($result = $this->conn->query("UPDATE `user` set  u_password='$password' WHERE  u_email='$email'"))
            return true;
        else
            return false;
    }
    public function getBusinessType()
    {
        if ($result = $this->conn->query("SELECT * FROM `business_type`;"))
            return $result;
        else
            return false;
    }
}
