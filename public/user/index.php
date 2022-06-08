<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location: ../e404.html");
}
define("MYSITE", true);
require '../../includes/class-autoload.inc.php';
require '../../includes/user-product.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css" /> -->

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../../resources/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../../resources/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../../resources/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../../resources/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" />

    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
    <style>
        a,
        a:hover,
        a:active {
            text-decoration: none;
            color: inherit;
            font-weight: bold;
        }

        a:hover,
        a:active {
            color: var(--primary-color);
            /* background-color: #1a202c; */
        }


        /* .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--grey);
        } */


        body {
            /* margin-top: 20px; */
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .container::before {
            display: table !important;
            content: " ";
        }

        .container::after {
            display: table !important;
            content: " ";
            clear: both;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
                <?php if (isset($_SESSION['loggedin'])) { ?>
                    <li><a href="../public/user/?profile"><i class="fa fa-user-o"></i> My Account</a></li>
                <?php } else { ?>
                    <li><a href="../public/auth/?register"><i class="fa fa-user-o"></i> Join here</a></li>
                    <li><a href="../public/auth/"><i class="fa fa-user-o"></i> Sign in</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container">

        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4><?php echo $user['u_name']; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $user['u_contact']; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $user['u_email']; ?></p>
                                    <!-- <button class="btn btn-primary">Follow</button> -->
                                    <!-- <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <img src="../../resources/img/profile_icon.png" class="feather feather-globe mr-2 icon-inline" width="35" height="34"></img>
                                    <a href="./?profile">Profile</a>
                                </h6>
                                <span class="text-secondary">Profile</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <img src="../../resources/img/product_icon.png" class="feather feather-globe mr-2 icon-inline" width="35" height="35"></img>
                                    <a href="./?addproduct">Add Product</a>
                                </h6>
                                <span class="text-secondary">Product</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <img src="../../resources/img/myproduct_icon.png" class="feather feather-globe mr-2 icon-inline" width="35" height="35"></img>
                                    <a href="./?viewproduct">My Product</a>
                                </h6>
                                <span class="text-secondary">My Product</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <img src="../../resources/img/logout_icon.png" class="feather feather-globe mr-2 icon-inline" width="35" height="35"></img>
                                    <a href="../../src/process/auth/logout.process.php">Logout</a>
                                </h6>
                                <span class="text-secondary">Logout</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <?php if (isset($_GET['profile'])) { ?>

                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Profile</h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">
                                            Name
                                        </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user['u_name']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user['u_email']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user['u_contact']; ?>
                                    </div>
                                </div>
                                <hr>


                                <!-- <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div> -->
                            </div>
                        </div>




                    </div>
                <?php } else if (isset($_GET['addproduct'])) { ?>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <?php
                                if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
                                    echo msg($_SESSION['msg']);
                                    unset($_SESSION['msg']);
                                }
                                ?>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Product</h3>
                                </div>
                                <hr>
                                <div class="panel-body">

                                    <form action="../../src/process/add-product.process.php" id="form" method="post" enctype="multipart/form-data">


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <label for="name" class="col-sm-6 control-label">Product Name</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- form-group // -->
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <label for="tech" class="col-sm-6 control-label">Product Price</label>
                                                    <label for="name" class="col-sm-6 control-label"> Product Quantity</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control" name="price" id="name" placeholder="Product Quantity" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control" name="quantity" id="name" placeholder="Product Quantity" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- form-group // -->
                                        <div class="form-group">
                                            <!-- <div class="row"> -->
                                            <div class="col-sm-12">

                                                <div class="row">
                                                    <label for="tech" class="col-sm-6 control-label">Category</label>
                                                    <label for="tech" class="col-sm-6 control-label">Sub Category</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="category" name="category" required>
                                                            <option value="">Category</option>
                                                            <?php echo $category_html; ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="sub_category" id="sub_category" required>
                                                            <option value="">Sub Category</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="row"> -->
                                            <div class="col-sm-12">

                                                <div class="row">
                                                    <label for="tech" class="col-sm-6 control-label">Seller Type</label>
                                                    <label for="tech" class="col-sm-6 control-label">Location</label>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="seller_type" name="seller_type" required>
                                                            <option value="">Seller Type</option>
                                                            <?php echo $sellerType_html; ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="location" id="location" required>
                                                            <option value="">Location</option>
                                                            <?php echo $location_html; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="about" class="col-sm-6 control-label">Product Description</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" rows="5" name="description" placeholder="Write Description Here." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-6 control-label">Images</label>
                                            <div class="col-sm-6">
                                                <label class="control-label small" for="file_img">Primary Image (jpg/png):</label>
                                                <input type="file" name="file_img" accept=".png,image/jpg, image/jpeg" required>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <label class="control-label small col-sm-6" for="file_img">Other Images(Upto 3):</label>
                                                </div>
                                                <div class="row">
                                                    <input type="file" class="col-sm-6" id="img_archive" name="img_archive[]" multiple="multiple" accept=".png,image/jpg, image/jpeg" required>

                                                </div>
                                            </div>
                                        </div> <!-- form-group // -->
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-12">
                                                <button type="submit" name="submit" class="btn btn-primary color-primary">Submit</button>
                                            </div>
                                        </div> <!-- form-group // -->
                                    </form>

                                </div><!-- panel-body // -->


                            </div>
                        </div>




                    </div>

                <?php } else if (isset($_GET['viewproduct'])) { ?>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body ">

                                <div class="container table-responsive py-5">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Quantity</th>
                                                <th scope="col" class="text-center">Category</th>
                                                <th scope="col" class="text-center">location </th>
                                                <th scope="col" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $userProducts_html; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</body>
<?php
include "../../templates/footer.php";
include "../../templates/loadJS.php";
?>
<script src="../../resources/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var bool;
        $("#img_archive").on("change", function() {
            if ($("#img_archive")[0].files.length > 3 || $("#img_archive")[0].files.length < 1) {
                alert("You can select 1 to 3 images");
                $("#img_archive").val("");
                bool = true;
            } else {
                bool = false;
            }
        });
        $("#category").on("change", function() {
            var id = $("#category").val();
            // console.log(id);
            $.ajax({
                url: '../../src/process/ajax.process.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                    // console.log(result);
                    $("#sub_category").html(result);
                }
            });
        });




        $('#form').submit(function(e) {
            if (bool) {
                e.preventDefault();
            }
        });

    });
</script>


</html>