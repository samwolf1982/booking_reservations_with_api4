<?php
namespace CosmosLibs;

use GuzzleHttp\Client;
use Slim\PDO\Database;


// url https://api2.hotelspro.com/docs/connecting/index.html

class Hotels{

       public function  __construct($name)
      {
         $this->name=$name;
      }

  public function get_hotels_info($code) {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;
 $slimPdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
        
$selectStatement = $slimPdo->select(['name','address','phone','hotel_information','hotel_introduction','hotel_amenity','room_amenity','location_information'])
                           ->from('hotels')
                           ->join('descriptions', 'hotels.id', '=', 'descriptions.id_hotel')
                        
                           ->where('code','=' ,$code);

//SELECT *
//  FROM `hotels` d_h
//  INNER JOIN `descriptions` d_d ON d_h.id = d_d.id_hotel WHERE d_h.code = "107512"


$stmt = $selectStatement->execute();
$data = $stmt->fetch();

return $data;
            

  }


  public function get_hotels_featured($code) {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;
 $slimPdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
        
$selectStatement = $slimPdo->select(['name', 'stars','hotels.id','hotels.stars','original','code','descriptions.hotel_information','images.large','images.mid'])
                           ->from('hotels')
                           ->join('images', 'hotels.id', '=', 'images.id_hotel')
                           ->join('descriptions', 'hotels.id', '=', 'descriptions.id_hotel')
                           ->whereIn('code',$code )->groupBy('hotels.id');

// SELECT `large`
//  FROM `hotels` d_h
//  INNER JOIN `images` d_im ON  d_h.id =d_im.id_hotel
//  INNER JOIN `descriptions` d_d ON d_h.id = d_d.id_hotel WHERE d_h.code = "107512"


$stmt = $selectStatement->execute();
$data = $stmt->fetchall();

return $data;
            

  }


  public function get_hotels_images($code) {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;
 $slimPdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
        
$selectStatement = $slimPdo->select(['large',])
                           ->from('hotels')
                           ->join('images', 'hotels.id', '=', 'images.id_hotel')
                        
                           ->where('code','=' ,$code);

// SELECT `large`
//  FROM `hotels` d_h
//  INNER JOIN `images` d_im ON  d_h.id =d_im.id_hotel
//  INNER JOIN `descriptions` d_d ON d_h.id = d_d.id_hotel WHERE d_h.code = "107512"


$stmt = $selectStatement->execute();
$data = $stmt->fetchall();

return $data;
            

  }

