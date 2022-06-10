<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require 'C:/xampp/htdocs/Project-1/includes/class-autoload.inc.php';
}

$product_obj = new product();

$collectionHTML = "";
$result = $product_obj->getCategory();
for ($i = 0; $i < 3; $i++) {
    $row = $result->fetch_assoc();

    $collectionHTML .= '
    <div class="col-md-4 col-xs-6">
    <div class="shop">
        <div class="shop-img">
            <img style="height:300px; object-fit:cover;" src="' . $htmlPath . '/uploads/category/' . $row['image'] . '" alt="">
        </div>
        <div class="shop-body">
            <h3>' . $row['category_name'] . '<br>Collection</h3>
            <a href="<' . $htmlPath . '/public/category/?id=' . $row['id'] . '" class="cta-btn">Visit now <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>';
}
