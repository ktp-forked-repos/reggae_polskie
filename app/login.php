<?php
include("init.php");

if(isset($_POST['login']) && isset($_POST['password'])){
   $CMS->Template->setData('input_login', $_POST['login']);
   $CMS->Template->setData('input_pass', $_POST['password']);

   if($_POST['login'] == ''  || $_POST['password'] == ''){
      if($_POST['login'] == ''){
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  Pole login jest wymagane','danger');
      }
      if($_POST['password'] == ''){
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  Pole hasło jest wymagane','danger');
      }
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH ."core/views/v_login.php");
   }
   else if($CMS->Auth->validateLogin($CMS->Template->getData('input_login'), $CMS->Template->getData('input_pass')) === 2){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Konto użytkownika zostało zablokowane','danger');
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH ."core/views/v_login.php");
   }
   else if($CMS->Auth->validateLogin($CMS->Template->getData('input_login'), $CMS->Template->getData('input_pass')) == FALSE){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieprawidłowy login lub hasło','danger');
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH ."core/views/v_login.php");
   }
   else{
      $_SESSION['login'] = $CMS->Template->getData('input_login');
      $_SESSION['loggedin'] = TRUE;
      echo '<script>$.colorbox.resize();</script>';
      $CMS->Template->load(APP_PATH ."core/views/v_logginingin.php");
   }

}
else{
   $CMS->Template->load(APP_PATH ."core/views/v_login.php");
}