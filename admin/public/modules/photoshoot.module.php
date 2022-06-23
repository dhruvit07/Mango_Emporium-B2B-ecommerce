<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$product_obj = new _product();
$object = new content();
$HTML = "";
if (isset($_GET['photoshoot'])) {
    $result = $object->getPhotoshoot();
    while ($row = $result->fetch_assoc()) {
        $row2 = $product_obj->getProductById($row['product_id']);
        $HTML .= '<tr>
    <td><a href="./?product=' . $row2['business_type'] . '&approved&search=' . $row['product_id'] . '">' . $row['product_id'] . '</a></td>
    <td>' . $row['photoshoot_name'] . '</td>
    <td> 
    <img style ="display:block;width:100px;height:100px;object-fit:cover" src="' . $rootHtml . '/uploads/photoshoot/' . $row['image'] . '"></imgs>
    </td>
        <td class="text-right">
        <a href="./?photoshoot&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    if (isset($_POST['insert-photoshoot'])) {
        $categoryName = $_POST['photoshoot-name'];
        $categoryImage = $_FILES['photoshoot-image'];
        $productId = $_POST['product-id'];
        $processedImage = $object->processImage('photoshoot-image', 0, 'photoshoot');
        // echo $processedImage;
        if (!$processedImage) {
            echo '<script type="text/javascript"> window.location.href = "./?photoshoot&msg"</script>';
            exit();
        } else {
            $result = $object->insertPhotoshoot($productId, $categoryName, $processedImage);
            if ($result) {
                $_SESSION['msg'] = "Photoshoot Inserted!";
                echo '<script type="text/javascript"> window.location.href = "./?photoshoot&msg"</script>';
                exit();
            }
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        if ($object->deletePhotoshoot($id)) {
            $_SESSION['msg'] = "Photoshoot Deleted!";
            echo '<script type="text/javascript"> window.location.href = "./?photoshoot&msg"</script>';
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
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h4 class="card-title">Add Photoshoot</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <form method="post" action="./?photoshoot" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="exampleEmail" class="bmd-label-floating">Photoshoot Name</label>
                                <input type="text" class="form-control" id="category" name="photoshoot-name" required>
                            </div>
                            <div class="form-group ">
                                <label for="location" class="bmd-label-floating">Product Id</label>
                                <input type="number" class="form-control" id="location" name="product-id" required="true" />
                            </div>
                            <div class="form-group">
                                <h4 class="title">Upload Image</h4>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo $htmlPath; ?>/assets/img/image_placeholder.jpg" alt="Upload image">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="photoshoot-image" required />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="card-footer">
                                    <button type="submit" name="insert-photoshoot" class="btn btn-fill btn-rose">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">photo_camera</i>
                        </div>
                        <h4 class="card-title">Photoshoot</h4>
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
                                        <th>Photoshoot Name</th>
                                        <th>Image</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Photoshoot Name</th>
                                        <th>Image</th>
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