<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

   $CMS->Template->setData('artist', $_POST['artist']);
   $CMS->Template->setData('title', $_POST['title']);
   $CMS->Template->setData('video_link', $_POST['video_link']);

   $artist = $_POST['artist'];
   $title = $_POST['title'];
   $video_link = $_POST['video_link'];

   $size_artist = strlen($artist);
   $size_title = strlen($title);
   $size_video_link = strlen($video_link);

   if($artist == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole nazwa zespołu jest obowiązkowe','danger');
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else if($size_name > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa nazwa zespołu','danger');
            echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else if($title == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole tytuł utworu jest obowiązkowe','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else if($size_title  > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi tytuł utworu','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else if($video_link == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole link do utworu jest obowiązkowe','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else if($size_video_link  > 50){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi link','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
   }
   else{
      $changed = $settings->createVideo($video_link, $artist, $title);

      if($changed == TRUE){

         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Dodano wideo do bazy','success');
         $CMS->Template->setData('artist', '');
         $CMS->Template->setData('title', '');
         $CMS->Template->setData('video_link', '');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_add_video.php');
}