<?php


	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);	
	ini_set('memory_limit', '256M');

	$api_cid = "73c8271b-a194-406c-a669-a8863b528aba";
	$api_usr = "okan@polatkan.com";
	$api_pass = "polatkan2015";
	
	
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


?>