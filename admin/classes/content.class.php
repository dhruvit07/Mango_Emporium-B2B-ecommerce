<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/admin/includes/path-config.inc.php';
// session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class content extends config
{
    use functions;
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
    public function getPhotoshoot()
    {
        $sql = "SELECT * FROM `photoshoot`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function insertContent($id, $c_id, $url, $name, $viewUrl)
    {
        $sql = "INSERT INTO video_content (video_url,video_name,video_view_url,product_id,c_id) VALUES('$url','$name','$viewUrl','$id','$c_id');";

        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function insertCatalouge($catId, $userId, $name, $image)
    {
        $sql = "INSERT INTO catalouge (catalouge_name,image,u_id,c_id) VALUES ('$name','$image','$userId','$catId');";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insertPhotoshoot($p_id, $c_id, $name, $image)
    {
        $sql = "INSERT INTO photoshoot (image,photoshoot_name,product_id,c_id) VALUES ('$image','$name','$p_id','$c_id');";
        $result = $this->conn->query($sql);
        if ($result) {
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
    public function deleteCatalouge($id)
    {
        $sql = "SELECT image FROM `catalouge` WHERE id='$id';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        unlink("../../uploads/catalouge/" . $row['image']);
        $sql = "DELETE FROM `catalouge` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePhotoshoot($id)
    {
        $sql = "SELECT image FROM `photoshoot` WHERE id='$id';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        unlink("../../uploads/photoshoot/" . $row['image']);
        $sql = "DELETE FROM `photoshoot` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
