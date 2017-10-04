<?php
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $CMS->Auth->checkAuthorization();
   $settings = new Settings();

if(isset($_POST['submit'])){

   $title = $_POST['title'];
   $content = $_POST['content'];
   $news_id = $_POST['news_id'];

   $size_title = strlen($title);
   $size_content = strlen($content);

   if($title == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Tytuł newsa jest obowiązkowy</div>';
      header('Location: ' . SITE_PATH . 'news.php'); 
   }
   else if($size_title > 200){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długi tytuł</div>';
      header('Location: ' . SITE_PATH . 'news.php'); 
   }
   else if($content == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Treść newsa jest obowiązkowa</div>';
      header('Location: ' . SITE_PATH . 'news.php'); 
   }
   else if($size_content  > 10000){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długa treść - maksymalnie 10000 znaków</div>';
      header('Location: ' . SITE_PATH . 'news.php'); 
   }
   else if($news_id == ''){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Błąd przypisania aktualizacji treści - skontaktuj się z administratorem!!!</div>';
      header('Location: ' . SITE_PATH . 'vocabulary.php'); 
   }
   else{
      $changed = $settings->updateNews($news_id, $title, $content);

      if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> News został zaktualizowany</div>';
         header('Location: ' . SITE_PATH . 'news.php');

      } 
      else {
         $CMS->Auth->checkErrorDefault();
      }
   }
}
else {
   header('Location: ' . SITE_PATH . 'news.php'); 
}