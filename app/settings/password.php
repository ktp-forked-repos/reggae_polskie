<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

    $CMS->Template->setData('oldpass', $_POST['oldpass']);
    $CMS->Template->setData('newpass', $_POST['newpass']);
    $CMS->Template->setData('newpass2', $_POST['newpass2']);


    /* walidacja */
    if($_POST['oldpass'] == '' || $_POST['newpass'] == '' || $_POST['newpass2'] == '' ){
        $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wypełnij wszystkie pola','danger');
        $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
    } 
    else if ($CMS->Auth->validateLogin($CMS->Auth->getCurrentUserName(), $CMS->Template->getData('oldpass')) == FALSE){
        $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Stare hasło jest nieprawidłowe','danger');
        $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
    }
    else if ($_POST['oldpass'] == $_POST['newpass']){
        $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nowe hasło nie może być identyczne jak stare','danger');
        $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
    }
    else if (strlen($_POST['newpass']) < 6 || strlen($_POST['newpass']) > 25){
        $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Hasło musi mieć 7-24 znaki','danger');
        $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
    } 
    else if ($_POST['newpass'] != $_POST['newpass2']){
        $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieprawidłowe powtórzenie hasła','danger');
        $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
    }  
    else {
        $changed = $settings->changePassword($CMS->Auth->getCurrentUserName(), $CMS->Template->getData('newpass'));

        if($changed == TRUE){
            $CMS->Template->setData('oldpass','');
            $CMS->Template->setData('newpass','');
            $CMS->Template->setData('newpass2','');
            $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Hasło zostało zmienione','success');
            $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
        } 
        else {
            $CMS->Template->setData('oldpass','');
            $CMS->Template->setData('newpass','');
            $CMS->Template->setData('newpass2','');
            $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieznany bład  - 400 Bad Reques - skontaktuj się z administratorem','danger');
            $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
        }
    }
} 
else {
    $CMS->Template->load(APP_PATH . 'settings/views/v_password.php');
}