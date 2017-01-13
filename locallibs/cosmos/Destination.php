<?php
namespace CosmosLibs;

use GuzzleHttp\Client;
use Slim\PDO\Database;


// url https://api2.hotelspro.com/docs/connecting/index.html

// get set  get_s_hotels   s== staticDB  d==dynbamic api
class Destination{

	private $static_endpoints; 
    private $type_api;
    private  $base_uri;
    private  $base_uri_static;
    private $default_conect;
     private $default_conect_static;
  private    $dsn;
  private $usr;
private $pwd;
       public function  __construct($login,$pass,$login_static,$password_static)
      {



$this->dsn = DB_DSN;
$this->usr = DB_USER;
$this->pwd = DB_PASS;



// $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);

// $selectStatement = $pdo->select()
//                        ->from('hotels_pro_hotel_list')
//                        ->where('id', '=', 555);

// $stmt = $selectStatement->execute();

// $data = $stmt->fetch();

// var_dump($data['hotel_code']);




  	// die("Destination");
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
 $this->type_api=['static'=>'/api/static/v1','dinamic'=>'/api/v2/search'];
    
      	$this->static_endpoints=[0=>'/hotels/',1=>'/hotels/translations/',2=>'/destinations/',3=>'/destinations/translations/',4=>'/regions',5=>'/regions/translations/',6=>'/countries',7=>'/countries/translations/',8=>'/continents',9=>'/continents/translations/',10=>'/chains',11=>'/hotel-types',12=>'/hotel-types/translations/',
      	13=>'/hotel-themes',
      	14=>'/hotel-themes/translations/',15=>'/facilities',16=>
'/facilities/translations',
17=>'/facility-types',18=>'/facility-types/translations/',19=>'/facility-categories',20=>'/facility-categories/translations/',21=>'/facility-themes',22=>'/facility-themes/translations/',23=>'/facility-scopes',24=>'/image-categories',25=>'/image-categories/translations/',26=>'/room-types',27=>'/room-types/translations/',28=>'/meal-types',29=>'/meal-types/translations/',];


      }
  

 //     return data['code'] or false	
      public function get_code_by_name($param)
      {
      $pdo = new \Slim\PDO\Database($this->dsn, $this->usr, $this->pwd);
      $selectStatement = $pdo->select(['code'])
                           ->from('destinations')
                           ->where('name', '=', $param);

     $stmt = $selectStatement->execute();
     $data = $stmt->fetch();  

       if($data)return $data["code"];

       return $data;        

      }

  

      //       fill or update db
      static public function export_destinations($value)
      {
          
$dsn = 'mysql:host=localhost;dbname=localhost7;charset=utf8';
$usr = 'root';
$pwd = '';

           $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);

$tik=0;
foreach ($value as $key => $v) {
  // INSERT INTO users ( id , usr , pwd ) VALUES ( ? , ? , ? )
$insertStatement = $pdo->insert(array('code', 'country', 'parent', 'regions', 'name', 'latitude', 'longitude', 'updated_at'))
                       ->into('destinations')
                       ->values($v);

$insertId = $insertStatement->execute(false);
//echo $tik++.PHP_EOL;
}

}



}