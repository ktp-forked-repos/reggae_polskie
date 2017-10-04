<?php
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $CMS->Auth->checkAuthorization();
   $settings = new Settings();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $band_name = $_POST['band_name'];
   $content = $_POST['content'];
   $band_id = $_POST['band_id'];
   $video = $_POST['video'];

   $letter = strtolower(substr($name, 0, 1));
   $size_name = strlen($name);
   $size_content = strlen($content);
   $size_letter = strlen($letter);
  


   if($name == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Tytuł newsa jest obowiązkowy</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name);
   }
   else if($size_name > 200){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długi tytuł</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($content == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Treść newsa jest obowiązkowa</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($size_content  > 10000){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długa treść - maksymalnie 10000 znaków</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($size_letter  != 1){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Nie można przyporządkować nazwy zespołu do litery - spróbuj zmienić nazwę lub skontaktuj się z administratorem</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($band_id == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Błąd przypisania aktualizacji treści - skontaktuj się z administratorem!!!</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else{
      $changed = $settings->updateBand($band_id, $name, $video, $content, $letter);

      if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zespół został zaktualizowany</div>';
         header('Location: ' . SITE_PATH . 'bands.php?name=' . $name);

      } 
      else {
         $CMS->Auth->checkErrorDefault();
      }
   }
}
else {
   header('Location: ' . PAGE_PATH);
}