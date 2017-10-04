<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Formularz edycji filmów w gatunkach</h3></div>
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
            <label class="control-label" for="id">Gatunki muzyczne:</label>
            <select class="form-control" name="id" id="id" >
               <option value="null" class="first" selected>Wybierz gatunek</option>
               <option value="genre_dancehall_video">Dancehall</option>
               <option value="genre_dub_video">Dub</option>
               <option value="genre_mento_video">Mento</option>
               <option value="genre_nyabinghi_video">Nyabinghi</option>
               <option value="genre_punky_video">Punky reggae</option>
               <option value="genre_raggamuffin_video">Raggamuffin</option>
               <option value="genre_reggae_video">Reggae</option>
               <option value="genre_reggaeton_video">Reggaeton</option>
               <option value="genre_rockers_video">Rockers reggae</option>
               <option value="genre_rocksteady_video">Rocksteady</option>               
               <option value="genre_roots_video">Roots reggae</option>
               <option value="genre_samba_video">Samba reggae</option>
               <option value="genre_ska_video">Ska</option>
            </select>
         </div>
         <div class="form-group col-xs-12">
            <input type="text" name="content" id="content" class="form-control" placeholder="Link https://www.youtube.com..." value="<?php echo $this->getData('content');?>">
         </div>
         <div class="form-group col-xs-12 text-center">
            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-check fa" aria-hidden="true"></i> <span>Zatwierdź</span> </button>
         </div>
      </form> 
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>