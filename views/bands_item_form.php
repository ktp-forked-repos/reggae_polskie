<?php
$date = explode(' ', $row['created_at']);

echo '
   <section class="container">
      <div class="row">
         <div class="col-lg-10 col-lg-offset-1">
            <div class="col-sm-6 col-xs-12 text-center"><strong>Dodał: </strong>' . $user_value . '</div>
            <div class="col-sm-6 col-xs-12 text-center"><strong>Data dodania: </strong>' . $date[0] . '</div>
         </div>
         <div class="col-lg-10 col-lg-offset-1">
            <div>
               <h3 class="band-title">' . $row['name'] . '</h3>
               <p>' . $row['content'] . '</p>
               <div class="col-sm-12">';
                  $albums = $settings->selectBandAlbums($row['band_id']);
                  foreach ($albums as $album) {
                     $track_list = explode('|', $album['track_list']);
echo '
                  <div class="col-xs-12">
                     <div class="col-xs-12 album-title">' . $album['title'] . '</div>
                     <div class="col-xs-12 album-description">' . $album['description'] . '</div>
                     <div class="col-sm-8 col-xs-12">
                        <ol>';
                           foreach ($track_list as $track) {
                              echo '<li>' . $track . '</li>';
                           }
echo '
                        </ol>
                     </div>
                     <div class="col-sm-4 col-xs-12"><img src="' . SITE_PATH . 'app/res/images/bands/' . $album['image_name'] . '" class="img-responsive" alt=""></div>';
                     if(isset($_SESSION['loggedin'])){
                        include('bands_update_album_form.php'); 
                     }
echo '             
                  </div>
                  <div class="col-xs-12 album-classifier"><hr/></div>
                     ';
               }
echo '
               </div>
            </div>        
         </div>     
      </div>
   </section>';