      //       fill or !update db
      // arr [][key]=val          tablename
  public function get_hotels_by_code($value)
      {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;
           $slimPdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
        
$selectStatement = $slimPdo->select(['name', 'stars','hotels.id','original','code','descriptions.hotel_information'])
                           ->from('hotels')
                           ->join('images', 'hotels.id', '=', 'images.id_hotel')
                           ->join('descriptions', 'hotels.id', '=', 'descriptions.id_hotel')
                           ->whereIn('code',$value )->groupBy('hotels.id');
// SELECT * 
// FROM `hotels` d_h
// INNER JOIN `images` d_im ON  d_h.id =d_im.id_hotel
// INNER JOIN `descriptions` d_d ON d_h.id = d_d.id_hotel WHERE d_h.code IN ('100002','100020','10001c')
// GROUP by d_h.id

                //->join('descriptions', 'descriptions.id_hotel', '=', 'hotels.id')

$stmt = $selectStatement->execute();
$data = $stmt->fetchall();

return $data;
}


public function get_html_hotel_amenity_from_hotels_by_code($value,$add_param=''){

$result = '';
  $result.="<div class='text-center large'>General</div>";
 $result.="<div class='room-amenity'>{$value['hotel_information']}</div>";
 $result.="<div class='text-center large'>Hotel amenity</div>";
$result.="<div class='hotel-amenity'>{$value['hotel_amenity']}</div>";
  $result.="<div class='text-center large'>Rooms amenity</div>";
 $result.="<div class='room-amenity'>{$value['room_amenity']}</div>";
   $result.="<div class='text-center large'>Location</div>";
 $result.="<div class='room-amenity'>{$value['location_information']}</div>";



return $result;

 
}


public function get_html_hotel_photos_from_hotels_by_code($value,$add_param=''){

$result = '';

  $result.="<div class='text-center large'>Photos</div>";
 $result.="<div class='more-photos'>Not working</div>";

return $result;

 
}

public function get_html_hotel_detail_from_hotels_by_code($value,$user_search=''){
  

  $hotels_arr=[];
if (isset($user_search['result'][$_POST['code']]['data']->products)) {
   
$hotels_arr=$user_search['result'][$_POST['code']]['data']->products;
}
 
//echo var_dump($user_search,true);

 $res = '';
  // checc sesion info 
  $f=   $user_search;


$res='<div class="row">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Room Type</th>
        <th>Board Type (s)</th>
        <th>Price</th>
          <th></th>
      </tr>
    </thead> 
    <tbody>';

  foreach ($hotels_arr as $key => $hotel) {
   // echo var_dump($hotel,true); die();
        $res.='      <tr>
        <td>';
         

         foreach ($hotel->rooms as $key_r => $room) {
                  $res.="          <div data-toggle='tooltip' data-placement='top' title='{$this->room_type( $room->room_type)[1]}'>{$room->room_description}</div>";

                  //.$this->room_type( $room->room_type)[1];
           }  
          


$res.="</td>
        <td><div data-toggle='tooltip' data-placement='top' title='{$this->meal_type($hotel->meal_type)[1]}'>{$this->meal_type($hotel->meal_type)[0]}</div></td>
        <td>{$hotel->price}{$hotel->currency}</td>
         <td>
 <div class=''>
                  <a href='/HotelRooms.php?code={$_POST['code']}' target='_blank'><button class='btn-info'>Book Now</button></a>
                </div>
         </td>
      </tr>";
  }

$res.='    </tbody>
  </table>
</div>';



 //  $result.="<div class='text-center large'>Rooms amenity</div>";
 // $result.="<div class='room-amenity'>{$value['room_amenity']}</div>";

return $res;

 
}
//                                          codes  or   'empty'
public function get_html_from_hotels_by_code($value,$add_param='')
{
  
  
$result = '';


if ($value=='empty') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in db)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}
if ($value=='zero') {
   $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in api zero)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}

if ($value=='error_code') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again {$add_param}</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}



// print_r($res);
foreach($value as $key => $hotel):
  // $result .= 'HOTEL CODE - '.$code;
  // foreach($hotel['products'] as $product):
   // $hotel_data = $hotelsPro->getHotelDataFromStatic($code);

    $hotel_name = $hotel['name'];
    $stars=$hotel['stars'];
    $img=$hotel['original'];
      $code=$hotel['code'];
    
    //??????
    $res['request_id']='';





    $countStars = '';
    if($stars == 1){
      $countStars = "hotel-stars";
    } elseif($stars == 2){
      $countStars = "hotel-two-stars";
    } elseif($stars == 3){
      $countStars = "hotel-three-stars";
    } elseif($stars == 4){
      $countStars = "hotel-four-stars";
    } elseif($stars == 5){
      $countStars = "hotel-five-stars";
    }else {
      $countStars = "hotel-five-stars";
    }   


$c = count($hotel['data']->products);
$offerts='<div class="col-md-6">
    <div class"text-center" style="text-align: center;">  <span > Found '.$c.'  offerts </span>  </div>';

$ii=0;
$cost=0;
$tabs_ind=0;
foreach ($hotel['data']->products as $key => $value) {

      $hide=$ii++>3?' hidden':'';
     $offerts.=' 
        <div class="row '.$hide.'" >
          <div class="col-md-6"> Room  </div>
          <div class="col-md-6 offerts_price ">  '.$value->price.' '.$value->currency.' 
          </div>
        </div>';
  $cost+=$value->price;
}

if($ii!=0) $cost=$cost/$ii;
$offerts.='</div>';

$offerts='<div class="col-md-6"></div>';


      
    $result .= '<div class="hide_stars-'.$stars.' media holel-media-item" stars="'.$stars.'" cost="'.$cost.'">
            <a class="pull-left hotel-image-link" href="#">
              <img class="media-object hotel-image" src="'.$img.'" alt="...">
            </a>
            <div class="media-body row">
              <div class="col-xs-9">
                <h3 class="media-heading hotel-header">
                  <a class="hotel-header-link" href="/HotelRooms.php?code='.$code.'">'.$hotel_name.'</a>
                  <span class="'.$countStars.'"></span>
                </h3>
                <div hidden class="hotel-inform-line">
                  <div class="address-line">'.'Address'.'</div>
                  <div class="hotel-location">
                    <span class="map-text">
                      <i class="fa fa-map-marker map-icon" aria-hidden="true"></i> City Center
                    </span>
                    <span>3.89 km</span>
                  </div>
                </div>


