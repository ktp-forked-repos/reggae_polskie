<?php
$stmt = $settings->selectAllNews();
foreach($stmt as $row)  
{
   $user_id = $row['user_id'];
   $user_value = $settings->selectUser($user_id);  
   include("views/news_item_form.php");
};