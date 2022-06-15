<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$object = new _product();
$HTML = "";
if (isset($_GET['location'])) {
    $result = $object->getLocation();
    while ($row = $result->fetch_assoc()) {
        $HTML .= '<tr>
    <td>' . $row['location'] . '</td>
        <td class="text-right">
        <a href="./?location&delete=' . $row['id'] . '" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
        </td>
    </tr>';
    }

    if (isset($_POST['insert-location'])) {
        $locationName = $_POST['location-name'];
        $result = $object->insertLocation($locationName);
        if ($result) {
            $_SESSION['msg'] = "Location Inserted!";
            echo '<script type="text/javascript"> window.location.href = "./?location&msg"</script>';
            exit();
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        if ($object->deleteLocation($id)) {
            $_SESSION['msg'] = "Loaction Deleted!";
            echo '<script type="text/javascript"> window.location.href = "./?location&msg"</script>';
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
                        <h4 class="card-title">Add Location</h4>
                    </div>
                    <div class="card-body col-md-12">
                        <form method="post" action="./?location" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="location" class="bmd-label-floating">Location Name</label>
                                <input type="text" class="form-control" id="location" name="location-name" required>
                            </div>
                            <div class="form-group ">
                                <div class="card-footer">
                                    <button type="submit" name="insert-location" class="btn btn-fill btn-rose">Submit</button>
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
                            <i class="material-icons">pin_drop</i>
                        </div>
                        <h4 class="card-title">Location</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="disabled-sorting text-right">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
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