<div class="row">
  <div class="col-md-6">
 <div class="hotel-details">
                  <a class="details-info" href="/HotelRooms.php?code='.$code.'"><span>Click To See All Room Details</span></a>
                </div>
  </div>'

  .$offerts.



'</div>


                
              </div>


              <div  class="col-xs-3 price-container">
                <div class="price-box">
                  <span class="price-total">Total</span>
                  <div class="price-text">
                   '.$value->price.' '.$value->currency.'
                  </div>
                </div>
                <div class="book-now-btn hotel-header">
                <a href="/HotelRooms.php?code='.$code.'"> <button class="book-btn">Book Now</button> </a>
                </div>
              </div>








 <div  class="col-xs-12 tabs_rooms">
 <div class="tabs">
  <ul>
    <li class="amenities" m-value="'.$code.'"
><a   href="#tabs'.$tabs_ind.'-1">Info</a></li>
    <li class="details" m-value="'.$code.'"
><a  href="#tabs'.$tabs_ind.'-2">Rates</a></li>
    <li class="more-photos" m-value="'.$code.'"
><a  href="#tabs'.$tabs_ind.'-3">Aenean lacinia</a></li>
  </ul>
  <div    id="tabs'.$tabs_ind.'-1">
    &nbsp;
  </div>
  <div   id="tabs'.$tabs_ind.'-2">

'.$offerts.'



  </div>
  <div   id="tabs'.$tabs_ind.'-3">
 
  </div>
</div></div>













            </div>
          </div>';
  // endforeach;
          $tabs_ind++;
endforeach;

// echo $result;

$pages = '';
for($i=1; $i<=count($value); $i++) {
  $pages .= "<div class='page' data-id='$i'>$i</div>";
}

$res = ['html'=>$result, 'pages'=>$pages];
// print_r($res);
// echo 'good';

//$firephp->fb($res);
//ob_get_clean();
return $res;
//echo json_encode($res);




}


//                                          codes  or   'empty'
public function get_html_from_hotels_by_code_fordel($value,$add_param='')
{
  
$result = '';


if ($value=='empty') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in db)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}
if ($value=='zero') {
   $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in api zero)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}

if ($value=='error_code') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again {$add_param}</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}



// print_r($res);
foreach($value as $key => $hotel):
  // $result .= 'HOTEL CODE - '.$code;
  // foreach($hotel['products'] as $product):
   // $hotel_data = $hotelsPro->getHotelDataFromStatic($code);

    $hotel_name = $hotel['name'];
    $stars=$hotel['stars'];
    $img=$hotel['original'];
      $code=$hotel['code'];
    
    //??????
    $res['request_id']='';





    $countStars = '';
    if($stars == 1){
      $countStars = "hotel-stars";
    } elseif($stars == 2){
      $countStars = "hotel-two-stars";
    } elseif($stars == 3){
      $countStars = "hotel-three-stars";
    } elseif($stars == 4){
      $countStars = "hotel-four-stars";
    } elseif($stars == 5){
      $countStars = "hotel-five-stars";
    }else {
      $countStars = "hotel-five-stars";
    }   


$c = count($hotel['data']->products);
$offerts='<div class="col-md-6">
    <div class"text-center" style="text-align: center;">  <span > Found '.$c.'  offerts </span>  </div>';

$ii=0;
$cost=0;
foreach ($hotel['data']->products as $key => $value) {

      $hide=$ii++>3?' hidden':'';
     $offerts.=' 
        <div class="row '.$hide.'" >
          <div class="col-md-6"> Room  </div>
          <div class="col-md-6 offerts_price ">  '.$value->price.' '.$value->currency.' 
          </div>
        </div>';
  $cost+=$value->price;
}

