<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require 'C:/xampp/htdocs/Project-1/includes/class-autoload.inc.php';
}
$product_obj = new product();
$searchBarCategoryOptionHTML = "";
$result = $product_obj->getCategory();
while ($row = $result->fetch_assoc()) {
    $searchBarCategoryOptionHTML .= '
    <option value="' . $row['id'] . '">' . $row["category_name"] . '</option>
';
}
$searchBarLocationOptionHTML = "";
$result = $product_obj->getLocation();
while ($row = $result->fetch_assoc()) {
    $searchBarLocationOptionHTML .= '
    <option value="' . $row['id'] . '">' . $row["location"] . '</option>
';
}

$searchBarBusinessTypeOptionHTML = "";
$result = $product_obj->getBusinessType();
while ($row = $result->fetch_assoc()) {
    $searchBarBusinessTypeOptionHTML .= '
    <option value="' . $row['id'] . '">' . $row["name"] . '</option>
';
}
