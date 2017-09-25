<?php
	include('../app/init.php');
	include('../app/settings/models/m_settings.php');
	$CMS->Auth->checkAuthorization();
	$settings = new Settings();

if(isset($_POST['submit'])){

	$stmt = $settings->selectAllNews();

	$news_id = $_POST['news_id'];
	$changed = $settings->deleteNews($news_id);

	    if($changed == TRUE){
			$_SESSION['alert'] = '<div class="alert alert-success"><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> News został usunięty</div>';
    		header('Location: ' . SITE_PATH . 'news.php');
        } 
        else {
    		header('Location: '. SITE_PATH . 'app/core/views/v_error.php');

        }
}
else{
    header('Location: ' . SITE_PATH . 'news.php'); 
}