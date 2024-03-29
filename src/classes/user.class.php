<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
if (defined("require")) {
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
    public function getBusinessTypeById($id)
    {
        if ($result = $this->conn->query("SELECT * FROM `business_type` WHERE id='$id';")) {
            $row = $result->fetch_assoc();
            return $row;
        } else
            return false;
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
    public function profileUpload($id, $image)
    {
        global $phpPath;
        $sql = "SELECT image FROM `user` WHERE u_id='$id';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['image'] != "")
            unlink($phpPath . "uploads/profile/" . $row['image']);
        $login_sql = "UPDATE `user` SET image='$image' WHERE u_id='$id';";
        $result = $this->conn->query($login_sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
