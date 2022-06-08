<?php
require '../../includes/class-autoload.inc.php';
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
