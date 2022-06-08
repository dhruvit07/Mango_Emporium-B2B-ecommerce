<?php
session_start();
define("MYSITE", true);
include_once "../../templates/header.php";
require '../../includes/class-autoload.inc.php';
require '../../src/process/store.process.php';
?>
<style>
	@media screen and (max-width: 960px) {
		#aside {
			display: none;
		}
	}

	input[type="checkbox"] {
		float: left;
		margin: 0 auto;
		width: 100%;
	}

	button,
	input[type="submit"],
	input[type="reset"] {
		background: none;
		color: inherit;
		/* border: none; */
		padding: 0;
		font: inherit;
		cursor: pointer;
		outline: inherit;
	}

	.button {
		/* margin-top: 20px; */
		border: none;
		padding: 10px;
	}

	.button:hover {
		border: 4px solid gainsboro !important;
		/* margin-top: 20px; */
		/* width: 100%; */
		padding: 10px;
	}

	.pl-0 {
		padding-left: 0;
	}

	.position-unset {
		position: unset;
	}

	.product-btnn {
		position: absolute;
		bottom: 20px;
		right: 20px;
	}
</style>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="../../public/">Home</a></li>
					<li class="active">store (<?php echo $totalProduct;  ?> Results)</li>
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
			<div id="aside" class="col-md-3 col-sm-12  text-center">
				<!-- aside Widget -->
				<form id="fliter" method="post">
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<?php echo $category_html; ?>
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

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<!-- <span>-</span> -->
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<button type="button" class="button btn-color" style="width:98%"> Apply Filter</button>
					</div>
					<!-- /aside Widget -->
				</form>



			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9 col-sm-12 col-xs-12">
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

						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid" id="filter">
						Filter:
						<li><a href="#" class="active"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<!-- product -->
				<?php echo $product; ?>
				<!-- /product -->
				<div class="clearfix visible-sm visible-xs"></div>
				<!-- /product -->

				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">
						<li class="active">1</li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->



<!-- FOOTER -->

<!-- /FOOTER -->

<!-- jQuery Plugins -->
</body>

<?php
include_once "../../templates/footer.php";

include_once "../../templates/loadJS.php";
?>

<script>
	$(document).ready(function() {
		$('#filter').click(function() {
			$('#aside').toggle();
		});
	});
</script>


</html>