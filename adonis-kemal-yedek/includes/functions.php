<?php
	
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);	
	ini_set('memory_limit', '256M');

	$api_cid = "73c8271b-a194-406c-a669-a8863b528aba";
	$api_usr = "okan@polatkan.com";
	$api_pass = "polatkan2015";
	
	//$api_cid = "6a6a11cf-cd95-4bd9-9330-4582c8c5aac3";
	//$api_usr = "europe@test.com";
	//$api_pass = "test65_";	
	
	//require_once 'dbo/dbo.init.php';
	//$dbo->select_db('polatkan');
	//getCities
	/* function getCities(){

		global $dbo;
		
		$dbo->setSql('SELECT `id`, `countrycode`, `citycode`, `cityname` FROM `cities` ORDER BY cityname ASC');
		$dbo->runSql();
		$rows = $dbo->getAll();	
		
		$soruce = "[";
		foreach( $rows as $row ) {
			$id=$row->id;
			$countrycode=$row->countrycode;
			$citycode=$row->citycode;
			$cityname=$row->cityname;
			$soruce .= "{\"name\": \"$cityname\", \"citycode\": \"$citycode\", \"countrycode\", \"$countrycode\"},";
		}
		$soruce .= "]";
		
		return $soruce;
		
	} */
	
	//requests
	function search_by_hotel_id_request($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelSearchCriteriaDTO>
				  <CheckInDate>$a</CheckInDate>
				  <CheckOutDate>$b</CheckOutDate>
				  <HotelID>$c</HotelID>
				  <CountryID>$d</CountryID>
				  <NationalityCode>$e</NationalityCode>
				  <PaginationData>
					<PageNumber>$f</PageNumber>
					<ItemsPerPage>$g</ItemsPerPage>
				  </PaginationData>
				  <RoomCriteria>
					<RoomCriteriaDTO>
					  <AdultCount>$h</AdultCount>
					  <RoomCount>$i</RoomCount>
					  <ChildCount>$j</ChildCount>
					  <ChildAges />
					</RoomCriteriaDTO>
				  </RoomCriteria>
				  <Credentials>
					<ClientID>$api_cid</ClientID>
					<Username>$api_usr</Username>
					<Password>$api_pass</Password>
				  </Credentials>
				</AdonisHotelSearchCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/SearchHotels';
		$reqres = get_xml_result(base64_encode($xml), $sent_url);
		return $reqres;
	}

	function search_by_city_request($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelSearchCriteriaDTO>
				  <CheckInDate>$a</CheckInDate>
				  <CheckOutDate>$b</CheckOutDate>
				  <CityID>$c</CityID>
				  <CountryID>$d</CountryID>
				  <NationalityCode>$e</NationalityCode>
				  <PaginationData>
					<PageNumber>$f</PageNumber>
					<ItemsPerPage>$g</ItemsPerPage>
				  </PaginationData>
				  <RoomCriteria>
					<RoomCriteriaDTO>
					  <AdultCount>$h</AdultCount>
					  <RoomCount>$i</RoomCount>
					  <ChildCount>$j</ChildCount>
					  <ChildAges />
					</RoomCriteriaDTO>
				  </RoomCriteria>
				  <Credentials>
					<ClientID>$api_cid</ClientID>
					<Username>$api_usr</Username>
					<Password>$api_pass</Password>
				  </Credentials>
				</AdonisHotelSearchCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/SearchHotels';
		//$reqres = get_xml_result(base64_encode($xml), $sent_url);
		$reqres = get_xml_result($xml, $sent_url);
		return $reqres;
	}

	function cancel_hotels_request($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelConfirmCriteriaDTO xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
				  <ReferenceNumber>$a</ReferenceNumber>
				  <Token>$b</Token>
				  <PurchaseToken>
					<PurchaseDTO>
					  <ConfirmPassenger>
						<ConfirmPassengerDTO>
						  <PurchaseToken>$c</PurchaseToken>
						  <Occupancy>
							<AdultCount>$d</AdultCount>
							<ChildCount>$e</ChildCount>
							<Passengers>
							  <PassengerDTO>
								<IsLeader>$f</IsLeader>
								<ID>$g</ID>
								<SalutationID>$h</SalutationID>
								<Name>$i</Name>
								<LastName>$j</LastName>
								<Age>$k</Age>
								<AgeSpecified>$l</AgeSpecified>
								<PassengerType>$m</PassengerType>
							  </PassengerDTO>
							</Passengers>
						  </Occupancy>
						  <HotelRoomUniqueNumber>
							<XmlServicesUniqueNumber>$n</XmlServicesUniqueNumber>
							<AdonisUniqueNumber>$o</AdonisUniqueNumber>
							<XmlServicesType>$p</XmlServicesType>
						  </HotelRoomUniqueNumber>
						</ConfirmPassengerDTO>
					  </ConfirmPassenger>
					</PurchaseDTO>
				  </PurchaseToken>
				  <Credentials>
					<ClientID>$api_cid</ClientID>
					<Username>$api_usr</Username>
					<Password>$api_pass</Password>
				  </Credentials>
				</AdonisHotelConfirmCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/CancelHotels';
		$reqres = get_xml_result(base64_encode($xml), $sent_url);
		return $reqres;
	}
		
	function confirm_hotels_request($a){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelCancelCriteriaDTO xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
				  <FileNumber>$a</FileNumber>
				  <Credentials>
					<ClientID>$api_cid</ClientID>
					<Username>$api_usr</Username>
					<Password>$api_pass</Password>
				  </Credentials>
				</AdonisHotelCancelCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/ConfirmHotels';
		$reqres = get_xml_result(base64_encode($xml), $sent_url);
		return $reqres;
	}		
		
	function basket_hotels_request($a,$b,$c,$d){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelBasketCriteriaDTO xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
				  <Token>$a</Token>
				  <HotelRoomUniqueNumbers>
					<SelectHotelRoomDTO>
					  <HotelRoomUniqueNumbers>
						<HotelRoomUniqueNumberDTO>
						  <XmlServicesUniqueNumber>$b</XmlServicesUniqueNumber>
						  <AdonisUniqueNumber>$c</AdonisUniqueNumber>
						  <XmlServicesType>$d</XmlServicesType>
						</HotelRoomUniqueNumberDTO>
					  </HotelRoomUniqueNumbers>
					</SelectHotelRoomDTO>
				  </HotelRoomUniqueNumbers>
				  <Credentials>
					<ClientID>$api_cid</ClientID>
					<Username>$api_usr</Username>
					<Password>$api_pass</Password>
				  </Credentials>
				</AdonisHotelBasketCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/BasketHotels';
		$reqres = get_xml_result(base64_encode($xml), $sent_url);
		return $reqres;
	}
		
	function detail_hotels_request($a){
		global $api_cid, $api_usr, $api_pass;
		$xml ="<AdonisHotelDetailCriteriaDTO xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
		  <FileNumber>$a</FileNumber>
		  <Credentials>
			<ClientID>$api_cid</ClientID>
			<Username>$api_usr</Username>
			<Password>$api_pass</Password>
		  </Credentials>
		</AdonisHotelDetailCriteriaDTO>";
		$sent_url = 'http://xmltest.adonis.com/AdonisServices/DetailHotels';
		$reqres = get_xml_result(base64_encode($xml), $sent_url);
		return $reqres;
	}
	
	function get_xml_result($input_xml, $url){
	
		//$input_xml = base64_decode($input_xml);
		$input_xml = trim($input_xml);
		
		$url = 'http://xmltest.adonis.com/AdonisServices/SearchHotels';
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch,CURLOPT_ENCODING , "gzip");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "prm_CurrentData=" . $input_xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		
		$data = curl_exec($ch);
		curl_close($ch);
		
		$array_data = json_decode(json_encode(simplexml_load_string($data)), true);

		return $array_data;
	
	}
	
	/* arama yap */
	//function arama_yap($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)
	//{
		//$StartDate    	= $db->real_escape_string($a);
		//$EndDate   		= $db->real_escape_string($b);
		//$CityID     	= $db->real_escape_string($c);
		//$CountryID      = $db->real_escape_string($d);
		//$NationalityCode= $db->real_escape_string($e);
		//$PageNumber     = $db->real_escape_string($f);
		//$ItemsPerPage   = $db->real_escape_string($g);
		//$AdultCount		= $db->real_escape_string($h);
		//$RoomCount		= $db->real_escape_string($i);
		//$ChildCount		= $db->real_escape_string($j);
		//01:nationality
		//02:pagenumber
		//03:itemsperpage
		//return search_by_city_request('20160720','20160723','12502','162','TR','1','2','2','1','0');
	//}
	
?>