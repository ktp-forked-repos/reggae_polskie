<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

   $CMS->Template->setData('id', $_POST['id']);
   $CMS->Template->setData('content', $_POST['content']);

   $id = $_POST['id'];
   $content = $_POST['content'];


   if($id == 'null'){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz gatunek z listy','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
   }
   else if($content == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj link do wideo','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
   }
   else if($size_content  > 200){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi link','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
   }
   else{
      $changed = $settings->changeGenreVideo($id, $content);

      if($changed == TRUE){

         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Wideo zostało zaktualizowane','success');
         $CMS->Template->setData('id', '');
         $CMS->Template->setData('content', '');

         $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_genre_video.php');
}