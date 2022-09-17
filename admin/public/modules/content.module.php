<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$product_obj = new _product();
$object = new content();
$HTML = "";
if (isset($_GET['content'])) {
    $result = $object->getContent();
    while ($row = $result->fetch_assoc()) {
        $row2 = $product_obj->getProductById($row['product_id']);
        $HTML .= '<tr>
    <td><a href="./?product=' . $row2['business_type'] . '&approved&search=' . $row['product_id'] . '">' . $row['product_id'] . '</a></td>
    <td>' . $row['video_name'] . '</td>
        <td class="text-right">
        <a href="' . $row['video_view_url'] . '" target="_blank" class=" p-0 btn btn-link btn-info">
        <button class="px-3 py-2 m-1 btn ">View</button>
        </a>
        <a href="./?content&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    if (isset($_POST['insert-content'])) {
        $viewUrl = $_POST['video-url'];
        $id = $_POST['product-id'];
        $url = $_POST['video-url'];
        $name = $_POST['video-name'];
        $url = str_replace("/watch/?v=", "/embed/", $url);
        $product = $product_obj->getProductById($id);
        $c_id = $product['product_category'];
        $result = $object->insertContent($id, $c_id, trim($url), trim($name), trim($viewUrl));
        if ($result) {
            // echo $viewUrl . $name . $url;
            $_SESSION['msg'] = "Video Content Added!";
            echo '<script type="text/javascript"> window.location.href = "./?content&msg"</script>';
            exit();
        } else {
            exit();
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        if ($object->deleteContent($id)) {
            $_SESSION['msg'] = "Video Content Deleted!";
            echo '<script type="text/javascript"> window.location.href = "./?content&msg"</script>';
            exit();
        }
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
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h4 class="card-title">Add Video Content</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <form method="post" id="TypeValidation" class="form-horizontal" action="./?content" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="location" class="bmd-label-floating">Video Name</label>
                                <input type="text" class="form-control" id="location" name="video-name" required>
                            </div>
                            <div class="form-group ">
                                <label for="location" class="bmd-label-floating">Video Url</label>
                                <input type="text" class="form-control" id="location" name="video-url" url="true" required="true" />
                            </div>
                            <div class="form-group ">
                                <label for="location" class="bmd-label-floating">Product Id</label>
                                <input type="number" class="form-control" id="location" name="product-id" required="true" />
                            </div>
                            <div class="form-group ">
                                <div class="card-footer">
                                    <button type="submit" name="insert-content" class="btn btn-fill btn-rose">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">analytics</i>
                        </div>
                        <h4 class="card-title">Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product id</th>
                                        <th>Name</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Product id</th>
                                        <th>Name</th>
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