if($ii!=0) $cost=$cost/$ii;
$offerts.='</div>';
//$offerts='';


      
    $result .= '<div class="hide_stars-'.$stars.' media holel-media-item" stars="'.$stars.'" cost="'.$cost.'">
            <a class="pull-left hotel-image-link" href="#">
              <img class="media-object hotel-image" src="'.$img.'" alt="...">
            </a>
            <div class="media-body row">
              <div class="col-xs-9">
                <h3 class="media-heading hotel-header">
                  <a class="hotel-header-link" href="/HotelRooms.php?code='.$code.'">'.$hotel_name.'</a>
                  <span class="'.$countStars.'"></span>
                </h3>
                <div class="hotel-inform-line">
                  <div class="address-line">'.'Address'.'</div>
                  <div class="hotel-location">
                    <span class="map-text">
                      <i class="fa fa-map-marker map-icon" aria-hidden="true"></i> City Center
                    </span>
                    <span>3.89 km</span>
                  </div>
                </div>


<div class="row">
  <div class="col-md-6">
 <div class="hotel-details">
                  <a class="details-info" href="/HotelRooms.php?code='.$code.'"><span>Click To See All Room Details</span></a>
                </div>
  </div>'.$offerts.



'</div>


                
              </div>


              <div  class="col-xs-3 price-container">
                <div class="price-box">
                  <span class="price-total">Total</span>
                  <div class="price-text">
                    <a class="register-text" href="">Register</a>
                    <br>
                    <span class="text-no-link">or</span>
                    <br>
                    <a class="register-text" href="">Login</a>
                  </div>
                </div>
                <div class="book-now-btn">
                  <button class="book-btn">Book Now</button>
                </div>
              </div>
            </div>
          </div>';
  // endforeach;
endforeach;

// echo $result;

$pages = '';
for($i=1; $i<=count($value); $i++) {
  $pages .= "<div class='page' data-id='$i'>$i</div>";
}

$res = ['html'=>$result, 'pages'=>$pages];
// print_r($res);
// echo 'good';

//$firephp->fb($res);
//ob_get_clean();
return $res;
//echo json_encode($res);



}




//                                          codes  or   'empty'
public function get_html_from_hotels_by_code2($value,$add_param='')
{
  
$result = '';


if ($value=='empty') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in db)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}
if ($value=='zero') {
   $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again (not presend in api zero)</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}

if ($value=='error_code') {
  $result.="<div>Sorry, on request ``{$_POST['location_for_search']}`` nothing found, try again {$add_param}</div>";
     return $res = ['html'=>$result, 'pages'=>'<div></div>'];
}



// print_r($res);
foreach($value as $key => $hotel):
  // $result .= 'HOTEL CODE - '.$code;
  // foreach($hotel['products'] as $product):
   // $hotel_data = $hotelsPro->getHotelDataFromStatic($code);

    $hotel_name = $hotel['name'];
    $stars=$hotel['stars'];
    $img=$hotel['original'];
      $code=$hotel['code'];
    
    //??????
    $res['request_id']='';





    $countStars = '';
    if($stars == 1){
      $countStars = "hotel-stars";
    } elseif($stars == 2){
      $countStars = "hotel-two-stars";
    } elseif($stars == 3){
      $countStars = "hotel-three-stars";
    } elseif($stars == 4){
      $countStars = "hotel-four-stars";
    } elseif($stars == 5){
      $countStars = "hotel-five-stars";
    }else {
      $countStars = "hotel-five-stars";
    }   


$c = count($hotel['data']->products);
$offerts='<div class="col-md-6">
    <div class"text-center" style="text-align: center;">  <span > Found '.$c.'  offerts </span>  </div>';

$ii=0;
$cost=0;
foreach ($hotel['data']->products as $key => $value) {

      $hide=$ii++>3?' hidden':'';
     $offerts.=' 
        <div class="row '.$hide.'" >
          <div class="col-md-6"> Room  </div>
          <div class="col-md-6 offerts_price ">  '.$value->price.' '.$value->currency.' 
          </div>
        </div>';
  $cost+=$value->price;
}

if($ii!=0) $cost=$cost/$ii;
$offerts.='</div>';
//$offerts='';


      
    $result .= '<div class="hide_stars-'.$stars.' media holel-media-item" stars="'.$stars.'" cost="'.$cost.'">
            <a class="pull-left hotel-image-link" href="#">
              <img class="media-object hotel-image" src="'.$img.'" alt="...">
            </a>
            <div class="media-body row">
              <div class="col-xs-9">
                <h3 class="media-heading hotel-header">
                  <a class="hotel-header-link" href="/HotelRooms.php?code='.$code.'">'.$hotel_name.'</a>
                  <span class="'.$countStars.'"></span>
                </h3>
                <div class="hotel-inform-line">
                  <div class="address-line">'.'Address'.'</div>
                  <div class="hotel-location">
                    <span class="map-text">
                      <i class="fa fa-map-marker map-icon" aria-hidden="true"></i> City Center
                    </span>
                    <span>3.89 km</span>
                  </div>
                </div>


