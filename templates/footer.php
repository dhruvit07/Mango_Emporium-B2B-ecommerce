<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
if (!defined("MYSITE")) {
	header("location: ../public/404");
}
if (!function_exists("Autoloader")) {
	require $phpPath . 'includes/class-autoload.inc.php';
}

$product_obj = new product();
$contact = $product_obj->getContact();
$result = $product_obj->getCategory();
$footerCategoryHTML = "";
while ($row = $result->fetch_assoc()) {
	$footerCategoryHTML .= '<li><a href="' . $htmlPath . '/public/category/?id=' . $row['id'] . '">' . $row['category_name'] . '</a></li>';
}
?>


<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container" style="padding-left: 50px; width: 100%;">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6 ">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p><?php echo $contact['description']; ?></p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i><?php echo $contact['address']; ?></a></li>
							<li><a href="#"><i class="fa fa-phone"></i><?php echo $contact['contact']; ?></a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i><?php echo $contact['email']; ?></a></li>
						</ul>
					</div>
				</div>


				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<?php echo $footerCategoryHTML ?>
						</ul>
					</div>
				</div>

				<!-- <div class="clearfix visible-xs"></div> -->
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<?php if (!isset($_SESSION['u_id'])) {
								echo '<li><a href="' . $htmlPath . '/public/auth?register">Register</a></li>
								<li><a href="' . $htmlPath . '/public/auth">Login</a></li>';
							} else
								echo '<li><a href="' . $htmlPath . '/public/user/?profile">My Account</a></li>';
							?>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms & Conditions</a></li>
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
						<a target="_blank" href="https://github.com/dhruvit07">Created By Dhruvit</a>
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