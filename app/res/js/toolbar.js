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

         if($(this).html() == '<i class="fa fa-toggle-off" aria-hidden="true"></i> Włącz edycję'){
            $(this).html('<i class="fa fa-toggle-on" aria-hidden="true"></i> Wyłącz edycję');
         }
         else{
            $(this).html('<i class="fa fa-toggle-off" aria-hidden="true"></i> Włącz edycję');
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