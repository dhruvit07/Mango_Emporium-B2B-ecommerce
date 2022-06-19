<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// if (isset($_GET['filter']) || isset($_GET['page_no'])) {
//     define("require", true);
//     require $phpPath . 'src/classes/product.class.php';
// }
// require $phpPath . 'src/process/store.process.php';
session_start();

$product_obj = new product();

$result = $product_obj->getCategory();
$category_html = getFilterHTML($result, $product_obj,  'category_name', 'category');

$result = $product_obj->getSellerType();
$seller_type_html = getFilterHTML($result, $product_obj, 'seller_type', 'sellerType');

$result = $product_obj->getLocation();
$location_html = getFilterHTML($result, $product_obj,  'location', 'location');
$result = $product_obj->getBusinessType();
$business_type_html = getFilterHTML($result, $product_obj, 'name', 'business-type');

function getFilterHTML($result, $product_obj, $string, $_name)
{
    $i = 1;
    $html = "";
    while ($row = $result->fetch_assoc()) {
        $name = $row[$string];
        if ($string == "seller_type" && $row['id'] == 1)
            continue;
        $html .= '<div class="input-checkbox">
								<input type="checkbox" id="' . $string . '-' . $i . '" name="' . $_name . '[]" value="' . $row["id"] . '">
								<label for="' . $string . '-' . $i . '">
									<span></span>
									' . $name . '
									<small>(' . ($string == "seller_type" ? $product_obj->getProductCountBySellerType($row['id']) : ($string == "location" ?
            $product_obj->getProductCountByLocation($row['id']) : ($string == "category_name" ? $product_obj->getProductCountByCategory($row['id']) : $product_obj->getProductCountByBusinessType($row['id'])))) . ')    </small>
								</label>
							</div>';
        $i++;
    }
    // echo $html;
    return $html;
}

$page = "";
if (isset($_GET["page"]))
    $page = $_GET["page"];
else
    $page = 1;
$limit_per_page = 10;
$offset = ($page - 1) * $limit_per_page;
$product = "";

if (isset($_GET['filter']) && (isset($_GET['category']) || isset($_GET['search']) ||  isset($_GET['user']) || isset($_GET['business-type']) || (isset($_GET['sub']) && isset($_GET['category'])) || isset($_GET['location']) || isset($_GET['sellerType']) || isset($_GET['priceMin']) || isset($_GET['priceMax']))) {

    $category = isset($_GET['category']) ? ($_GET['category'][0] == "" ? "" : $_GET['category']) : "";
    $search = isset($_GET['search']) ? ($_GET['search'] == "" ? "" : $_GET['search']) : "";
    $user = isset($_GET['user']) ? ($_GET['user'] == "" ? "" : $_GET['user']) : "";
    $businessType = isset($_GET['business-type']) ? ($_GET['business-type'][0] == "" ? "" : $_GET['business-type']) : "";
    $sub = isset($_GET['sub']) ? ($_GET['sub'][0] == "" ? "" : $_GET['sub']) : "";
    $location = isset($_GET['location']) ? ($_GET['location'][0] == "" ? "" : $_GET['location']) : "";
    $sellerType = isset($_GET['sellerType']) ? ($_GET['sellerType'][0] == "" ? "" : $_GET['sellerType']) : "";
    $priceMin = isset($_GET['priceMin']) ? $_GET['priceMin'] : "";
    $priceMax = isset($_GET['priceMax']) ? $_GET['priceMax'] : "";

    $result = $product_obj->getFilteredProduct($search, $user, $category, $businessType, $sub, $location, $sellerType, $priceMin, $priceMax, $offset, $limit_per_page);
    $totalProduct = $product_obj->getFilteredProduct($search, $user, $category, $businessType, $sub, $location, $sellerType, $priceMin, $priceMax, $offset, $limit_per_page, true);
} else {

    $result = $product_obj->getAllProduct($offset, $limit_per_page);
    $totalProduct = $product_obj->getProductCount();
}
$fetchedProductCount = $result->num_rows;
$number_of_pages = ceil($totalProduct / $limit_per_page);
$product = productHTMLGenterator($result, $product_obj, $number_of_pages, $page, $fetchedProductCount, $totalProduct, $htmlPath);

if ($totalProduct < 1) {

    $product =  $search . '<img class="img-responsive" src=' . $htmlPath . '/resources/img/not_found.jpg>';
}


function productHTMLGenterator($result, $product_obj, $number_of_pages, $page, $fetchedProductCount, $totalProduct, $htmlPath)
{
    $product = "";
    while ($row = $result->fetch_assoc()) {

        $productImage = $product_obj->getProductPrimaryImage($row['id']);
        $_row = $product_obj->getProductCategory($row['product_category']);
        $productCategory = $_row['category_name'];
        $_row = $product_obj->getProductLocation($row['location']);
        $productLocation = $_row['location'];
        if (session_id() == '')
            session_start();

        $button = '<button type="button" name="inquiry" id="' . $row['id'] . '" class="inquiry button">Send Inquiry</button>';

        $product .= '
        <div class="product col-md-12 col-sm-12 col-xs-12 col-12 pl-0">
        <div class="product-img col-md-5 col-sm-5 col-xs-5 pl-0">
        <img src="' . $htmlPath . '/uploads/products/' . $productImage . '" class="img-responsive" alt="">
        </div>
                        
                        <div class="product-body col-md-7 col-sm-7 col-xs-7 position-unset">
                        <p class="product-category">' . $productCategory . '</p>
                        <p class="product-category">' . $productLocation . '</p>
                        <h2 class="product-name"><a href="' . $htmlPath . '/public/store/product?id=' . $row['id'] . '">' . $row['product_name'] . '</a></h2>
                            <h4 class="product-price">₹' . $row['product_price'] . ' <del class="product-old-price">₹' . $row['product_price'] . '</del></h4>
                            <p class="product-details">
                            <ul>
                                <li>' . $row['product_desc'] . '</li>
                            </ul>
                            </p>
                            <div class="product-btnn">
                            <form>
                            <div id="button">
							<div id="translate"></div>
                                ' . $button . '
                            </div>
                                <div id="button">
							<div id="translate"></div>
                                <button type="button" class="button" >Contact Info</button>
                            </div>
                            </div>
                        </div>
                    </div>';
    }
    $product .= '<div class="store-filter clearfix">
                    <span class="store-qty">Showing ' . $fetchedProductCount . '-' . $totalProduct . ' products</span>
                    <ul class="store-pagination" id="pagination">';

    global $url;
    $product  .= ($page > 1) ? '<li><a href="' . substr($url, strpos($url, '?')) . (strpos($url, '?') !== false ? '&page=' : '?page=') .  $page - 1 . '" id="' . $page - 1 . '"><i class="fa fa-angle-left" ></i></a></li>' : "";
    $product .=  '<li class="active"><a href="' . substr($url, strpos($url, '?')) . (strpos($url, '?') !== false ? '&page=' : '?page=') .  $page  . '" id="' . $page . '">' . $page . '</a></li>';
    $product .=  ($page < $number_of_pages) ? ' <li><a href="' . substr($url, strpos($url, '?')) . (strpos($url, '?') !== false ? '&page=' : '?page=') .  $page + 1 . '" id="' . $page + 1 . '"><i class="fa fa-angle-right"></i></a></li></ul></div>' : '</ul></div>';
    return $product;
}

$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}
