<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();

if(isset($_POST['submit'])){

   $size = $_FILES["file"]["size"];
   $image = $_FILES["file"]["tmp_name"];
   $id_image = $_POST['id_image'];
   $title = $_POST['title'];
   $description = $_POST['description'];
   $type = exif_imagetype($image);
   $CMS->Template->setData('id_image', $_POST['id_image']);

   if($size == 0){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz obraz z dysku o maksymalnym rozmiarze 1MB','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
   }
   else if($type != (IMAGETYPE_PNG || IMAGETYPE_JPEG || IMAGETYPE_GIF || IMAGETYPE_BMP)) {
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  Niewłaściwy typ pliku - dopuszczalne typy to:  JPG, GIF, PNG','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
   }
   else if($id_image == 0 ){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz obraz z listy, który chcesz zaktualizować','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
   }
   else if($size > 1048576){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Plik musi być mniejszy niż 1MB','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
   }
   else if($title > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Za długi tytuł','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
   }
   else if($description > 100){
      $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Za długi opis','danger');
      $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
   }
   else{
      $file  = addslashes(file_get_contents($_FILES["file"]["tmp_name"])); 
      $changed = $settings->changeCarouselImage($file, $id_image, $title, $description);

      if($changed == TRUE){
         $CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Plik został dodany','success');
         $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
      } 
      else {
         $CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
         $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
      }
   }
}
else {
   $CMS->Template->load(APP_PATH . 'settings/views/v_carouselimage.php');
}