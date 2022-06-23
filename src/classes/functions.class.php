<?php
trait functions
{
    function processImage($filetag, $i = 0, $uploadLocation = "")
    {

        $fileName = $filetag == "img_archive" ? $_FILES[$filetag]['name'][$i] : $_FILES[$filetag]['name'];
        $fileTmpName = $filetag == "img_archive" ? $_FILES[$filetag]['tmp_name'][$i] :  $_FILES[$filetag]['tmp_name'];
        $fileSize = $filetag == "img_archive" ? $_FILES[$filetag]['size'][$i] : $_FILES[$filetag]['size'];
        $fileError = $filetag == "img_archive" ? $_FILES[$filetag]['error'][$i] :  $_FILES[$filetag]['error'];
        $fileType = $filetag == "img_archive" ? $_FILES[$filetag]['type'][$i] : $_FILES[$filetag]['type'];
        if (!empty($fileName) && !empty($_FILES[$filetag]['tmp_name'])) {

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'png', 'jpeg');

            if (in_array($fileActualExt, $allowed)) {

                if ($fileError == 0) {
                    if ($fileSize < 1048576) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = $fileNameNew;
                        if ($uploadLocation == 'category') {
                            $fileD = "../../uploads/category/" . $fileNameNew;
                        } else if ($uploadLocation == 'profile') {
                            $fileD = "../../uploads/profile/" . $fileNameNew;
                        } else if ($uploadLocation == 'catalouge') {
                            $fileD = "../../uploads/catalouge/" . $fileNameNew;
                        } else if ($uploadLocation == 'photoshoot') {
                            $fileD = "../../uploads/photoshoot/" . $fileNameNew;
                        } else {
                            $fileD = "../../uploads/products/" . $fileNameNew;
                        }

                        $stat =  move_uploaded_file($fileTmpName, $fileD);
                        if ($stat == true) {
                            return $fileDestination;
                        } else {
                            $_SESSION['msg'] = "Error Uploading!";
                            if ($uploadLocation == 'category' || $uploadLocation == 'profile') {
                                return false;
                            }
                            header('../../public/user/?msg&addproduct');
                            exit();
                        }
                    } else {
                        // $error = true;
                        $_SESSION['msg'] = "File Size is too big! Choose a lower Resolution Image.";
                        if ($uploadLocation == 'category' || $uploadLocation == 'profile' || $uploadLocation == 'catalouge' || $uploadLocation == 'photoshoot') {
                            return false;
                        }
                        header('location: ../../public/user/?msg&addproduct');
                        exit();
                    }
                } else {
                    // $error = true;
                    $_SESSION['msg'] = "Error Uploading Image!! Try Again.";
                    if ($uploadLocation == 'category' || $uploadLocation == 'profile' || $uploadLocation == 'catalouge' || $uploadLocation == 'photoshoot') {
                        return false;
                    }
                    header('location: ../../public/user/?msg&addproduct');
                    exit();
                }
            } else {
                // $error = true;
                $_SESSION['msg'] = "Image Type Not Allowed!! Try a Diffrent Format eg. JPG, PNG, JPEG";
                if ($uploadLocation == 'category' || $uploadLocation == 'profile' || $uploadLocation == 'catalouge' || $uploadLocation == 'photoshoot') {
                    return false;
                }
                header('location: ../../public/user/?msg&addproduct');
                exit();
            }
        }
    }
}
