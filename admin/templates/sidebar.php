<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="" class="simple-text logo-mini">
            ME
        </a>
        <a href="" class="simple-text logo-normal">
            Mango Emporium
        </a>
    </div>
    <div class="sidebar-wrapper">
        <!-- <div class="user">
                    <div class="photo">
                        <img src="../assets/img/faces/avatar.jpg" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <span>
                                Admin
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> My Profile </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> EP </span>
                                        <span class="sidebar-normal"> Edit Profile </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> Settings </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
        <ul class="nav">
            <li class="nav-item <?php echo $pageTitle == "Dashboard" ? "active" : "" ?> ">
                <a class="nav-link" href="<?php echo $htmlPath ?>/public/">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item <?php echo $pageTitle == "Category" || $pageTitle == "Sub Category" ||
                                    $pageTitle == "Location" || $pageTitle == "Business Type" ? "active" : "" ?>">
                <a class="nav-link" data-toggle="collapse" href="#categories">
                    <i class="material-icons">category</i>
                    <p> Categories
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="categories">
                    <ul class="nav">
                        <li class="nav-item <?php echo strpos($url, 'category') ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?category">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal"> Categories </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo strpos($url, 'subCategory') ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?subCategory">
                                <span class="sidebar-mini"> SC </span>
                                <span class="sidebar-normal"> Sub Category </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo strpos($url, 'location') ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?location">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> Locations </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo strpos($url, 'sellerType') ? "active" : "" ?>">
                            <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?sellerType">
                                <span class="sidebar-mini"> BT </span>
                                <span class="sidebar-normal"> Business Type </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo strpos($url, 'product') ? "active" : "" ?>">
                <a class="nav-link" data-toggle="collapse" href="#products">
                    <i class="material-icons">shopping_cart</i>
                    <p> Products
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="products">
                    <ul class="nav">
                        <li class="nav-item <?php echo strpos($url, 'product=1') ? "active" : "" ?>">
                            <a class="nav-link " data-toggle="collapse" href="#product-1">
                                <span class="sidebar-mini"> BVP </span>
                                <span class="sidebar-normal"> Business Volume Products
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse" id="product-1">
                                <ul class="nav">
                                    <li class="nav-item <?php echo strpos($url, 'product=1') && !strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=1">
                                            <span class="sidebar-mini"> PP </span>
                                            <span class="sidebar-normal"> Pending Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo strpos($url, 'product=1') && strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=1&approved">
                                            <span class="sidebar-mini"> AP </span>
                                            <span class="sidebar-normal"> Approved Product </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?php echo strpos($url, 'product=2') ? "active" : "" ?>">
                            <a class="nav-link " data-toggle="collapse" href="#product-2">
                                <span class="sidebar-mini"> DP </span>
                                <span class="sidebar-normal"> Distribution Products
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse" id="product-2">
                                <ul class="nav">
                                    <li class="nav-item <?php echo strpos($url, 'product=2') && !strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=2">
                                            <span class="sidebar-mini"> PP </span>
                                            <span class="sidebar-normal"> Pending Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo strpos($url, 'product=2') && strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=2&approved">
                                            <span class="sidebar-mini"> AP </span>
                                            <span class="sidebar-normal"> Approved Product </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?php echo strpos($url, 'product=3') ? "active" : "" ?>">
                            <a class="nav-link " data-toggle="collapse" href="#product-3">
                                <span class="sidebar-mini"> FP </span>
                                <span class="sidebar-normal"> Franchise Products
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse" id="product-3">
                                <ul class="nav">
                                    <li class="nav-item <?php echo strpos($url, 'product=3') && !strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=3">
                                            <span class="sidebar-mini"> PP </span>
                                            <span class="sidebar-normal"> Pending Product </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo strpos($url, 'product=3') && strpos($url, 'approved') ? "active" : "" ?>">
                                        <a class="nav-link" href="<?php echo $htmlPath; ?>/public/?product=3&approved">
                                            <span class="sidebar-mini"> AP </span>
                                            <span class="sidebar-normal"> Approved Product </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?php echo $pageTitle == "Users" ? "active" : "" ?> ">
                <a class="nav-link" href="<?php echo $htmlPath ?>/public/?users">
                    <i class="material-icons">person</i>
                    <p> Users </p>
                </a>
            </li>
            <li class="nav-item <?php echo $pageTitle == "Content" ? "active" : "" ?> ">
                <a class="nav-link" href="<?php echo $htmlPath ?>/public/?content">
                    <i class="material-icons">subscriptions</i>
                    <p> Content </p>
                </a>
            </li>
            <li class="nav-item <?php echo $pageTitle == "Inquiry" ? "active" : "" ?> ">
                <a class="nav-link" href="<?php echo $htmlPath ?>/public/?inquiry">
                    <i class="material-icons">info</i>
                    <p> Product Inquiries </p>
                </a>
            </li>
            <li class="nav-item <?php echo $pageTitle == "Direct Inquiry" ? "active" : "" ?> ">
                <a class="nav-link" href="<?php echo $htmlPath ?>/public/?direct-inquiry">
                    <i class="material-icons">info</i>
                    <p> Direct Inquiries </p>
                </a>
            </li>

        </ul>
    </div>
</div>