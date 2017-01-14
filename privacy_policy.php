<?php

			require_once __DIR__ . '/vendor/autoload.php';

            require_once   __DIR__ . '/api/db/connection.php';

		   // include_once('/api/api/HotelsPro.php');
          
          $user_search=session_get();
         // var_dump($user_search);
		   // if(is_null($user_search)) {die('redirect empty sesion');}//die('redirect empty sesion');
		    use CosmosLibs\Hotels as Hotels;

		    ?>
<!DOCTYPE html>

<html lang="en">

<head>

	<title>BookingRoll | Tatil, Her zaman!</title>

	<meta charset="utf-8">

	<meta name = "format-detection" content = "telephone=no" />

	<?php include ('includes/php/head.php'); ?>
	<link rel="stylesheet" href="includes/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="includes/css/pgwslideshow.min.css">
	<link rel="stylesheet" href="includes/css/hotels.min.css">
	<link rel="stylesheet" href="includes/css/lightgallery.css">
</head>






<script type="text/javascript">

	$( function() {

		function log( message ) {

			$( "<div>" ).text( message ).prependTo( "#log" );

			$( "#log" ).scrollTop( 0 );

		}



		$( "#location_for_search" ).autocomplete({

			source: function( request, response ) {

				$.ajax( {

					url: "http://gd.geobytes.com/AutoCompleteCity",

					dataType: "jsonp",

					data: {

						q: request.term

					},

					success: function( data ) {



            // Handle 'no match' indicated by [ "" ] response

            response( data.length === 1 && data[ 0 ].length === 0 ? [] : data );

        }

    } );

			},

			minLength: 3,

			select: function( event, ui ) {

				log( "Selected: " + ui.item.label );

			}

		} );

	} );

</script>

<!--

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>

<script type="text/javascript">

function initialize() {

	var options = {

		types: ['geocode']

	};

	var input = document.getElementById('location_for_search');

	var autocomplete = new google.maps.places.Autocomplete(input);

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

-->

<body class="" id="top">

	<!--==============================header=================================-->

	<?php include ('includes/php/navmenu.php'); ?>

	<!--==============================main info=================================-->

	<div class="search_hotel_block">







        <style type="text/css">
        	
        	.panel-heading{
        		max-height: 3em;
        	
        	}
              .panel-title{
              	margin: 0;
              	padding: 0;
              }
        </style>
<div class="container">
            <div class="head">
                <h2> PRIVACY &amp; POLICY</h2>
                <p>
This privacy policy sets out how POLATKAN TOURISM LTD (the “COMPANY”) uses and protects any information that you give the COMPANY when you use this website. The COMPANY is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. Although this policy is effective from the day it is published on our website, the COMPANY may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.
What we collect
We may collect the following information:
name, age and address
contact information including email address
demographic information such as postcode, preferences and interests
other information relevant to customer surveys and/or offers
For facebook applications we will only request the basic account information i.e. name, email, gender, birthday, current city and profile picture. For all other data we will ask for your consent from you as a user before using it for any purpose other than for the facebook application.
By Facebook applications we mean canvas page application, platform integration or other technical integration allowing us to create and run promotions, offers, competitions and games.
What we do with the information we gather
We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:
Internal record keeping.
We may use the information to improve our products and services.
We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.
From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customize the website according to your interests.<br>
                   <div class="text-center">     <strong>Security</strong></div>
                    <br>
          We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.
               

               <br> <br>
                     <div class="text-center">   <strong>How we use cookies</strong></div>
                    <br>
A cookie is a small file which asks permission to be placed on your computer’s hard drive. Once you agree, the file is added and the cookie helps analyze web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences. We use traffic log cookies to identify which pages are being used. This helps us analyze data about webpage traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system. Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us. You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website



 <br><br>
                 <div class="text-center">   <strong >Links to other websites</strong></div>
                    <br>
Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.
Controlling your personal information
You may choose to restrict the collection or use of your personal information in the following ways:
whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody other than ourselves for direct marketing purposes
if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to us or email us at:info@polatkan.com   
We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen. You may request details of personal information which we hold about you under the Data Protection Legislation. A small fee will be payable. If you would like a copy of the information held on you please contact us:
LEFKOSA: Post Code: 99010, Bedreddin Demirel Cad No: 1 Kumsal/Lefkosa Tel: +90392 22 82224 Fax: +90392 22 88570
If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible, at the above address. We will promptly correct any information found to be incorr
 <br><br>
                     <div class="text-center">   <strong>Last Update</strong> </div>
                    <br>

12th Jamuary 2017.
<br>&copy;2017 Polatkan Tourims Ltd. All rights reserved. Designated trademarks and brands are the property of their respective owners. Use of this website constitutes acceptance of its General and Special Terms and Conditions and Privacy Policy.

                </p>
            </div>


        </div>













































	</div>

	<!--==============================footer=================================-->

	<?php include ('includes/php/footer.php'); ?>
	<script src="includes/js/lightgallery.js"></script>
	<script src="includes/js/lg-fullscreen.js"></script>
	<script src="includes/js/lg-thumbnail.js"></script>
	<script src="includes/js/lg-video.js"></script>
	<script src="includes/js/lg-autoplay.js"></script>
	<script src="includes/js/lg-zoom.js"></script>
	<script src="includes/js/lg-hash.js"></script>
	<script src="includes/js/lg-pager.js"></script>
	<script src="includes/js/hotels.min.js"></script>
	<script src="includes/js/slider__page.js"></script>





</body>

</html>

<?php

// always get 'user_search' or null 
//value == ['code_search','result']
function session_get()
{
      $session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
    //$session->destroy();
   $segment = $session->getSegment('Vendor\Package\ClassName');
      // var_dump( $segment->get('user_search'));
  return  $segment->get('user_search');
}
?>