<link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>css/colorbox.min.css">
<script src="<?php echo APP_RES; ?>js/jquery.colorbox-min.js"></script>
<script src="<?php echo APP_RES; ?>tinymce/tiny_mce_src.js"></script>
<script src="<?php echo APP_RES; ?>tinymce/tiny_mce_popup.js"></script>
<script src="<?php echo APP_RES; ?>tinymce/tiny_mce.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>css/toolbar.min.css">

<script>
   $(document).ready(function(){
      $('.cms_edit').each(function() {
         var height = $(this).outerHeight();
         if(height < 25) {
            height = 25;
         }
         var width = $(this).parent().width();

         $(this).height(height).width(width);
         $(this).find('.cms_edit_link').height(height-2).width(width-2);
      });

      $('#edit_t').click(function(e) {
         e.preventDefault();

         if($(this).html() == '<i class="fa fa-eye" aria-hidden="true"></i> Wyłącz podgląd'){
            $(this).html('<i class="fa fa-low-vision" aria-hidden="true"></i> Włącz edycję');
         }
         else{
            $(this).html('<i class="fa fa-eye" aria-hidden="true"></i> Wyłącz podgląd');
         }
      $('.cms_edit_link').toggle();
      $('.cms_edit_type').toggle();
      $('.switch_off').toggle();
      });

      $('.cms_edit_link, .cms_edit_type').click(function(e){
         $(this).colorbox({});
      });

      $('.cms_panel, .cms_password').click(function(e){
         $(this).colorbox({
            iframe: true,
            top: '100px',
            width: '100%',
            height: '70%',
         });
      });
   });
</script>