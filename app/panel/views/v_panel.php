<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="col-xs-12"><h2>Panel administracyjny</h2></div>
      <div class="col-xs-12">
         <div class="col-xs-12"><h4>W tym miejscu widoczne są inforamcje od administratora systemu</h4></div>
         <ul>
            <li>System jest w fazie testów - proszę zgłaszać wszystkie błądy na email <strong>maciejpowallo@10g.pl</strong> </li>
            <li>Wersja 1.1.2 (12.09.2017) - poprawiono błedy związane z przekierowaniem.</li>
         </ul>
      </div>
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>