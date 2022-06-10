<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
class config {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    public $conn;

    function __construct()
    {
        $this -> serverName = "localhost";
        $this -> userName = "root";
        $this -> passCode = "";
        $this -> dbName = "Project_1";
        $this->conn  = new mysqli($this -> serverName,$this -> userName,$this -> passCode,$this -> dbName);
    }

}
// $db = new config();
// $login_sql = "SELECT * FROM `user` WHERE u_email='dummy@mail.com' AND u_password = '12345678'";
//  $result = $db->conn->query($login_sql);
// if($db ->conn)
// {
//     $row = $result->num_rows;
//     echo $row;
// }
?>