<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';
require_once   __DIR__ . '/api/api_conections.php';


use CosmosLibs\Cosmos as Cosmos;
use CosmosLibs\Destination as Destination;
use CosmosLibs\Hotels as Hotels;

// todo !!!
// проверку на таймаут!! от апи


//require_once __DIR__ .'/vendor/cosmoslib/Cosmos.php';
//example
//https://api2.hotelspro.com/docs/api_examples/index.html#booking-process-for-1-adult

 // $login = "PolatkanTurizm";
 // $password = "5wnHwY66PGsn6CRJ";
 
 // $login_static = "sandbox";
 // $password_static = "thisisyourpassw0rd";




//$_POST['check_in']='2016-12-22';
//$_POST['check_out'] ='2016-12-30';
//$_POST['location_for_search']='Dubai';  // search code 
//$_POST['rooms_for_search']='1';
//$_POST['select_nationality']='AW';
//$_POST['adults_for_search']='1';

//var_dump($_POST['adults_for_search']);
//$_POST['currency']="EUR";
$format="json";



//$_POST['location_for_search']='';  


if (!validate()) { die('bad POST');}





/// child array create
//  if (isset($_POST['child_for_search']) && !empty($_POST['child_for_search'])) {
 	
//    for ($i=0; $i <$_POST['child_for_search'] ; $i++) { 
// if(isset($_POST['child_age_for_search'.$i]) && !empty($_POST['child_age_for_search'.$i])) $total_child[]=$_POST['child_age_for_search'.$i];
//     }
//  }
      

// $pax=$_POST['adults_for_search'];
// if(isset($total_child))
// foreach ($total_child as $key => $value) {
//               $pax.=','.$value;	
//              }  
//???

$destinations=new Destination(API_LOGIN,API_PASS,API_STATIC_LOGIN,API_STATIC_PASS);
$des_code= $destinations->get_code_by_name($_POST['location_for_search']);




 $hotel=new Hotels('get hotels');
// todo проверка на отстутсвие
if(!$des_code){
 die(
       json_encode(['empty'=>"bad location_for_search {$_POST['location_for_search']} not presend in db",'html'=>$hotel->get_html_from_hotels_by_code('empty'),'result'=>[],'location_for_search'=>$_POST['location_for_search'],'room_property'=>'', 'hidden_location_for_search'=>$_POST['hidden_location_for_search']], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)
  );
}


$cosmos=new Cosmos(API_LOGIN,API_PASS,API_STATIC_LOGIN,API_STATIC_PASS);



if(true){
$_POST['currency']='USD';


  //Indicates amount of persons.  A few input examples are as follows : 
   //pax = 4 (4 adults)
   // pax = 2,12,11 (2 adults, 2 children with ages of 12 and 11) 
//First integer is the number of adults,  and the rest after the first comma will be taken as list of children ages.  Can be used multiple times in one search separated with &.
 //adults , child age

//multy
///api/v2/search/?pax=1,5&pax=1,7&checkout=2017-01-25&checkin=2017-01-20&hotel_code=135f3a&client_nationality=gb&currency=EUR
//please note that the check-out and check-in dates must not be in past.

// pax=1,5 requests for 1 adult , 1 child who 5 years old in room #1

// pax=1,7 requests for 1 adult , 1 child who 7 years old in room #2
//die($_POST);]
$pax='';
 for ($j=0;    $j < $_POST['rooms_for_search']   ; $j++)     { 
 // $pax.='pax=';    
      // for ($j=0; $j <8 ; $j++) { 
      //   # code...
      // }
         
$pax.='pax='.$_POST['adults_for_search'.$j];
 if (isset($_POST['child_for_search'.$j])) {
    for ($c=0; $c < $_POST['child_for_search'.$j] ; $c++) { 
             $pax.=",".$_POST['child_age_for_search'.$j.$c]; 
    }
}
$pax.= $j+1 >=$_POST['rooms_for_search'] ? "":"&";
}


 
//die(var_dump($pax,true));

// $pax=$_POST['adults_for_search'];
// if (isset($_POST['child_for_search'])) {
//    for ($i=0; $i < $_POST['child_for_search'] ; $i++) { 
//             $pax.=",".$_POST['child_age_for_search'.$i]; 
//    }

// }

//die($pax);

 $result= $cosmos->search2($pax,["checkout"=>$_POST['check_out'],"checkin"=>$_POST['check_in'],"destination_code"=>$des_code,"client_nationality"=>$_POST['select_nationality'],'currency'=>$_POST['currency'],'rooms_for_search'=>$_POST['rooms_for_search'],'format'=>$format]);

/* $result= $cosmos->search(["pax"=>$pax,"checkout"=>$_POST['check_out'],"checkin"=>$_POST['check_in'],"destination_code"=>$des_code,"client_nationality"=>$_POST['select_nationality'],'currency'=>$_POST['currency'],'format'=>$format]);*/

//die(var_dump($result,true));

   // nothing in on Cosmos request

if (isset($result->error_code)) {
         

  // $err='';
  // foreach ($result->detail as $key => $value) {
  //   # code...
  // }
  $inf= var_export($result->detail,true);
   die(
       json_encode(['empty'=>"bad location_for_search99 {$_POST['location_for_search']} error_code info: ",'html'=>$hotel->get_html_from_hotels_by_code('error_code',''),'result'=>[],'location_for_search'=>$_POST['location_for_search'],'room_property'=>'', 'hidden_location_for_search'=>$_POST['hidden_location_for_search']], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)
  );        
}


   if($result->count<=0){
die(
       json_encode(['empty'=>"bad location_for_search {$_POST['location_for_search']} not presend in api",'html'=>$hotel->get_html_from_hotels_by_code('zero'),'result'=>[],'location_for_search'=>$_POST['location_for_search'],'room_property'=>'', 'hidden_location_for_search'=>$_POST['hidden_location_for_search']], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)
  );



   }




/////
 $cod=$result->code;
 foreach ($result->results as $key => $value) {
 	$hotels_code[]=$value->hotel_code;
 }




}
//  get hotels
 
 

 


   
                                         // $hotels_code[]='10001a';  
  $hotel_res=  $hotel->get_hotels_by_code($hotels_code); 

  // remove different or empy code  

  foreach ($hotel_res as $key => $value) {
         $temp[$value['code']] =$value;          
    }  

    unset( $hotel_res );
    $hotel_res=$temp;

    $keys=array_keys($hotel_res);

