<?php

if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
} else {
  $id = 0;  
}

$stmt = $settings->selectOneNews($id);
$num_rows = mysqli_num_rows($stmt);
if($num_rows > 0){
   $row = mysqli_fetch_array($stmt);
   foreach($stmt as $row)  
   {
      $user_id = $row['user_id'];
      $user_value = $settings->selectUser($user_id);
      if(isset($_SESSION['loggedin'])){
         include("views/news_add_image_form.php");
         include("views/news_update_form.php");
      }
      include("views/news_item_form.php");
   };
} else {
   die ('<h4 class="row entry-empty col-xs-12"><i class="fa fa-meh-o" aria-hidden="true"> Error 404  Brak w bazie wpisu o podanym identyfikatorze</h4>');
}
