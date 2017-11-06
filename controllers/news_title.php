<?php

if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
}
else{
  $id = 0;  
}

   $stmt = $settings->selectOneNews($id);
   $num_rows = mysqli_num_rows($stmt);
   if($num_rows > 0){
      $row = mysqli_fetch_array($stmt);
      foreach($stmt as $row)  
      {
         $name = $row['title'];
         echo $name;
      };
   }
   else{
      echo 'Error 404';
   }