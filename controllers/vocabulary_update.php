<?php
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $CMS->Auth->checkAuthorization();
   $settings = new Settings();

if(isset($_POST['submit'])){

   $title = $_POST['title'];
   $content = $_POST['content'];
   $entry_id = $_POST['entry_id'];

   $size_title = strlen($title);
   $size_content = strlen($content);
   $letter = strtolower(substr($title, 0, 1));


   if($title == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Pole hasło jest obowiązkowe</div>';
      header('Location: ' . SITE_PATH . 'vocabulary.php'); 
   }
   else if($size_title > 100){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długie hasło</div>';
      header('Location: ' . SITE_PATH . 'vocabulary.php'); 
   }
   else if($content == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Pole opis jest obowiązkowe</div>';
      header('Location: ' . SITE_PATH . 'vocabulary.php'); 
   }
   else if($size_content  > 10000){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długa treść - maksymalnie 10000 znaków</div>';
      header('Location: ' . SITE_PATH . 'vocabulary.php'); 
   }
   else{
      $changed = $settings->updateEntry($entry_id, $title, $content, $letter);

      if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Wpis został zaktualizowany</div>';
         header('Location: ' . SITE_PATH . 'vocabulary.php');

      } 
      else {
         header('Location: '. SITE_PATH . 'app/core/views/v_error.php');
      }
   }
}
else {
   header('Location: ' . SITE_PATH . 'vocabulary.php'); 
}