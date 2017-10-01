<?php
echo '
   <form action="controllers/add_image.php" class="switch_off" method="post" enctype="multipart/form-data">
      <div class="col-sm-6 col-sm-offset-2 col-xs-12 offset-row ">
         <input type="text" class="form-control hidden" value="' . $row['news_id'] .'" id="news_id" name="news_id">
         <span class="label label-success">Wybierz obraz:</span>
         <input type="file" accept="image/*" class="btn btn-success col-xs-12" name="file" id="file" value="file" >
      </div>
      <div class="col-sm-2 col-xs-12 text-center" style="margin-top:35px;">
         <button type="submit" name="submit" id="submit" class="btn btn-success" data-toggle="tooltip" title="Pozwala dodać zdjęcia do zawartości wpisu"><i class="fa fa-file-image-o" aria-hidden="true"></i> Zapisz plik</button>
      </div>
   </form>
';