<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require $_SERVER['DOCUMENT_ROOT']  . '/includes/class-autoload.inc.php';
}
$product_obj = new product();
$categoryHTML = "";
$result = $product_obj->getCategory();
while ($row = $result->fetch_assoc()) {
    $categoryHTML .= '
<div class="col-md-2 col-sm-3 col-xs-4 col-6">
    <div class="card mb-30"><a class="card-img-tiles" href="#" data-abc="true">
            <div class="inner">
                <div class="main-img"><img src="' . $htmlPath . '/uploads/category/' . $row['image'] . '" alt="Category"></div>
            </div>
        </a>
        <div class="card-body text-center">
            <h4 class="card-title">' . $row["category_name"] . '</h4>
            <a class="btn btn-outline-primary btn-sm" href="./?id=' . $row['id'] . '" data-abc="true">View Products</a>
        </div>
    </div>
</div>
';
}

if (isset($_GET['id']) && $_GET['id'] != "") {
    $subCategoryHTML = "";
    $result = $product_obj->getSubCategory($_GET['id']);
    while ($row = $result->fetch_assoc()) {
        $subCategoryHTML .= '
<div class="col-md-2 col-sm-3 col-xs-4 col-6">
    <div class="card mb-30"><a class="card-img-tiles" href="#" data-abc="true">
            <div class="inner">
                <div class="main-img"><img src="' . $htmlPath . '/uploads/category/' . $row['image'] . '" alt="Category"></div>
            </div>
        </a>
        <div class="card-body text-center">
            <h4 class="card-title">' . $row["sub_category_name"] . '</h4>
            <a class="btn btn-outline-primary btn-sm" href="../store/?filter&category[]=' . $_GET['id'] . '&sub=' . $row['id'] . '" data-abc="true">View Products</a>
        </div>
    </div>
</div>
';
    }
}

$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}
