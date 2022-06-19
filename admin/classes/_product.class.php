<?php
require 'C:/xampp/htdocs/project-1/admin/includes/path-config.inc.php';
// session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require $rootPhp . 'src/classes/functions.class.php';
require $rootPhp . 'src/classes/product.class.php';
class _product extends config
{
    use productFunction;
    use functions;
    function __construct()
    {
        parent::__construct();
    }

    public function getVendors()
    {
        $sql = "SELECT * FROM `user`;";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getPendingProduct($id)
    {
        $sql = "SELECT * FROM `product` WHERE business_type='$id' AND status='0';";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getProductVendor($id)
    {
        $sql = "SELECT * FROM `user` WHERE u_id='$id';";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function getBusinessTypeById($id)
    {
        if ($result = $this->conn->query("SELECT * FROM `business_type` WHERE id='$id';")) {
            $row = $result->fetch_assoc();
            return $row['name'];
        } else
            return false;
    }
    public function getApprovedProduct($id)
    {
        $sql = "SELECT * FROM `product` WHERE business_type='$id' AND status='1';";

        if ($result = $this->conn->query($sql)) {
            return $result;
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
    public function deleteVendor($id)
    {
        $sql = "DELETE FROM `user` WHERE u_id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $sql = "SELECT image FROM `images` WHERE product_id='$id';";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc())
            unlink("../../uploads/products/" . $row['image']);
        $sql = "DELETE FROM `product` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCategory($id)
    {
        $sql = "SELECT image FROM `category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        unlink("../../uploads/category/" . $row['image']);
        $sql = "DELETE FROM `category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteLocation($id)
    {
        $sql = "DELETE FROM `location` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteSellerType($id)
    {
        $sql = "DELETE FROM `seller_type` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteSubCategory($id)
    {
        $sql = "SELECT image FROM `sub_category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        unlink("../../uploads/category/" . $row['image']);
        $sql = "DELETE FROM `sub_category` WHERE id='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insertCategory($name, $image)
    {
        $sql = "INSERT INTO category (category_name,image) VALUES ('$name','$image');";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insertLocation($name)
    {
        $sql = "INSERT INTO location (location) VALUES ('$name');";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insertSellerType($name)
    {
        $sql = "INSERT INTO seller_type (seller_type) VALUES ('$name');";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insertSubCategory($id, $name, $image)
    {
        $sql = "INSERT INTO sub_category (category_id,sub_category_name,image) VALUES ('$id','$name','$image');;";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function getSubCategory()
    {
        $sql = "SELECT * FROM `sub_category`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
