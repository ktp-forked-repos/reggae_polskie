<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

   $CMS->Template->setData('user_id', $_POST['user_id']);
   $CMS->Template->setData('name', $_POST['name']);
   $CMS->Template->setData('video', $_POST['video']);
   $CMS->Template->setData('content', $_POST['content']);

   $user_id = $_POST['user_id'];
   $name = $_POST['name'];
   $video = $_POST['video'];
   $content = $_POST['content'];

   $letter = strtolower(substr($name, 0, 1));
   $size_name = strlen($name);
   $size_content = strlen($content);
   $size_letter = strlen($letter);

   if($user_id == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Błąd autoryzacji użytkownika - skontaktuj się z administratorem','danger');
            echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else if($name == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole nazwa zespołu jest obowiązkowe','danger');
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else if($size_name > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa nazwa zespołu','danger');
            echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else if($content == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole opis jest obowiązkowe','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else if($size_content  > 20000){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi opis - maksymalnie 20000 znaków','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else if($size_letter != 1){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  Nie można przyporządkować nazwy zespołu do litery - spróbuj zmienić nazwę lub skontaktuj się z administratorem','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
   }
   else{
      $changed = $settings->createBand($user_id, $name, $video, $content, $letter);

      if($changed == TRUE){

         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Dodano zespół do bazy','success');
         $CMS->Template->setData('name', '');
         $CMS->Template->setData('video', '');
         $CMS->Template->setData('content', '');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_add_band.php');
}