<?php
$stmt = $settings->selectThree();
$row = mysqli_fetch_array($stmt);

foreach($stmt as $row)  
{
   $content = strip_tags($row['content']);
   $title = strip_tags($row['title']);

   if (strlen($content) > 330) {
      $contentCut = substr($content, 0, 330);
      $content = substr($contentCut, 0, strrpos($contentCut, ' ')).' . . .'; 
   }

   if (strlen($title) > 80) {
      $titleCut = substr($title, 0, 80);
      $title = substr($titleCut, 0, strrpos($titleCut, ' ')).' . . .'; 
   }

   $datetime = explode('-', $row['created_at']);
   $year = $datetime[0];
   $month = $datetime[1];
   $days = explode(' ', $datetime[2]);
   $day = $days[0];

   echo ' 
      <div class="row">
         <div class="col-sm-3 col-xs-12">
            <a href="news.php">
               <img class="news-img alt="news" src="data:image/jpeg;base64,'. base64_encode($row['image'] ) .'" >
            </a>
         </div>
         <div class="col-sm-9 col-xs-12">
            <div class="row">
               <div class="col-sm-10 col-xs-8 news-title">'. $title .'</div>  
               <div class="col-sm-2 col-xs-4 news-date">'. $day . '.' . $month . '<br>' . $year .'</div>
            </div>
            <div class="col-xs-12 news-contents">'. $content .'</div>  
         </div>  
      </div>
      <div class="row">
         <hr class="news-line">  
      </div>
   ';
};


