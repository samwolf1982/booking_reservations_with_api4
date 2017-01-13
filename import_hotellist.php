<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';

ini_set('memory_limit', '-1');
use CosmosLibs\Hotels as Hotels;
use Webmozart\Json\JsonDecoder;

$folder_export='consumer-2016.11.01-export';







      if (!isset($argv[1]) || !isset($argv[2])) {
              die("add PARAM two int from to LIKE 50 100");
      }

//die('param1: '.$argv[1].' param2: '. $argv[2]);
// 0-25 25-50 
for($i=$argv[1]; $i<$argv[2]; $i++) {

$path=RT."/api/import_or_update/{$folder_export}/hotels-".$i.'.json';
       $fileData = file_get_contents(RT."/api/import_or_update/{$folder_export}/hotels-".$i.'.json');

 
      $data = json_decode($fileData,true);

    
     
      foreach( $data as $key => $value) {
                    $regions='';

                  foreach ($value as $k => $v) {
                    # code...



       
                       
                          
                         if($k=='images'){ 
                                              if(is_null($v)) continue;
                       foreach ($v as $k_m => $m) {
      $temp_colect[]=[
      'original'=>$m['original'],
      'large'=>$m['thumbnail_images']['large'],
      'small'=>$m['thumbnail_images']['small'], 
      'mid'=>$m['thumbnail_images']['mid'] ,

      'category'=>$m['category'] ,
      'tag'=>$m['tag']    ];
                                 }
                                
                 $img=['code'=>$value['code'],'img_list'=>$temp_colect];  
                 $rel['img']=$img;    
                                  unset($temp_colect);

                             continue;    } 
//---------------------------end loop img

                   if($k=='regions'){

                    foreach ($v as $k_r => $r) {
                       $temp_colect[]=$r;
                       
                    }
              

 $regions=['code'=>$value['code'],'regions_list'=> isset( $temp_colect)?$temp_colect:NULL];  
 $rel['regions']=$regions;
                                  unset($temp_colect);
                 continue;  }                 
//---------------------------end loop region


                   if($k=='themes'){   if(is_null($v)) continue;

                    foreach ($v as $k_t => $t) {
                       $temp_colect[]=$t;
                       
                    }
              

 $themes=['code'=>$value['code'],'themes_list'=> isset( $temp_colect)?$temp_colect:NULL];  
  $rel['themes']=$themes;
                                  unset($temp_colect);

               continue;    }                 
//---------------------------end loop themes


                 if($k=='facilities'){
                                 if(is_null($v)) continue;
                    foreach ($v as $k_t => $t) {
                       $temp_colect[]=$t;
                       
                    }
              

 $facilities=['code'=>$value['code'],'facilities'=> isset( $temp_colect)?$temp_colect:NULL];  
   $rel['facilities']=$facilities;
                                  unset($temp_colect);
                       //var_dump($facilities); die('facilities-----');
                   continue; }                 
//---------------------------end loop facilities


                          if($k=='descriptions'){   if(is_null($v)) continue;
 
                    foreach ($v as $k_d => $d) {
                       $temp_colect[$k_d]=$d;
                       
                    }
                    $temp_colect['lang_code']='eng';
                    
 

 $descriptions=['code'=>$value['code'],'descriptions'=> isset( $temp_colect)?$temp_colect:NULL];
   $rel['descriptions']=$descriptions;
                       unset($temp_colect); continue;
                   }                 


                           
                           //  colect key +val for msql
                         $list[$k]=$v;
    



                  }

                   $res[]=$list;
                   
                   $relations[]=$rel;
                   unset($list);
                    unset($rel);
                 //  break;

    }

$hot= new Hotels('hot'); 
     $res= $hot->import_hotels($res,'hotels');
 //die('loop end import_hotels'.count($data));



            $hot->import_relations($relations);
    echo "IMport ".$i . PHP_EOL;    
//var_dump($arr_img);
   // die('ok after import');    
     unset($res); 
     unset($relations);
      
echo "OK {$i}".PHP_EOL;
 








    }


