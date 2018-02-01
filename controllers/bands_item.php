<?php
$name_test = $name;
$name = preg_replace("/[^a-zA-Z0-9_-ąćęłńóśźżĄĆĘŁŃÓŚŹŻ \.!]/", '', $name);
if($name != $name_test){
      die ('
            <h3 class="row entry-empty text-center col-xs-12">
                <i class="fa fa-meh-o" aria-hidden="true"></i> Fatal Error!!!! Wykryto nieprawidłowy adres URL
                <br><br>
                <img src="'. APP_RES . 'images/main/fatal_error.jpg' . '" class="center-block img-responsive" alt="Cinque Terre"></h3>');
}
else if(isset($name) && $name === $name_test){

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
   } else {
      die ('<h4 class="row entry-empty col-xs-12"><i class="fa fa-meh-o" aria-hidden="true"> brak w bazie zespołu o podanej nazwie</h4>');
   }
} else {
      die ('<h4 class="row entry-empty col-xs-12"><i class="fa fa-meh-o" aria-hidden="true"> Hmmm... coś poszło nie tak - spróbuj jeszcze raz </h4>');
}
