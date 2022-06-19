<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// session_start();
if (defined("require")) {
    require $phpPath . "src/classes/config.class.php";
}
class inquiry
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

    public function sendInquiry($id, $email, $contact, $description)
    {
        $result = $this->runQuery("INSERT INTO inquiry (email,product_id,contact,description) VALUES('$email','$id','$contact','$description');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function sendDirectInquiry($email, $contact, $description)
    {
        $result = $this->runQuery("INSERT INTO direct_inquiry (email,contact,description) VALUES('$email','$contact','$description');");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
