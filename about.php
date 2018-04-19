<?php include("app/init.php") ?>
<!DOCTYPE html>
<html>
<head>
    <?php include('views/google_analytics.php'); ?>

    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="Description"
          content="Reggae Polskie to wszystko czego potrzebujesz o muzyce reggae, raggamuffin, dancehall, ska czy dub w jednym miejscu. Celem Reggae Polskie jest promowanie muzyki, imprez i artystów grających nie tylko reggae, ale wszystkie gatunki oscylujące wokół tej muzyki. "/>
    <meta name="Keywords"
          content="reggae, regee, ragga, rege, redzi,  regge, raga, polskie+reggae, reggaepolskie, polskiereggae, roots, dancehall, ska, dub, roots, rockers, polskie, polska, zespoły, historia, bob, marley, kultura, aktualności, news, plyty, albumy, cd, gatunki, odmiany, rastafari, koncerty, słownik, slownik, muzyka, muza, music, polish, polen, soundsystem, sound, system">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>css/main-style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo APP_RES ?>lightbox/css/lightbox.css">
    <script src="<?php echo APP_RES ?>js/jquery-3.2.1.min.js"></script>
    <?php $CMS->head(); ?>
    <title>Informacje o Reggae Polskie</title>
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

<?php //content ?>
<div class="container marg-top-2">
    <div class="col-sm-8">
        <h3><?php $CMS->Cms_class->display_block('about_header', 'oneline') ?></h3>
        <p><?php $CMS->Cms_class->display_block('about_content') ?></p>
    </div>
    <div class="col-sm-4">
        <?php include('views/advertisement.php'); ?>
        <br><br><br>
        <?php include('views/advertisement.php'); ?>
    </div>
    <div class="no-ads-info">
        <?php include('views/addblock_detector.php'); ?>
    </div>
</div>

<?php //footer ?>
<footer class="container-fluid text-center marg-top-4">
    <?php include('app/core/templates/t_footer.php'); ?>
</footer>

<?php //scripts ?>
<script src="<?php echo APP_RES ?>lightbox/js/lightbox.js"></script>
<script src="<?php echo APP_RES ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo APP_RES ?>js/main-style.js"></script>
<script src="<?php echo APP_RES ?>js/scroll-to-top.min.js"></script>
<script src="<?php echo APP_RES?>js/addblock_detector.js"></script>
<?php //scroll-to-top ?>
<a href="" id="scroll-to-top">
		<span class="scroll-top fa-stack fa-2x fixed-up">
			<i class="fa fa-circle fa-stack-2x fa-check"></i>
			<i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
		</span>
</a>
</body>
</html>