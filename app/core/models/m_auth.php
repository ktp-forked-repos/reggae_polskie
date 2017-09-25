<?php

class Auth{
   private $salt = 'cds6zc7sdv';
   
   function __construct(){
   }

   function validateLogin($user, $pass){
      global $CMS;

      if($stmt = $CMS->Database->prepare("SELECT * FROM users WHERE login = ? AND password = ?")){
         $stmt->bind_param("ss", $user, md5($pass.$this->salt));
         $stmt->execute();
         $stmt->store_result();

         if($stmt->num_rows > 0){
            $stmt->close();
            return TRUE;   
         }
         else{
            $stmt->close();
            return FALSE;
         }
      }
      else{
         die('Błąd komunikacji z bazą danych! Skontaktuj się z administratorem strony');
      }
   }

   function name(){
      global $CMS;
      $log = $_SESSION['login'];

      $result = $CMS->Database->query("SELECT * FROM users WHERE login = '$log'");
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $surname = $row['surname'];

      if($name != ''){
         return $name . " " . $surname;
      }
      else{
         return 'Błąd zapytanie do bazy';
      }
   }

   function checkLoginStatus(){
      if(isset($_SESSION['loggedin'])){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function checkAuthorization(){
      global $CMS;
      if($this->checkLoginStatus() == FALSE){
         $CMS->Template->error('unauthorized'); 
         exit;
      }
   }

   function getSalt(){
      return $this->salt;
   }

   function getCurrentUserName(){
      return $_SESSION['login'];
   }

   function logout(){
      session_destroy();
      session_start();
   }
}