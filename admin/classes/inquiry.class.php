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
}
