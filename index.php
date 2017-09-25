<?php 
   include("app/init.php");
   include('app/settings/models/m_settings.php');
   $settings = new Settings();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset=utf-8>
   <meta name=viewport content="width=device-width, initial-scale=1">
   <meta name="Description" content="Portal Reggae Polskie to wszystko czego potrzebujesz o muzyce Reggae/Ragga/Dancehall/Ska/Dub oraz kulturze Rastafari w jednym miejscu. Naszym celem jest promowanie muzyki reggae, imprez i artystów grających nie tylko reggae, ale wszystkie gatunki oscylujące wokół tej muzyki. Reggae Polskie jest DOBRE, BO POLSKIE."/>
   <meta name="Keywords" content="reggae, regee, ragga, rege, redzi,  regge, raga, polskie+reggae, reggaepolskie, polskiereggae, roots, dancehall, ska, dub, roots, rockers, polskie, zespoły, maniek, historia, bob, marley, kultura, aktualnosci, plyty, albumy, cd, gatunki,  odmiany, rastafari, koncerty, słownik, slownik, muzyka, muza, music, polish, polen, soundsystem, sound, system, opolskie, opole, namysłów, raggamaniek">
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
   <section class="row">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
           <div class="item active">
               <?php  
                  $id_image = 1;
                  $settings->selectCarouselImage($id_image);
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);
               ?>  
               <div class="carousel-caption">
                  <h3><?php echo $row['title'] ?></h3>
                  <p><?php echo $row['description'] ?></p>
               </div>
            </div>
            <div class="item">
               <?php  
                  $id_image = 2;
                  $settings->selectCarouselImage($id_image);
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);    
               ?>
               <div class="carousel-caption">
                  <h3><?php echo $row['title'] ?></h3>
                  <p><?php echo $row['description'] ?></p>
               </div> 
            </div>
            <div class="item">
               <?php  
                  $id_image = 3;
                  $settings->selectCarouselImage($id_image);
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);        
               ?>
               <div class="carousel-caption">
                  <h3><?php echo $row['title'] ?></h3>
                  <p><?php echo $row['description'] ?></p>
               </div> 
            </div>
         </div>
         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
   </section>

   <!-- Image bg -->
   <section id="bg_nav">
      <img src="<?php echo APP_RES?>/images/main/reggae_bg.jpeg" class="bg_image_index" alt="">
   </section>

   <!--      Links       -->
   <section id="links" class="row col-xs-12 text-center links-marg">
      <div >
         <div class="col-md-4">
            <div class="thumbnail box-shadow">
               <?php  
                  $id_image = 4;
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);    
               ?> 
               <a href="<?php echo $row['description'] ?>">
                  <?php  
                     $settings->selectCarouselImage($id_image);     
                  ?> 
                  <div class="caption">
                     <p class="title"><?php echo $row['title'] ?></p>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="thumbnail box-shadow">
               <?php  
                  $id_image = 5;
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);    
               ?> 
               <a href="<?php echo $row['description'] ?>">
                  <?php  
                     $settings->selectCarouselImage($id_image);     
                  ?> 
                  <div class="caption">
                     <p class="title"><?php echo $row['title'] ?></p>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="thumbnail box-shadow">
               <?php  
                  $id_image = 6;
                  $result = $settings->selectCarouselContent($id_image);
                  $row = mysqli_fetch_assoc($result);    
               ?> 
               <a href="<?php echo $row['description'] ?>">
                  <?php  
                     $settings->selectCarouselImage($id_image);     
                  ?> 
                  <div class="caption">
                     <p class="title"><?php echo $row['title'] ?></p>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </section>

   <!--      News       -->
   <section id="news" class="container">
      <div class="col-sm-8 marg-top-1">	
         <?php include('controllers/news_index.php'); ?>
      </div>
      <div class="advertisement col-sm-4">
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

   <!--      Footes       -->
   <footer class="container-fluid text-center offset-top">
      <?php include('app/core/templates/t_footer.php'); ?>
   </footer>

   <!--      scripts      -->
   <script src="<?php echo APP_RES?>bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo APP_RES?>js/main-style.js"></script>
   <script src="<?php echo APP_RES?>js/facebook-comments.js"></script>
   <script src="<?php echo APP_RES?>js/scroll-to-top.min.js"></script>
   <script src="<?php echo APP_RES?>js/addblock_detector.js"></script>

   <!--      scroll-to-top      -->
   <a href="" id="scroll-to-top" >
      <span class="scroll-top fa-stack fa-2x fixed-up">
         <i class="fa fa-circle fa-stack-2x fa-check"></i>
         <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
      </span>
   </a>
</body>
</html>