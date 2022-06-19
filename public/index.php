<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
session_start();

define("MYSITE", true);
define("HOME", true);

include_once $phpPath . "templates/header.php";
require $phpPath . 'src/process/index.process.php';
?>
<style>
	#header {
		height: 400px;
		background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6),
				rgba(114, 114, 114, 0.2)), url(../resources/img/search-background.png);
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

	.contact-box {
		width: clamp(100px, 90%, 1000px);
		margin: 0px auto;
		display: flex;
		flex-wrap: wrap;
	}

	.contact-links,
	.contact-form-wrapper {
		width: 50%;
		padding: 8% 5% 10% 5%;
	}


	.contact-links {
		background-color: var(--primary-color);
		background:
			radial-gradient(circle at 55% 92%, #ff9400 0 12%, transparent 12.2%),
			radial-gradient(circle at 94% 72%, #ffa100 0 10%, transparent 10.2%),
			radial-gradient(circle at 20% max(78%, 350px), #b9cb14 0 7%, transparent 7.2%),
			radial-gradient(circle at 0% 0%, #ffbd00 0 40%, transparent 40.2%),
			#ffcc00;
		border-radius: 10px 0 0 10px;
	}

	.contact-form-wrapper {
		background-color: #ffffff8f;
		border-radius: 0 10px 10px 0;
	}

	@media only screen and (max-width: 800px) {

		.contact-links,
		.contact-form-wrapper {
			width: 100%;
		}

		.contact-links {
			border-radius: 10px 10px 0 0;
		}

		.contact-form-wrapper {
			border-radius: 0 0 10px 10px;
		}
	}

	@media only screen and (max-width: 400px) {
		.contact-box {
			width: 95%;
			margin: 8% 5%;
		}
	}

	h2 {
		text-align: center;
		transform: scale(.95, 1);
	}

	.links {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		padding-top: 50px;
	}

	.link {
		margin: 10px;
		cursor: pointer;
	}

	img {
		width: 45px;
		height: 45px;
		transition: 0.2s;
		user-select: none;
	}

	.form-item {
		position: relative;
	}

	label,
	input,
	textarea {
		font-family: 'Poppins', sans-serif;
	}

	input,
	textarea {
		width: 100%;
		outline: none;
		border: 1px solid #ccc;
		margin-bottom: 20px;
		padding: 12px;
		font-size: clamp(15px, 1.5vw, 18px);
	}

	.contact-box input,
	.contact-box textarea {
		border-radius: 4px;

	}

	input:focus+label,
	input:valid+label,
	textarea:focus+label,
	textarea:valid+label {
		font-size: clamp(13px, 1.3vw, 16px);
		color: #777;
		top: -20px;
		transition: all .225s ease;
	}

	.submit-btn {
		background-color: #fd917e;
		filter: drop-shadow(2px 2px 3px #0003);
		color: #fff;
		font-family: "Poppins", sans-serif;
		font-size: clamp(16px, 1.6vw, 18px);
		display: block;
		padding: 12px 20px;
		margin: 2px auto;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		user-select: none;
		transition: 0.2s;
	}

	.submit-btn:hover {
		transform: scale(1.1, 1.1);
	}

	.submit-btn:active {
		transform: scale(1.1, 1.1);
		filter: sepia(0.5);
	}

	@media only screen and (max-width: 800px) {
		h2 {
			font-size: clamp(40px, 10vw, 60px);
		}
	}

	@media only screen and (max-width: 400px) {
		h2 {
			font-size: clamp(30px, 12vw, 60px);
		}

		.links {
			padding-top: 30px;
		}

		img {
			width: 38px;
			height: 38px;
		}
	}

	.card {
		padding: 10px;
	}

	.card-box {
		padding: 10px;
		box-shadow: 0 0px 10px rgba(0, 0, 0, .2);
		background: #f4f4f4;
	}

	.card-box:hover {
		box-shadow: 0 0px 50px rgba(0, 0, 0, .5);
	}

	.card-body {
		margin: 10px;
	}

	hr {
		margin: 0;
		border-color: #bbbbbb;
	}

	.main-img img {
		border: 2px solid #ddd;
		border-radius: 2px;
		width: 100%;
		height: 150px;
		object-fit: cover;
		margin: 10px 0px;
	}

	.card-details {
		display: inline;
	}

	.card-details p {
		width: 49%;
		display: inline-block;
		margin-bottom: 2px;
	}

	@media only screen and (max-width: 767px) {
		.card-details p {
			width: 45%;
		}
	}

	p.left {
		text-align: left;
	}

	p.right {
		text-align: right;
	}

	br {
		padding: 10px;
	}
</style>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<?php
		if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
			echo ' <div class="alert alert-danger alert-dismissible  show" role="alert">
            <strong class="text-center">' . $_SESSION["msg"] . '</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
			unset($_SESSION['msg']);
		}
		?>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Franchise</h3>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php echo $homePageFranchiseHTML; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- SECTION -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Business Volume</h3>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php echo $homePageBusinessVolumeHTML; ?>
								</div>
							</div>
							<!-- tab -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Business to Distribution</h3>
				</div>
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php echo $homePageDistributionHTML; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- SECTION -->
<!-- SECTION -->

<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->

		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Categories</h3>
				</div>
				<div class="products-tabs">
					<!-- tab -->
					<div id="tab1" class="tab-pane active">
						<div class="products-slick" data-nav="#slick-nav-1">
							<!-- shop -->
							<?php echo $collectionHTML; ?>
							<!-- /shop -->
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<section id="contact">
						<div class="contact-box">
							<div class="contact-links">
								<h2>INQUIRY FORM</h2>
								<div class="links">
									<div class="link">
										<a><img src="https://i.postimg.cc/m2mg2Hjm/linkedin.png" alt="linkedin"></a>
									</div>
									<div class="link">
										<a><img src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
									</div>
									<div class="link">
										<a><img src="https://i.postimg.cc/W4Znvrry/codepen.png" alt="codepen"></a>
									</div>
									<div class="link">
										<a><img src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
									</div>
								</div>
							</div>
							<div class="contact-form-wrapper">
								<form action="<?php echo $htmlPath ?>/src/process/inquiry.process.php" method="post">
									<div class="form-item">
										<label>Email:</label>
										<input type="text" type="email" name="email" <?php echo $formFillUp == "" ? "" :  'readonly="readonly"'; ?> value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_email'] ?>" required>

									</div>
									<div class="form-item">
										<label>Number:</label>
										<input type="text" name="number" <?php echo $formFillUp == "" ? "" :  'readonly="readonly"'; ?> value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_contact'] ?>" required>
									</div>
									<div class="form-item">
										<label>Description:</label>

										<textarea class="" name="description" placeholder="Description: Please include product name, order quantity, usage, special requests if any in your inquiry." rows="5" required></textarea>
									</div>
									<button class="submit-btn" name="direct-inquiry" type="submit">Send</button>
								</form>
							</div>
						</div>
					</section>
					<!-- <div class="hot-deal">
					<ul class="hot-deal-countdown">
						<li>
							<div>
								<h3>B</h3>
								<span></span>
							</div>
						</li>
						<li>
							<div>
								<h3>to</h3>
								<span></span>
							</div>
						</li>
						<li>
							<div>
								<h3>B</h3>
								<span></span>
							</div>
						</li>
						<li>
							<div>
								<h3>Portal</h3>
								<span></span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">Some Text</h2>
					<p>Lorem ipsum dolor</p>
					<a class="primary-btn cta-btn" href="#">Join Us</a>
				</div> -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php echo $homeProductsByCateoryHTML; ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<!-- MODAL -->
	<div id="open-modal" class="modal-window modal-window-close">
		<div>
			<a title="Close" class="modal-close">
				<svg version="1.1" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
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
				<div class="input-group">
					<input type="submit" name="direct-inquiry" id="submit-button" style="background-color:var(--primary-color); height:50px; ">
				</div>
			</form>

		</div>
	</div>
	<!-- MODAL -->



	<?php
	include_once $phpPath . "templates/form.php";
	include_once $phpPath . "templates/footer.php";
	include_once $phpPath . "templates/loadJS.php";
	?>
	<!-- jQuery Plugins -->

	<script>
		setTimeout(() => {
			$('.sidebar-contact').toggleClass('active')
			$('.toggle').toggleClass('active')
		}, 6000);

		$(document).on('click', ".modal-close", function() {
			$('.modal-window').removeClass('modal-window-open');
			$('.modal-window').addClass('modal-window-close');

		});

		function setCookie(cname, cvalue, exdays) {
			const d = new Date();
			d.setTime(d.getTime() + (exdays * 60 * 60 * 1000));
			let expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function delete_cookie(name) {
			document.cookie = name + '=true; Expires=Fri, 17 Jun 2020 07:00:50 GMT';
		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') c = c.substring(1);
				if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
			}
			return "";
		}

		function showPopup() {
			setCookie('shown', 'true', 2);
			$('.modal-window').removeClass('modal-window-close');
			$('.modal-window').addClass('modal-window-open');
		}
		var cookie = getCookie('shown');
		if (!cookie) {
			showPopup();
		}
	</script>

	</body>

	</html>