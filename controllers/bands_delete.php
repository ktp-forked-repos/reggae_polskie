<?php
include('../app/init.php');
include('../app/settings/models/m_settings.php');
$CMS->Auth->checkAuthorization();
$settings = new Settings();

if(isset($_POST['submit'])){

   $band_id = $_POST['band_id'];
   $changed = $settings->deleteBand($band_id);

   if($changed == TRUE){
      $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Zespół został usunięty</div>';
      header('Location: ' . SITE_PATH . 'bands.php');
   } 
   else {
      $CMS->Auth->checkErrorDefault();
   }
}
else{
   header('Location: ' . SITE_PATH . 'bands.php'); 
}