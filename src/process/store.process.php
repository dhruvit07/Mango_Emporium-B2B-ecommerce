<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (isset($_POST['filter']) || isset($_POST['page_no'])) {
    define("require", true);
    require $phpPath . 'src/classes/product.class.php';
}

$product_obj = new product();
$limit_per_page = 2;
if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit_per_page;

$product = "";
$bool = false;
if (isset($_GET['category']) && isset($_GET['sub']) && $_GET['sub'] != "" && $_GET['category'] != "") {
    $result = $product_obj->getProductBySubCategory($offset, $limit_per_page, $_GET['category'], $_GET['sub']);
    $totalProduct = $product_obj->getProductCountBySubCategory($_GET['category'], $_GET['sub']);
    $bool = true;
    goto label;
} else {
    if (isset($_POST["page_no"])) {
        if (isset($_POST['filter']) && (isset($_POST['category']) || isset($_POST['location']) || isset($_POST['sellerType']) || isset($_POST['priceMin']) || isset($_POST['priceMax']))) {

            $category = isset($_POST['category']) ? $_POST['category'] : "";
            $location = isset($_POST['location']) ? $_POST['location'] : "";
            $sellerType = isset($_POST['sellerType']) ? $_POST['sellerType'] : "";
            $priceMin = isset($_POST['priceMin']) ? $_POST['priceMin'] : "";
            $priceMax = isset($_POST['priceMax']) ? $_POST['priceMax'] : "";
            $result = $product_obj->getFilteredProduct($category, $location, $sellerType, $priceMin, $priceMax, $offset, $limit_per_page);
            $totalProduct = $product_obj->getFilteredProductCount($category, $location, $sellerType, $priceMin, $priceMax);
        } else {

            $result = $product_obj->getAllProduct($offset, $limit_per_page);
            $totalProduct = $product_obj->getProductCount();
        }
        label:
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
}

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

function productHTMLGenterator($result, $product_obj, $number_of_pages, $page, $fetchedProductCount, $totalProduct, $htmlPath)
{
    $product = "";
    while ($row = $result->fetch_assoc()) {

        $productImage = $product_obj->getProductPrimaryImage($row['id']);
        $_row = $product_obj->getProductCategory($row['product_category']);
        $productCategory = $_row['category_name'];
        $_row = $product_obj->getProductLocation($row['location']);
        $productLocation = $_row['location'];
        if (isset($_SESSION['u_id']))
            $button = '<button type="button" class="button redirect"> Send Inquiry</button>';
        else
            $button = '';
        $product .= '
        <div class="product col-md-12 col-sm-12 col-xs-12 col-12 pl-0">
        <div class="product-img col-md-5 col-sm-5 col-xs-5 pl-0">
        <img src="' . $htmlPath . '/uploads/products/' . $productImage . '" class="img-responsive" alt="">
        </div>

                        <div class="product-body col-md-7 col-sm-7 col-xs-7 position-unset">
                        <p class="product-category">' . $productCategory . '</p>
                        <p class="product-category">' . $productLocation . '</p>
                        <h2 class="product-name"><a href="#">' . $row['product_name'] . '</a></h2>
                            <h4 class="product-price">₹' . $row['product_price'] . ' <del class="product-old-price">₹' . $row['product_price'] . '</del></h4>
                            <p class="product-details">
                            <ul>
                                <li>' . $row['product_desc'] . '</li>
                            </ul>
                            </p>
                            <div class="product-btnn">
                            <div id="button">
							<div id="translate"></div>
                                ' . $button . '
                            </div>
                                <div id="button">
							<div id="translate"></div>
                                <button type="button" class="button" ><a class="btn button" style="all: unset;" href="#open-modal"> Contact Info</a></button>
                            </div>
                            </div>
                        </div>
                    </div>';
    }
    $product .= '
    
    <div class="store-filter clearfix">
                    <span class="store-qty">Showing ' . $fetchedProductCount . '-' . $totalProduct . ' products</span>
                    <ul class="store-pagination" id="pagination">';


    $product  .= $page > 1 ? '<li><a href="" id="' . $page - 1 . '"><i class="fa fa-angle-left" ></i></a></li>' : "";

    $class = "active";
    $product .=  '<li class="' . $class . '"><a href=""  id="' . $page . '">' . $page . '</a></li>';
    $product .= $page < $number_of_pages ? ' <li><a href=""  id="' . $page + 1 . '"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>' : ' </ul></div>';
    // <div class="product-btns">
    // <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
    // <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
    // <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
    // </div>

    return $product;
}
