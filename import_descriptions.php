<?php 

//phpinfo();

$xml = new XMLReader;

$xml->open("KW5147hoteldescr.xml");
//$xml->open("test.xml");

$items = array();

$link = mysqli_connect('localhost','bookinga_hotelsp','123HotelsPro','bookinga_hotelspro');

$cnt = 0;

$first_elements = array(
 'XMLResponse',
 'RequestInfo',
 'AffRequestId',
 'AffRequestTime',
 'TotalNumber',
 'Hotels'
 );

$total = 0;

while ($xml->read()) {

  if($xml->nodeType == XMLReader::ELEMENT){
   
   
   if ($xml->name == 'TotalNumber') {
     $xml->read();
     $total = $xml->value;
     continue;
   }

   if (in_array($xml->name,$first_elements))
    continue;

  if ($xml->name == 'Hotel'){


    $item = array();

    continue;
  } else {
   $name = $xml->name;
   $xml->read();
   $item[$name] = mysqli_real_escape_string (  $link , $xml->value );

 }
}
if($xml->nodeType == XMLReader::END_ELEMENT){
  if ($xml->name == 'Hotel'){
            //$items[] = $item;
            //write here;

    $sql = "INSERT INTO description_list (
     HotelCode, 
     OldHotelId, 
     HotelLocation,
     HotelInfo,
     HotelType,
     HotelCategory,
     HotelStyle,
     HotelTheme
     ) VALUES (
     '".$item['HotelCode']."',
     '".$item['OldHotelId']."',
     '".$item['HotelLocation']."',
     '".$item['HotelInfo']."',
     '".$item['HotelType']."',
     '".$item['HotelCategory']."',
     '".$item['HotelStyle']."',
     '".$item['HotelTheme']."')";




$res = mysqli_query($link, $sql);

if (!$res) {
    //echo 'error' .'<br/>';
  printf("Errormessage: %s\n", mysqli_error($link));
  echo "<br>";
  echo $sql;
  die();
}


}
}

$cnt++;

	//if ($cnt == 500)
		//break;
}

echo 'total: '.$total;
?>