<?php

class Cms_class {

   private $content_types = array('wysiwyg', 'textarea', 'oneline', 'image');
   private $CMS;

   function __construct(){
      global $CMS;
      $this->CMS =& $CMS;
   }

   function clean_block_id($id){
      $id = str_replace(' ', '_', $id);
      $id = str_replace('-', '_', $id);
      $id = preg_replace("/[^a-zA-Z0-9_]/", '', $id);
      return strtolower($id);
   }

   function display_block($id, $type = 'wysiwyg'){
      $id = $this->clean_block_id($id);

      $type = strtolower(htmlentities($type, ENT_QUOTES));
      if(in_array($type, $this->content_types) == FALSE){
         echo "<script>alert('Nieprawidłowy typ zawartości');</script>";
         return;
      }

      $content = $this->load_block($id);
      if($content === FALSE){
         $this->create_block($id);
         $content = '';
      }


      if($this->CMS->Auth->checkLoginStatus()){
         if($type == 'oneline'){
            $name = '<span style="font-size:12px; margin:0">tytuł</span>';
         }
         else if($type == 'wysiwyg'){
            $name = "edytor";
         }
         else if($type == 'textarea'){
            $name = "blok tekstu";
         }
         else{
            $name = $type;
         }

         $edit_start = '<div class="cms_edit">';
         $edit_type = '<a class="cms_edit_type label label-default" href="' . SITE_PATH . 'app/cms/edit.php?id=' . $id . '&type=' . $type . '">' . $name . '</a>';
         $edit_link = '<a class="cms_edit_link" href="' . SITE_PATH . 'app/cms/edit.php?id=' . $id . '&type=' . $type . '">Edytuj blok</a>';
         $edit_end = '</div>';

         echo $edit_start . $edit_type;
         echo $edit_link . $content . $edit_end;
      }
      else {
         echo $content;
      }
   }

   function generate_field($type, $content){
      if($type == 'wysiwyg'){
         return '<textarea name="field" id="field" rows="16" class="wysiwyg">' . $content . '</textarea>';
      }
      else if ($type == 'textarea'){
         return '<textarea name="field" id="field" rows="8" class="textarea">' . $content . '</textarea>';
      }
      else if ($type == 'oneline'){
         return '<input name="field" type="text" id="field" class="oneline" value="' . $content . '">';
      }
      else if ($type == 'image'){
         return '<input name="field" type="file" id="field" class="image" value="' . $content . '">';
      }
      else{
         $error = '<p>Niewłaściwy typ pola</p>';
         return $error;
      }	
   }

   function load_block($id){
      if($stmt = $this->CMS->Database->prepare("SELECT content FROM content WHERE id = ?")){
         $stmt->bind_param('s', $id);
         $stmt->execute();
         $stmt->store_result();

         if($stmt->num_rows != FALSE){
            $stmt->bind_result($content);
            $stmt->fetch();
            $stmt->close();
            return $content;
         }
         else{
            $stmt->close();
            return FALSE;
         }
      }
   }

   function create_block($id){
      if($stmt = $this->CMS->Database->prepare("INSERT INTO content (id) VALUES (?)")){
         $stmt->bind_param('s', $id);
         $stmt->execute();
         $stmt->close();
      }
   }

   function update_block($id, $content){
      if($stmt = $this->CMS->Database->prepare("UPDATE content SET content = ? WHERE id = ?")){
         $stmt->bind_param('ss', $content, $id);
         $stmt->execute();
         $stmt->close();
      }
   }

   function display_video($id){
      if($stmt = $this->CMS->Database->prepare("SELECT content FROM content WHERE id = ?")){
         $stmt->bind_param('s', $id);
         $stmt->execute();
         $stmt->store_result();

         if($stmt->num_rows != FALSE){
            $stmt->bind_result($content);
            $stmt->fetch();
            $stmt->close();
            return $content;
         }
         else{
            $stmt->close();
            return FALSE;
         }
      }
   }

}