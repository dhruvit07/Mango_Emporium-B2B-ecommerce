<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';
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

    public function getAllVideoContent($category)
    {
        $sql = "SELECT * FROM `video_content`";
        if ($category != "") {
            $categoryFilter = implode(',', $category);
            $sql .= "WHERE c_id IN($categoryFilter)";
        }
        $sql .= ";";
        $result = $this->runQuery($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getPhotoshoot($category)
    {
        $sql = "SELECT * FROM `photoshoot` ";
        if ($category != "") {
            $categoryFilter = implode(',', $category);
            $sql .= "WHERE c_id IN($categoryFilter)";
        }
        $sql .= ";";
        $result = $this->runQuery($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getCatalouge()
    {
        $sql = "SELECT * FROM `catalouge`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
