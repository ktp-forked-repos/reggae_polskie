<?php
echo ' 
   <div class="news-modal modal fade" id="news' . $row['news_id'] .'" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog" >
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <div>
                  <div>
                     <i class="fa fa-times fa-4x"></i>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <ul class="list-inline">
                     <li><strong>Data dodania: </strong>' . $row['created_at'] . '</li>
                     <li><strong>Dodał: </strong>' . $user_value . '</li>
                  </ul>
                  <div class="col-lg-10 col-lg-offset-1">
                     <div class="modal-body">
                        <h3 clas="news-title">' . $row['title'] . '</h3>
                        <p>' . $row['content'] . '</p>';
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
            </div>
         </div>
      </div>
   </div>';
?>