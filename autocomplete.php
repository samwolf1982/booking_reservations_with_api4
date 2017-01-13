<?php


      require_once __DIR__ . '/vendor/autoload.php';

use CosmosLibs\Geobytes as Geobytes;


$geo=new Geobytes('new geo','http://gd.geobytes.com/AutoCompleteCity');


echo $geo->bridge_to_geobytes($_SERVER["QUERY_STRING"]);
    die();
           // require_once   __DIR__ . '/api/db/connection.php';