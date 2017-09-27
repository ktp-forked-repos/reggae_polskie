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
  <title>Słownik</title>
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
  <section id="vocabulary" class="container marg-top-2"">
    <h2>Słownik</h2>
    <?php include('controllers/vocabulary_list.php'); ?>
  </section>

   <!--    Advertisement       -->
   <section id="advertisement" class="container">
      <div class="advertisement col-xs-12">
         <?php include('controllers/advertisement.php'); ?>
      </div>
      <div class="no-ads-info">
         <?php include('controllers/addblock_detector.php'); ?>
      </div>
   </section>

  <!--      Fb comments       -->
  <section id="fb-comments" class="container">
    <div class="col-md-10 col-md-offset-1 col-sm-12 marg-top-3">
       <div id="fb-root"></div>
       <div class="fb-comments" data-href="<?php echo SITE_PATH; ?>" data-numposts="5" data-mobile="Auto-detected" data-order-by="reverse_time" data-width="100%"></div>
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

<!-- scroll-to-top -->
  <a href="" id="scroll-to-top" >
        <span class="scroll-top fa-stack fa-2x fixed-up">
            <i class="fa fa-circle fa-stack-2x fa-check"></i>
            <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
        </span>
  </a>
</body>
</html>