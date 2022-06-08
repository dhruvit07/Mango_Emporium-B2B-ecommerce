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

    public function runQuery($sql)
    {
        return $this->conn->query($sql);
    }

    public function addProuct($id, $price, $name, $quantity, $category, $subCategory, $location, $seller_type, $desc)
    {
        $sql = "INSERT INTO `product` (`user_id`, `seller_type`, `product_category`, `product_sub_category`, `location`, `product_name`,`product_price`, `product_desc`, `product_quantity`,`product_date`, `status`) 
                VALUES ('$id', '$seller_type', '$category', '$subCategory', '$location', '$name','$price', '$desc', '$quantity', current_timestamp(), '0');";
        if ($this->conn->query($sql)) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM `product` WHERE user_id='$id';";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }

    public function getProductPrimaryImage($id)
    {
        $sql = "SELECT * FROM `images` WHERE product_id='$id' AND isPrimary='1';";
        if ($result = $this->conn->query($sql)) {
           $row =  $result->fetch_assoc();
            return $row['image'];
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

    public function getAllProduct()
    {
        $sql = "SELECT * FROM `product`;";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
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
    public function getProductCountByCategory($id){
        $sql = "SELECT * FROM `product` WHERE product_category='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountBySellerType($id){
        $sql = "SELECT * FROM `product` WHERE seller_type='$id';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
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
}
