<?php
include('../../app/init.php');
include('../../app/settings/models/m_settings.php');
$CMS->Auth->checkAuthorization();
$settings = new Settings();
error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['submit'])){
   $type = $_FILES["file"]["type"];
   $page_name = $_POST['page_name'];

   if($_FILES["file"]["name"] == ''){
      $_SESSION['alert'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz plik z dysku</div>';
      header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
   }
   else if($_FILES["file"]["size"] < 1 || $_FILES["file"]["size"] > 2097152){
      $_SESSION['alert'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieprawidłowy rozmiar pliku - maksymalny rozmiar to 2MB</div>';
      header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
   }
   else if($_POST['invest_id'] == ''){
      $_SESSION['alert'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Inwestycja do której chcesz się odwołać nie istnieje - jeśli błąd się powtarza skontaktuj sie z administratorem</div>';
      header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
   }
   else if($type != "image/gif" && $type != "image/jpeg" && $type != "image/jpg" && $type != "image/png"){
      $_SESSION['alert'] = '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieprawidłowy format pliku </div>';
      header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
   }
   else{
      $invest_id = $_POST['invest_id'];

// query to get last id
      $last_id = $settings->getIdImageInvestments();
      $new_name = ++$last_id;

// change extension
      $temp = explode(".", $_FILES["file"]["name"]);
      $extension = end($temp);

// change filename and file path
      $file = $new_name . '.' . $extension;
      $target = "../../app/res/images/investments/" . $file;

// upload file to new location
      move_uploaded_file($_FILES['file']['tmp_name'], $target);

//query to the database
      $changed = $settings->addImageToInvestments($invest_id, $file);
      if($changed == TRUE){
         $_SESSION['alert'] = '<div class="alert alert-success"><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Dodano obraz</div>';
         header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
      } 
      else {
         header('Location: '. SITE_PATH . 'app/core/views/v_error.php');
      }
   }
}
else{
   header('Location: ' . SITE_PATH . 'forsale/' . $page_name);
}