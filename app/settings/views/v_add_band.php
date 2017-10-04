<?php
   $this->load(APP_PATH . 'settings/templates/t_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>

   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Formularz dodawania nowego zespołu</h3></div>
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
         <div class="form-group">
            <input type="text" name="user_id" id="user_id" class="form-control hidden" value="<?php echo $this->userId(); ?>">
         </div>
         <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nazwa zespołu" value="<?php echo $this->getData('name');?>">
         </div>
         <div class="form-group">
            <input type="url" name="video" id="video" class="form-control" placeholder="Utwór promujący http://..." value="<?php echo $this->getData('video');?>">
         </div>
         <div class="form-group">
            <label class="col-xs-12" for="content">Opis zespołu:</label>
            <textarea name="content" id="content" class="form-control" placeholder="Opis zespołu" ><?php echo $this->getData('content');?></textarea>
         </div>
         <div class="form-group centered  text-center">
            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Zatwierdź</button>
            <button type="reset" id="reset" name="reset" value="reset" class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść</button>
         </div>
      </form> 
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>