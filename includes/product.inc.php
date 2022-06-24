<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';


if (!isset($_GET['id'])) {
    header("location: " . $htmlPath . "/public/e404.html");
    exit();
}
$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}

$productObj = new product();
$id = trim($_GET['id']);
if (isset($_GET['testing'])) {
    $row = $productObj->getProductById($id,0);
} else {
    $row = $productObj->getProductById($id);
}
$similarProductResult = $productObj->getSimilarProduct($row['user_id'], $row['product_sub_category']);
$similarProductHTML = "";
$i = 0;
while ($_row = $similarProductResult->fetch_assoc()) {
    $productName = $_row['product_name'];
    $productDescription = $_row['product_desc'];
    $productPrice = $_row['product_price'];
    $productQuantity = $_row['product_quantity'];
    $productCategory = $productObj->getProductCategory($_row['product_category']);
    $productSubCategory = $productObj->getProductSubCategory($_row['product_sub_category']);
    $productLocation = $productObj->getProductLocation($_row['location']);
    $productSellerType = $productObj->getProductSellerType($_row['seller_type']);
    $productPrimaryImage = $productObj->getProductPrimaryImage($id);
    if ($i == 4) {
        break;
    }
    $i++;
    // <!-- <span class="sale">-30%</span> -->
    $similarProductHTML .= '
    <div class="col-md-3 col-xs-6">
                <div class="product">
                <div class="product-img">
                        <img src=" ' . $htmlPath . '/uploads/products/' . $productPrimaryImage . '" alt="">
                        <div class="product-label">
                        <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">' . $productCategory['category_name'] . '</p>
                        <h3 class="product-name"><a href="' . $htmlPath . '/public/store/product?id=' . $_row['id'] . '">' . $productName . '</a></h3>
                        <h4 class="product-price">' . $productPrice . ' <del class="product-old-price">' . $productPrice . '</del></h4>
                        
                        <!-- <div class="product-btns"> -->
                        
                        <div id="button" style="text-align: center; width: 50%; margin: 10px 25%;">
                        <div id="translate"></div>
                        
                        <button type="button" id="filter_button" name="filter" class="button" style="width:98%"><a href="' . $htmlPath . '/public/store/product?id=' . $row['id'] . '">View</a></button>
                        </div>
                        <!-- </div> -->
                        </div>
                        </div>
                        </div>
                        ';
}

$productName = $row['product_name'];
$productDescription = $row['product_desc'];
$productPrice = $row['product_price'];
$productQuantity = $row['product_quantity'];
$productCategory = $productObj->getProductCategory($row['product_category']);
$productSubCategory = $productObj->getProductSubCategory($row['product_sub_category']);
$productLocation = $productObj->getProductLocation($row['location']);
$productSellerType = $productObj->getProductSellerType($row['seller_type']);
$productPrimaryImage = $productObj->getProductPrimaryImage($id);
$productOtherImages = array();
$i = 0;
$result = $productObj->getProductOtherImage($id);
while ($row = $result->fetch_assoc()) {
    $productOtherImages[$i++] = $row['image'];
}
