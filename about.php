<?php include("app/init.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>css/main-style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>lightbox/css/lightbox.css">
	<script src="<?php echo APP_RES?>js/jquery-3.2.1.min.js"></script>
	<?php $CMS->head(); ?>
	<title>Informacje - Reggae Polskie</title>
</head>
<body>
	<?php $CMS->toolbar(); ?>
	<!-- Navigation -->
	<div class="row">
		<?php $CMS->navigation(); ?>
	</div>

	<!-- Image bg -->
	<section id="container bg_nav">
		<img src="<?php echo APP_RES?>/images/main/reggae_bg.jpeg" class="bg_image_top_page" alt="bg">
	</section>

	<!-- Content -->
	<div class="container marg-top-2">
		<div class="col-sm-8">
			<h3><?php $CMS->Cms_class->display_block('about_header', 'oneline')?></h3>
			<p><?php $CMS->Cms_class->display_block('about_content')?></p>
		</div>

		<div class="col-sm-4">
			<?php include('views/advertisement.php'); ?>
			<br><br><br>
			<?php include('views/advertisement.php'); ?>
		</div>
      <div class="no-ads-info">
         <?php include('views/addblock_detector.php'); ?>
      </div>
	</div>

	<!-- footer -->
	<footer class="container-fluid text-center offset-top">
		<?php include('app/core/templates/t_footer.php'); ?>
	</footer>

	<!-- scripts -->
	<script src="<?php echo APP_RES?>lightbox/js/lightbox.js"></script>
	<script src="<?php echo APP_RES?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo APP_RES?>js/main-style.js"></script>
	<script src="<?php echo APP_RES?>js/scroll-to-top.min.js"></script>

	<!-- scroll-to-top -->
	<a href="" id="scroll-to-top" >
		<span class="scroll-top fa-stack fa-2x fixed-up">
			<i class="fa fa-circle fa-stack-2x fa-check"></i>
			<i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
		</span>
	</a>
</body>
</html>