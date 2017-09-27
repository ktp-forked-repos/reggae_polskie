<?php
include("init.php");
$CMS->Auth->logout();
$CMS->Template->redirect(SITE_PATH);
