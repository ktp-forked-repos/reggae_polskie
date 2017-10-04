<?php

class Template{
   private $data;
   private $alertTypes;

   function __construct(){}

   function load($url){
      include($url);
   }

   function redirect($url){
      header("Location: $url");
   }

// wprowadzaniwe danych
   function setData($name, $value, $clean = true){
      if($clean){
         $this->data[$name] = htmlentities($value, ENT_QUOTES);
      }
      else{
         $this->data[$name] = $value;
      }
   }

// odczyt danych
   function getData($name){
      if(isset($this->data[$name])){
         return $this->data[$name];
      } else {
         return '';
      }
   }

// Alerty
   function setAlertTypes($types){
      $this->setAlertTypes = $types;
   }

   function setAlert($value, $type = null){
      if($type == ''){
         $type = $this->alertTypes[0];
      }
      $_SESSION[$type][] = $value;
   }

   function getAlerts(){
      $data = '';
      foreach($this->setAlertTypes as $alert){
         if(isset($_SESSION[$alert])){
            foreach($_SESSION[$alert] as $value){
               $data .= '<li class="alert alert-' . $alert . ' alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $value . '</li>';
            }
            unset($_SESSION[$alert]);
         }
      }
      return $data;
   }

   function error($type = ''){
      if($type == 'unauthorized'){
         $this->load(APP_PATH . 'core/views/v_unauthorized.php');
      }
      else if($type == '403'){
         $this->load(APP_PATH . 'core/views/v_error403.php');
      }
      else{
         $this->load(APP_PATH . 'core/views/v_error.php');
      }
   }

   function userId(){
      global $CMS;
      $log = $_SESSION['login'];

      $result = $CMS->Database->query("SELECT * FROM users WHERE login = '$log'");
      $row = $result->fetch_assoc();
      $id = $row['user_id'];

      if($id != ''){
         return $id;
      }
      else{
         return '';
      }
   }
}