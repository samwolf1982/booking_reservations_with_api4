<?php
 
// wsdl cache 'ini devre disi birak
ini_set("soap.wsdl_cache_enabled", "0");
 
	//Web Servis Linki Gerçek Ortam: 
	//https://www.prontotour.com/PSSaleWebService/ProntoSystem.asmx

	//Web Servis Linki Test Ortamı: 
	//http://b2b.prontotour.com/pssalewsdemo/prontosystem.asmx

    $wsdl = "http://b2b.prontotour.com/pssalewsdemo/prontosystem.asmx?WSDL";

    $client = new SoapClient($wsdl, array(
        "trace"      => 1,
        "exceptions" => 0));

	$prontoaccess = array(
	  "AgencyCode" => "DTE",
	  "UserName" => "ws",
	  "Password" => "p2000o",
	  "languageID" => "TR",  
	);

?>




