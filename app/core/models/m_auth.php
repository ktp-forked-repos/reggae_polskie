<?php

class Auth{
   private $salt = 'QcZht#82@fdg@435hf-^fdsD3';
   
   function __construct(){
   }

   function validateLogin($user, $pass){
      global $CMS;
      if($stmt = $CMS->Database->prepare("SELECT * FROM users WHERE login = ? AND password = ?")){
         $stmt->bind_param("ss", $user, md5($pass.$this->salt));
         $stmt->execute();
         $stmt->store_result();

         if($stmt->num_rows > 0){
            
            $result = $CMS->Database->query("SELECT active FROM users WHERE login = '$user'");
            $row = $result->fetch_assoc();
            $active = $row['active'];
            if($active == 0){
               return 2;
            }
            else if($active == 1){
               $stmt->close();
               return TRUE;   
            }
            else{
               die('Błąd komunikacji z bazą danych! Skontaktuj się z administratorem strony');
            }

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

   function checkError403(){
      global $CMS;
         $CMS->Template->error('403'); 
   }

   function checkErrorDefault(){
      global $CMS;
         $CMS->Template->error('default'); 
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