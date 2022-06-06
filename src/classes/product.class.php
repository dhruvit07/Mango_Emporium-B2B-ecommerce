<?php
// session_start();
class product
{
    private $conn;
    public function __construct()
    {


        $db = new config();
        $this->conn = $db->conn;
    }

    public function addProuct($id, $name, $quantity, $category, $subCategory, $location, $seller_type, $desc)
    {
        $sql = "INSERT INTO `product` (`user_id`, `seller_type`, `product_category`, `product_sub_category`, `location`, `product_name`, `product_desc`, `product_quantity`,`product_date`, `status`) 
                VALUES ('$id', '$seller_type', '$category', '$subCategory', '$location', '$name', '$desc', '$quantity', current_timestamp(), '0');";
        if ($this->conn->query($sql)) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }
    public function addImages($id, $name, $isPrimary)
    {
        $sql = "INSERT INTO `images` (`product_id`, `isPrimary`, `image`) 
                VALUES ('$id', '$isPrimary', '$name');";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function runQuery($sql)
    {
        return $this->conn->query($sql);
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM `category`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getSubCategory($id)
    {
        $sql = "SELECT * FROM `sub_category` Where category_id ='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getLocation()
    {
        $sql = "SELECT * FROM `location`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getSellerType()
    {
        $sql = "SELECT * FROM `seller_type`;";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
