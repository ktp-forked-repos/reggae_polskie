<?php
   $this->load(APP_PATH . 'settings/templates/t_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>

   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Dodaj nową inwestycję</h3></div>
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
            <span class="label label-primary">Wybierz obraz, który będzie miniaturą:</span>
            <input type="file" accept="image/*" class="btn btn-primary col-xs-12" name="file" id="file" value="<?php echo $this->getData('file');?>"/>
         </div>
         <div class="form-group ">
            <select class="form-control" name="investment_type" id="investment_type" >
               <option value="0" class="first" selected>Wybierz typ nieruchomości</option>
               <option value="1">Parterowy wolnostojący</option>
               <option value="2">W zabudowie bliźniaczej</option>
               <option value="3">Domy parterowe w zabudowie bliźniaczej</option>
            </select>
         </div>

         <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Tytuł inwestycji" value="<?php echo $this->getData('title');?>">
         </div>
         <div class="form-group">
            <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" placeholder="Cena sprzedaży w PLN" value="<?php echo $this->getData('price');?>">
         </div>
         <div class="form-group">
            <diV class="col-sm-6 col-xs-12 centered text-center marg-bottom">
               <input type="number" name="rooms" id="rooms" class="form-control" step="1" min="0" max="20" autocomplete="off" placeholder="Liczba pokoi" value="<?php echo $this->getData('rooms');?>">
            </diV>
            <diV class="col-sm-6 col-xs-12 centered text-center">
               <input type="number" name="all_rooms" id="all_rooms" class="form-control" step="1" min="0" max="40" autocomplete="off" placeholder="Liczba pomieszczeń" value="<?php echo $this->getData('all_rooms');?>">
            </diV>   
         </div>
         <div class="form-group">
            <diV class="col-sm-6 col-xs-12 centered text-center marg-bottom">
               <input type="number" name="meterage" id="meterage" class="form-control" step="1" min="1" max="1000" autocomplete="off" placeholder="Metraż nieruchomości w m^2" value="<?php echo $this->getData('meterage');?>">
            </diV>
            <diV class="col-sm-6 col-xs-12 centered text-center">
               <input type="number" name="plot" id="plot" class="form-control" step="1" min="1" max="1000000" autocomplete="off" placeholder="Powierzchnia działki w m^2" value="<?php echo $this->getData('plot');?>">
            </diV>   
         </div>
         <div class="form-group">
            <diV class="col-sm-6 col-xs-12 centered text-center marg-bottom">
               <input type="text" name="city" id="city" class="form-control" placeholder="Miejscowość" value="<?php echo $this->getData('city');?>">
            </diV>
            <diV class="col-sm-6 col-xs-12 centered text-center">
               <input type="text" name="street" id="street" class="form-control" placeholder="Ulica" value="<?php echo $this->getData('street');?>">
            </diV>   
         </div>
         <div class="form-group">
            <textarea name="content" id="content" class="form-control" placeholder="Treść inwestycji" ><?php echo $this->getData('content');?></textarea>
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