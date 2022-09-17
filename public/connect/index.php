<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
session_start();

define("MYSITE", true);
define("HOME", true);

include_once $phpPath . "templates/header.php";
$formFillUp = "";
if (isset($_SESSION['u_id'])) {
    $userObj = new user();
    $formFillUp = $userObj->getUser($_SESSION['u_id']);
}

?>
<style>
    #header {
        height: 400px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6),
                rgba(114, 114, 114, 0.2)), url(../../resources/img/search-background.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #000000;
        background-position: center;
    }

    @media only screen and (max-width: 991px) {
        #header {
            height: auto;
        }
    }

    #img-logo {
        height: 250px;
        width: 450px;
    }

    body {
        background-color: #eee;
    }

    .card {
        padding: 30px 60px;
        margin: 30px auto;
        text-align: left;
        background-color: #FFFFFF;
        box-shadow: 0px 0px 29px -12px rgba(0, 0, 0, 0.75);
    }

    .p {
        padding: 10px;
    }

    body {
        color: #fff
    }

    .right_conatct_social_icon {
        background: linear-gradient(to top right, var(--primary-color) -5%, var(--secondary-color) 100%);
    }

    .contact_us {
        background-color: #f1f1f1;
        padding: 20px 0px;
        margin: 0 auto;
    }

    .contact_inner {
        background-color: #fff;
        position: relative;
        box-shadow: 20px 22px 44px #cccc;
        border-radius: 25px;
    }

    .contact_field {
        padding: 60px 340px 90px 100px;
    }

    .right_conatct_social_icon {
        height: 100%;
    }

    .contact_field h3 {
        color: #000;
        font-size: 40px;
        letter-spacing: 1px;
        font-weight: 600;
        margin-bottom: 10px
    }

    .contact_field p {
        color: #000;
        font-size: 13px;
        font-weight: 400;
        letter-spacing: 1px;
        margin-bottom: 35px;
    }

    .contact_field .form-control {
        border-radius: 0px;
        border: none;
        border-bottom: 1px solid #ccc;
    }

    .contact_field .form-control:focus {
        box-shadow: none;
        outline: none;
        border-bottom: 2px solid #1325e8;
    }

    .contact_field .form-control::placeholder {
        font-size: 13px;
        letter-spacing: 1px;
    }

    .contact_info_sec {
        position: absolute;
        background-color: #2d2d2d;
        right: 1px;
        top: 18%;
        height: 340px;
        width: 340px;
        padding: 40px;
        border-radius: 25px 0 0 25px;
    }

    .contact_info_sec h4 {
        letter-spacing: 1px;
        padding-bottom: 15px;
    }

    .info_single {
        margin: 30px 0px;
    }

    .info_single i {
        margin-right: 15px;
    }

    .info_single span {
        font-size: 14px;
        letter-spacing: 1px;
    }

    button.contact_form_submit {
        background: linear-gradient(to top right, var(--primary-color) -5%, var(--secondary-color) 100%);
        border: none;
        color: var(--dark2);
        padding: 10px 15px;
        width: 50%;
        margin-top: 25px;
        border-radius: 35px;
        cursor: pointer;
        font-size: 14px;
        letter-spacing: 2px;
    }

    .socil_item_inner li {
        list-style: none;
    }

    .socil_item_inner li a {
        color: #fff;
        margin: 0px 15px;
        font-size: 14px;
    }

    .socil_item_inner {
        padding-bottom: 10px;
    }

    .map_sec {
        padding: 50px 0px;
    }

    .map_inner h4,
    .map_inner p {
        color: #000;
        text-align: center
    }

    .map_inner p {
        font-size: 13px;
    }

    .map_bind {
        margin-top: 50px;
        border-radius: 30px;
        overflow: hidden;
    }

    @media only screen and (max-width: 991px) {
        .contact_us {
            padding: 0px 0px;
        }

        .contact_us .container {
            padding: 0;
            margin: 0 auto;
        }

        .contact_field {
            padding: 60px 10px 90px 10px;
        }

        .contact_info_sec {
            position: relative;
            background-color: #2d2d2d;
            height: 340px;
            width: 100%;
            padding: 40px;
            border-radius: 0 0 25px 25px;
        }
    }
</style>

<!-- SECTION -->
<!-- container -->
<div class="container card" <?php if (isset($_GET['contact'])) {
                                echo 'style="background:#eee"';
                            } ?>>
    <?php if (isset($_GET['privacypolicy'])) {
        $obj = new extra();
        $data = $obj->getextra(1);
    ?>
        <h2><?php echo $data['name'] ?></h2>
        <p class="p"><?php echo $data['content'] ?></p>
    <?php } ?>
    <?php if (isset($_GET['termsandconditions'])) {
        $obj = new extra();
        $data = $obj->getextra(2);
    ?>
        <h2><?php echo $data['name'] ?></h2>
        <p class="p"><?php echo $data['content'] ?></p>
    <?php } ?>
    <?php if (isset($_GET['contact'])) {
    ?>
        <section class="contact_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="contact_inner">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="contact_form_inner">
                                        <div class="contact_field col-md-12">
                                            <h3>Inquiry</h3>
                                            <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                            <form action="<?php echo $htmlPath ?>/src/process/inquiry.process.php" method="post">
                                                <input type="email" class="form-control form-group" placeholder="email" />
                                                <input type="rel" class="form-control form-group" placeholder="number" />
                                                <textarea rows="4" class="form-control form-group" name="description" placeholder="Please include product name, order quantity, usage, special requests if any in your inquiry."></textarea>
                                                <button type="submit" name="direct-inquiry" class="contact_form_submit">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="right_conatct_social_icon d-flex align-items-end">
                                        <div class="socil_item_inner d-flex">
                                            <!-- <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact_info_sec">
                                <h4 style="color:white">Contact Info</h4>
                                <div class="d-flex info_single align-items-center">
                                    <i class="fas fa-headset"></i>
                                    <span style="color:white"><?php echo $contact['contact']; ?></span>
                                </div>
                                <div class="d-flex info_single align-items-center">
                                    <i class="fas fa-envelope-open-text"></i>
                                    <span style="color:white"><?php echo $contact['email']; ?></span>
                                </div>
                                <div class="d-flex info_single align-items-center">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <span style="color:white"><?php echo $contact['address']; ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="map_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="map_inner">
                            <h4>Find Us on Google Map</h4>
                            <p><?php echo $contact['address']; ?></p>
                            <div class="map_bind">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d59077.28829722196!2d73.16769610853585!3d22.265466312806787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1svadodara%20to!5e0!3m2!1sen!2sin!4v1655644623551!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php } ?>
</div>

<!-- SECTION -->

<?php
include_once $phpPath . "templates/form.php";
include_once $phpPath . "templates/footer.php";
include_once $phpPath . "templates/loadJS.php";
?>
<!-- jQuery Plugins -->

<script>

</script>

</body>

</html>