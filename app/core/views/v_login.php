<script>
   $(document).ready(function(){
      $('#log').submit(function(e){
         e.preventDefault();

         var login = $('input#login').val();
         var password = $('input#password').val();
         var datastring = 'login=' + login +'&password=' + password;

         $.ajax({
            type: "POST",
            url: " <?php echo SITE_PATH; ?>app/login.php",
            data: datastring,
            cache: false,
            success: function(html){
               $('#cboxLoadedContent').html(html);
            }
         });
      });

      $('#cboxClose').on('click',function(e){
         e.preventDefault();
         $.colorbox.close();
         var page = window.location.href;
         page = page.substring(0, page.lastIndexOf('?'));
         window.location = page;
      });
   });
</script>

<div class="col-xs-12">
   <div class="row">
      <div class="col-xs-12">
         <h3 class="text-center">Panel administratora</h3>
      </div>
   </div>
   <div class="row">
      <div class="col-xs-12" >
         <form action="" method="post" id="log" class="form-wrapper form-horizontal">
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
               <label class="control-label col-md-3" for="login">Login:</label>
               <div class="col-md-9 col-xs-12">
                  <input type="text" class="form-control" name="login" id="login" placeholder="Login" autocomplete="off" value="<?php echo $this->getData('input_login'); ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-md-3" for="password">Hasło:</label>
               <div class="col-md-9 col-xs-12">
                  <input type="password" class="form-control" name="password"  id="password" placeholder="Hasło" autocomplete="off" value="<?php echo $this->getData('input_pass'); ?>">
               </div>
            </div>
            <div class="form-group"> 
               <div class="col-xs-12 centered text-center">
                  <button type="submit" name="submit" value="submit" class="btn btn-danger">Zaloguj</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>