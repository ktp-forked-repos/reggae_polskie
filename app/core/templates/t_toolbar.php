<div class="toolbar">
   <nav class="navbar navbar-inverse nav-bottom">
      <div class="container-fluid">
         <div class="navbar-header">
            <a class="navbar-brand" id="edit_t" href="#"><i class="fa fa-toggle-on" aria-hidden="true"></i> Wyłącz edycję</a>
         </div>
         <ul class="nav navbar-nav">
            <li><a class="cms_panel" href="<?php echo SITE_PATH;?>app/panel/index.php"><i class="fa fa-cogs" aria-hidden="true"></i> Zarządzaj</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo SITE_PATH;?>app/logout.php?>"><i class='fa fa-sign-out' aria-hidden='true'></i> Wyloguj</a></li>
            <li><a class="disable" href=""><span class="glyphicon glyphicon-user"></span> Zalogowano jako <?php echo $this->Auth->name(); ?></a></li>
         </ul>
      </div>
   </nav>
</div>