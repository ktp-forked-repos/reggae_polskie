<?php

class CMS_Core{

   public $Template, $Auth, $Database, $Cms_class;

   function __construct($server, $user, $pass, $db){
      $this->Database = new mysqli($server, $user, $pass, $db);
      $this->Database->set_charset('utf8');

      include(APP_PATH . "core/models/m_template.php");
      $this->Template = new Template();
      $this->Template->setAlertTypes(array('success', 'warning', 'danger', 'info'));

      include(APP_PATH . "core/models/m_auth.php");
      $this->Auth = new Auth();

      include(APP_PATH . "cms/models/m_cms.php");
      $this->Cms_class = new Cms_class();

      session_start();	
   }

   function __destruct(){
      $this->Database->close();
   }

   function head(){
      if($this->Auth->checkLoginStatus()){
         include(APP_PATH . "core/templates/t_head.php");
      }
      if(isset($_GET['login']) && $this->Auth->checkLoginStatus() == FALSE){
         include(APP_PATH . "core/templates/t_login.php");
      }
   }

   function toolbar(){
      if($this->Auth->checkLoginStatus()){
         include(APP_PATH . "core/templates/t_toolbar.php");
      }
   }

   function navigation(){
      include(APP_PATH . "core/templates/t_nav.php");
   }

   function login_link(){
      if($this->Auth->checkLoginStatus()){
         echo "<a href='" . SITE_PATH . "app/logout.php' class='white_link'><i class='fa fa-sign-out' aria-hidden='true'></i> Wyloguj</a>";
      }
      else{
         echo "<a href='?login' class='white_link'><i class='fa fa-sign-in' aria-hidden='true'></i> Panel administracyjny</a>";
      }
   }
}