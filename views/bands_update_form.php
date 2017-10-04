<?php
echo'
   <section class="container switch_off">
      <div class="row col-xs-12">
         <form action="controllers/bands_delete.php" class="form-inline" method="POST">
            <div class="col-xs-12 button_margin offset-row">
               <input type="text" class="form-control hidden" value="' . $row['band_id'] .'" id="band_id" name="band_id" aria-expanded="false">
               <button type="submit" name="submit" id="submit" class="btn btn-danger centered text-center"><i class="fa fa-trash-o" aria-hidden="true"></i><span> Usuń zespół</span></button>
            </div>
         </form>
      </div>
      <div class="row col-xs-12 offset-row">
         <button class="btn btn-primary" data-toggle="collapse" data-target="#update_form' . $row['band_id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Aktualizuj zespół</span></button>
         <div id="update_form' . $row['band_id'] . '" class="collapse bg-form">
            <form action="controllers/bands_update.php"  method="POST">
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['band_id'] . '" id="band_id" name="band_id" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['name'] . '" id="band_name" name="band_name">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control" value="' . $row['name'] . '" id="name" name="name" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="url" class="form-control" value="' . $row['video'] . '" id="video" name="video" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <textarea name="content" id="content" class="form-control">' . $row['content'] . '</textarea>
               </div>
               <div class="form-group offset-row">
                  <button type="submit" name="submit" id="submit" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i><span> Zapisz zmiany</span></button>
               </div>
            </form>
         </div>
      </div>
   </section>
';