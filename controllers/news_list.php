<?php

$query = $settings->countNews();
$row = mysqli_fetch_assoc($query);
$all_posts = $row['all_posts'];
$onpage = 10;
$navnum = 5;
$allpages = ceil($all_posts/$onpage);

//check the validity of the variable $_GET['page']
if(!isset($_GET['page']) or $_GET['page'] > $allpages or !is_numeric($_GET['page']) or $_GET['page'] <= 0){
   $page = 1;
}
else{
   $page = $_GET['page'];
}

$limit = ($page - 1) * $onpage; 

//database query
$stmt = $settings->selectNews($limit, $onpage);
$row = mysqli_fetch_array($stmt);

//display results
foreach($stmt as $row)  
{
   $content = strip_tags($row['content']);
   $title = strip_tags($row['title']);

   if (strlen($content) > 300) {
      $contentCut = substr($content, 0, 300);
      $content = substr($contentCut, 0, strrpos($contentCut, ' ')).' . . . '; 
   }

   if (strlen($title) > 90) {
      $titleCut = substr($title, 0, 90);
      $title = substr($titleCut, 0, strrpos($titleCut, ' ')).' . . . '; 
   }

   $datetime = explode('-', $row['created_at']);
   $year = $datetime[0];
   $month = $datetime[1];
   $days = explode(' ', $datetime[2]);
   $day = $days[0];
   $hours = explode(':', $days[1]);
   $hour = $hours[0] . ':' . $hours[1];

   echo ' 
      <div class="row">
         <div class="col-sm-3 col-xs-12">
            <a href="#news'. $row['news_id'] .'" data-toggle="modal" data-target="#news'. $row['news_id'] .'">
               <img class="news-img alt="news" src="data:image/jpeg;base64,'. base64_encode($row['image'] ) .'" >
            </a>';

            if(isset($_SESSION['loggedin'])){
               include("views/news_delete_form.php");
            }
         echo ' </div>
         <div class="col-sm-9 col-xs-12">
            <div class="row">
               <div class="col-sm-10 col-xs-9 news-title">'. $title .'</div>  
               <div class="col-sm-2 col-xs-3 news-date">'. '<small>Dodano:</small><br>' . $day . '.' . $month . '.' . $year .'</div>
            </div>
            <div class="col-xs-12 news-contents offset-row">'. $content . '<a href="#news'.  $row['news_id'] .'" data-toggle="modal">
               Zobacz więcej</a>
            </div>  
         </div>  
         <div class="col-sm-12">';
            if(isset($_SESSION['loggedin'])){
               include("views/news_add_image_form.php");
               include("views/news_update_form.php");
            }
         echo '</div>
      </div>
      <div class="row">
         <div class="col-xs-12"><hr class="news-line"></div>
      </div>
   ';
    };

//pagination
   if($navnum > $allpages){
      $navnum = $allpages;
   }

   $forstart = $page - floor($navnum/2);
   $forend = $forstart + $navnum;

   if($forstart <= 0){ $forstart = 1; }

   $overend = $allpages - $forend;

   if($overend < 0){ $forstart = $forstart + $overend + 1; }

   $forend = $forstart + $navnum;
   $prev = $page - 1;
   $next = $page + 1;
   $script_name = $_SERVER['SCRIPT_NAME'];

   echo '<div class="row col-sm-9 col-xs-12 text-center">
   <ul class="pagination">
   ';
   if($page > 1) echo '<li><a href="' . $script_name . '?page=' . $prev . '""> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></li>';
   if ($forstart > 1) echo '<li><a href="'. $script_name . '?page=1">1</a></li>';
   if ($forstart > 2) echo '<li class="disabled"><span>...</span></li>';
   for($forstart; $forstart < $forend; $forstart++){
      if($forstart == $page){
         echo '<li class="active">';
      }
      else{
         echo "<li>";
      }
      echo '<a href="' . $script_name . '?page=' . $forstart . '">' . $forstart . '</a></li>';
   }
   if($forstart <= $allpages) echo '<li class="disabled"><span>...</span></li>';
   if($forstart - 1 < $allpages) echo '<li><a href="' . $script_name . '?page=' . $allpages . '">' . $allpages . '</a></li>';
   if($page < $allpages) echo '<li><a href="' . $script_name . '?page=' . $next . '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>';
   echo '  </ul>
   </div>
   ';