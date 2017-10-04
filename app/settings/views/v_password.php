<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Formularz zmiany hasła</h3></div>
      <form action="#" method="post" id="edit" class="form-wrapper form-horizontal">
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
            <label class="control-label col-md-3" for="oldpass">Stare hasło:</label>
            <div class="col-md-9 col-xs-12">
               <input type="password" class="form-control" name="oldpass"  id="oldpass" placeholder="Stare hasło" autocomplete="off" value="<?php echo $this->getData('oldpass'); ?>">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-3" for="newpass">Nowe hasło:</label>
            <div class="col-md-9 col-xs-12">
               <input type="password" class="form-control" name="newpass"  id="newpass" placeholder="Nowe hasło" autocomplete="off" value="<?php echo $this->getData('newpass'); ?>">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-3" for="newpass2">Powtórz hasło:</label>
            <div class="col-md-9 col-xs-12">
               <input type="password" class="form-control" name="newpass2"  id="newpass2" placeholder="Powtórz hasło" autocomplete="off" value="<?php echo $this->getData('newpass2'); ?>">
            </div>
         </div>

         <div class="form-group"> 
            <div class="col-xs-12 centered text-center">
               <button type="submit" name="submit" value="submit" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Zatwierdź</button>
            </div>
         </div>

      </form>
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>