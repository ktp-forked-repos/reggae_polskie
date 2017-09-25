<?php 
	include('app/init.php');
	include('app/settings/models/m_settings.php');
	$settings = new Settings();
?>
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
	<title>Aktualności - Reggae Polskie</title>
</head>
<body>

	<!--      Toolbar      -->
	<?php $CMS->toolbar(); ?>

	<!--      Navigation      -->
	<section class="row">
		<?php $CMS->navigation(); ?>
	</section>

	<!-- Image bg -->
	<section id="bg_nav">
		<img src="<?php echo APP_RES?>/images/main/reggae_bg.jpeg" class="bg_image_top_page" alt="bg">
	</section>

	<!--      News      -->
	<section id="news" class="container">
		<?php include('controllers/alerts.php'); ?>
		<div class="col-sm-10 col-xs-12">
			<?php include('controllers/news_list.php'); ?>
		</div>
		<div class="advertisement col-sm-2 col-xs-12">
			<?php include('controllers/advertisement.php'); ?>
		</div>
      <div class="no-ads-info">
         <?php include('controllers/addblock_detector.php'); ?>
      </div>
	</section>

	<!--      Footer      -->
	<footer class="container-fluid text-center offset-top">
		<?php include('app/core/templates/t_footer.php'); ?>
	</footer>

	<!-- Scripts -->
	<script src="<?php echo APP_RES?>/lightbox/js/lightbox.js"></script>
	<script src="<?php echo APP_RES?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo APP_RES?>/js/main-style.js"></script>
   <script src="<?php echo APP_RES?>js/facebook-comments.js"></script>
	<script src="<?php echo APP_RES?>/js/scroll-to-top.min.js"></script>
	<script src="<?php echo APP_RES?>/js/jssor/jssor.sliders.mini.js"></script>
   <script src="<?php echo APP_RES?>js/addblock_detector.js"></script>
	<script>  
		$(document).ready(function(){  
			var uploadField = document.getElementById("file");

			uploadField.onchange = function() {
				if(this.files[0].size > 8388607){
					alert('System nie obsługuje tak dużych plików');  
					this.value = "";
				};
			};
		}); 
	</script>

	<!-- scroll-to-top -->
	<a href="" id="scroll-to-top" >
		<span class="scroll-top fa-stack fa-2x fixed-up">
			<i class="fa fa-circle fa-stack-2x fa-check"></i>
			<i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
		</span>
	</a>

	<!-- Item modal -->
	<?php include('controllers/news_item.php'); ?>
</body>
</html>