<?php
echo '
   <div class="image_deleted switch_off">
      <form action="controllers/news_delete.php" class="form-inline" method="POST">
         <div class="col-xs-12 button_margin offset-row">
            <input type="text" class="form-control hidden" value="' . $row['news_id'] .'" id="news_id" name="news_id" aria-expanded="false">
            <button type="submit" name="submit" id="submit" class="btn btn-danger col-xs-12 centered text-center" data-toggle="tooltip" title="Pozwala usunąć wpis z bazy danych"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button>
         </div>
      </form>
   </div>
';