<?php
require __DIR__ . '/vendor/autoload.php';
define("RT", 'G:/sites/s7');

use CosmosLibs\Destination as Destination;










for($i=0; $i<81; $i++) {

       $fileData = file_get_contents(RT.'/api/db/hotels_pro/static_data/destinations-'.$i.'.json');

      $destinationsData = json_decode($fileData,true);

      foreach($destinationsData as $ds) {
                    $regions='';

                    for ($j=0; $j < count($ds['regions']) ; $j++) { 
                             
                             if($j>0)$regions.=','.$ds['regions'][$j];
                             else$regions.=$ds['regions'][$j]; 
                    }
    
              
         $arr[]=[$ds['code'], $ds['country'], $ds['parent'],$regions,$ds['name'], $ds['latitude'],$ds['longitude'],$ds['updated_at']];

       // die('die: '.var_dump($res));
    }

      $res= Destination::export_destinations($arr);
    echo "IMport ".$i . PHP_EOL;        
     unset($arr); 
      

      }


?>