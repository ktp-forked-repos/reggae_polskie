<?php include("app/init.php") ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset=utf-8>
   <meta name=viewport content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES?>css/main-style.min.css">
   <script src="<?php echo APP_RES?>js/jquery.min.js"></script>
   <?php $CMS->head(); ?>
   <title>Kontakt z Reggae Polskie</title>
</head>
<body>
   <?php $CMS->toolbar(); ?>

   <!-- Navigation -->
   <section class="row">
      <?php $CMS->navigation(); ?>
   </section>

   <!-- Image bg -->
   <section id="bg_nav">
      <img src="<?php echo APP_RES?>/images/main/reggae_bg.jpeg" class="bg_image_top_page" alt="">
   </section>
   <section id="name" class="container marg-top-1">
      <div class="col-xs-12 text-center">
         <h3>Reggae Polskie</h3>
         <h4><email><i class="fa fa-envelope" aria-hidden="true"></i> admin&#64;reggaepolskie.pl</email></h4>
      </div>
   </section>
   <!-- Contact Section -->
   <section id="contact" class="marg-top-1">
      <div class="row">
         <div class="col-lg-12 text-center">
            <h2 class="section-heading">Kontakt</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12">
            <form name="sentMessage" id="contactForm" novalidate>
               <div class="row"> 
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Imię i nazwisko *" id="name" required data-validation-required-message="Musisz podać swoj imię i nazwisko">
                        <p class="help-block text-danger"></p>
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" placeholder="Emial *" id="email" required data-validation-required-message="Musisz podać swój email" data-validation-email-message="Nieprawidłowy email">
                        <p class="help-block text-danger"></p>
                     </div>
                     <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Numer telefonu" id="phone">
                        <p class="help-block text-danger"></p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <textarea class="form-control" placeholder="Treść wiadomości *" id="message" required data-validation-required-message="Muisz podać treść wiadomości"></textarea>
                        <p class="help-block text-danger"></p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-xs-12 text-center">
                     <div id="success"></div>
                     <button type="submit" class="btn btn-xl btn-green">Wyślij</button>
                     <button type="reset" class="btn btn-xl">Wyszyść</button>
                  </div>
               </div>
            </form>
         </div>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
   <script src="<?php echo APP_RES?>/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?php echo APP_RES?>/js/main-style.js"></script>
   <script src="<?php echo APP_RES?>/js/scroll-to-top.min.js"></script>
   <script src="<?php echo APP_RES?>/js/jqBootstrapValidation.js"></script>
   <script src="<?php echo APP_RES?>/js/contact_me.js"></script>
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