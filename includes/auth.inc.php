<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
require $phpPath . "src/classes/functions.class.php";
require $phpPath . "src/classes/product.class.php";
define('require', true);
require $phpPath . "src/classes/auth.class.php";
$object = new auth();
$businessTypeHTML = "";
$result = $object->getBusinessType();
while ($row = $result->fetch_assoc()) {
    $businessTypeHTML .= ' <option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
