<?php

$new_file = 'KW5147hoteldescr.xml';
$dir = dirname(__FILE__);
$full_name = $dir . '/' . $new_file;
echo $full_name;
$nf = fopen($full_name,'a');


$df = fopen('http://www.hotelspro.com/xf_3.0/downloads/KW5147hoteldescr.xml','r');


    while (!feof($df)) {  //This looped forever
        $content = fread($df, 1024);
        fwrite($nf, $content, 1024);
        fflush($nf);
    }

fclose($df);
fclose($nf);
?>