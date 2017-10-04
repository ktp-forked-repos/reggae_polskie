<?php
include('../app/init.php');
include('../app/settings/models/m_settings.php');
$CMS->Auth->checkAuthorization();
$settings = new Settings();

if(isset($_POST['submit'])){
   
   $band_name = $_POST['name'];
   $album_id = $_POST['album_id'];
   $changed = $settings->deleteBandAlbum($album_id);

   if($changed == TRUE){
      $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Album został usunięty</div>';
      header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
   } 
   else {
      $CMS->Auth->checkErrorDefault();
   }
}
else{
   header('Location: ' . SITE_PATH . 'bands.php?name=' . $band_name); 
}