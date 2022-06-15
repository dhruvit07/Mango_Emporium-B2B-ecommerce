<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (isset($_POST['filter']) || isset($_POST['page_no'])) {
    define("require", true);
    require $phpPath . 'src/classes/product.class.php';
}
require $phpPath . 'src/process/store.process.php';
session_start();

$product_obj = new product();

$result = $product_obj->getCategory();
$category_html = getFilterHTML($result, $product_obj,  'category_name', 'category');


$result = $product_obj->getSellerType();
$seller_type_html = getFilterHTML($result, $product_obj, 'seller_type', 'sellertype');


$result = $product_obj->getLocation();
$location_html = getFilterHTML($result, $product_obj,  'location', 'location');


function getFilterHTML($result, $product_obj, $string, $_name)
{
    $i = 1;
    $html = "";
    while ($row = $result->fetch_assoc()) {
        $name = $row[$string];
        $html .= '<div class="input-checkbox">
								<input type="checkbox" id="' . $string . '-' . $i . '" name="' . $_name . '" value="' . $row["id"] . '">
								<label for="' . $string . '-' . $i . '">
									<span></span>
									' . $name . '
									<small>(' . ($string == "sellertype" ? $product_obj->getProductCountBySellerType($row['id']) : ($string == "location" ?
            $product_obj->getProductCountByLocation($row['id']) :
            $product_obj->getProductCountByCategory($row['id']))) . ')    </small>
								</label>
							</div>';
        $i++;
    }
    // echo $html;
    return $html;
}

if (isset($_GET['category']) && isset($_GET['sub']) && $_GET['sub'] != "" && $_GET['category'] != "") {
    $result = $product_obj->getProductBySubCategory($offset, $limit_per_page, $_GET['category'], $_GET['sub']);
    $totalProduct = $product_obj->getProductCountBySubCategory($_GET['category'], $_GET['sub']);
    $bool = true;
    $fetchedProductCount = $result->num_rows;
    $number_of_pages = ceil($totalProduct / $limit_per_page);
    $product = productHTMLGenterator($result, $product_obj, $number_of_pages, $page, $fetchedProductCount, $totalProduct, $htmlPath);

    if ($totalProduct < 1) {
        if (!$bool)
            echo '<img class="img-responsive" src=' . $htmlPath . '/resources/img/not_found.jpg>';
        else
            $product =  '<img class="img-responsive" src=' . $htmlPath . '/resources/img/not_found.jpg>';
    } else {
        if (!$bool)
            echo $product;
    }
}

$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}
