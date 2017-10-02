<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();
$CMS->Template->load(APP_PATH . 'settings/views/v_users.php');
