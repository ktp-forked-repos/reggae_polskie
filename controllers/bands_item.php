<?php
if(isset($name)){
   $stmt = $settings->selectBand($name);
   $num_rows = mysqli_num_rows($stmt);
   if($num_rows > 0){
      $row = mysqli_fetch_array($stmt);
      foreach($stmt as $row)  
      {
         $user_id = $row['user_id'];
         $user_value = $settings->selectUser($user_id);
         if(isset($_SESSION['loggedin'])){
            include("views/bands_update_form.php");
            include("views/bands_add_album_form.php");
         }
         include("views/bands_item_form.php");
      };
   }
   else{
      die ('<h4 class="row entry-empty col-xs-12"><i class="fa fa-meh-o" aria-hidden="true"> brak w bazie zespołu o podanej nazwie</h4>');
   }
}