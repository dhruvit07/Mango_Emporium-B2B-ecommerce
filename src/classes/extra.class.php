<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
// session_start();
if (defined("require")) {
    require $phpPath . "src/classes/config.class.php";
}
class extra
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

    public function getextra($id)
    {
        $result = $this->runQuery("SELECT * FROM `policy` WHERE id='$id';");
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
