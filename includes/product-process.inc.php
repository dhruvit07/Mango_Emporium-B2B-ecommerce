<?php
session_start();
require './class-autoload.inc.php';

if (isset($_POST['submit'])) {
    // echo "<pre>" . print_r($_FILES['img_archive']) . "</pre>";
    $id = $_SESSION['u_id'];
    $name = $_POST['name'];
    $quantity = trim($_POST['quantity']);
    $category = trim($_POST['category']);
    $subCategory = trim($_POST['sub_category']);
    $location = trim($_POST['location']);
    $seller_type = trim($_POST['seller_type']);
    $primary_img = $_FILES['file_img'];
    $desc = $_POST['description'];
    $other_img = $_FILES['img_archive'];
    $product = new  product();
    $processedPrimaryImage = processImage("file_img");
    $total = count($_FILES['img_archive']['name']);
    for ($i = 0; $i < $total; $i++) {
        $processedOtherImages[$i] = processImage('img_archive', $i);
    }
    $inserted_id = $product->addProuct($id, $name, $quantity, $category, $subCategory, $location, $seller_type, $desc);
    if ($inserted_id != false) {
        $bool = $product->addImages($inserted_id, $processedPrimaryImage, '1');
        for ($i = 0; $i < $total; $i++) {
            $bool = $product->addImages($inserted_id, $processedOtherImages[$i], '0');
        }
        if ($bool) {
            // $_SESSION['msg'] = "Product Added!";
            // echo '<script>window.location.href="../public/user/?msg"</script>';
            // exit();
        }
    }
} else {
    header('location: ../public/e404.html');
}

function processImage($filetag, $i = 0)
{

    $fileName = $filetag == "img_archive" ? $_FILES[$filetag]['name'][$i] : $_FILES[$filetag]['name'];
    $fileTmpName = $filetag == "img_archive" ? $_FILES[$filetag]['tmp_name'][$i] :  $_FILES[$filetag]['tmp_name'];
    $fileSize = $filetag == "img_archive" ? $_FILES[$filetag]['size'][$i] : $_FILES[$filetag]['size'];
    $fileError = $filetag == "img_archive" ? $_FILES[$filetag]['error'][$i] :  $_FILES[$filetag]['error'];
    $fileType = $filetag == "img_archive" ? $_FILES[$filetag]['type'][$i] : $_FILES[$filetag]['type'];
    if (!empty($fileName) && !empty($_FILES['file_img']['tmp_name'])) {

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'png', 'jpeg');

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError == 0) {
                if ($fileSize < 1048576) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = $fileNameNew;
                    $fileD = "../uploads/products/" . $fileNameNew;
                    $stat =  move_uploaded_file($fileTmpName, $fileD);
                    if ($stat == true) {
                        return $fileDestination;
                    } else {
                        $_SESSION['msg'] = "Error Uploading!";
                        echo '<script>window.location.href="../public/user/?msg&addproduct"</script>';
                        exit();
                    }
                } else {
                    // $error = true;
                    $_SESSION['msg'] = "File Size is too big! Choose a lower Resolution Image.";
                    echo '<script>window.location.href="../public/user/?msg&addproduct"</script>';
                    exit();
                }
            } else {
                // $error = true;
                $_SESSION['msg'] = "Error Uploading Image!! Try Again.";
                echo '<script>window.location.href="../public/user/?msg&addproduct"</script>';
                exit();
            }
        } else {
            // $error = true;
            $_SESSION['msg'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
            echo '<script>window.location.href="../public/user/?msg&addproduct"</script>';
            exit();
        }
    }
}
