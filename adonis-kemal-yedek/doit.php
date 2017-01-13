<?php

	require_once("includes/functions.php");

	$Ne				= $_POST['Ne'];
	$CityId     	= $_POST['CityId'];
	$StartDate     	= date("Y/m/d", strtotime($_POST['StartDate']));
	$EndDate     	= date("Y/m/d", strtotime($_POST['EndDate']));

	$StartDate 	= str_replace("/", "", $StartDate);
	$EndDate	= str_replace("/", "", $EndDate);

	$Oda     		= $_POST['Oda'];
	$Yetiskin     	= $_POST['Yetiskin'];
	$Cocuk     		= $_POST['Cocuk'];
	$CountryId     	= $_POST['CountryId'];

	echo "Giris:$StartDate (test:20160720) / Cikis:$EndDate (test:20160723) / Sehir:$CityId (test:12502) / ulke:$CountryId (test:162) / Oda:$Oda / Yetiskin:$Yetiskin / Cocuk:$Cocuk \n\n";

	$answer = search_by_city_request(20161020,20161023,12502,162,'',1,2,$Yetiskin,$Oda,$Cocuk);
	//$answer = search_by_city_request($StartDate,$EndDate,$CityId,$CountryId,'',1,2,$Yetiskin,$Oda,$Cocuk);

	print_r($answer);

?>