<?php
echo'
   <section class="switch_off">
      <div class="row col-xs-12">
         <form action="controllers/bands_delete_album.php" class="form-inline" method="POST">
            <div class="col-xs-12 button_margin offset-row">
               <input type="text" class="form-control hidden" value="' . $row['name'] . '" id="name" name="name" aria-expanded="false">
               <input type="text" class="form-control hidden" value="' . $album['album_id'] .'" id="album_id" name="album_id" aria-expanded="false">
               <button type="submit" name="submit" id="submit" class="btn btn-danger centered text-center"><i class="fa fa-trash-o" aria-hidden="true"></i><span> Usuń album</span></button>
            </div>
         </form>
      </div>
      <div class="row col-xs-12 offset-row">
         <button class="btn btn-primary" data-toggle="collapse" data-target="#update_album_form' . $album['album_id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Aktualizuj album</span></button>
         <div id="update_album_form' . $album['album_id'] . '" class="collapse bg-form">
            <form action="controllers/bands_update_album.php"  method="POST">
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $album['album_id'] . '" id="album_id" name="album_id" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['name'] . '" id="name" name="name" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control" value="' . $album['title'] . '" id="title" name="title" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <textarea name="description" id="description" class="form-control">' . $album['description'] . '</textarea>
               </div>
               <div class="form-group offset-row">
                  <textarea name="track_list" id="track_list" class="form-control">' . $album['track_list'] . '</textarea>
               </div>
               <div class="form-group offset-row">
                  <button type="submit" name="submit" id="submit" class="btn btn-success text-center"><i class="fa fa-check" aria-hidden="true"></i><span> Zapisz zmiany</span></button>
               </div>
            </form>
         </div>
      </div>
   </section>
';