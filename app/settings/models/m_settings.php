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

   function selectCarouselName($id){
      global $CMS;
      if($stmt = $CMS->Database->query("SELECT title  FROM carousel_image WHERE id_image = '$id'")){
         $row = mysqli_fetch_array($stmt); 
         return $row['title'];
      }
      else{
         return FALSE;
      }
   }

   function selectCarouselImage($id_image){
      global $CMS;
      if($result = $CMS->Database->query("SELECT id_image, name FROM carousel_image WHERE id_image = '$id_image'")){
         $row = mysqli_fetch_array($result); 
         echo ' <img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" >';
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

   function updateNews($news_id, $title, $content){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE news SET title = '$title', content = '$content' WHERE news_id = '$news_id'")){
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

// Genre video ------------------------------------------------------------------------------------------------
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

// Vocabulary ------------------------------------------------------------------------------------------------
   function createEntry($user_id, $title, $content, $letter){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO entries (user_id, title, content, letter) VALUES ('$user_id', '$title', '$content', '$letter')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectEntry($letter){
      global $CMS;
      if($stmt = $CMS->Database->query("SELECT * FROM entries WHERE letter = '$letter' ORDER BY title")){
         return $stmt;
      }
      else{
         return FALSE;
      }
   }

   function countEntry(){
      global $CMS;
      $result = $CMS->Database->query("SELECT COUNT(entry_id) FROM entries");
      $count = mysqli_fetch_array($result); 
      return $count[0];
   }

   function deleteEntry($entry_id){
      global $CMS;
      if($stmt = $CMS->Database->query("DELETE FROM entries WHERE entry_id = '$entry_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function updateEntry($entry_id, $title, $content, $letter){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE entries SET title = '$title', content = '$content', letter = '$letter' WHERE entry_id = '$entry_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

// Bands -------------------------------------------------------------------------------------------
   function createBand($user_id, $name, $video, $content, $letter){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO bands (user_id, name, video, content, letter) VALUES ('$user_id', '$name', '$video', '$content', '$letter')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

  function selectBandsList($letter){
      global $CMS;
      if($stmt = $CMS->Database->query("SELECT name FROM bands WHERE letter = '$letter' ORDER BY name")){
         return $stmt;
      }
      else{
         return FALSE;
      }
   }

   function countBands(){
      global $CMS;
      $result = $CMS->Database->query("SELECT COUNT(band_id) FROM bands");
      $count = mysqli_fetch_array($result); 
      return $count[0];
   }

   function selectBand($name){
      global $CMS;
      if($stmt = $CMS->Database->query("SELECT * FROM bands WHERE name = '$name'")){
         return $stmt;
      }
      else{
         return FALSE;
      }
   }

   function updateBand($band_id, $name, $video, $content, $letter){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE bands SET name = '$name', video = '$video', content = '$content', letter = '$letter'  WHERE band_id = '$band_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function deleteBand($band_id){
      global $CMS;
      if($stmt = $CMS->Database->query("DELETE FROM bands WHERE band_id = '$band_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function addBandAlbum($band_id, $file,  $title, $description, $track_list){
      global $CMS;
      if($stmt = $CMS->Database->query("INSERT INTO band_albums (band_id, image_name, title, description, track_list) VALUES ('$band_id', '$file', '$title', '$description', '$track_list')")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

   function selectBandAlbums($band_id){
      global $CMS;
      if($stmt = $CMS->Database->query("SELECT * FROM band_albums WHERE band_id = '$band_id'")){
         return $stmt;
      }
      else{
         return FALSE;
      }
   }

   function updateBandAlbum($album_id, $title, $description, $track_list){
      global $CMS;
      if($stmt = $CMS->Database->query("UPDATE band_albums SET title = '$title', description = '$description', track_list = '$track_list'  WHERE album_id = '$album_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }

  function deleteBandAlbum($album_id){
      global $CMS;
      if($stmt = $CMS->Database->query("DELETE FROM band_albums WHERE album_id = '$album_id'")){
         return TRUE;
      }
      else{
         return FALSE;
      }
   }
}