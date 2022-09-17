<?php

use JetBrains\PhpStorm\ArrayShape;

require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
// session_start();
if (defined("require")) {
    require $phpPath . "src/classes/config.class.php";
}
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
class product
{
    private $conn;
    use productFunction;
    use functions;
    public function __construct()
    {


        $db = new config();
        $this->conn = $db->conn;
    }
}
trait productFunction
{

    public function runQuery($sql)
    {
        return $this->conn->query($sql);
    }
    public function getContact()
    {
        $sql = "SELECT * FROM `contact_info` WHERE id='1';";
        $result =  $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }


    public function addProuct($id, $business_type, $price, $name, $quantity, $category, $subCategory, $location, $seller_type, $desc)
    {
        $sql = "INSERT INTO `product` (`user_id`,`business_type`, `seller_type`, `product_category`, `product_sub_category`, `location`, `product_name`,`product_price`, `product_desc`, `product_quantity`,`product_date`, `status`) 
                VALUES ('$id','$business_type', '$seller_type', '$category', '$subCategory', '$location', '$name','$price', '$desc', '$quantity', current_timestamp(), '0');";
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
    public function getSimilarProduct($id, $id2)
    {
        $sql = "SELECT * FROM `product` WHERE user_id='$id' AND product_sub_category='$id2' AND status='1';";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getProductById($id, $status = 1)
    {
        $sql = "SELECT * FROM `product` WHERE id='$id' AND status = '$status';";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function getBusinessType()
    {
        if ($result = $this->conn->query("SELECT * FROM `business_type`;"))
            return $result;
        else
            return false;
    }
    public function getFilteredProduct($search, $user, $category, $business_type, $subCategory, $location, $sellerType, $priceMin, $priceMax, $offset, $limit_per_page, $count = false)
    {
        $sql = "SELECT * FROM `product` WHERE status='1'";
        if ($priceMin != "" && $priceMax != "") {
            $sql .= " AND product_price BETWEEN $priceMin AND $priceMax";
        }
        if ($user != "") {
            $sql .= " AND `user_id`='$user'";
        }
        if ($search != "") {
            $sql .= " AND `product_name` LIKE '%$search%' OR `product_desc`LIKE '%$search%'";
        }
        if ($category != "") {
            $categoryFilter = implode(',', $category);
            $sql .= " AND product_category IN ($categoryFilter)";
        }
        if ($business_type != "") {
            $businessTypeFilter = implode(',', $business_type);
            $sql .= " AND business_type IN ($businessTypeFilter)";
        }
        if ($subCategory != "") {
            $sql .= " AND product_sub_category = '$subCategory'";
        }
        if ($location != "") {
            $locationFilter = implode(',', $location);
            $sql .= " AND location IN ($locationFilter)";
        }
        if ($sellerType != "") {
            $sellerTypeFilter = implode(',', $sellerType);
            $sql .= " AND seller_type IN ($sellerTypeFilter)";
        }
        if ($count == false)
            $sql .= " LIMIT {$offset},{$limit_per_page};";
        else
            $sql .= ";";

        if ($result = $this->conn->query($sql)) {
            return $count == false ? $result : $result->num_rows;
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
    public function getProductOtherImage($id)
    {
        $sql = "SELECT * FROM `images` WHERE product_id='$id' AND isPrimary='0';";
        if ($result = $this->conn->query($sql)) {
            return $result;
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

    public function getAllProduct($offset, $limit_per_page)
    {
        // $limit = 20;
        $sql = "SELECT * FROM `product` WHERE status='1' LIMIT {$offset},{$limit_per_page};";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getProductBySubCategory($offset, $limit_per_page, $id1, $id2)
    {
        // $limit = 20;
        $sql = "SELECT * FROM `product` WHERE status='1' AND product_category='$id1' AND product_sub_category='$id2' LIMIT {$offset},{$limit_per_page};";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }
    public function getProductByCategory($id)
    {
        // $limit = 20;
        $sql = "SELECT * FROM `product` WHERE status='1' AND product_category='$id';";
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
    public function getUsersByBusinessType($id)
    {
        $sql = "SELECT * FROM `user` WHERE business_type='$id';";
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
    public function getProductCount()
    {
        $sql = "SELECT * FROM `product` WHERE status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountByCategory($id)
    {
        $sql = "SELECT * FROM `product` WHERE product_category='$id' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountBySubCategory($id1, $id2)
    {
        $sql = "SELECT * FROM `product` WHERE product_category='$id1' AND product_sub_category='$id2' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountByBusinessType($id)
    {
        $sql = "SELECT * FROM `product` WHERE business_type='$id' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountBySellerType($id)
    {
        $sql = "SELECT * FROM `product` WHERE seller_type='$id' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountByLocation($id)
    {
        $sql = "SELECT * FROM `product` WHERE location='$id' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductCountByUser($id)
    {
        $sql = "SELECT * FROM `product` WHERE `user_id`='$id' AND status='1';";
        $result = $this->conn->query($sql);
        if ($result) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function getProductRangeByUser($id)
    {
        $price = array();
        $sql = "SELECT MIN(product_price) AS minimum,MAX(product_price) AS maximum FROM `product` WHERE user_id='$id' AND status='1';";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $price[0] = $row['minimum'];
        $price[1] = $row['maximum'];
        if ($result) {
            return $price;
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
}
