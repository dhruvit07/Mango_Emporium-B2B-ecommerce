<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
define("MYSITE", true);
if (!function_exists("Autoloader")) {
    require $phpPath . 'includes/class-autoload.inc.php';
}
require $phpPath . 'includes/product.inc.php';
include_once $phpPath . "templates/header.php";
?>
<style>

</style>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="<?php echo $htmlPath; ?>/public/">Home</a></li>
                    <li class="active">Product</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->


</body>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="<?php echo $htmlPath; ?>/uploads/products/<?php echo $productPrimaryImage; ?>" alt="">
                    </div>

                    <?php
                    foreach ($productOtherImages as $img) {
                        echo '<div class="product-preview">
                       <img src="' . $htmlPath . '/uploads/products/' . $img . '" alt="">
                   </div>';
                    }
                    ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="<?php echo $htmlPath; ?>/uploads/products/<?php echo $productPrimaryImage; ?>" alt="">
                    </div>

                    <?php
                    foreach ($productOtherImages as $img) {
                        echo '<div class="product-preview">
                       <img src="' . $htmlPath . '/uploads/products/' . $img . '" alt="">
                   </div>';
                    }
                    ?>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $productName ?></h2>

                    <div>
                        <h3 class="product-price">₹<?php echo $productPrice ?> <del class="product-old-price">₹<?php echo $productPrice ?></del></h3>
                        <span class="product-available">Contact for Inquiry</span>
                    </div>
                    <p style="font-size: 20px;">
                        <?php echo $productDescription ?>
                    </p>


                    <div class="add-to-cart">
                        <div id="button">
                            <div id="translate"></div>
                            <button type="button" class="button inquiry">Inquiry</button>
                        </div>
                        <div id="button">
                            <div id="translate"></div>
                            <button type="button" class="button">Contact Info</button>
                        </div>
                    </div>



                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="<?php echo $htmlPath ?>/public/category/?id=<?php echo $productCategory['id'] ?>"><?php echo $productCategory['category_name'] ?></a></li>
                        <li><a href="<?php echo $htmlPath ?>/public/store/?category=<?php echo $productCategory['id'] ?>&sub=<?php echo $productSubCategory['id'] ?>"><?php echo $productSubCategory['sub_category_name'] ?></a></li>
                    </ul>
                    <ul class="product-links">
                        <li>Location:</li>
                        <li><a href=""><?php echo $productLocation['location'] ?></a></li>
                    </ul>
                    <ul class="product-links">
                        <li>Business Type:</li>
                        <li><a href=""><?php echo $productSellerType['seller_type'] ?></a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <!-- <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li> -->
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo $productDescription ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo $productDescription ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <!-- <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>4.5</span>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Your Name">
                                            <input class="input" type="email" placeholder="Your Email">
                                            <textarea class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Similar Product From Seller</h3>
                </div>
            </div>

            <!-- product -->
            <?php echo $similarProductHTML; ?>
            <!-- /product -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

<!-- MODAL -->
<div id="open-modal" class="modal-window modal-window-close">
    <div>
        <a title="Close" class="modal-close">
            <svg version="1.1" height="20px" width="20px" xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                <g>
                    <path d="M962.2,13.3l24.4,24.4L34.4,989.8L10,965.5L962.2,13.3z" />
                    <path d="M39.2,10L990,960.9L960.9,990L10.1,39.1L39.2,10L39.2,10z" />
                </g>
            </svg>
        </a>
        <form action="<?php echo $htmlPath; ?>/src/process/inquiry.process.php" method="post">
            <div class="input-group">
                <i class='bx bx-mail-send'></i>
                <label for="email"> Email*</label>
                <input type="email" name="email" <?php echo $formFillUp == "" ? "" : 'readonly="readonly"'; ?> id="email" value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_email']; ?>" placeholder="Email">
                <small>Content</small>
            </div>
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <label for="number"> Number*</label>
                <input type="name" name="number" id="number" <?php echo $formFillUp == "" ? "" :  'readonly="readonly"'; ?> value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_contact'] ?>" placeholder="Number">
                <small>Content</small>
            </div>
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <label for="description"> Describe in Few Words*</label>
                <textarea class="form-control" id="description" name="description" placeholder=" Please include product name, order quantity, usage, special requests if any in your inquiry." rows="3"></textarea>
                <small>Content</small>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" id="product-id" placeholder="Number">
            <div class="input-group">
                <input type="submit" name="product-inquiry" id="submit-button" style="background-color:var(--primary-color); height:50px; ">
            </div>
        </form>

    </div>
</div>
<!-- MODAL -->

<!-- FOOTER -->
<?php
include_once $phpPath . "templates/footer.php";

include_once $phpPath . "templates/loadJS.php";
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script>
    $(document).ready(function() {
        $(document).on('click', ".inquiry", function() {
            $('.modal-window').removeClass('modal-window-close');
            $('.modal-window').addClass('modal-window-open');

        });
        $(document).on('click', ".modal-close", function() {
            $('.modal-window').removeClass('modal-window-open');
            $('.modal-window').addClass('modal-window-close');

        });

    });
</script>

</html>