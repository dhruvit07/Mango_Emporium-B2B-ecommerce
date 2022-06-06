<?php
session_start();
unset($_SESSION['loggedin']);
if (isset($_SESSION['loggedin'])) {
  echo '<script>window.location.href="index.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title></title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="../../resources/css/slick.css" />
  <link type="text/css" rel="stylesheet" href="../../resources/css/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="../../resources/css/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="../../resources/css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="../../resources/css/style.css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
  </style>
</head>

<body>
  <!-- HEADER -->

  <!-- /HEADER -->

  <!-- NAVIGATION -->

  <!-- /NAVIGATION -->

  <!-- BREADCRUMB -->

  <!-- container -->
  <!-- <div class="container"> -->
  <!-- row -->
  <div id="_container" class="_container">
    <!-- _form SECTION -->
    <div class="_row">
      <!-- SIGN UP -->
      <div class="_col align-items-center flex-_col sign-up">
      <?php
          if (isset($_GET['error_r']) && isset($_SESSION['error'])) {
            echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>'.$_SESSION["error"].'</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="_form-wrapper align-items-center">
          <form action="../../includes/auth/register-auth.inc.php" id="register" method="post">
            <div class="_form sign-up">
              <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="name" name="name" id="name" placeholder="Name">
                <small>Content</small>
              </div>
              <div class="input-group">
                <i class='bx bx-mail-send'></i>
                <input type="email" name="email" id="email" placeholder="Email">
                <small>Content</small>
              </div>
              <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="name" name="number" id="number" placeholder="Number">
                <small>Content</small>
              </div>
              <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="password" id="password" placeholder="Password">
                <small>Content</small>
              </div>
              <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password">
                <small>Content</small>
              </div>
              <button type="submit" name="submit">
                Sign up
              </button>
              <div class="google-btn">
                <div class="google-icon-wrapper">
                  <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                </div>
                <p class="btn-_text"><b>Sign up with google</b></p>
              </div>
              <p>
                <span>
                  Already have an account?
                </span>
                <b onclick="toggle()" class="pointer">
                  Sign in here
                </b>
              </p>
            </div>
          </form>

        </div>

      </div>

      <!-- END SIGN UP -->
      <!-- SIGN IN -->
      <div class="_col align-items-center flex-_col sign-in">

      <?php
          if (isset($_GET['error']) && isset($_SESSION['error'])) {
            echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>'.$_SESSION["error"].'</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
           unset($_SESSION['error']);
        }
        ?>
        <div class="_form-wrapper align-items-center">
        
          <form action="../../includes/auth/login-auth.inc.php" id="login" method="post">
            <div class="_form sign-in">
              <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="email" name="email" id="_email" placeholder="Email">
              </div>
              <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="password" id="_password" placeholder="Password">
              </div>
              <button type="submit" id="_submit" name="submit">
                Sign in
              </button>
              <div class="google-btn">
                <div class="google-icon-wrapper">
                  <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                </div>
                <p class="btn-_text"><b>Sign in with google</b></p>
              </div>
              <p>
                <b>
                  <a href="./forgot.php">
                  Forgot password?
                  </a>
                </b>
              </p>
              <p>
                <span>
                  Don't have an account?
                </span>
                <b onclick="toggle()" class="pointer">
                  Sign up here
                </b>
              </p>
            </div>
        </div>
        <div class="_form-wrapper">
          </form>

        </div>
      </div>
      <!-- END SIGN IN -->
    </div>
    <!-- END _form SECTION -->
    <!-- CONTENT SECTION -->
    <div class="_row content-_row">
      <!-- SIGN IN CONTENT -->
      <div class="_col align-items-center flex-_col">
        <div class="_text sign-in">
          <h2>
            Welcome
          </h2>

        </div>
        <div class="img sign-in">

        </div>
      </div>
      <!-- END SIGN IN CONTENT -->
      <!-- SIGN UP CONTENT -->
      <div class="_col align-items-center flex-_col">
        <div class="img sign-up">

        </div>
        <div class="_text sign-up">
          <h2>
            Join with us
          </h2>

        </div>
      </div>
      <!-- END SIGN UP CONTENT -->
    </div>
    <!-- END CONTENT SECTION -->
  </div>
  <!-- /row -->
  <!-- </div> -->
  <!-- /container -->

  <!-- SECTION -->

  <!-- /SECTION -->

  <!-- NEWSLETTER -->

  <!-- /NEWSLETTER -->

  <!-- FOOTER -->
  <footer id="footer">
    <!-- top footer -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">About Us</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
              <ul class="footer-links">
                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Categories</h3>
              <ul class="footer-links">
                <li><a href="#">Hot deals</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Cameras</a></li>
                <li><a href="#">Accessories</a></li>
              </ul>
            </div>
          </div>

          <div class="clearfix visible-xs"></div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Information</h3>
              <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Orders and Returns</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Service</h3>
              <ul class="footer-links">
                <li><a href="#">My Account</a></li>
                <li><a href="#">View Cart</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Track My Order</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="footer-payments">
              <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
              <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
              <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
            </ul>
            <span class="copyright">
              <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
            </span>


          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /bottom footer -->
  </footer>
  <!-- /FOOTER -->

  <!-- jQuery Plugins -->
  <script src="../../resources/js/jquery.min.js"></script>
  <script src="../../resources/js/bootstrap.min.js"></script>
  <script src="../../resources/js/slick.min.js"></script>
  <script src="../../resources/js/nouislider.min.js"></script>
  <script src="../../resources/js/jquery.zoom.min.js"></script>
  <script src="../../resources/js/main.js"></script>
  <script src="../../resources/js/main.js.js"></script>

</body>
<script>
  <?php
if(isset($_GET["register"]))
{
  ?>
  $(document).ready(function() {
      timeout("sign-up");
  });
  <?php
}
else{
?>
$(document).ready(function() {
      timeout("sign-in");
  });
<?php
}
?>
</script>

</html>