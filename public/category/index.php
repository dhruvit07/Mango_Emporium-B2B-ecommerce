<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
session_start();
define("MYSITE", true);
if (!function_exists("Autoloader")) {
	require $phpPath . 'includes/class-autoload.inc.php';
}
require $phpPath . 'src/process/category.process.php';
include_once $phpPath . "templates/header.php";
?>
<style>
	body {
		background-color: #eee;
	}

	.mt-20 {
		margin-top: 20px;
	}

	.card {
		border-radius: 7px !important;
		border-color: #e1e7ec;
	}

	.mb-30 {
		margin-bottom: 30px !important;
	}

	.card-img-tiles {
		display: block;
		border-bottom: 1px solid #e1e7ec;
	}

	a {
		/* color: #0da9ef; */
		text-decoration: none !important;
	}

	.card-img-tiles>.inner {
		display: table;
		width: 100%;
		background-color: white;
	}

	.card-img-tiles .main-img,
	.card-img-tiles .thumblist {
		display: table-cell;
		width: 50%;
		vertical-align: middle;
	}

	.card-img-tiles .main-img>img:last-child,
	.card-img-tiles .thumblist>img:last-child {
		margin-bottom: 0;
	}

	.card-img-tiles .main-img>img {
		display: block;
		width: 100%;
		margin-bottom: 6px;
	}

	.btn-group-sm>.btn,
	.btn-sm {
		padding: .45rem .5rem !important;
		font-size: .875rem;
		line-height: 1.5;
		border-radius: .2rem;
	}

	.card-body {
		padding: 20px;
		background-color: white;
	}

	@media (max-width: 476px) {
		.col-6 {
			width: 50%;
		}
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
					<li><a href="<?php echo $htmlPath; ?>/public/">Home</a></li>
					<?php if (isset($_GET['id'])) { ?>
						<li><a href="<?php echo $htmlPath; ?>/public/category">Category</a></li>
						<li class="active">sub category</li>
					<?php } else { ?>
						<li class="active">Category</li>
					<?php } ?>

				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- CATEGORY -->
<?php if (isset($_GET['id'])) { ?>
	<div class="container mt-20">
		<div class="row">
			<?php echo $subCategoryHTML; ?>
		</div>
	</div>
<?php } else { ?>
	<div class="container mt-20">
		<div class="row">
			<?php echo $categoryHTML; ?>
		</div>
	</div>
<?php } ?>
<!-- /CATEGORY -->

<!-- jQuery Plugins -->
</body>

<?php
include_once $phpPath . "templates/form.php";

include_once $phpPath . "templates/footer.php";

include_once $phpPath . "templates/loadJS.php";
?>



<script>
	$(document).ready(function() {

	});
</script>


</html>