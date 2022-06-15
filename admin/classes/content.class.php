<?php
require 'C:/xampp/htdocs/project-1/admin/includes/path-config.inc.php';
// session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class content extends config
{
    function __construct()
    {
        parent::__construct();
    }
    public function getContent()
    {
        $sql = "SELECT * FROM `video_content`;";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function insertContent($url, $name, $viewUrl)
    {
        $sql = "INSERT INTO video_content (video_url,video_name,video_view_url) VALUES('$url','$name','$viewUrl');";

        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteContent($id)
    {
        $sql = "DELETE FROM `video_content` WHERE id='$id';";

        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
