<?php
namespace CosmosLibs;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

// url https://api2.hotelspro.com/docs/connecting/index.html

// get set  get_s_hotels   s== staticDB  d==dynbamic api
class Cosmos{

	private $static_endpoints; 
    private $type_api;
    private  $base_uri;
    private  $base_uri_static;
    private $default_conect;
     private $default_conect_static;

 private $login;
 private $pass;
 private $login_static;
 private $password_static;

       public function  __construct($login,$pass,$login_static,$password_static)
      {
  	// die("Cosmos");
      	 $base_uri=['test'=>"https://api-test.hotelspro.com",'live'=>'https://api2.hotelspro.com','static'=>'http://api.cosmos-data.com'];
      	 $this->base_uri=$base_uri['test'];
      	 $this->base_uri_static=$base_uri['static'];

      	 $this->default_conect=[
    // Base URI is used with relative requests
    'base_uri' => $this->base_uri,
    // You can set any number of default request options.
    'timeout'  => 30.0,
     'auth'    => [$login, $pass ],];
     	 $this->default_conect_static=[
    // Base URI is used with relative requests
    'base_uri' => $this->base_uri_static,
    // You can set any number of default request options.
    'timeout'  => 30.0,
     'auth'    => [$login_static, $password_static ],];

     // static database or dynamic api
 $this->type_api=['static'=>'/api/static/v1','dinamic'=>'/api/v2/search','dinamic2'=>'/api/v2'];
    
      	$this->static_endpoints=[0=>'/hotels/',1=>'/hotels/translations/',2=>'/destinations',3=>'/destinations/translations/',4=>'/regions',5=>'/regions/translations/',6=>'/countries',7=>'/countries/translations/',8=>'/continents',9=>'/continents/translations/',10=>'/chains',11=>'/hotel-types',12=>'/hotel-types/translations/',
      	13=>'/hotel-themes',
      	14=>'/hotel-themes/translations/',15=>'/facilities',16=>
'/facilities/translations',
17=>'/facility-types',18=>'/facility-types/translations/',19=>'/facility-categories',20=>'/facility-categories/translations/',21=>'/facility-themes',22=>'/facility-themes/translations/',23=>'/facility-scopes',24=>'/image-categories',25=>'/image-categories/translations/',26=>'/room-types',27=>'/room-types/translations/',28=>'/meal-types',29=>'/meal-types/translations/',];


 $this->login=$login;
 $this->pass=$pass;
 $this->login_static=$login_static;
 $this->password_static=$password_static;


      }



  public function getAvailability($code) {

  //  $url = "https://api-test.hotelspro.com/api/v2/availability/$code";
     $url = "https://api-test.hotelspro.com/api/v2/availability/{$code}";
        $client = new Client($this->default_conect);
        $response= $client->request('GET',$url);
      return   json_decode($response->getBody());


    // $ch = curl_init();



    // curl_setopt($ch, CURLOPT_URL, $url );

    // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // curl_setopt($ch, CURLOPT_USERPWD, $this->login.":".$this->password); //Your credentials goes here

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);



    // $data = curl_exec($ch);

    // curl_close($ch);



    // return json_decode($data);

  }



     //code	since&limit	format	action	
      public function get_s_hotels($param)
      {
      	

        $client = new Client($this->default_conect_static);
        $response= $client->request('GET',$this->type_api['static']. $this->static_endpoints[0], [
           'query' => $param]);
      return   json_decode($response->getBody());

      }

 //code	since&limit	format	action	
      public function get_s_destinations($param)
      {
      	

        $client = new Client($this->default_conect_static);
        $response= $client->request('GET',$this->type_api['static']. $this->static_endpoints[2], [
           'query' => $param]);
      return   json_decode($response->getBody());

      }

           public function get_s_hotel_themes($param)
      {
      	

        $client = new Client($this->default_conect_static);
        $response= $client->request('GET',$this->type_api['static']. $this->static_endpoints[13], [
           'query' => $param]);
      return   json_decode($response->getBody());

      }




             public function search2($pax,$param)
      {
        
       // $url = $this->base_uri."/api/v2/book/{$code_responce['code']}";
       $url= $this->base_uri.$this->type_api['dinamic'];
       //--  /api/v2/search
   

    $ch = curl_init();
//create str


$str=$pax; // end &
foreach ($param as $key => $value) {
        $str.="&{$key}={$value}";
}
 $url.='?'.$str;

    


    curl_setopt($ch, CURLOPT_URL, $url );

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_USERPWD, $this->login.":".$this->pass); //Your credentials goes here

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
   //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


                     
