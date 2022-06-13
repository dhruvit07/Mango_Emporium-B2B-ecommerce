<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';

$user_obj = new user();
$product = new product();
$user = $user_obj->getUser($_SESSION['u_id']);
$item = $product->getProduct($_SESSION['u_id']);

$location_html = "";
$result = $product->getLocation();
while ($row = $result->fetch_assoc()) {
    $location_html .= '<option value=' . $row['id'] . '>' . $row['location'] . '</option>';
}

$category_html = "";
$result = $product->getCategory();
while ($row = $result->fetch_assoc()) {
    $category_html .= '<option value=' . $row['id'] . '>' . $row['category_name'] . '</option>';
}

$sellerType_html = "";
$result = $product->getSellerType();
while ($row = $result->fetch_assoc()) {
    $sellerType_html .= '<option value=' . $row['id'] . '>' . $row['seller_type'] . '</option>';
}

$userProducts_html = "";
if ($item->num_rows == 0) {
    $userProducts_html .= '<tr><td colspan="5" class="text-center">No Products</td><tr>';
} else {
    while ($row = $item->fetch_assoc()) {
        $category = $product->getProductCategory($row['product_category']);
        $location = $product->getProductLocation($row['location']);
        $status = $row['status'] == 1 ? "Approved" : "Pending";
        $status_class = $row['status'] == 1 ? "success" : "danger";
        $userProducts_html .= '<tr>
    <td ><a href="'.$htmlPath.'/public/store/product?id=' . $row['id'] . '">' . $row["product_name"] . '</a></td>
    <td >' . $row["product_quantity"] . '</td>
    <td class="text-center">' . $category['category_name'] . '</td>
    <td class="text-center">' . $location['location'] . '</td>
    <td class="table-' . $status_class . ' text-center">' . $status . '</td>
            </tr>';
        // <td class="col-sm-1">
        //         <form action="./?editproduct&id=' . $row['id'] . '" method="post">
        //             <button type="submit" name="submit" class="btn btn-primary color-primary">Update</button>
        //         </form>
        //     </td>
    }
}

function msg($msg)
{
    return ' <div class="alert alert-success alert-dismissible  show" role="alert">
    <strong>' . $msg . '</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
