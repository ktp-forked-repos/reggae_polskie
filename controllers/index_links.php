<?php
echo '
   <div class="row label">
       <div class="label-content"><span>polecamy</span></div>
   </div>
';
for($i = 4; $i < 10; $i++){
   echo '
   <div class="col-md-2 text-center">
      <div class="thumbnail box-shadow">';
         $result = $settings->selectCarouselContent($i);
         $row = mysqli_fetch_assoc($result);
         echo '<a href="' . $row['description'] . '">';
            $image = $settings->selectCarouselImage($i);
            echo '<div class="caption">
               <p class="title">' . $row['title'] . '</p>
            </div>
         </a>
      </div>
   </div>';
};
