<link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>css/colorbox.min.css">
<script src="<?php echo APP_RES; ?>js/jquery.colorbox-min.js"></script>

<script>
   $(document).ready(function(){
      $.colorbox({
         href: '<?php echo SITE_PATH; ?>app/login.php',
         overlayClose: false
      });
   });
</script>