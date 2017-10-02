<?php 

if (isset($_SESSION['alert'])){ 
	echo'<div class="offset-row">' . $_SESSION['alert'] . '</div>';
	unset($_SESSION['alert']); 
} 