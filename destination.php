<?php
require __DIR__ . '/vendor/autoload.php';


use CosmosLibs\Destination as Destination;

//require_once __DIR__ .'/vendor/cosmoslib/Cosmos.php';
//example
//https://api2.hotelspro.com/docs/api_examples/index.html#booking-process-for-1-adult

 $login = "PolatkanTurizm";
 $password = "5wnHwY66PGsn6CRJ";
 
 $login_static = "sandbox";
 $password_static = "thisisyourpassw0rd";

$cosmos= new Destination($login,$password,$login_static,$password_static);

Destination::export_destinations(['10000', 've', null, "1440","El Agua", 11.14244556427002,-63.868160247802734,'2014-09-22T21:05:06.987568Z']);

//$cosmos->get_s_destinations([]);

//var_dump($cosmos);




die();

$cosmos=new Cosmos($login,$password,$login_static,$password_static);

if (!validate()) { die('bad POST');}
var_dump(validate());



$pax="3";
$checkout="2017-01-25";
$checkin="2017-01-20";
$destination_code="11260";
$client_nationality="gb";
$currency="EUR";
$format="json";



 $result= $cosmos->search(["pax"=>$pax,"checkout"=>$checkout,"checkin"=>$checkin,"destination_code"=>$destination_code,"client_nationality"=>$client_nationality,'format'=>$format]);

 $cod=$result->code;
 foreach ($result->results as $key => $value) {
 	$hotels_code[]=$value->hotel_code;
 }
 


var_dump($cod);

 
$availability_hotels_arr= $cosmos->hotel_availability($cod,$hotels_code[0]);


var_dump($availability_hotels_arr->count);

 foreach ($availability_hotels_arr->results as $key => $value) {
 	$availability_hotels_arr2[]=$value->code;
 }


$fin_res= $cosmos->check_hotel_availability($availability_hotels_arr2[0]);

var_dump($fin_res);

 // last check




//check_hotel_availability







//var_dump($result->results);


die();


 //   /facilities/translations ??
// where translations mandatory parameters -- language_code !! 
$static_endpoints=[0=>'/hotel/',1=>'/hotels/translations/',2=>'/destinations',3=>'/destinations/translations/',4=>'/regions',5=>'/regions/translations/',6=>'/countries',7=>'/countries/translations/',8=>'/continents',9=>'/continents/translations/',10=>'/chains',11=>'/hotel-types',12=>'/hotel-types/translations/',13=>'/hotel-themes',14=>'/hotel-themes/translations/',15=>'/facilities',16=>
'/facilities/translations',
17=>'/facility-types',18=>'/facility-types/translations/',19=>'/facility-categories',20=>'/facility-categories/translations/',21=>'/facility-themes',22=>'/facility-themes/translations/',23=>'/facility-scopes',24=>'/image-categories',25=>'/image-categories/translations/',26=>'/room-types',27=>'/room-types/translations/',28=>'/meal-types',29=>'/meal-types/translations/',];


$query=['pax' => '1','checkout'=>'2017-01-25','checkin'=>'2017-01-20','destination_code'=>'11260','client_nationality'=>'gb','currency'=>'EUR'];




$response= $client->request('GET', '/api/v2/search', [
    'query' => $query ,
    
]);



var_dump(json_decode($response->getBody()));


// $client = new Client([
//     'base_url' => ['https://api.twitter.com/{version}/', ['version' => 'v1.1']],
//     'defaults' => [
//         'headers' => ['Foo' => 'Bar'],
//         'query'   => ['testing' => '123'],
//         'auth'    => ['username', 'password'],
//         'proxy'   => 'tcp://localhost:80'
//     ]
// ]);

// pax=1&checkout=2017-01-25&checkin=2017-01-20&destination_code=11260&client_nationality=gb&currency=EUR


// validate post param
function validate()
{

// $pax="3"; adults_for_search - pax
// $checkout="2017-01-25";
// $checkin="2017-01-20";
// $destination_code="11260";
// $client_nationality="gb";
// $currency="EUR";
// $format="json";

	// location_for_search without code need code !!
if(isset($_POST['check_in']) && isset($_POST['check_out']) && isset($_POST['location_for_search'])   && isset($_POST['rooms_for_search']) && isset($_POST['select_nationality'] ) && isset($_POST['adults_for_search'] )  && isset($_POST['location_for_search'] )   ){

	          return true;
}else return false;
}
?>


