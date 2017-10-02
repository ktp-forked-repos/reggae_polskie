<?php
echo'
<div class="switch_off col-xs-12 offset-button-update">
   <div class="  text-center">
      <button class="btn btn-primary" data-toggle="collapse" data-target="#update_news_form' . $row['news_id'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Aktualizuj news</span></button>
      <div id="update_news_form' . $row['news_id'] . '" class="collapse bg-form">
         <form action="controllers/news_update.php"  method="POST">
            <div class="form-group offset-row">
               <input type="text" class="form-control hidden" value="' . $row['news_id'] . '" id="news_id" name="news_id" aria-expanded="false">
            </div>
            <div class="form-group offset-row">
               <input type="text" class="form-control" value="' . $row['title'] . '" id="title" name="title" aria-expanded="false">
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
</div>
';