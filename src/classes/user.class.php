<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if(defined("require")){
      require $phpPath . "src/classes/config.class.php";
}
class user
{

    private $conn;

    public function __construct()
    {
        $db = new config();
        $this->conn = $db->conn;
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
}
