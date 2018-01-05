<?php 
   include("app/init.php");
   include('app/settings/models/m_settings.php');
   $settings = new Settings();
?>
<!DOCTYPE html>
<html>
<head>
   <?php include('views/google_analytics.php'); ?>
   
   <meta charset=utf-8>
   <meta name=viewport content="width=device-width, initial-scale=1">
   <meta name="Description" content="Reggae Polskie to wszystko czego potrzebujesz o muzyce reggae, raggamuffin, dancehall, ska czy dub w jednym miejscu. Celem Reggae Polskie jest promowanie muzyki, imprez i artystów grających nie tylko reggae, ale wszystkie gatunki oscylujące wokół tej muzyki. "/>
   <meta name="Keywords" content="reggae, regee, ragga, rege, redzi,  regge, raga, polskie+reggae, reggaepolskie, polskiereggae, roots, dancehall, ska, dub, roots, rockers, polskie, polska, zespoły, historia, bob, marley, kultura, aktualności, news, plyty, albumy, cd, gatunki, odmiany, rastafari, koncerty, słownik, slownik, muzyka, muza, music, polish, polen, soundsystem, sound, system">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>css/main-style.min.css">
   <script src="<?php echo APP_RES?>js/jquery-3.2.1.min.js"></script>
   <?php $CMS->head(); ?>
   <title>Reggae Polskie</title>
</head>
<body>
   <!--      Toolbar      -->
   <?php $CMS->toolbar(); ?>

   <!--      Navigation      -->
   <section class="row">
      <?php $CMS->navigation(); ?>
   </section>

   <!--      Carousele       -->
   <section id="carousel">
      <?php include('controllers/index_carousel.php'); ?>
   </section>

   <!-- Image bg -->
   <section id="bg_nav">
      <img src="<?php echo APP_RES?>/images/main/reggae_bg.jpeg" class="bg_image_index" alt="">
   </section>

   <!--      News       -->
   <section id="news" class="container">
      <div class="col-sm-8">	
         <?php include('controllers/index_news.php'); ?>
      </div>
      <div class="col-sm-4">
         <div><?php include('controllers/index_random_video.php'); ?></div>
         <div class="advert-half-top"><?php include('views/advertisement.php'); ?></div>
         <div class="no-ads-info"><?php //include('views/addblock_detector.php'); ?></div>
      </div>
   </section>

   <section id="accordion" class="container marg-top-1">
      <?php include('views/reggae_history.php'); ?>
   </section>

   <!--      Links       -->
   <section id="links" class="col-xs-12 links-marg marg-top-1">
      <div>
         <?php include('controllers/index_links.php'); ?>
      </div>
      <div class="advertisement col-sm-6 col-xs-12 centered">
         <?php include('views/advertisement.php'); ?>
      </div>
      <div class="advertisement col-sm-6 col-xs-12 centered">
         <?php include('views/advertisement.php'); ?>
      </div>
   </section>

   <!--      Fb comments       -->
   <section id="fb-comments" class="container">
      <div class="col-md-10 col-md-offset-1 col-sm-12 marg-top-3">
         <div id="fb-root"></div>
         <div class="fb-comments" data-href="<?php echo SITE_PATH; ?>" data-numposts="5" data-mobile="Auto-detected" data-order-by="reverse_time" data-width="100%"></div>
      </div>
   </section>

   <!--      Footes       -->
   <footer class="container-fluid text-center marg-top-4">
      <?php include('app/core/templates/t_footer.php'); ?>
   </footer>

   <!--      scripts      -->
   <script src="<?php echo APP_RES?>bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo APP_RES?>js/main-style.js"></script>
   <script src="<?php echo APP_RES?>js/facebook-comments.js"></script>
   <script src="<?php echo APP_RES?>js/scroll-to-top.min.js"></script>
   <script src="<?php //echo APP_RES?>js/addblock_detector.js"></script>

   <!--      scroll-to-top      -->
   <a href="" id="scroll-to-top" >
      <span class="scroll-top fa-stack fa-2x fixed-up">
         <i class="fa fa-circle fa-stack-2x fa-check"></i>
         <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
      </span>
   </a>
</body>
</html>