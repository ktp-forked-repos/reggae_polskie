<?php
include('../init.php');
include('models/m_settings.php');

$settings = new Settings();
$CMS->Auth->checkAuthorization();
error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['submit'])){

	$CMS->Template->setData('user_id', $_POST['user_id']);
	$CMS->Template->setData('investment_type', $_POST['investment_type']);
	$CMS->Template->setData('title', $_POST['title']);
	$CMS->Template->setData('price', $_POST['price']);
	$CMS->Template->setData('rooms', $_POST['rooms']);
	$CMS->Template->setData('all_rooms', $_POST['all_rooms']);
	$CMS->Template->setData('meterage', $_POST['meterage']);
	$CMS->Template->setData('plot', $_POST['plot']);
	$CMS->Template->setData('city', $_POST['city']);
	$CMS->Template->setData('street', $_POST['street']);
	$CMS->Template->setData('content', $_POST['content']);

//hidden 
	$sold = FALSE;
	$user_id = $_POST['user_id'];
	$investment_type = $_POST['investment_type'];

//content
	$title = $_POST['title'];
	$price = $_POST['price'];
	$meterage = $_POST['meterage'];
	$plot = $_POST['plot'];
	$all_rooms = $_POST['all_rooms'];
	$rooms = $_POST['rooms'];
	$city = $_POST['city'];
	$street = $_POST['street'];
	$content = $_POST['content'];

//file
	$size = $_FILES["file"]["size"];
	$image = $_FILES["file"]["tmp_name"];
	$type = exif_imagetype($image);

//size input	
	$size_title = strlen($title);
	$size_content = strlen($content);
	$size_city = strlen($city);
	$size_street = strlen($street);


	if($size == 0){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz obraz z dysku o maksymalnym rozmiarze 1MB','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($type != (IMAGETYPE_PNG || IMAGETYPE_JPEG || IMAGETYPE_GIF || IMAGETYPE_BMP)) {
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  Niewłaściwy typ pliku - dopuszczalne typy to:  JPG, GIF, PNG','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($user_id == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Błąd autoryzacji użytkownika przy dodawaniu inwestycji - skontaktuj się z administratorem','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($sold != FALSE){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieznany błąd - nieruchomość musi być dodana jako niesprzedana - skontaktuj się z administratorem','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($investment_type == 0){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Wybierz typ nieruchomości z listy','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//title
	else if($title == '' ){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj tytuł inwestycji','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($size_title > 200){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długi tytuł - maksymalnie 200 znaków','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//price	
	else if($price == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Uzupełnij cenę nieruchomości','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//rooms
	else if($rooms == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Uzupełnij ilość pokoi','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($rooms == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt mała ilość pokoi','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($rooms > 20){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt duża ilość pokoi - maksymalnie 20','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($rooms > $all_rooms){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Ilość pokoi nie może być większa od ogólnej liczby pomiszczeń','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//all_rooms
	else if($all_rooms == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Uzupełnij liczbę pomieszczeń','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($all_rooms < 1){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt mała liczba pomieszczeń','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($all_rooms > 40){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt duża liczba pomieszczeń - maksymalnie 40','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//meterage
	else if($meterage == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Uzupełnij powierzchnię nieruchomości','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($meterage < 1){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt mała powierzchnia nieruchomości','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($meterage > 1000){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt duża powierzchnia nieruchomości','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//plot
	else if($plot == ''){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Uzupełnij powierzchnię działki','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($plot < 1){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt mała liczba pomieszczeń','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($plot > 1000000){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt duża powierzchnia działki','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($meterage > $plot){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Nieruchomość nie może zajmować większej powierzchni niż działka','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//city & street
	else if($city == '' ){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj nawę miejscowości','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($size_city > 100){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa nazwa miejscowości - maksymalnie 100 znaków','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($street == '' ){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj nawę ulicy','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($size_street > 100){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa nazwa ulicy - maksymalnie 100 znaków','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}

//content
	else if($content == '' ){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Podaj treść inwestycji','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($size_content  > 15000){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Zbyt długa treść - maksymalnie 15000 znaków','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else if($size > 1048576){
		$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Obraz musi być mniejszy niż 1MB','danger');
		$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
	}
	else{

		$price_per_meter = ceil($price / $meterage);

		if($price_per_meter > 1){

			$file  = addslashes(file_get_contents($_FILES["file"]["tmp_name"])); 

			$changed = $settings->createInvestment($user_id, $investment_type, $sold, $title, $price, $meterage, $price_per_meter, $plot, $rooms, $all_rooms, $city, $street, $content, $file);

			if($changed == TRUE){

				$CMS->Template->setAlert('<i class="fa fa-check-square-o" aria-hidden="true"></i> Inwestycja została dodana','success');
				$CMS->Template->setData('user_id', '');
				$CMS->Template->setData('id_investment', '');
				$CMS->Template->setData('title', '');
				$CMS->Template->setData('price', '');
				$CMS->Template->setData('rooms', '');
				$CMS->Template->setData('all_rooms', '');
				$CMS->Template->setData('meterage', '');
				$CMS->Template->setData('plot', '');
				$CMS->Template->setData('city', '');
				$CMS->Template->setData('street', '');
				$CMS->Template->setData('content', '');

				$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
			} 
			else {
				$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> 400 Bad Reques - skontaktuj się z administratorem','danger');
				$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
			}
		}
		else{
			$CMS->Template->setAlert('<i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i> Błąd ustalenia ceny za metr kwadratowy - skontaktuj się z administratorem','danger');
			$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
		}
	}
}
else {
	$CMS->Template->load(APP_PATH . 'settings/views/v_investments.php');
}