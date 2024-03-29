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
    <meta name="Description"
          content="Słownik terminologii reggae i rasta w języku polskim. Zawiera zwroty, którymi posługują się ludzie w dredlokach"/>
    <meta name="Keywords"
          content="reggae, regee, ragga, rege, redzi,  regge, raga, polskie+reggae, reggaepolskie, polskiereggae, roots, dancehall, ska, dub, roots, rockers, polskie, polska, zespoły, historia, bob, marley, kultura, aktualności, news, plyty, albumy, cd, gatunki, odmiany, rastafari, koncerty, słownik, slownik, dictionary, muzyka, muza, music, polish, polen, soundsystem, sound, system">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>css/main-style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>lightbox/css/lightbox.css">
    <script src="<?php echo APP_RES ?>js/jquery-3.2.1.min.js"></script>
    <?php $CMS->head(); ?>
    <title>Słownik terminów reggae/rasta</title>
</head>
<body>
<?php //toolbar ?>
<?php $CMS->toolbar(); ?>

<?php //navigation ?>
<section class="row">
    <?php $CMS->navigation(); ?>
</section>

<?php //image bg ?>
<section id="bg_nav">
    <div class="bg_image_index"></div>
</section>

<?php //content ?>
<section id="vocabulary" class="container marg-top-0">
    <?php include('controllers/alerts.php'); ?>
    <h2 class="text-center">Słownik terminów reggae/rasta</h2>
    <?php include('views/advertisement.php'); ?>
    <?php include('controllers/vocabulary_list.php'); ?>
    <div class="text-red"><strong>lość haseł w słowniku: <?php echo $settings->countEntry(); ?></strong></div>
</section>

<?php //advertisement ?>
<section id="advertisement" class="container">
    <div class="advertisement col-xs-12">
        <?php include('views/advertisement.php'); ?>
    </div>
    <div class="no-ads-info">
        <?php include('views/addblock_detector.php'); ?>
    </div>
</section>

<?php //fb comments ?>
<section id="fb-comments" class="container">
    <div class="col-md-10 col-md-offset-1 col-sm-12 marg-top-3">
        <div id="fb-root"></div>
        <div class="fb-comments" data-href="<?php echo PAGE_PATH; ?>" data-numposts="5" data-mobile="Auto-detected"
             data-order-by="reverse_time" data-width="100%"></div>
    </div>
</section>

<?php //footer ?>
<footer class="container-fluid text-center marg-top-4">
    <?php include('app/core/templates/t_footer.php'); ?>
</footer>

<?php //scripts ?>
<script src="<?php echo APP_RES ?>lightbox/js/lightbox.js"></script>
<script src="<?php echo APP_RES ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo APP_RES ?>js/main-style.js"></script>
<script src="<?php echo APP_RES ?>js/scroll-to-top.min.js"></script>
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