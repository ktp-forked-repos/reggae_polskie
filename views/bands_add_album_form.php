<?php
echo'
<section class="container offset-row switch_off">
   <div class="row col-xs-12 ">
      <div>
         <button class="btn btn-success" data-toggle="collapse" data-target="#band_add_album' . $row['band_id'] . '"><i class="fa fa-plus" aria-hidden="true"></i><span> Dodaj album</span></button>
         <div id="band_add_album' . $row['band_id'] . '" class="collapse bg-form">
            <form action="controllers/bands_add_album.php" method="post" enctype="multipart/form-data">
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['band_id'] . '" id="band_id" name="band_id" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['name'] . '" id="name" name="name" aria-expanded="false">
               </div>
               <div class="form-group offset-row">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł albumu">
               </div>
               <div class="form-group offset-row">
                  <textarea name="description" id="description" class="form-control" placeholder="Opis albumu"></textarea>
               </div>
               <div class="form-group offset-row">
                  <textarea name="track_list" id="track_list" class="form-control" placeholder="Track lista - kolejne utwory muszą być oddzielone | "></textarea>
               </div>
               <div class="form-group offset-row">
                  <span class="label label-success text-left">Wybierz okładkę albumu:</span>
                  <input type="file" accept="image/*" class="btn btn-success col-xs-12" name="file" id="file" value="file" >
               </div>
               <div class="form-group offset-row">
                  <button type="submit" name="submit" id="submit" class="btn btn-success text-center offset-row"><i class="fa fa-check" aria-hidden="true"></i><span> Zapisz zmiany</span></button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
';