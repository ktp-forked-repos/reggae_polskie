<?php 
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $settings = new Settings();
   $type = 2;
   $sold = 0;
   $page_name = 'semi-detached-house.php';
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

   <title>Domy w zabudowie bliźniaczej w Namysłowie</title>
</head>
<body>

   <!--      Toolbar      -->
   <?php $CMS->toolbar(); ?>

   <!--      Navigation      -->
   <div class="row">
      <?php $CMS->navigation(); ?>
   </div>

   <section id="bg_nav">
      <img src="<?php echo APP_RES?>images/main/black-and-white.jpeg" class="bg_image_top_page" alt="bg">
   </section>

   <section id="title" class="container">
      <div class="col-xs-12 text-center offset-50 text-red"> <h2 class="title_font">Domy w zabudowie bliźniaczej</h2> </div>    
      <div class="col-xs-12 text-center moving_arrow"> <i class="fa fa-arrow-down fa-4x " aria-hidden="true"></i> </div>
   </section>

   <!--      Alerts      -->
   <section id="alerts" class="container">
      <div class="row"><?php include('../controllers/alerts.php'); ?></div>
   </section>

   <!--      Content      -->
   <section id="contain" class="container">
      <div class="col-xs-12 half-offset-top">
         <?php include('controllers/invest_list.php'); ?>
      </div>
   </section>

   <!--      Footer      -->
   <footer class="container-fluid text-center offset-top">
      <?php include('../app/core/templates/t_footer.php'); ?>
   </footer>

   <!-- Scripts -->
   <script src="<?php echo APP_RES?>lightbox/js/lightbox.js"></script>
   <script src="<?php echo APP_RES?>bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo APP_RES?>js/main-style.js"></script>
   <script src="<?php echo APP_RES?>js/scroll-to-top.min.js"></script>
   <script src="<?php echo APP_RES?>js/jssor/jssor.sliders.mini.js"></script>

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
   <?php include('controllers/invest_item.php'); ?>
</body>
</html>
