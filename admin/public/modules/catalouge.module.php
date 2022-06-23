<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$product_obj = new _product();
$object = new content();
$HTML = "";
if (isset($_GET['catalouge'])) {
    $result = $object->getCatalouge();
    while ($row = $result->fetch_assoc()) {
        $HTML .= '<tr>
    <td><a href="' . $htmlPath . '/public/?users&search=' . $row['u_id'] . '">' . $row['u_id'] . '</a></td>
    <td>' . $row['catalouge_name'] . '</td>
    <td> 
    <img style ="display:block;width:100px;height:100px;object-fit:cover" src="' . $rootHtml . '/uploads/catalouge/' . $row['image'] . '"></imgs>
    </td>
        <td class="text-right">
        <a href="./?catalouge&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    if (isset($_POST['insert-catalouge'])) {
        $categoryName = $_POST['catalouge-name'];
        $catId = $_POST['category-id'];
        $userId = $_POST['user-id'];
        $categoryImage = $_FILES['catalouge-image'];
        $processedImage = $object->processImage('catalouge-image', 0, 'catalouge');
        // echo $processedImage;
        if (!$processedImage) {
            echo '<script type="text/javascript"> window.location.href = "./?catalouge&msg"</script>';
            exit();
        } else {
            $result = $object->insertCatalouge($catId, $userId, $categoryName, $processedImage);
            if ($result) {
                $_SESSION['msg'] = "Catalouge Inserted!";
                echo '<script type="text/javascript"> window.location.href = "./?catalouge&msg"</script>';
                exit();
            }
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        if ($object->deleteCatalouge($id)) {
            $_SESSION['msg'] = "Catalouge Deleted!";
            echo '<script type="text/javascript"> window.location.href = "./?catalouge&msg"</script>';
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
                        <h4 class="card-title">Add Catalouge</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <form method="post" action="./?catalouge" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="category" class="bmd-label-floating">Catalouge Name</label>
                                <input type="text" class="form-control" id="category" name="catalouge-name" required>
                            </div>
                            <div class="form-group ">
                                <label for="id1" class="bmd-label-floating">Company Id</label>
                                <input type="number" class="form-control" id="id1" name="user-id" required>
                            </div>
                            <div class="form-group ">
                                <label for="id2" class="bmd-label-floating">Category Id</label>
                                <input type="number" class="form-control" id="id2" name="category-id" required>
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
                                            <input type="file" name="catalouge-image" required />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="card-footer">
                                    <button type="submit" name="insert-catalouge" class="btn btn-fill btn-rose">Submit</button>
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
                            <i class="material-icons">photo_album</i>
                        </div>
                        <h4 class="card-title">Catalouge</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Company Id</th>
                                        <th>Catalouge Name</th>
                                        <th>Image</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Company Id</th>
                                        <th>Catalouge Name</th>
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