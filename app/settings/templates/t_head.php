<!DOCTYPE html>
<html>
<head>
   <meta charset=utf-8>
   <meta name=viewport content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>css/main-style.min.css">
   <script src="<?php echo APP_RES; ?>js/jquery-3.2.1.min.js"></script>
   <script src="<?php echo APP_RES; ?>js/jquery.colorbox-min.js"></script>
   <script src="<?php echo APP_RES; ?>tinymce/tiny_mce_src.js"></script>
   <script src="<?php echo APP_RES; ?>tinymce/tiny_mce_popup.js"></script>
   <script src="<?php echo APP_RES; ?>tinymce/tiny_mce.js"></script>
   <title>Panel ustawień</title>

   <script>
      $(document).ready(function(){
         $('#cboxClose').on('click',function(e){
            e.preventDefault();
            parent.$.colorbox.close();
         });
      });

   </script>	

   <script type="text/javascript">
      tinyMCE.init({
         // General options
         mode : "textareas",
         language: "pl",
         elements : "elm4",
         entity_encoding : "raw",
         width: "100%",
         height: "250px",
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
         content_css : "<?php echo APP_RES; ?>css/main-style.min.css",

         // Drop lists for link/image/media/template dialogs
         template_external_list_url : "lists/template_list.js",
         external_link_list_url : "lists/link_list.js",
         external_image_list_url : "lists/image_list.js",
         media_external_list_url : "lists/media_list.js",



      });
   </script>
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
</head>
<body>