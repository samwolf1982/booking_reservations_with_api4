<?php
namespace CosmosLibs;

use GuzzleHttp\Client;
use Slim\PDO\Database;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

//http://geobytes.com/free-ajax-cities-jsonp-api/
class Geobytes{

       public function  __construct($name,$host)
      {
         $this->name=$name;
         $this->host=$host;

      }

  public function bridge_to_geobytes($val) {

// $test='http://gd.geobytes.com/AutoCompleteCity?callback=jQuery1102010674711745901955_1484173804482&q=Ankar&_=1484173804483';
    $client = new Client();
    $response = $client->request('GET',$this->host.'?'. $val);

     return $response->getBody();
      //return   json_decode($response->getBody());

  }

}