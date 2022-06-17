<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
define("MYSITE", true);
if (!function_exists("Autoloader")) {
	require $phpPath . 'includes/class-autoload.inc.php';
}
require $phpPath . 'includes/store.inc.php';
include_once $phpPath . "templates/header.php";

?>
<style>
	@media screen and (max-width: 991px) {
		.filter-close {
			height: 0;
			transition: 0.5s;
			overflow: hidden;
		}

		.filter-open {
			display: block;
			transition: 0.5s;
			height: 900px;
		}
	}
</style>

<body>
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
				<input type="hidden" name="id" id="product-id" placeholder="Number">
				<div class="input-group">
					<input type="submit" name="product-inquiry" id="submit-button" style="background-color:var(--primary-color); height:50px; ">
				</div>
			</form>

		</div>
	</div>
	<!-- MODAL -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="<?php echo $htmlPath; ?>/public/">Home</a></li>
						<li class="active">Store</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row justify-content-center">
				<!-- ASIDE -->
				<div id="aside" class=" filter-close col-md-3 col-sm-12  text-center">
					<!-- aside Widget -->
					<form id="filter_form" action="./" method="get">
						<div class="aside">
							<h3 class="aside-title">Business Type</h3>
							<div class="checkbox-filter">
								<?php echo $business_type_html; ?>
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								<?php echo $category_html; ?>
							</div>
						</div>

						<div class="aside">
							<h3 class="aside-title">Business Type</h3>
							<div class="checkbox-filter">
								<?php echo $seller_type_html; ?>
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Location</h3>
							<div class="checkbox-filter">
								<?php echo $location_html; ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside 	 Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" name="priceMin" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<!-- <span>-</span> -->
								<div class="input-number price-max">
									<input id="price-max" name="priceMax" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<div class="aside">
							<div id="button">
								<div id="translate"></div>
								<button type="submit" id="filter_button" name="filter" class="button" style="width:98%"> Apply Filter</button>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- /aside Widget -->
					</form>



				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9 col-sm-12 col-xs-12 ">
					<?php
					if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
						echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>' . $_SESSION["msg"] . '</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
						unset($_SESSION['msg']);
					}
					?>

					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label>
						</div>
						<ul class="store-grid" id="filter">
							Filter:
							<li><a class="active"><i class="fa fa-th-list"></i></a></li>
						</ul>
					</div>
					<!-- /store top filter -->

					<!-- store products -->
					<!-- product -->
					<div class="body">
						<div class="" id="loader">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
					<div id="pruduct_html">
						<?php
						echo $product;
						?>
					</div>
					<!-- /product -->
					<!-- /product -->

					<!-- /store products -->

					<!-- store bottom filter -->

					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
</body>

<!-- FOOTER -->
<?php
include_once $phpPath . "templates/footer.php";

include_once $phpPath . "templates/loadJS.php";
?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script>
	$(document).ready(function() {
		// form id Fill Up 
		$(document).on('click', ".inquiry", function() {
			var id = $(this).attr('id');
			$('#product-id').val(id);
			$('.modal-window').removeClass('modal-window-close');
			$('.modal-window').addClass('modal-window-open');

		});
		$(document).on('click', ".modal-close", function() {
			$('.modal-window').removeClass('modal-window-open');
			$('.modal-window').addClass('modal-window-close');

		});
		// fiter hide show script
		$('#filter').click(function() {
			// $('#aside').toggle();
			if ($(document).width() < 991) {
				if ($('#aside').hasClass('filter-close')) {
					$('#aside').removeClass('filter-close');
					$('#aside').addClass('filter-open');

					$('html, body').animate({
						scrollTop: 400
					}, 700);

				} else if ($('#aside').hasClass('filter-open')) {

					$('html, body').animate({
						scrollTop: 0
					}, 900);

					$('#aside').removeClass('filter-open');
					$('#aside').addClass('filter-close');

				}
			}
		});


	});
</script>


</html>