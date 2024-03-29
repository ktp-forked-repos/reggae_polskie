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
    <meta name="Keywords" content="reggae, regee, ragga, rege, regge, raga, polskie+reggae, reggaepolskie, polskiereggae, roots, dancehall, ska, dub, roots, rockers, polskie, zespoły, wykonawca, wykonawcy, artyści, muzyczne, bandy, bands<?php if (($_GET['name'])) echo ', ' . $_GET['name']; ?>">
    <meta name="Description" content="<?php
        $name = $_GET['name'];
        if ($_GET['name']) {
            include('controllers/bands_description.php');
        } else {
            echo 'Polskie zespoły muzyczne grające reggae. Reggae Polskie to wszystko czego potrzebujesz o muzyce reggae, raggamuffin, dancehall, ska czy dub w jednym miejscu. Znajdziesz tutaj swój ulubiny zespół muzyczny lub artystę, którego uwielbiasz. ';
        }?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>css/main-style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>lightbox/css/lightbox.css">
    <script src="<?php echo APP_RES ?>js/jquery-3.2.1.min.js"></script>
    <?php $CMS->head(); ?>
    <title><?php
        if ($_GET['name']) {
            echo $_GET['name'] . ' - Reggae Polskie';
        } else {
            echo 'Polskie zespoły i artyści muzyki reggae / Polish reggae bands';
        }
        ?></title>
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

<?php //content
if (!isset($_GET['name']) || $_GET['name'] == '') { ?>
    <section id="bands_list" class="container marg-top-0">
        <?php include('controllers/alerts.php'); ?>
        <h2 class="text-center">Polskie zespoły i artyści muzyki reggae</h2>
        <?php include('views/advertisement.php'); ?>
        <?php include('controllers/bands_list.php'); ?>
        <div class="text-red marg-top-1"><strong>lość zespołów w bazie: <?php echo $settings->countBands(); ?></strong>
        </div>
        <div class="no-ads-info">
            <?php include('views/addblock_detector.php'); ?>
        </div>
    </section>
    <?php
} else { ?>
    <section id="bands_list" class="container marg-top-0">
        <?php include('controllers/alerts.php'); ?>

        <?php $name = $_GET['name']; ?>
        <?php include('controllers/bands_item.php'); ?>
    </section>
    <?php
} ?>

<?php //advertisement ?>
<section id="advertisement" class="container">
    <div class="advertisement col-xs-12">
        <?php include('views/advertisement.php'); ?>
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