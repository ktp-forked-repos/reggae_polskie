<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
   <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
         </button>
         <a class="navbar-brand page-scroll" href="<?php SITE_PATH;?>/"><img class="logo" src="<?php echo APP_RES?>/images/main/logo.png" alt=""></a>
      </div>

      <!-- Menu tabs-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
               <a href="#page-top"></a>
            </li>
            <li>
               <a class="page-scroll" href="<?php SITE_PATH;?>../about.php">O nas</a>
            </li>
            <li>
               <a class="page-scroll" href="<?php SITE_PATH;?>../news.php">Aktualności</a>
            </li>
            <li>
               <a class="page-scroll" href="<?php SITE_PATH;?>../bands.php">Zespoły</a>
            </li>
            <li id="drop" class="dropdown">
               <a class="dropdown-toggle" id="drop" data-toggle="dropdown" href="#">Gatunki<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/dancehall.php">Dancehall</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/dub.php">Dub</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/mento.php">Mento</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/nyabinghi.php">Nyabinghi</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/punky-reggae.php">Punky reggae</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/raggamuffin.php">Raggamuffin</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/reggae.php">Reggae</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/reggaeton.php">Reggaeton</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/rockers-reggae.php">Rockers reggae</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/rocksteady.php">Rocksteady</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/roots-reggae.php">Roots reggae</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/samba-reggae.php">Samba reggae</a></li>
                  <li><a class="page-scroll indentation" href="../<?php SITE_PATH;?>genre/ska.php">Ska</a></li>
               </ul>
            </li>
            <li>
               <a class="page-scroll" href="<?php SITE_PATH;?>../vocabulary.php">Słownik</a>
            </li>
            <li>
               <a class="page-scroll" href="<?php SITE_PATH;?>../contact.php">Kontakt</a>
            </li>
         </ul>
      </div>
   </div>
</nav>