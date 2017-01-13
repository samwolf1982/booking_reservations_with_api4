<?php

			require_once __DIR__ . '/vendor/autoload.php';

            require_once   __DIR__ . '/api/db/connection.php';
            require_once   __DIR__ . '/api/api_conections.php';


		   // include_once('/api/api/HotelsPro.php');
          
          $user_search=session_get();
         // var_dump($user_search);
	 if(is_null($user_search) || !isset($_POST['code']) ) {die('redirect empty sesion');}//die('redirect empty sesion');
		    use CosmosLibs\Hotels as Hotels;
		    use CosmosLibs\Cosmos as Cosmos;

//post for card 
//client_names pattern="\w+ \w+.*" 
//card_number_[1-4] 
//Expiry expiry_m 
//Expiry expiry_y
// cvv 






  
// define('API_LOGIN', 'PolatkanTurizm');
// define('API_PASS', '5wnHwY66PGsn6CRJ');
// define('API_STATIC_LOGIN', 'sandbox');
// define('API_STATIC_PASS', 'thisisyourpassw0rd');
// define('FORMAT', 'json');

//  $login = "PolatkanTurizm";
//  $password = "5wnHwY66PGsn6CRJ";
 
//  $login_static = "sandbox";
//  $password_static = "thisisyourpassw0rd";
// $format="json";


$cosmos=new Cosmos(API_LOGIN,API_PASS,API_STATIC_LOGIN,API_STATIC_PASS);

//$res=$cosmos->book($_POST['code']);
$res=$cosmos->book2($_POST);

 if (isset($res->error_code)) {
 	 
 	 die(var_dump( ['errorcode'=>$res->error_code,'detail'=>$res->detail],true));
 }


//var_dump($res);
                  
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

 <?php include 'includes/js/develop2/chancel.js'; ?>

</script>



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

		<div class="container">

			<div class='ajax_content'>

<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">

<!-- wrap -->
<div>
  <div class="text-center lead ">
    Booking number 
  </div>
   <div class="text-center bg-danger lead "><?=$res->code;?>
   </div>
   <div class="text-center"> <span>Status</span>: <?=$res->status;?>
 <div style="margin: 2em 0">
 <button class="btn btn-primary" onclick="window.location.href=`Hotels.php`">Home</button>   
<button  id='cancel' onclick="chancel('<?=$res->code;?>')"    class="btn btn-primary btn-lg text-center">
                                  Cancel Booking
                             </button> 
 

<button class="btn btn-primary"  type="button" class="for btn btn-primary" onClick="window.print()"> Print </button>



 </div>
   

 <div class="text-center"> <span>Checkin:</span> <?=$res->checkin?></div>
  <div class="text-center"> <span>Checkout:</span> <?=$res->checkout?></div>
 

 <div class="text-center lead">
    Rooms 
  </div>

   <?php foreach ($res->rooms as $k => $r): ?>
        <div class="well">        
     <div class="text-center">   <span>Room category:</span>
        <?=$r->room_category?> </div>
       
  
      
       <div class="text-center">   <span>Room description:</span>
       <?=$r->room_description?></div>
       


   
       <div class="text-center">   <span>Adult quantity:</span>
        <?=$r->pax->adult_quantity?></div>
       

       <div class="text-center">   <span>Children quantity:</span>
      <?=count($r->pax->children_ages);?></div>
     </div>


               <?php endforeach ?>

     <div class="text-center lead ">Total price
   </div>
   <div class="text-center bg-danger lead"> <span>Price:</span> <?=$res->price?> <?=$res->currency?> </div>
 


</div>

<!-- end wrap -->






  </div>
    <div class="col-md-1">
  </div>
</div>	       




           <?php 
             //  var_dump($_POST);

		       ?>

























			<div class='ajax_pages'>

			<?php 

				// if($res['pages'] > 1) {

				// 	for($i=1; $i<=$res['pages']+1; $i++) {

				// 		echo "<a class='page' href='/HotelRooms.php?code=".$_GET['code']."&page=$i' data-id='$i'>$i</a>";

				// 	}

				// }

			?>

			</div>

		</div>

	</div>
	<!-- taras_layout -->
	<div class="container">
		<div class="tittle__hotel">
			<h2 class="name__hotel">

		    </h2>
		
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




<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
   
</div>
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