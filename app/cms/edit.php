<?php
include("../init.php");

$CMS->Auth->checkAuthorization();

if(isset($_POST['field'])){

   $id = $CMS->Cms_class->clean_block_id($_POST['id']);
   $type = htmlentities($_POST['type'], ENT_QUOTES);
   $content = $_POST['field'];

   $CMS->Cms_class->update_block($id, $content);
   $CMS->Template->load(APP_PATH . "cms/views/v_saving.php");
}
else{
   if(isset($_GET['id']) == FALSE || isset($_GET['type']) == FALSE){
      $CMS->Template->error();
      exit;
   }
   $id = $CMS->Cms_class->clean_block_id($_GET['id']);
   $type = htmlentities($_GET['type'], ENT_QUOTES);
   $content = $CMS->Cms_class->load_block($id);

   $CMS->Template->setData('block_id', $id);
   $CMS->Template->setData('block_type', $type);
   $CMS->Template->setData('cms_field', $CMS->Cms_class->generate_field($type, $content), false);

   $CMS->Template->load(APP_PATH . 'cms/views/v_edit.php');
}