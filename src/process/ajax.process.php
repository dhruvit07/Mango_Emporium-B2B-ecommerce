<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = new product();
    $result =  $db->getSubCategory($id);

    if ($result) {
        $output = "";
        while ($row = $result->fetch_assoc()) {
            $output .= '<option value=' . $row['id'] . '>' . $row['sub_category_name'] . '</option>';
        }
        echo $output;
    }
}

if (isset($_FILES['profile_pic'])) {
    $object  = new product();
    $err = "";
    $res = "";
    $processedImage = $object->processImage("profile_pic", 0, "profile");
    if (!$processedImage) {
        $err = '<div id="err" class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i>' . $_SESSION["msg"] . '</div>';
    } else {
        $user = new user();
        $result = $user->profileUpload($_SESSION['u_id'], $processedImage);
        if ($result)
            $res =  '<div id="res" class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
        else
            $err = '<div id="err" class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i>Error Uploading!!</div>';
    }

    echo $res;
    echo $err;
} 
