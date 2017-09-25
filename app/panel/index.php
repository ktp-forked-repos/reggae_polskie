<?php 
include('../init.php');
$CMS->Auth->checkAuthorization();
$CMS->Template->load(APP_PATH . "panel/views/v_panel.php");