<div class="row">
  <div class="col-md-6">
 <div class="hotel-details">
                  <a class="details-info" href="/HotelRooms.php?code='.$code.'"><span>Click To See All Room Details</span></a>
                </div>
  </div>'.$offerts.



'</div>


                
              </div>
              <div class="col-xs-3 price-container">
                <div class="price-box">
                  <span class="price-total">Total</span>
                  <div class="price-text">
                    <a class="register-text" href="">Register</a>
                    <br>
                    <span class="text-no-link">or</span>
                    <br>
                    <a class="register-text" href="">Login</a>
                  </div>
                </div>
                <div class="book-now-btn">
                  <button class="book-btn">Book Now</button>
                </div>
              </div>
            </div>
          </div>';
  // endforeach;
endforeach;

// echo $result;

$pages = '';
for($i=1; $i<=count($value); $i++) {
  $pages .= "<div class='page' data-id='$i'>$i</div>";
}

$res = ['html'=>$result, 'pages'=>$pages];
// print_r($res);
// echo 'good';

//$firephp->fb($res);
//ob_get_clean();
return $res;
//echo json_encode($res);



}






      //       fill or !update db
      // arr [][key]=val          tablename
  public function import_hotels($value,$table_name)
      {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;
$pdo = new \Slim\PDO\Database($dsn, $usr, $pwd, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_SILENT,]);

// $pdo->setAttribute(\PDO::ERRMODE_SILENT, \PDO::ATTR_ERRMODE);
 
 
$tik=0;
foreach ($value as $key => $v) {
  // INSERT INTO users ( id , usr , pwd ) VALUES ( ? , ? , ? )
//echo $tik++. "   {$v['longitude']} ".PHP_EOL;
//var_dump(array_keys($v));
 //var_dump(array_values($v));
  //die('111');



    
$insertStatement = $pdo->insert(array_keys($v))
                       ->into($table_name)
                       ->values(array_values($v));

$insertId = $insertStatement->execute(false);



//echo $tik++.PHP_EOL;
}

}


      //       fill or !update db
      // arr [][key]=val          tablename
         // insert in [ images, regions themes facilities  descriptions ]
  public function import_relations($value)
      {
$dsn =DB_DSN;
$usr = DB_USER;
$pwd = DB_PASS;

           $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);




