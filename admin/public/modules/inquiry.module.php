<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$object = new inquiry();
$HTML = "";
if (isset($_GET['inquiry'])) {
    $result = $object->getInquiry();
    while ($row = $result->fetch_assoc()) {
        $HTML .= '<tr>
    <td><a href="./?product&approved&search=' . $row['product_id'] . '">' . $row['product_id'] . '</a></td>
    <td>' . $row['email'] . '</td>
    <td>' . $row['contact'] . '</td>
    <td>' . $row['description'] . '</td>
        <td class="text-right">
        <a href="' . $rootHtml . '/public/store/product?id=' . $row['product_id'] . '" target="_blank" class=" p-0 btn btn-link btn">
        <button class="px-3 py-2 m-1 btn">View</button>
        </a>
        <a href="./?inquiry&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    // if (isset($_GET['delete'])) {
    //     $id = $_GET['delete'];
    //     if ($object->deleteInquiry($id)) {
    //         $_SESSION['msg'] = "Inquiry Deleted Deleted!";
    //         echo '<script type="text/javascript"> window.location.href = "./?content&msg"</script>';
    //         exit();
    //     }
    // }
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
                            <i class="material-icons">info</i>
                        </div>
                        <h4 class="card-title">Inquiry</h4>
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
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Description</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Description</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $HTML;
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