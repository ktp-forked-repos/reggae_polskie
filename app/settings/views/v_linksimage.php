<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Formularz edycji linków</h3></div>
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
         <div class="form-group col-xs-12">
            <label class="control-label" for="id_image">Wybierz obraz który chcesz aktualizować (od lewej):</label>
            <select class="form-control" name="id_image" id="id_image">
               <option value="0" class="first" selected>Wybierz obraz z listy</option>
               <option value="4">Link 1</option>
               <option value="5">Link 2</option>
               <option value="6">Link 3</option>
               <option value="7">Link 4</option>
               <option value="8">Link 5</option>
               <option value="9">Link 6</option>
            </select>
         </div>
         <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Nazwa firmy" value="<?php echo $this->getData('title');?>">
         </div>
         <div class="form-group">
            <input type="text" name="description" id="description" class="form-control" placeholder="Odnośnik http://..." value="<?php echo $this->getData('description');?>">
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