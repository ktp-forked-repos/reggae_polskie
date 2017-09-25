<?php
   $this->load(APP_PATH . 'core/templates/t_page_head.php');
   $settings = new Settings();
   $stmt = $settings->selectUsers();
?>

<div class="container">
   <div class="col-sm-4 col-xs-12 offset-50">
      <?php include('../settings/templates/t_nav.php'); ?>
   </div>
   <div class="col-sm-8 col-xs-12">
      <div class="form-group"><h3>Lista użytkowników</h3></div>

      <table class="table table-bordered">
         <tr>  
            <th>Imię</th>  
            <th>Nazwisko</th>  
            <th>Email</th>  
            <th>Aktywny</th>  
         </tr>  
         <?php
            $row = mysqli_fetch_array($stmt);
            foreach($stmt as $row)  
            {  
               if($row['active'] == 1){
                  $active = '<i class="fa fa-check fa-2x text-green" aria-hidden="true"></i>';
               }
               else{
                  $active = '<i class="fa fa-times fa-2x text-red" aria-hidden="true"></i';
               }

               echo ' 
                  <tr>  
                     <td>'. $row['name'] .'</td>  
                     <td>'. $row['surname'] .'</td>  
                     <td>'. $row['email'] .'</td>  
                     <td>'. $active .'</td>  
                  </tr>    
               ';  
            };
         ?>
      </table> 
   </div>
</div>

<?php
   $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>