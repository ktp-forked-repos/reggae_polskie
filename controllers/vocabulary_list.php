<?php 

echo '<ul class="nav nav-tabs">';
   
  $char = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
  $result = count($char);

  for($i = 0; $i < $result; $i++){
    if($i == 0){
      echo '<li class="active"><a data-toggle="tab" href="#' . $char[$i] . '">' . strtoupper($char[$i]) . '</a></li>';
    }
    else{
      echo '<li><a data-toggle="tab" href="#' . $char[$i] . '">' . strtoupper($char[$i]) . '</a></li>';
    }
  }
echo '</ul>';
echo '<div class="tab-content">';
  for($i = 0; $i < $result; $i++){
    if($i == 0 || $char[$i] == 'a'){
      echo '
        <div id="' . $char[$i] . '" class="tab-pane fade in active">
          <h3>' . $char[$i] . '</h3>
          <p style="margin-left:50px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      ';
    }
    else{
      echo '
        <div id="' . $char[$i] . '" class="tab-pane fade">
          <h3>' . $char[$i] . '</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      ';
    }
  }
echo '</div>';