<div id="myCarousel" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>
   <div class="carousel-inner">
     <div class="item active img-responsive">
         <?php  
            $id_image = 1;
            $settings->selectCarouselImage($id_image);
            $result = $settings->selectCarouselContent($id_image);
            $row = mysqli_fetch_assoc($result);
         ?>  
         <div class="carousel-caption">
            <h3 class="index-text"><?php echo $row['title'] ?></h3>
            <p class="index-text"><?php echo $row['description'] ?></p>
         </div>
      </div>
      <div class="item img-responsive">
         <?php  
            $id_image = 2;
            $settings->selectCarouselImage($id_image);
            $result = $settings->selectCarouselContent($id_image);
            $row = mysqli_fetch_assoc($result);    
         ?>
         <div class="carousel-caption">
            <h3 class="index-text"><?php echo $row['title'] ?></h3>
            <p class="index-text"><?php echo $row['description'] ?></p>
         </div> 
      </div>
      <div class="item img-responsive">
         <?php  
            $id_image = 3;
            $settings->selectCarouselImage($id_image);
            $result = $settings->selectCarouselContent($id_image);
            $row = mysqli_fetch_assoc($result);        
         ?>
         <div class="carousel-caption">
            <h3 class="index-text"><?php echo $row['title'] ?></h3>
            <p class="index-text"><?php echo $row['description'] ?></p>
         </div> 
      </div>
   </div>
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
   </a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
   </a>
</div>