//die(var_export($hotel_res,true));

   
 foreach ($result->results as $key => $value) {
      if(  in_array($value->hotel_code, $keys) )
      {
            $hotel_res[$value->hotel_code]['data']=$value;

      } 
 }
 
   // unset( $result );
 







 
   $res=  $hotel->get_html_from_hotels_by_code($hotel_res); 


// $_POST['check_out']

$datetime1 = new DateTime($_POST['check_in']);
$datetime2 = new DateTime($_POST['check_out']);
$interval = $datetime1->diff($datetime2);

$diff_days=  $interval->format('  %a days');
$room_property= total_abults(). " Adult(s) in {$_POST['rooms_for_search']} Room (s)";
 // Thu, 08 Dec, 2016 - Fri, 09 Dec, 2016 (1 Night (s))
 $date_string=date("D M j   Y",strtotime($_POST['check_in'])).' - '.date("D M j   Y",strtotime($_POST['check_out'])).$diff_days.'   '; 


//echo sesion_init_set_get($tes);
session_init_set(['code_search'=>$cod,'result'=>$hotel_res]);

  echo json_encode(['result'=>$hotel_res, 'products' => $result,'html'=>$res,'code_search'=>$cod,'hotel_codes'=>$hotels_code,'location_for_search'=>$_POST['location_for_search'],'hidden_location_for_search'=>$_POST['hidden_location_for_search'],'date_string'=>$date_string,'room_property'=>$room_property], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);


//var_dump($cod);



//////////


die();

var_dump(validate());



$pax="3";
$checkout="2017-01-25";
$checkin="2017-01-20";
$destination_code="11260";
$client_nationality="gb";
$currency="EUR";
$format="json";



 $result= $cosmos->search(["pax"=>$pax,"checkout"=>$checkout,"checkin"=>$checkin,"destination_code"=>$destination_code,"client_nationality"=>$client_nationality,'currency'=>$currency,'format'=>$format]);

 $cod=$result->code;
 foreach ($result->results as $key => $value) {
 	$hotels_code[]=$value->hotel_code;
 }
 




 
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
if(isset($_POST['check_in']) && isset($_POST['check_out']) && isset($_POST['location_for_search'])   && isset($_POST['rooms_for_search']) && isset($_POST['select_nationality'] )
// && isset($_POST['adults_for_search'] )
  && isset($_POST['location_for_search'])     ){

	          return true;
}else return false;
}


//  return  total_abults  from post
function total_abults()
{

$tot=0;
for ($i=0; $i <$_POST['rooms_for_search'] ; $i++) { 
  # code...
$tot+=$_POST["adults_for_search{$i}"];

}

       // $tot=$_POST['adults_for_search0'];

       // $tot+= isset($_POST['adults_for_search1'])?$_POST['adults_for_search1']:0; 
       //  $tot+= isset($_POST['adults_for_search2'])?$_POST['adults_for_search2']:0; 
       //   $tot+= isset($_POST['adults_for_search3'])?$_POST['adults_for_search3']:0; 
       //    $tot+= isset($_POST['adults_for_search4'])?$_POST['adults_for_search4']:0; 
     
     return $tot;
 
}


// always set 'user_search' 
//value == ['code_search','result']
function session_init_set($value)
{
 $session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
   $segment = $session->getSegment('Vendor\Package\ClassName');
   $segment->set('user_search', $value);
//   $_SESSION['Vendor\Package\ClassName']['user_search']=$value;
  // $session->commit();
}
?>