die('end** IMPORT');
    {
  
//var_dump($data);
//die();

//$decoder = new JsonDecoder();

// Read JSON string
//$data = $decoder->decode($string);

// Read JSON file
//$data = $decoder->decodeFile($path);

  //     foreach($data as $key => $value) {

  //             var_dump($value);
  // die('sds') ;  }
//       return (json_last_error() === JSON_ERROR_NONE); 
     // $data= new RecursiveIteratorIterator(
     // new RecursiveArrayIterator($data),
     // RecursiveIteratorIterator::SELF_FIRST);
// "code": "100007", 
//     "master": null, 
//     "name": "Memphis Hotel Amsterdam", 
//     "country": "nl", 
//     "zipcode": "1071 NX", 
//     "address": "De Lairessestraat 87", 
//     "destination": "2078f", 
//     "latitude": 52.35352913701477, 
//     "longitude": 4.872272238135338, 
//     "currencycode": "EUR", 
//     "checkin_from": "14:00", 
//     "checkout_to": "12:00", 
//     "nr_rooms": 78, 
//     "stars": 4.0, 
//     "hotel_type": "204", 
//     "images": [

var_dump( $data[0]['code']); 
var_dump( $data[0]['master']); 
var_dump( $data[0]['name']); 
var_dump( $data[0]['country']); 
var_dump( $data[0]['zipcode']); 
var_dump( $data[0]['address']); 
var_dump( $data[0]['destination']);
var_dump( $data[0]['checkin_from']); 
var_dump( $data[0]['checkout_to']); 
var_dump( $data[0]['nr_rooms']);            
var_dump( $data[0]['stars']);
var_dump( $data[0]['availability_score']);  

var_dump( $data[0]['hotel_type']);

                      for ($i=0; $i < count( $data[0]['images']); $i++) { 

                  echo $data[0]['images'][$i]['thumbnail_images']['large'].PHP_EOL;
                   echo $data[0]['images'][$i]['thumbnail_images']['small'].PHP_EOL;
                    echo $data[0]['images'][$i]['thumbnail_images']['mid'].PHP_EOL;                  
                      }

 echo "regions ------------".PHP_EOL;
                    foreach ($data[0]['regions'] as $key => $value) {
                     var_dump( $value);
                    }
echo "themes ------------".PHP_EOL;
                    foreach ($data[0]['themes'] as $key => $value) {
                     var_dump( $value);
                    }

echo "facilities ------------".PHP_EOL;

var_dump( $data[0]['facilities']);  

      var_dump($data[0]);
die();
                    foreach ($data[0]['facilities'] as $key => $value) {
                     var_dump( $value);
                    }


//die();
//var_dump( $data[0]['themes']); die();
//var_dump( $data[0]['facilities']); die();
//var_dump( $data[0]['descriptions']); die();

var_dump( $data[0]['year_built']); die();
var_dump( $data[0]['nr_restaurants']); die();
var_dump( $data[0]['nr_bars']); die();
var_dump( $data[0]['nr_halls']); die();
var_dump( $data[0]['updated_at']); die();

    foreach( $data[0] as $k => $value) {

            if(isset($value['hotel_information']))  {var_dump($value) ;die();}           
 //       if($k=='facilities'){
                   
 //             var_dump($value) ;die();      
 // } 
                           // if($k=='descriptions')  continue; 
                           //        if($k=='images'){     }


             //if(is_array($value)){ var_dump($value['hotel_information']); continue;}
          //echo $k." :: ".$value.PHP_EOL;
                 // var_dump($value);

                     }
die('------');



     
      foreach( var_dump($data[0],true) as $key => $value) {
                    $regions='';

                    // for ($j=0; $j < count($ds['regions']) ; $j++) { 
                             
                    //          if($j>0)$regions.=','.$ds['regions'][$j];
                    //          else$regions.=$ds['regions'][$j]; 
                    // }

     // var_dump($value);       
   //die();

                  foreach ($value as $k => $v) {
                    # code...



       
                        if( is_array($v)) continue; 
                        if(is_object($v)) continue;
                          
                          // not work
                         if($k=='facilities')  continue; 
                           if($k=='descriptions')  continue; 
                                 if($k=='images'){
                                 //var_dump($v[0]);
                                // foreach ($v->images as $k1 => $v1) {
                                  $e=((array)$v);
                                 var_dump( $value);
                                 
                                 

                                 //}
                                

                               //  var_dump($value->images->category);
                                 die('img');

                                 } 
// {                         
//   var_dump($value);
//                             var_dump( gettype($value));
//                           die('facilities');

// }
                         $list[$key]=$value;
                     //var_dump($key);

                   // var_dump($value);


                  }

                   $res[]=$list;
                  // var_dump($list); die();
                   unset($list);

             // die();
         // $arr[]=[$ds['code'], $ds['country'], $ds['parent'],$regions,$ds['name'], $ds['latitude'],$ds['longitude'],$ds['updated_at']];

       // die('die: '.var_dump($res));
    }
       
      $hot= new Hotels('hot'); 
      $res= $hot->import_hotels($res,'hotels');
    echo "IMport ".$i . PHP_EOL;    

   // die('ok after import');    
     unset($res); 
      

      }


?>