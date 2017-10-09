<?php
$date = explode(' ', $row['created_at']);

echo '
   <section class="container">
      <div class="row">
         <div class="col-lg-10 col-lg-offset-1 col-xs-12">
            <div class="col-sm-6 col-xs-12 text-center"><strong>Dodał: </strong>' . $user_value . '</div>
            <div class="col-sm-6 col-xs-12 text-center"><strong>Data dodania: </strong>' . $date[0] . '</div>
         </div>
         <div class="col-lg-10 col-lg-offset-1 col-xs-12">
            <div>
               <h3 class="band-title">' . $row['name'] . '</h3>
               <p>' . $row['content'] . '</p>
               <div class="marg-mobile col-xs-12">
                  <div class=" col-xs-12">';
                     include('advertisement.php');
echo '     
                  </div>
                  <div class="col-xs-12"><hr/></div>
                  <h3><strong>Dyskografia</strong></h3>';
                  $albums = $settings->selectBandAlbums($row['band_id']);
                  $n = 0;
                  foreach ($albums as $album) {
                     $track_list = explode('|', $album['track_list']);
echo '
                     <div>
                        <div class="col-xs-12 album-title">' . $album['title'] . '</div>
                        <div class="col-xs-12 album-description">' . $album['description'] . '</div>
                        <div class="track-list col-sm-8 col-xs-12">
                           <div><strong>Lista utworów:</strong></div>
                           <ol>';

                              foreach ($track_list as $track) {
                                 echo '<li>' . $track . '</li>';
                              }
echo '
                           </ol>
                        </div>
                        <div class="col-sm-4 col-xs-12"><img src="' . SITE_PATH . 'app/res/images/bands/' . $album['image_name'] . '" class="img-responsive album-img" alt="'. $album['title'] . '"></div>';
                        if(isset($_SESSION['loggedin'])){
                           include('bands_update_album_form.php');                       
                        }
echo '             
                     </div>
                     <div class="col-xs-12 album-classifier"><hr/></div>
                        ';
                     $n++;
                  };
                  if($n < 1){
                     echo '<h4 class="marg-top-1 text-red">Brak albumów</h4>';
                  }

echo '
               </div>
            </div>
         </div>
         <div id="advertisement" class="container">
            <div class="advertisement col-xs-12">';
               include('advertisement.php');
echo '     
            </div>
         </div>
         <div class="col-sm-8 col-sm-offset-2 col-xs-12 marg-top-1">
            <div class="embed-responsive embed-responsive-16by9">
               <iframe class="embed-responsive-item video" src="' . $row['video'] . '" frameborder="0" allowfullscreen></iframe>
            </div>   
         </div>   
      </div>
   </section>';


