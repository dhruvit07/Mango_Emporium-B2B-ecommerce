<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$object = new _product();
$HTML = "";
$Category = "";
$categoryHTML = "";
if (isset($_GET['subCategory'])) {
    $result = $object->getCategory();
    while ($row = $result->fetch_assoc()) {
        $categoryHTML .= '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
    }

    $result = $object->getSubCategory();
    while ($row = $result->fetch_assoc()) {
        $_row = $object->getProductCategory($row['category_id']);
        $HTML .= '<tr>
        <td>' . $_row['category_name'] . '</td>
        <td>' . $row['sub_category_name'] . '</td>
    <td> 
    <img style ="display:block;width:100px;height:100px;object-fit:cover" src="' . $rootHtml . '/uploads/category/' . $row['image'] . '"></imgs>
    </td>
        <td class="text-right">
        <a href="../../public/category?id=' . $row['id'] . '" target="_blank" class=" p-0 btn btn-link btn-info">
        <button class=" px-3 py-2 m-1 btn btn-info">View</button>
        </a>
        <a href="./?category&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    if (isset($_POST['insert-sub-category'])) {
        $categoryId = $_POST['category'];
        $categoryName = $_POST['sub-category-name'];
        $categoryImage = $_FILES['sub-category-image'];
        $processedImage = $object->processImage('sub-category-image', 0, 'category');
        if (!$processedImage) {
            echo '<script type="text/javascript"> window.location.href = "./?subCategory&msg"</script>';
            exit();
        } else {
            $result = $object->insertSubCategory(trim($categoryId), trim($categoryName), trim($processedImage));
            if ($result) {
                $_SESSION['msg'] = "Sub Category Inserted!";
                echo '<script type="text/javascript"> window.location.href = "./?subCategory&msg"</script>';
                exit();
            }
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        if ($object->deleteSubCategory($id)) {
            $_SESSION['msg'] = "Sub Category Deleted!";
            echo '<script type="text/javascript"> window.location.href = "./?category&msg"</script>';
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
                        <h4 class="card-title">Add Sub Category</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <form method="post" action="./?subCategory" enctype="multipart/form-data">
                            <div class="form-group ">
                                <select class="selectpicker" name="category" data-size="3" data-style="btn btn-primary btn-round" title="Single Select">
                                    <option disabled selected>Select Category</option>
                                    <?php echo $categoryHTML; ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="category" class="bmd-label-floating">Sub Category Name</label>
                                <input type="text" class="form-control" id="category" name="sub-category-name" required>
                            </div>
                            <div class="form-group">
                                <h4 class="title">Regular Image</h4>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo $htmlPath; ?>/assets/img/image_placeholder.jpg" alt="Upload image">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="sub-category-image" required />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="card-footer">
                                    <button type="submit" name="insert-sub-category" class="btn btn-fill btn-rose">Submit</button>
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
                            <i class="material-icons">arrow_downward</i>
                        </div>
                        <h4 class="card-title">Sub Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Image</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
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