<?php
include('../../app/init.php');
include('../../app/settings/models/m_settings.php');
$CMS->Auth->checkAuthorization();
$settings = new Settings();

if(isset($_POST['submit'])){

   $stmt = $settings->selectAllInvestments();
   $page_name = $_POST['page_name'];
   $invest_id = $_POST['invest_id'];
   $changed = $settings->deleteInvestments($invest_id);

   if($changed == TRUE){
      $_SESSION['alert'] = '<div class="alert alert-success"><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Wpis został usunięty</div>';
      header('Location: ' . SITE_PATH . 'sold/' . $page_name);
   } 
   else {
      header('Location: '. SITE_PATH . 'app/core/views/v_error.php');
   }
}
else{
   header('Location: ' . SITE_PATH . 'sold/' . $page_name); 
}