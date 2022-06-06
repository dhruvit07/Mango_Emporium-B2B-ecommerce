<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location: ../e404.html");
}
define("MYSITE", true);
require '../../includes/class-autoload.inc.php';
$user = new user();
$product = new product();
$row = $user->getUser($_SESSION['u_id']);
// echo $_GET['id'];
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
        body {
            /* margin-top: 20px; */
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }
         .container::before{
            display: table !important;
            content: " ";
        }
        .container::after{
            display: table !important;
            content: " ";
            clear:both;
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
                                    <h4><?php echo $row['u_name']; ?></h4>
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <!-- <button class="btn btn-primary">Follow</button> -->
                                    <!-- <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg><a href="./?profile">Profile</a></h6>
                                <span class="text-secondary">Profile</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg><a href="./?addproduct">Add Product</a></h6>
                                <span class="text-secondary">Product</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>Github</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">bootdey</span>
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
                                        <?php echo $row['u_name']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['u_email']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['u_contact']; ?>
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
                                    echo ' <div class="alert alert-success alert-dismissible  show" role="alert">
                                    <strong>' . $_SESSION["msg"] . '</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>';
                                    unset($_SESSION['msg']);
                                }
                                ?>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Product</h3>
                                </div>
                                <hr>
                                <div class="panel-body">

                                    <form action="../../includes/product-process.inc.php" id="form" method="post" enctype="multipart/form-data">
                                
                                        
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
                                                        <label for="name" class="col-sm-6 control-label"> Product Quantity</label>
                                                        <label for="tech" class="col-sm-6 control-label">Location</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" name="quantity" id="name" placeholder="Product Quantity" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="location" id="location" required>
                                                                <option value="">Location</option>
                                                                <?php
                                                                $result = $product->getLocation();
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo '<option value=' . $row['id'] . '>' . $row['location'] . '</option>';
                                                                }

                                                                ?>
                                                            </select>
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
                                                                <?php
                                                                $result = $product->getCategory();
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo '<option value=' . $row['id'] . '>' . $row['category_name'] . '</option>';
                                                                }

                                                                ?>

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
                                                        <label for="tech" class="col-sm-12 control-label">Seller Type</label>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="seller_type" name="seller_type" required>
                                                                <option value="">Seller Type</option>
                                                                <?php
                                                                $result = $product->getSellerType();
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo '<option value=' . $row['id'] . '>' . $row['seller_type'] . '</option>';
                                                                }

                                                                ?>

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
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div> <!-- form-group // -->
                                    </form>

                                </div><!-- panel-body // -->


                            </div>
                        </div>




                    </div>

                <?php } ?>
            </div>

        </div>
    </div>
</body>
<?php include "../../templates/footer.php"; ?>
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
                url: '../../includes/ajax.inc.php',
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