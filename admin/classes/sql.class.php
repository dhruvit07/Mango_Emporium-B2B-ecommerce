<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}

class sql extends config
{

    function __construct()
    {
        parent::__construct();
    }

    public function getPendingProduct()
    {
        $sql = "SELECT * FROM `product` WHERE status='0';";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getApprovedProduct()
    {
        $sql = "SELECT * FROM `product` WHERE status='1';";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    public function getProductCategory($id)
    {
        $sql = "SELECT * FROM `category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }
    public function getProductSubCategory($id)
    {
        $sql = "SELECT * FROM `sub_category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }
    public function getProductSellerType($id)
    {
        $sql = "SELECT * FROM `seller_type` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }
    public function getProductLocation($id)
    {
        $sql = "SELECT * FROM `location` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }
    public function approveProduct($id)
    {
        $sql = "UPDATE `product` SET status='1' WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `product` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
