<!DOCTYPE html>
<html>
<head>
   <meta charset=utf-8>
   <meta name=viewport content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo APP_RES; ?>css/main-style.min.css">
   <script src="<?php echo APP_RES; ?>js/jquery-3.2.1.min.js"></script>
   <title>Panel ustawień</title>

   <script>
      $(document).ready(function(){
         $('#cboxClose').on('click',function(e){
            e.preventDefault();
            parent.$.colorbox.close();
         });
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