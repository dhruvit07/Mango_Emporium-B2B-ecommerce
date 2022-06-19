<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
// session_start();

$userHTML = "";
$product_obj = new _product();
if (isset($_GET["users"])) {
    $result = $product_obj->getVendors();
    while ($row = $result->fetch_assoc()) {
        $business_type = $product_obj->getBusinessTypeById($row['business_type']);
        $userHTML .= '<tr>
    <td>' . $row['u_id'] . '</td>
    <td>' . $row['u_name'] . '</td>
    <td>' . $business_type . '</td>
    <td>' . $row['u_email'] . '</td>
    <td>' . $row['u_contact'] . '</td>
        <td class="text-right">
        <a href="./?users&delete=' . $row['u_id'] . '" title="Delete" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }
}
if (isset($_GET["users"]) && isset($_GET["delete"])) {
    $id = $_GET['delete'];
    if ($object->removeVendor($id)) {
        $_SESSION['msg'] = "Vendor Deleted!";
        echo '<script type="text/javascript"> window.location.href = "./?users&msg"</script>';
        exit();
    }
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
                            <i class="material-icons">person</i>
                        </div>
                        <h4 class="card-title">Vendors</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Vendor Id</th>
                                        <th>Vendor Name</th>
                                        <th>Business Type</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Vendor Id</th>
                                        <th>Vendor Name</th>
                                        <th>Business Type</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $userHTML;
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