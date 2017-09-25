<?php

class Settings {
   function changePassword($user, $newpass){
      global $CMS;
      if($stmt = $CMS->Database->prepare("UPDATE users SET password = ? WHERE login = ?")){
         $stmt->bind_param('ss', md5($newpass . $CMS->Auth->getSalt()), $user);
         $stmt->execute();
         $stmt->close();
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectUsers(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM users");
      $row = mysqli_fetch_array($stmt);   
      return $stmt;
   }

   function selectUser($user_id){
      global $CMS;
      $result = $CMS->Database->query("SELECT * FROM users WHERE user_id = '$user_id'");
      $row = $result->fetch_assoc();
      $name = $row['name'];
      return $name;
   }

// Carousel-------------------------------------------------------------------------------------
   function changeCarouselImage($file, $id_image, $title, $description){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE carousel_image SET name = '$file', title = '$title', description = '$description' WHERE id_image = '$id_image'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function createCarouselImage($file){
      global $CMS;
      if($stmt = $CMS->Database->prepare("INSERT INTO carousel_image (name) VALUES (?)")){
         $stmt->bind_param('s', $file);
         $stmt->execute();
         $stmt->close();
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectCarouselImage($id_image){
      global $CMS;
      if($result = $CMS->Database->query("SELECT id_image, name FROM carousel_image WHERE id_image = '$id_image'")){
         $row = mysqli_fetch_array($result); 
         echo ' <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" >';
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectCarouselContent($id_image){
      global $CMS;
      if($result = $CMS->Database->query("SELECT title, description FROM carousel_image WHERE id_image = '$id_image'")){
      return $result;
      }
   }

// News-------------------------------------------------------------------------------------
   function createNews($user_id, $title, $content, $file){
      global $CMS;

      if($stmt = $CMS->Database->query("INSERT INTO news (user_id, title, content, image) VALUES ('$user_id', '$title', '$content', '$file')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectNews($limit, $onpage){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM news ORDER BY created_at DESC LIMIT $limit, $onpage");
      return $stmt;
   }

   function selectAllNews(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM news ORDER BY created_at DESC");
      return $stmt;
   }

   function countNews(){
      global $CMS;
      $query = $CMS->Database->query("SELECT COUNT(*) as all_posts FROM news");
      return $query;
   }

   function selectThree(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3");  
      return $stmt;
   }

   function deleteNews($news_id){
      global $CMS;
      if($stmt = $CMS->Database->query("DELETE FROM news WHERE news_id = '$news_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function addImageToNews($news_id, $file){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO news_image (news_id, image_name) VALUES ('$news_id', '$file')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function getIdImageNews(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT image_id FROM news_image ORDER BY image_id DESC LIMIT 1");
      $row = mysqli_fetch_array($stmt);   
      $id = $row['image_id'];
      return $id;
   }

   function selectImageNews($news_id){
      global $CMS;
      $result = $CMS->Database->query("SELECT image_name FROM news_image WHERE news_id = '$news_id'");
      return $result;
   }

//Investments-------------------------------------------------------------------------------------

   function createInvestment($user_id, $investment_type, $sold, $title, $price, $meterage, $price_per_meter, $plot, $rooms, $all_rooms, $city, $street, $content, $file){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO investments (user_id, investment_type, sold, title, price, meterage, price_per_meter, plot, rooms, all_rooms, city, street, content, file) VALUES ('$user_id', '$investment_type', '$sold', '$title', '$price', '$meterage', '$price_per_meter', '$plot', '$rooms', '$all_rooms', '$city', '$street', '$content', '$file')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function countInvestments($type, $sold){
      global $CMS;
      $query = $CMS->Database->query("SELECT COUNT(*) as all_posts FROM investments WHERE investment_type = '$type' AND sold = '$sold'");
      return $query;
   }

   function countImageInvestments(){
      global $CMS;
      $query = $CMS->Database->query("SELECT COUNT(*) as all_images FROM investments_image");
      return $query;
   }

   function selectInvestments($type, $sold, $limit, $onpage){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM investments WHERE investment_type = '$type' AND sold = '$sold' ORDER BY created_at  DESC LIMIT $limit, $onpage");
      return $stmt;
   }

   function selectAllInvestments(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT * FROM investments ORDER BY created_at DESC");
      return $stmt;
   }

   function deleteInvestments($invest_id){
      global $CMS;
      if($stmt = $CMS->Database->query("DELETE FROM investments WHERE invest_id = '$invest_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function getIdImageInvestments(){
      global $CMS;
      $stmt = $CMS->Database->query("SELECT image_id FROM investments_image ORDER BY image_id DESC LIMIT 1");
      $row = mysqli_fetch_array($stmt);   
      $id = $row['image_id'];
      return $id;
   }

   function addImageToInvestments($invest_id, $file){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO investments_image (invest_id, image_name) VALUES ('$invest_id', '$file')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectImagenvestments($invest_id){
      global $CMS;
      $result = $CMS->Database->query("SELECT image_name FROM investments_image WHERE invest_id = '$invest_id'");
      return $result;
   }

   function saleInvestments($invest_id){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE investments SET sold = 1 WHERE invest_id = '$invest_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function undoInvestments($invest_id){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE investments SET sold = 0 WHERE invest_id = '$invest_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

//Genre video ------------------------------------------------------------------------------------------------
   function changeGenreVideo($id, $content){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE content SET content = '$content' WHERE id = '$id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectGenreVideo($id){
      global $CMS;
      if($result = $CMS->Database->query("SELECT content FROM content WHERE id = '$id'")){
         $row = mysqli_fetch_array($result); 
         $video = $row['content'];
         return $video;
      }
      else{
         return FALSE;
      }
   }
}

