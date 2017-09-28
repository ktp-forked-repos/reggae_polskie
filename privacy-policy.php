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
	<title>Polityka prywatności</title>
</head>
<body>
		<?php $CMS->toolbar(); ?>
	<!-- Navigation -->
	<section class="row">
		<?php $CMS->navigation(); ?>
	</section>

	<!-- Image bg -->
	<section id="bg_nav">
	    <img src="<?php echo APP_RES?>images/main/reggae_bg.jpeg" class="bg_image_top_page" alt="bg">
	</section>

	<!-- Content -->
	<div class="container marg-top-2">
		<div class="row">
			<div class="col-sm-10 col-xs-12 col-sm-offset-1">
				<h2 class="text-red text-center"><?php $CMS->Cms_class->display_block('privacypolicy_header_1', 'oneline')?></h2>
				<p><?php $CMS->Cms_class->display_block('privacypolicy_content_1')?></p>
			</div>
		</div>
		<?php 
			$numb = 7;
			for($i=2; $i <= $numb; $i++){
				echo '<div class="row">';
					echo '<div class="col-sm-2 col-xs-12"><img class="img-responsive paragraph" src="' . APP_RES . '/images/main/paragraph.png" alt="paragraf"></div>';
					echo '<div class="col-sm-8 col-xs-12"><h3>';
						echo $CMS->Cms_class->display_block('privacypolicy_header_' . $i, 'oneline') . '</h3>';
						echo '<p>' . $CMS->Cms_class->display_block('privacypolicy_content_' . $i) .'</p>';
					echo '</div>';
				echo '</div>';
			}
		?>
	</div>

   <!--    Advertisement       -->
   <section id="advertisement" class="container">
      <div class="advertisement col-xs-12">
         <?php include('views/advertisement.php'); ?>
      </div>
      <div class="no-ads-info">
         <?php include('views/addblock_detector.php'); ?>
      </div>
   </section>

	<!-- footer -->
	<footer class="container-fluid text-center offset-top">
		<?php include('app/core/templates/t_footer.php'); ?>
	</footer>

<!-- scripts -->
	<script src="<?php echo APP_RES?>/lightbox/js/lightbox.js"></script>
	<script src="<?php echo APP_RES?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo APP_RES?>/js/main-style.js"></script>
	<script src="<?php echo APP_RES?>/js/scroll-to-top.min.js"></script>
   <script src="<?php echo APP_RES?>js/addblock_detector.js"></script>

<!-- scroll-to-top -->
	<a href="" id="scroll-to-top" >
	   <span class="scroll-top fa-stack fa-2x fixed-up">
	      <i class="fa fa-circle fa-stack-2x fa-check"></i>
	      <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
	   </span>
	</a>
</body>
</html>