foreach ($value as $key => $v) {
  // INSERT INTO users ( id , usr , pwd ) VALUES ( ? , ? , ? )

//var_dump(array_keys($v));


  $img=isset( $v['img'])?$v['img']:NULL;
  if(!is_null($img)){
 


 $id=  $this->search_id_by_code($img['code'], $pdo);

       foreach ($img['img_list'] as $k_i => $im) {
        $keys=array_merge(['id_hotel'],array_keys($im));
            $vals=array_merge([$id],array_values($im));
 $insertStatement = $pdo->insert($keys)
                        ->into('images')
                        ->values($vals);
 //die('END HOTELS '.var_dump(['key:'=>$keys,'val:'=>$vals],true));
$inse = $insertStatement->execute(false);       
       }
////////img fin
}



  $regions=isset($v['regions'])?$v['regions']:NULL;


              if (!is_null($regions['regions_list'])) {
          
$id= isset($id)?$id:  $this->search_id_by_code($regions['code'], $pdo);

      foreach ($regions['regions_list'] as $k_r => $ir) {





                
            $insertStatement = $pdo->insert(['id_hotel',' regions'])
                        ->into('regions')
                        ->values([$id,$ir]);

$inse = $insertStatement->execute(false);       
       }

          
              }
           ////////regions fin      


  $themes=isset($v['themes'])?$v['themes']:NULL;


              if (!is_null($themes['themes_list'])) {
     $id= isset($id)?$id:  $this->search_id_by_code($themes['code'], $pdo);           
      foreach ($themes['themes_list'] as $k_r => $ir) {


                
            $insertStatement = $pdo->insert(['id_hotel',' themes'])
                        ->into('themes')
                        ->values([$id,$ir]);

$inse = $insertStatement->execute(false);       
       }

          
              }
           ////////themes fin  

  $themes= isset($v['facilities'])?$v['facilities']:NULL;;

  $id= isset($id)?$id:  $this->search_id_by_code($themes['code'], $pdo);
              if (!is_null($themes['facilities'])) {
                
      foreach ($themes['facilities'] as $k_r => $ir) {


                
            $insertStatement = $pdo->insert(['id_hotel',' facilities'])
                        ->into('facilities')
                        ->values([$id,$ir]);

$inse = $insertStatement->execute(false);       
       }

          
              }
           ////////themes facilities

              $themes= isset($v['descriptions'])?$v['descriptions']:NULL;;


              if (!is_null($themes['descriptions'])) {
            $id= isset($id)?$id:  $this->search_id_by_code($themes['code'], $pdo);     
    //  foreach ($themes['descriptions'] as $k_d => $id) {


  // var_dump($themes['descriptions'] ); die();
  $keys=array_merge(['id_hotel'],array_keys($themes['descriptions']));
            $vals=array_merge([$id],array_values($themes['descriptions']));
 $insertStatement = $pdo->insert($keys)
                        ->into('descriptions')
                        ->values($vals);

$inse = $insertStatement->execute(false);      
      // }

          
              }
           ////////themes descriptions




//echo "id: ". $id;


   //die('id '. var_dump($id));
//--------



// $insertStatement = $pdo->insert(['id_hotel',]
//                        ->into($table_name)
//                        ->values(array_values($v));

// $insertId = $insertStatement->execute(false);
// echo $tik++.PHP_EOL;
}
}



private function search_id_by_code($code, $pdo)
{
            // $code=$img['code'];

$selectStatement = $pdo->select(['id',])
                           ->from('hotels')
                           ->where('code', '=', $code);

$stmt = $selectStatement->execute();
$id = $stmt->fetch()['id'];

return $id;
}


public function room_type($cod)
{
  

  $arr=['SB'=>['Single','Single, where the host provide single bed.'],
       'DB'=>['Double','Double, where the host provide double bed.'],
       'TW'=>['Twin','Twin, where the host provide twin bed.'],  
       'TB'=>['Triple','Triple, where the host provide one double and a single bed or a combination of beds  and roll-aways.'],
       'QB'=>['Quad','Quad, where the post provide 2 double beds or 1 double + 2 single bed or 4 single beds.'],
       'FL5'=>['Family Room','5 people Family Room, where the post provide 2 double beds + 1 single bed or or a combination of beds  and roll-aways.'],
       'FL6'=>['Family Room','6 people Family Room, where the post provide 2 double beds + 2 single beds or or a combination of beds  and roll-aways.'], 
       'FL7'=>['Family Room','7 people Family Room, where the post provide 2 double beds + 3 single beds or or a combination of beds  and roll-aways.'],
       'FL8'=>['Family Room','8 people Family Room, where the post provide 3 double beds + 2 single beds or or a combination of beds  and roll-aways.'],
       'FL'=>['Family Room','Family Room'],
        ];

          
        return  isset( $arr[$cod])?$arr[$cod]:'';

}

public function meal_type($cod)
{

$arr=['RO'=>['Room Only','Room Only'],
       'AI'=>['All Inclusive','All Inclusive, where the host providers Breakfast, Champagne Brunch buffet, Late Breakfast,Lunch Food, Kids Dinner, Dinner.'],
       'FB'=>['Full Board','FB  Full Board, where the host providers all three daily meals.'],  
       'HB'=>['Half Board','HB  Half Board, where the host providers only a breakfast and dinner or lunch meals.'],
       'BE'=>['Breakfast','Breakfast English'],
       'BC'=>['Breakfast','Breakfast'],
       'UL'=>['Ultra','Ultra All Inclusive, where the host providers Breakfast,
Champagne Brunch buffet, Late Breakfast, Lunch Food,
Kids Dinner, Dinner, Mini Bar and Room Service'], 
       'SC'=>['Self Catering','Self Service Catering'],
        ];

          
        return  isset( $arr[$cod])?$arr[$cod]:'';

}





}