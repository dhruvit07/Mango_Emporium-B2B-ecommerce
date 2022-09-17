<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
session_start();
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}

if (isset($_POST['submit'])) {
    // echo "<pre>" . print_r($_FILES['img_archive']) . "</pre>";
    $id = $_SESSION['u_id'];
    $userObj = new user();
    $user = $userObj->getUser($id);
    $business_type = $user['business_type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = trim($_POST['quantity']);
    $category = trim($_POST['category']);
    $subCategory = trim($_POST['sub_category']);
    $location = trim($_POST['location']);
    $seller_type = trim($_POST['seller_type']);
    $desc = $_POST['description'];
    $primary_img = $_FILES['file_img'];
    $other_img = $_FILES['img_archive'];
    $product = new  product();
    $processedPrimaryImage = $product->processImage("file_img");
    $total = count($_FILES['img_archive']['name']);
    for ($i = 0; $i < $total; $i++) {
        $processedOtherImages[$i] = $product->processImage('img_archive', $i);
    }
    $inserted_id = $product->addProuct($id, $business_type, $price, $name, $quantity, $category, $subCategory, $location, $seller_type, $desc);
    if ($inserted_id != false) {
        $bool = $product->addImages($inserted_id, $processedPrimaryImage, '1');
        for ($i = 0; $i < $total; $i++) {
            $bool = $product->addImages($inserted_id, $processedOtherImages[$i], '0');
        }
        if ($bool) {
            $_SESSION['msg'] = "Product Added!";
            header('location: ../../public/user/?msg&addproduct');
            exit();
        }
    }
} else {

    header('location: ../../public/e404.html');
}
