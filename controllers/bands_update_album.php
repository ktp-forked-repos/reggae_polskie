<?php
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $CMS->Auth->checkAuthorization();
   $settings = new Settings();

if(isset($_POST['submit'])){

   $album_id = $_POST['album_id'];
   $band_name = $_POST['name'];
   $title = $_POST['title'];
   $description = htmlentities($_POST['description'],  ENT_QUOTES);
   $track_list = htmlentities($_POST['track_list'],  ENT_QUOTES);

   $size_title = strlen($title);
   $size_description = strlen($description);
   $size_track_list = strlen($track_list);


   if($title == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Tytuł albumu jest obowiązkowy</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($size_title > 200){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długi tytuł</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($description == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Opis albumu jest obowiązkowy</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($size_description  > 20000){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długi opis albumu - maksymalnie 20000 znaków</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($track_list == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Track lista jest obowiązkowa</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($size_track_list  > 10000){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zbyt długa zawartość track listy - maksymalnie 10000 znaków</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else if($album_id == '' ){
      $_SESSION['alert'] = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Nie udało się przyporządkować albumu do artysty - skontaktuj się z administratorem</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   }
   else{

      $changed = $settings->updateBandAlbum($album_id, $title, $description, $track_list);

      if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Album został dodany</div>';
         header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 

      } 
      else {
         $CMS->Auth->checkErrorDefault();
      }
   }
}
else {
   header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
}