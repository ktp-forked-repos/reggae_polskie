<script>
   $(document).ready(function(){

      $('#edit').submit(function(e){

         e.preventDefault();

         var id = "<?php echo $this->getData('block_id'); ?>";
         var type = $('#type').val();
         <?php if($this->getData('block_type') == 'wysiwyg')  { ?>
            tinyMCE.triggerSave();
            <?php } ?>
            var content = $('#field').val();

            var dataString = 'id=' + id + '&field=' + content + '&type=' + type;

            $.ajax({
               type: "POST",
               url: "<?php echo SITE_PATH; ?>app/cms/edit.php",
               data: dataString,
               cache: false,
               success: function(html){
                  $('#cboxLoadedContent').html(html);
               }
            });
         });

      $('#cboxClose').on('click',function(e){
         if(tinyMCE.getInstanceById('field')){
            tinyMCE.execCommand('mceFocus',false, 'field');
            tinyMCE.execCommand('mceRemoveControl',false, 'field');  
         }
         e.preventDefault();
         $.colorbox.close();
      });
   });
</script>


<?php if($this->getData('block_type') == 'wysiwyg') { ?>
<script>
   tinyMCE.init({
      // General options
      mode : "none",
      language: "pl",
      elements : "elm4",
      entity_encoding : "raw",
      width: "100%",
      height: "500px",
      schema: "html5",

      theme : "advanced",
      skin : "o2k7",
      skin_variant : "silver",

      plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

      // Theme options
      theme_advanced_buttons1 : "undo, redo, |, styleselect, formatselect, fontselect, fontsizeselect, |, insertdate,inserttime, search, replace, |, tablecontrols",
      theme_advanced_buttons2 : "bold, italic, underline, strikethrough, | justifyleft, justifycenter, justifyright, justifyfull, |, sub, sup, forecolor, backcolor, |, bullist,numlist,|,outdent,indent,blockquote,|, link, unlink, image, charmap, emotions, iespell, media, hr ",


      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,

      // Example content CSS (should be your site CSS)
      content_css : "../app/res/css/main-style.min.css",

      // Drop lists for link/image/media/template dialogs
      template_external_list_url : "lists/template_list.js",
      external_link_list_url : "lists/link_list.js",
      external_image_list_url : "lists/image_list.js",
      media_external_list_url : "lists/media_list.js",
   });

   setTimeout(function() {tinyMCE.execCommand('mceAddControl',false, 'field');}, 0);

</script>
<?php } ?>

<div class="container">
   <div class="row  text-center centered" style="margin-top:20px">
      <div class="centered col-xs-12">
         <form action="" method="post" id="edit" class="well">
            <legend>Edycja bloku: <i><?php echo $this->getData('block_id') ?></i></legend>
            <?php echo $this->getData('cms_field') ?>
            <input type="hidden" id="type" value="<?php echo $this->getData('block_type') ?>" /><br><br>
            <input type="submit" name="submit" class="btn btn-success" value="Wyślij"/>
         </form>
      </div>
   </div>
</div>