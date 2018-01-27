<?php
include('../app/init.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>css/main-style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>lightbox/css/lightbox.css">
    <script src="<?php echo APP_RES ?>js/jquery-3.2.1.min.js"></script>
    <?php $CMS->head(); ?>
    <title>Mento music - Reggae Polskie</title>
</head>
<body>
<?php //toolbar ?>
<?php $CMS->toolbar(); ?>

<?php //navigation ?>
<div class="row">
    <?php $CMS->navigation(); ?>
</div>

<?php //image bg ?>
<section id="bg_nav">
    <div class="bg_image_index"></div>
</section>

<?php //title ?>
<section id="title" class="container">
    <div class="row">
        <div class="col-xs-12 text-center text-red">
            <h2 class="title_font"><?php $CMS->Cms_class->display_block('genre_mento_header', 'oneline') ?></h2></div>
    </div>
</section>

<?php //content ?>
<section id="content" class="container">
    <div class="col-sm-10 col-xs-12 marg-top-1">
        <p><?php $CMS->Cms_class->display_block('genre_mento_content') ?></p>
    </div>
    <div class="advertisement col-sm-2 col-xs-12">
        <?php include('../views/advertisement.php'); ?>
        <?php include('../views/advertisement.php'); ?>
    </div>
</section>

<section id="video" class="container">
    <div class="advertisement col-sm-10 col-xs-12">
        <?php include('../views/advertisement.php'); ?>
    </div>
    <div class="col-sm-10 col-xs-12 marg-top-1">
        <div class="embed-responsive embed-responsive-16by9">
            <?php $video = $CMS->Cms_class->display_video('genre_mento_video'); ?>
            <iframe class="embed-responsive-item video" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</section>

<?php //advertisement ?>
<section id="advertisement" class="container">
    <div class="advertisement col-sm-10 col-sm-offset-1 col-xs-12">
        <?php include('../views/advertisement.php'); ?>
    </div>
    <div class="no-ads-info">
        <?php include('../views/addblock_detector.php'); ?>
    </div>
</section>

<?php //fb comments ?>
<section id="fb-comments" class="container">
    <div class="col-md-10 col-md-offset-1 col-sm-12 marg-top-2">
        <div id="fb-root"></div>
        <div class="fb-comments" data-href="<?php echo PAGE_PATH; ?>" data-numposts="5" data-mobile="Auto-detected"
             data-order-by="reverse_time" data-width="100%"></div>
    </div>
</section>

<?php //footer ?>
<footer class="container-fluid text-center marg-top-4">
    <?php include('../app/core/templates/t_footer.php'); ?>
</footer>

<?php //scripts ?>
<script src="<?php echo APP_RES ?>lightbox/js/lightbox.js"></script>
<script src="<?php echo APP_RES ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo APP_RES ?>js/main-style.js"></script>
<script src="<?php echo APP_RES ?>js/facebook-comments.js"></script>
<script src="<?php echo APP_RES ?>js/scroll-to-top.min.js"></script>
<script src="<?php echo APP_RES ?>js/jssor/jssor.sliders.mini.js"></script>
<script src="<?php echo APP_RES ?>js/addblock_detector.js"></script>
<?php //scroll-to-top ?>
<a href="" id="scroll-to-top">
      <span class="scroll-top fa-stack fa-2x fixed-up">
         <i class="fa fa-circle fa-stack-2x fa-check"></i>
         <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
      </span>
</a>
</body>
</html>