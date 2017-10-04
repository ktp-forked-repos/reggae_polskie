<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
   $settings = new Settings();
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Formularz edycji karuzeli</h3></div>
      <form  action="#"  method="post" enctype="multipart/form-data" class="form-wrapper form-horizontal">
         <div class="form-group">
            <div class="text-left">
               <?php
                  $alerts = $this->getAlerts();
                  if($alerts != ''){
                     echo '<ul class="alerts">' . $alerts . '</ul>';
                  }
               ?>
            </div>
         </div>
         <div class="form-group  col-xs-12">
            <label class="control-label" for="id_image">Wybierz obraz który chcesz aktualizować:</label>
            <select class="form-control" name="id_image" id="id_image" >
               <option value="0" class="first" selected>Lista obrazów</option>
               <?php
                  for($i = 1; $i <= 3; $i++){
                     $id = $settings->selectCarouselName($i);
                     echo '<option value="' . $i . '">' . $i . '. ' . $id . '</option>';
                  }
               ?>
            </select>
         </div>
         <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Tytuł" value="<?php echo $this->getData('title');?>">
         </div>
         <div class="form-group">
            <input type="text" name="description" id="description" class="form-control" placeholder="Opis" value="<?php echo $this->getData('description');?>">
         </div>
         <div class="form-group btn-group col-xs-12">
            <input type="file" accept="image/*" class="btn btn-primary col-xs-10 col-sm-9" name="file" id="file" value="<?php echo $this->getData('file');?>">
            <button type="submit" style="padding-bottom: 10px" id="submit" name="submit" value="submit" class="btn btn-danger col-sm-3 col-xs-2"><i class="fa fa-check fa" aria-hidden="true"></i> <span>Zatwierdź</span> </button>
         </div>
      </form> 
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>