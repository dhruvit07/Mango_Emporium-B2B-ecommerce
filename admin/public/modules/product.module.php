<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
// session_start();

$productHTML = "";
$product_obj = new _product();

if (isset($_GET["product"]) && !isset($_GET["approved"])) {

    $product = $product_obj->getPendingProduct($_GET['product']);
    $productHTML = generateProductHTML($product, $product_obj, 0);

    if (isset($_GET['approve'])) {
        if ($product_obj->approveProduct($_GET['approve'])) {

            $_SESSION['msg'] = "Product Approved";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&msg"</script>';
            exit();
        } else {

            $_SESSION['msg'] = "Some Error Occured";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&msg"</script>';
            exit();
        }
    }
    if (isset($_GET['delete'])) {

        if ($product_obj->deleteProduct($_GET['delete'])) {
            $_SESSION['msg'] = "Product Deleted";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&msg"</script>';
            exit();
        } else {
            $_SESSION['msg'] = "Some Error Occured";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&msg"</script>';
            exit();
        }
    }
} else if (isset($_GET["product"]) && isset($_GET["approved"])) {

    $product = $product_obj->getApprovedProduct($_GET['product']);
    $productHTML = generateProductHTML($product, $product_obj, 1);

    if (isset($_GET['delete'])) {

        if ($product_obj->deleteProduct($_GET['delete'])) {
            $_SESSION['msg'] = "Product Deleted";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&approved&msg"</script>';
            exit();
        } else {
            $_SESSION['msg'] = "Some Error Occured";
            echo '<script type="text/javascript"> window.location.href = "./?product=' . $_GET['product'] . '&approved&msg"</script>';
            exit();
        }
    }
}
function generateProductHTML($product, $product_obj, $status)
{
    $producHTML = "";
    while ($row = $product->fetch_assoc()) {
        $_row = $product_obj->getProductVendor($row['user_id']);
        $vendorName = $_row['u_name'];
        $vendorId = $_row['u_id'];
        $_row = $product_obj->getProductCategory($row['product_category']);
        $productCategory = $_row['category_name'];
        $_row = $product_obj->getProductLocation($row['location']);
        $productLocation = $_row['location'];
        $_row = $product_obj->getProductSellerType($row['seller_type']);
        $productSellerType = $_row['seller_type'];

        $button  = $status == 0 ?
            '<a href="../../public/store/product?id=' . $row['id'] . '&testing" target="_blank" class=" p-0 btn btn-link btn-info">
                                    <button class="px-3 py-2 m-1 btn ">View</button>
                                    </a>
                                    <a href="./?product=' . $_GET['product'] . '&approve=' . $row['id'] . '" class=" p-0 btn btn-link btn-info">
                                            <button class="p-2 m-1 btn btn-success">
                                            <span class="btn-label">
                                            <i class="material-icons">check</i>
                                            </span>
                                            Approve
                                        </button> </a>
                                        <a href="./?product=' . $_GET['product'] . '&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                        ' :
            '<a href="../../public/store/product?id=' . $row['id'] . '" target="_blank" class=" p-0 btn btn-link btn-info">
                                        <button class=" px-3 py-2 m-1 btn btn-info">View</button>
                                        </a>
                                        <a href="./?product=' . $_GET['product'] . '&approved&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                        ';
        $date = $row['product_date'];
        $dateObj = new DateTime($date);
        $productDate = $dateObj->format('d/m/Y');
        $producHTML .=  '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['product_name'] . '</td>
                                <td> <a href="./?users&search=' . $vendorId . '">' . $vendorName . '</a></td>
                                <td>' . $productCategory . '</td>
                                <td>' . $productLocation . '</td>
                                <td>' . $productSellerType . '</td>
                                <td>' . $productDate . '</td>
                                <td class="text-right">
                                    ' . $button . '
                                </td>
                            </tr>
                            ';
    }
    return $producHTML;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
            ?>
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                            <b> <?php echo $_SESSION['msg'] ?></b> </span>
                    </div>
                </div>
            <?php }
            unset($_SESSION['msg']);
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <h4 class="card-title">Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Vendor Name</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Business Type</th>
                                        <th>Date</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Vendor Name</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Business Type</th>
                                        <th>Date</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $productHTML;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>