//die(var_dump( $str,true));
   // curl_setopt($ch, CURLOPT_POSTFIELDS,
   //          $str);


    $data = curl_exec($ch);







    //$firephp->fb($data);

  
    curl_close($ch);

    return json_decode( $data);

      }


             public function search($param)
      {
      	
           //die(var_dump($param));
        $client = new Client($this->default_conect);
        $response= $client->request('GET',$this->type_api['dinamic'], [
           'query' => $param]);
      return   json_decode($response->getBody());

      }

             
                                 // доступность мест общая
              public function hotel_availability($code_responce,$hotel_code)
      {
      	

        $client = new Client($this->default_conect);
        $response= $client->request('GET','/api/v2/hotel-availability/', [
           'query' => ['search_code'=>$code_responce,'hotel_code'=>$hotel_code]]);
      return   json_decode($response->getBody());

      }

                                    // доступность мест в отеле
              public function check_hotel_availability($code_responce)
      {
      	

        $client = new Client($this->default_conect);
        $response= $client->request('GET','/api/v2/availability/'.$code_responce, [
           'query' => []]);
      return   json_decode($response->getBody());

      }


                                          // check_hotel_provision
              public function check_hotel_provision($code_responce)
      {
        

        $client = new Client($this->default_conect);
        $response= $client->request('POST','/api/v2/provision/'.$code_responce, [
           'query' => []]);
      return   json_decode($response->getBody());

      }


                                            // check_hotel_provision
              public function chancel_book($code_responce)
      {
        

try {
       $client = new Client($this->default_conect);
      $response= $client->request('POST','/api/v2/cancel/'.$code_responce, [
           'query' => []]);
//return $response->getStatusCode();
       return  ['ok'=> $response->getBody(),'statuscode'=>$response->getStatusCode(),'responce'=>'***'];
} catch (RequestException $e) {
    //echo Psr7\str($e->getResponse());
 // return $response->getStatusCode();
  
      if('404'==$e->getResponse()->getStatusCode()) {
            return ['error'=>'404','msg'=>Psr7\str($e->getResponse()),'text'=>'Booking not found'];

      }

    if ($e instanceof RequestInterface) {
            return $e->getMethod();
           }

   if ($e->getRequest()) {


      
       return $e->getRequest();
    }
    if ($e->hasResponse()) {

       return $e->getResponse();
    }
}
    
       
     

      }


                                                  // check_hotel_provision
              public function chancel_book2($code_responce)
      {
        

     //  $response= $client->request('POST','/api/v2/cancel/'.$code_responce, [
      
 $url = $this->base_uri."/api/v2/cancel/{$code_responce}";

   
    $ch = curl_init();



    curl_setopt($ch, CURLOPT_URL, $url );

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_USERPWD, $this->login.":".$this->pass); //Your credentials goes here


     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);



    $data = curl_exec($ch);







    //$firephp->fb($data);

  
    curl_close($ch);

    return json_decode( $data);
    
       
     

      }



                 public function book($code_responce)
      {
        

//try {
                      // /api/v2/book/PL77K57A2CLA
      $client = new Client($this->default_conect);

          // $response= $client->request('POST','/api/v2/book/'.$code_responce.'?name=1,John,Doe,adult');

$response= $client->request('POST','/api/v2/book/'.$code_responce,
  ['form_params' => 
        
       ['name'=>'1,John,Doe,adult','name'=>'1,John,Doe,adult'],
       
        // 'name' =>'1,John,Doe,adult',        'name' =>'1,John,Doe,adult',
        //'name' => '1,John2,Doe2,adult',
       // 'name' => '1,John2,Doe2,adult',
       
        
    
 ]

        );
//return $response->getStatusCode();


// Check if a header exists.
if ($response->hasHeader('Content-Length')) {
   //echo "It exists";
}
$h='';
// Get a header from the response.
//$h.= $response->getHeader('Content-Length');

// Get all of the response headers.
foreach ($response->getHeaders() as $name => $values) {
   // $h.= $name . ': ' . implode(', ', $values) . "\r\n";
}
//return $h;
       return  json_decode($response->getBody());
//} catch (RequestException $e) {
    //echo Psr7\str($e->getResponse());
 // return $response->getStatusCode();
  return   'Error';
   //    if('404'==$e->getResponse()->getStatusCode()) {
   //          return ['error'=>'404','msg'=>Psr7\str($e->getResponse()),'text'=>'Booking not found'];

   //    }

   //  if ($e instanceof RequestInterface) {
   //          return $e->getMethod();
   //         }

   // if ($e->getRequest()) {


      
   //     return $e->getRequest();
   //  }
   //  if ($e->hasResponse()) {

   //     return $e->getResponse();
   //  }
//}
    
       
     

      }

      public function book2($code_responce)
      {

 $url = $this->base_uri."/api/v2/book/{$code_responce['code']}";

   
    $ch = curl_init();



    curl_setopt($ch, CURLOPT_URL, $url );

    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_USERPWD, $this->login.":".$this->pass); //Your credentials goes here


     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

//create str

                 $str=''; 

     for ($p=0; $p < count($code_responce['adult_name']) ; $p++) { 
       

     

                    for ($i=0; $i <count($code_responce['adult_name'][$p]) ; $i++) { 
                          if($i==0){
                          $str.='name='.($p+1).','.$code_responce['adult_name'][$p][$i].','.$code_responce['adult_sname'][$p][$i].',adult';
                          }else{
                          $str.='&name='.($p+1).','.$code_responce['adult_name'][$p][$i].','.$code_responce['adult_sname'][$p][$i].',adult';
                          }
                                             
                      }

                      // child
                      if (isset($code_responce['children_name'][$p])) {
                        
                    for ($i=0; $i <count($code_responce['children_name'][$p]) ; $i++) { 
                          if($i==0){
                                 $str.='&name='.($p+1).','.$code_responce['children_name'][$p][$i].','.$code_responce['children_sname'][$p][$i].',child,'.$code_responce['children_ages'][$p][$i];

                                 
                          }else{
                          $str.='&name='.($p+1).','.$code_responce['children_name'][$p][$i].','.$code_responce['children_sname'][$p][$i].',child,'.$code_responce['children_ages'][$p][$i];
                          }
                                             
                      }
                      }

      $str.=  $p+1 >=count($code_responce['adult_name'])?"":"&"; 
}
    
                      


               



   curl_setopt($ch, CURLOPT_POSTFIELDS,
            $str);


    $data = curl_exec($ch);







    //$firephp->fb($data);

  
    curl_close($ch);

    return json_decode( $data);
      }


private function create_name_line($arr)
{
    //name=1,John,Doe,adult&name=1,Jane,Doe,adult&name=1,Janie,Doe,child,3  

    $name=array();

    for ($i=0; $i <count($arr['adult_name']) ; $i++) { 

       //  $name=['name']
        $name.='name=1,'.$arr['adult_name'][$i].','.$arr['adult_sname'][$i];
    }

}








}