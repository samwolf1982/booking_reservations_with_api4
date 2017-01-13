<?php 
include_once('api/api/HotelsPro.php');

if($code = $_POST['code']) {
	$hotelsPro = new HotelsProApi();
	$provision = $hotelsPro->getProvision($code);
	if($provision->code) {
		$book = $hotelsPro->bookHotel($provision->code, array(array('name' => 'Tone', 'surName' => 'smetanka', 'type' => 'adult')));
		
		echo $book->code;
	}
}