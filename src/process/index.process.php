<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require 'C:/xampp/htdocs/Project-1/includes/class-autoload.inc.php';
}

$product_obj = new product();

$collectionHTML = "";
$result = $product_obj->getCategory();
while ($row = $result->fetch_assoc()) {

    $collectionHTML .= '
    <div class="col-md-4 col-xs-6">
    <div class="shop">
        <div class="shop-img">
            <img style="height:300px; object-fit:cover;" src="' . $htmlPath . '/uploads/category/' . $row['image'] . '" alt="">
        </div>
        <div class="shop-body">
            <h3>' . $row['category_name'] . '<br>Products</h3>
            <a href="' . $htmlPath . '/public/category/?id=' . $row['id'] . '" class="cta-btn">Visit now <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>';
}

$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}

$result = $product_obj->getUsersByBusinessType(3);
$i = 0;
$homePageFranchiseHTML = "";
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        if ($i == 5)
            break;
        $i++;
        $totalProducts = $product_obj->getProductCountByUser($row["u_id"]);
        $price = $product_obj->getProductRangeByUser($row['u_id']);
        $min = $price[0];
        $max = $price[1];
        $homePageFranchiseHTML .=  '<div class="col-md-3 col-sm-4 col-xs-6 card">
        <div class="card-box">
            <a class="card-img-tiles" href="#" data-abc="true">
                <div class="inner">
                    <div class="main-img"><img src="' . $htmlPath . '/uploads/profile/' . $row['image'] . '" alt="User"></div>
                </div>
            </a>
            <hr>
            <div class="card-body text-center">
                <div class="card-details">
                    <p class="left">Total Product</p>
                    <p class="right">' . $totalProducts . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Price Range</p>
                    <p class="right"> ' . $min . ' - ' . $max . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Location</p>
                    <p class="right">Not Available</p>
                </div>
                <hr>
                <br>

                <h4 class="card-title">Sagar Private Limited</h4>
                <a class="btn btn-outline-primary btn-sm" href="" data-abc="true">View Products</a>
            </div>
        </div>
    </div>';
    }
} else {
    $homePageFranchiseHTML .= "Currently No Users in This Section!";
}
$result = $product_obj->getUsersByBusinessType(1);
$i = 0;
$homePageBusinessVolumeHTML = "";
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        if ($i == 5)
            break;
        $i++;
        $totalProducts = $product_obj->getProductCountByUser($row["u_id"]);
        $price = $product_obj->getProductRangeByUser($row['u_id']);
        $min = $price[0];
        $max = $price[1];
        $homePageBusinessVolumeHTML .=  '<div class="col-md-3 col-sm-4 col-xs-12 card">
        <div class="card-box">
            <a class="card-img-tiles" href="#" data-abc="true">
                <div class="inner">
                    <div class="main-img"><img src="' . $htmlPath . '/uploads/profile/' . $row['image'] . '" alt="User"></div>
                </div>
            </a>
            <hr>
            <div class="card-body text-center">
                <div class="card-details">
                    <p class="left">Total Product</p>
                    <p class="right">' . $totalProducts . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Price Range</p>
                    <p class="right"> ' . $min . ' - ' . $max . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Location</p>
                    <p class="right">Not Available</p>
                </div>
                <hr>
                <br>

                <h4 class="card-title">Sagar Private Limited</h4>
                <a class="btn btn-outline-primary btn-sm" href="' . $htmlPath . '/public/store/?filter&user=' . $row['u_id'] . '" data-abc="true">View Products</a>
            </div>
        </div>
    </div>';
    }
} else {
    $homePageBusinessVolumeHTML .= "Currently No Users in This Section!";
}

$result = $product_obj->getUsersByBusinessType(2);
$i = 0;
$homePageDistributionHTML = "";
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        if ($i == 5)
            break;
        $i++;
        $totalProducts = $product_obj->getProductCountByUser($row["u_id"]);
        $price = $product_obj->getProductRangeByUser($row['u_id']);
        $min = $price[0];
        $max = $price[1];
        $homePageDistributionHTML .=  '<div class="col-md-3 col-sm-4 col-xs-6 card">
        <div class="card-box">
            <a class="card-img-tiles" href="#" data-abc="true">
                <div class="inner">
                    <div class="main-img"><img src="' . $htmlPath . '/uploads/profile/' . $row['image'] . '" alt="User"></div>
                </div>
            </a>
            <hr>
            <div class="card-body text-center">
                <div class="card-details">
                    <p class="left">Total Product</p>
                    <p class="right">' . $totalProducts . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Price Range</p>
                    <p class="right"> ' . $min . ' - ' . $max . '</p>
                </div>
                <div class="card-details">
                    <p class="left">Location</p>
                    <p class="right">Not Available</p>
                </div>
                <hr>
                <br>

                <h4 class="card-title">Sagar Private Limited</h4>
                <a class="btn btn-outline-primary btn-sm" href="" data-abc="true">View Products</a>
            </div>
        </div>
    </div>';
    }
} else {
    $homePageDistributionHTML .= "Currently No Users in This Section!";
}

$result = $product_obj->getCategory();
$i = 0;
$homeProductsByCateoryHTML = "";
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        if ($i == 3)
            break;
        $i++;
        $id = $row['id'];
        $homeProductsByCateoryHTML .= '<div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">' . $row['category_name'] . ' </h4>
                    <div class="section-nav">
                        <div id="slick-nav-' . $i . '" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                <div>';
        $result2 = $product_obj->getProductByCategory($id);
        if ($result2->num_rows >= 1) {
            $j = 0;
            $k = 0;
            while ($row2 = $result2->fetch_assoc()) {
                $primaryImage = $product_obj->getProductPrimaryImage($row2['id']);
                if ($j == 7)
                    break;
                $j++;
                if ($k == 3)
                    $homeProductsByCateoryHTML .= '</div><div>';
                $k++;
                $homeProductsByCateoryHTML .= '
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="' . $htmlPath . '/uploads/products/' . $primaryImage . '" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">' . $row['category_name'] . '</p>
									<h3 class="product-name"><a href="' . $htmlPath . '/public/store/product?id=' . $row2['id'] . '">' . $row2['product_name'] . '</a></h3>
									<h4 class="product-price">₹' . $row2['product_price'] . '<del class="product-old-price">₹' . $row2['product_price'] . '</del></h4>
								</div>
							</div>
							<!-- /product widget -->
                    ';
            }
        } else {
            $homeProductsByCateoryHTML .= "No Product in this Category!";
        }
        $homeProductsByCateoryHTML .= '
                    </div>			
                    </div>
                    </div>';
    }
} else {
    $homeProductsByCateoryHTML .= "No Categories Available";
}
