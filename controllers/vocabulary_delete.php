<?php
   include('../app/init.php');
   include('../app/settings/models/m_settings.php');
   $CMS->Auth->checkAuthorization();
   $settings = new Settings();

if(isset($_POST['submit'])){

   $stmt = $settings->selectEntry($letter);
   $entry_id = $_POST['entry_id'];
   $changed = $settings->deleteEntry($entry_id);

       if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Wpis został usunięty</div>';
         header('Location: ' . SITE_PATH . 'vocabulary.php');
        } 
        else {
         header('Location: '. SITE_PATH . 'app/core/views/v_error.php');
        }
}
else{
    header('Location: ' . SITE_PATH . 'vocabulary.php'); 
}