<?php
require 'C:/xampp/htdocs/project-1/admin/includes/path-config.inc.php';
// session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class inquiry extends config
{
    function __construct()
    {
        parent::__construct();
    }
    public function getInquiry()
    {
        $sql = "SELECT * FROM `inquiry`;";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getUser($id)
    {
        $login_sql = "SELECT * FROM `user` WHERE u_id='$id';";
        $result = $this->conn->query($login_sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }
    public function deleteInquiry($id)
    {
        $sql = "DELETE FROM `inquiry` WHERE id='$id';";

        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteDirectInquiry($id)
    {
        $sql = "DELETE FROM `direct_inquiry` WHERE id='$id';";

        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function getDirectInquiry()
    {
        $sql = "SELECT * FROM `direct_inquiry`;";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
}
