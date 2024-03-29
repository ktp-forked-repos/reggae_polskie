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

   $letter = strtolower(substr($title, 0, 1));
   $size_title = strlen($title);
   $size_content = strlen($content);
   $size_letter = strlen($letter);



   if($user_id == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Błąd autoryzacji użytkownika - skontaktuj się z administratorem','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else if($title == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole hasło jest obowiązkowe','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else if($size_title > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długie hasło','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else if($content == '' ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Pole opis jest obowiązkowe','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else if($size_content  > 10000){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi opis - maksymalnie 10000 znaków','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else if($size_letter  != 1){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nie można przyporządkować hasła do litery - spróbuj zmienić nazwę lub skontaktuj się z administratorem','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
   }
   else{
      $changed = $settings->createEntry($user_id, $title, $content, $letter);

      if($changed == TRUE){

         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Hasło zostało prawidłowo zapisane w bazie','success');
         $CMS->Template->setData('title', '');
         $CMS->Template->setData('content', '');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_add_vocabulary.php');
}