<?php
echo ' 

   <div class="container">
      <div class="row">
         <div class="col-lg-10 col-lg-offset-1 col-xs-12">
            <div class="col-sm-6 col-xs-12 text-center"><strong>Dodał: </strong>' . $user_value . '</div>
            <div class="col-sm-6 col-xs-12 text-center"><strong>Data dodania: </strong>' . date("Y-m-d H:i", strtotime($row['created_at'])) . '</div>
         </div>
         <div class="col-lg-10 col-lg-offset-1">
            <div class="modal-body text-center marg-top-1">
               <div class="news-title">' . $row['title'] . '</div>
               <div class="offset-row text-left">' . $row['content'] . '</div>';
               include('views/advertisement.php');
echo '
               <div class="col-sm-12 box_news">';
               $images = $settings->selectImageNews($row['news_id']);
               foreach ($images as $image) {
echo '
                  <div class="col-xs-3 box">
                     <a data-lightbox="news' . $row['news_id'] . '" href="' . SITE_PATH . 'app/res/images/news/' . $image['image_name'] . '" ><img src="' . SITE_PATH . 'app/res/images/news/' . $image['image_name'] . '" class="image" alt=""></a>
                  </div>';
               }
echo '
               </div>
            </div>        
         </div>     
      </div>
   </div>';
?>