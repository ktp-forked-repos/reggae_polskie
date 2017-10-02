<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

   $CMS->Template->setData('user_id', $_POST['user_id']);
   $CMS->Template->setData('title', $_POST['title']);
   $CMS->Template->setData('content', $_POST['content']);

   $user_id = $_POST['user_id'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $size = $_FILES["file"]["size"];
   $image = $_FILES["file"]["tmp_name"];
   $type = $_FILES["file"]["type"];
   $size_title = strlen($title);
   $size_content = strlen($content);

   if($size == 0){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz obraz z dysku o maksymalnym rozmiarze 1MB','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($user_id == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Błąd autoryzacji użytkownika - skontaktuj się z administratorem','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($title == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj tytuł newsa','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($size_title > 200){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi tytuł','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($content == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj treść newsa','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($size_content  > 20000){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa treść - maksymalnie 20000 znaków','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else if($size > 1048576){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Obraz musi być mniejszy niż 1MB','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
   }
   else{
      $file  = addslashes(file_get_contents($_FILES["file"]["tmp_name"])); 

      $changed = $settings->createNews($user_id, $title, $content, $file);

      if($changed == TRUE){

         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> News został dodany','success');
         $CMS->Template->setData('title', '');
         $CMS->Template->setData('content', '');
         $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_news.php');
}