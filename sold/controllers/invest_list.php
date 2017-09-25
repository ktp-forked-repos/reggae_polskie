<?php
$query = $settings->countInvestments($type, $sold);
$row = mysqli_fetch_assoc($query);
$all_posts = $row['all_posts'];

$onpage = 5;
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
$stmt = $settings->selectInvestments($type, $sold, $limit, $onpage);
$row = mysqli_fetch_array($stmt);

//display results
foreach($stmt as $row)  
{
   $title = strip_tags($row['title']);
   $content = strip_tags($row['content']);

   if (strlen($title) > 115) {
      $titleCut = substr($title, 0, 115);
      $title = substr($titleCut, 0, strrpos($titleCut, ' ')).' . . . '; 
   }
   if (strlen($content) > 150) {
      $contentCut = substr($content, 0, 150);
      $content = substr($contentCut, 0, strrpos($contentCut, ' ')).' . . . '; 
   }

   $datetime = explode('-', $row['created_at']);
   $year = $datetime[0];
   $month = $datetime[1];
   $days = explode(' ', $datetime[2]);
   $day = $days[0];

   echo ' 
      <div class="row">
		<div class="col-sm-2 col-xs-12">
			<a href="#news'.  $row['invest_id'] .'" data-toggle="modal">
            <img class="sold-img" alt="sold" src="' . APP_RES . '/images/main/sold.png" >
				<img class="news-img" alt="news" src="data:image/jpeg;base64,'. base64_encode($row['file'] ) .'" >
			</a>
   ';
   if(isset($_SESSION['loggedin'])){
      echo '
         <div class="invest_image_sold switch_off">
            <form action="controllers/undo_invest.php" class="form-inline" method="POST">
               <div class="col-xs-12 button_margin offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['invest_id'] .'" id="invest_id" name="invest_id">
                  <input type="text" class="form-control hidden" value="' . $page_name .'" id="page_name" name="page_name">
                  <button type="submit" name="submit" id="submit" class="btn btn-success col-xs-12 centered text-center" data-toggle="tooltip" title="Pozwala przenieść inwestycję do sprzedaży"><i class="fa fa-reply-all fa-2x" aria-hidden="true"></i></button>
               </div>
            </form>
         </div>

         <div class="invest_image_deleted switch_off">
            <form action="controllers/delete_invest.php" class="form-inline" method="POST">
               <div class="col-xs-12 button_margin offset-row">
                  <input type="text" class="form-control hidden" value="' . $row['invest_id'] .'" id="invest_id" name="invest_id">
                  <input type="text" class="form-control hidden" value="' . $page_name .'" id="page_name" name="page_name">
                  <button type="submit" name="submit" id="submit" class="btn btn-danger col-xs-12 centered text-center" data-toggle="tooltip" title="Pozwala usunąć wpis z bazy danych"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button>
               </div>
            </form>
         </div> 
      ';
   }
      echo '
			</div>
			<div class="col-sm-7 col-xs-12">
					<div class="row">
                 		<div class="col-sm-10 col-xs-9 news-title">'. $title .'</div>  
                 		<div class="col-sm-2 col-xs-3 news-date">'. $day . '.' . $month . '<br>' . $year .'</div>
                 	</div>
                 	<div class="col-xs-12 news-contents">
                     <div class="col-sm-6 col-xs-12 ivest">
                        <strong>Miejscowość: </strong>' . $row['city'] . '
                     </div>
                     <div class="col-sm-6 col-xs-12">
                        <strong>Ulica: </strong>' . $row['street'] . '
                     </div>
                     <div class="col-sm-6 col-xs-12">
                        <strong>Metraż: </strong>' . $row['meterage'] . ' m<sup>2</sup>
                     </div>
                     <div class="col-sm-6 col-xs-12">
                        <strong>Cena: </strong>' . number_format($row['price'], 2, ',', ' ') . ' zł
                     </div>
                     <div class="col-xs-12">
                        <br>' . $content . ' <a href="#investments'.  $row['invest_id'] .'" data-toggle="modal">Zobacz więcej</a>
                     </div>
                  </div>  
               </div>  

    		<div class="col-sm-3 col-xs-12">
	        </div>
         </div>
			<div class="row">
				<div class="col-sm-9 col-xs-12"><hr class="news-line"></div>
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