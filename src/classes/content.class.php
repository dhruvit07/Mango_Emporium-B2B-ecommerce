<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// session_start();
if (defined("require")) {
    require $phpPath . "src/classes/config.class.php";
}
class content
{
    private $conn;
    public function __construct()
    {


        $db = new config();
        $this->conn = $db->conn;
    }

    public function runQuery($sql)
    {
        return $this->conn->query($sql);
    }

    public function getAllVideoContent()
    {
        $result = $this->runQuery("SELECT * FROM `video_content`;");
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
}
