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

		<div class="container">

			<div class='ajax_content'>

			<?php

	


				//$hotelsPro = new HotelsProApi();

				$hotel_code = $_GET['code'];

				$request_id = $hotel_code[0];

				$hotel_code = $hotel_code[1];

				$page = 1;
                
                $_GET['page']=2;
				if($_GET['page']) {

					$page = $_GET['page'];

				}

				//$res = $hotelsPro->getHotelRooms($request_id, $hotel_code, $page);

				//$hotel_data = $hotelsPro->getHotelDataFromStatic($hotel_code);

				// echo 'description - '.$hotel_data['hotel_info'].'<br>';

				// echo 'name - '.$hotel_data['name'].'<br>';

				// echo 'phone - '.$hotel_data['phone'].'<br>';

				// echo 'stars - '.$hotel_data['stars'].'<br>';

				// echo 'address - '.$hotel_data['address'].'<br>';

                   $hotel=new Hotels('get hotels images');
                                        
               $images=  $hotel->get_hotels_images($_GET['code']); 
	           $hotel_info=  $hotel->get_hotels_info($_GET['code']); 
               //var_dump($hotel_info);


               
                            $name= $hotel_info['name'];             
               // $name=    isset( $user_search['result'][$_GET['code']]['name'])?$user_search['result'][$_GET['code']]['name']:'';                 
				//$images = $hotelsPro->getHotelImages($hotel_code);

				// foreach($images as $image) {

				// 	echo '<img src="'.$image['url'].'"><br>';

				// }



				$result = '';

				


			?>

			
			<div class="wrapper">
			    <div class="row main__section">
			        <div class="container main__container">
			            <div class="col-sm-8 slider">
			                <ul class="pgwSlideshow" id="lightgallery">
<?php
								foreach($images as $image) {
									echo '<li data-src="'.$image['large'].'"><a href="#"><img src="'.$image['large'].'" alt=""></a></li>';
								}

?>
			                </ul>
			                <div class="fullscreen">
			                    <span class="fullscreen__icon"></span>
			                </div>
			             </div>
			            <div class="col-sm-4 right__collumn">
			                <div class="tittle__hotel">
			                    <h2 class="name__hotel" style="text-align: left;">
			                        <a class="h2__link" href="#"><?=$name?></a>
									<span style="white-space: nowrap;">
				                        <span class="fa fa-star  star__icon active__starIcon"></span>
				                        <span class="fa fa-star  star__icon active__starIcon"></span>
				                        <span class="fa fa-star  star__icon active__starIcon"></span>
				                        <span class="fa fa-star  star__icon"></span>
				                        <span class="fa fa-star  star__icon"></span>
									</span>
			                    </h2>
			                    <span class="adress__hotel">
										<?=$hotel_info['hotel_introduction'];?>
									</span>
									<div><?=$hotel_info['phone']?></div>
			                </div>
			                <!--<a class="btn btn-primary btn-lg btnBook"  href="#">-->
			                    <!--<span class="up-head-word">Book Now From</span></a>-->
			                    <?php
                                 //or search or booking
                                 if (isset($user_search['result'][$_GET['code']]['data']->products[0]->code)) {
                                 
                                $curent_book=$user_search['result'][$_GET['code']]['data']->products[0]->code;
                                   

                                 }else{
                                  $curent_book="search...";
                                 }

			                     ?>
			               <a hidden href="HotelBooking.php?code=<?=$curent_book;?>"> <button class="book__now">Book Now From</button></a>
			            </div>
			        </div>
			        <div class="container">
				        <h3 style="color: #003366; border-bottom: 2px solid #ccc; padding: 15px 0; margin: 0; text-transform: none; margin-bottom: 20px; font-size: 24px;">Description</h3>
				        <p><?=$hotel_info['hotel_information']?></p>
			        </div>
			    </div>
			</div>

            <div class="table">
                <table class="table__hotels">
                        <tr class="table__head">
                            <th>Room Type</th>
                            <th>Meal Type</th>
                            <th>Support Cancellation</th>
                            <th>Price & Fees</th>
                            <th>Reservation</th>
                        </tr>

			<?php




			//var_dump($user_search['result'][$_GET['code']]);
$hotels_arr=[];
if (isset($user_search['result'][$_GET['code']]['data']->products)) {
	 
$hotels_arr=$user_search['result'][$_GET['code']]['data']->products;
}

foreach($hotels_arr as $hotel2):
     
//var_dump($hotel2);
	echo "<tr>";
 $supports_cancellation= $hotel2->supports_cancellation ?"Yes":"No";
							echo "<td>";
							    foreach ($hotel2->rooms as $key_r => $rr) {
							    	echo "<div data-toggle='tooltip' data-placement='top' title='{$hotel->room_type( $rr->room_type)[1]}'>{$rr->room_description}</div>";
							    }
							

							 echo "</td>";
							echo "<td>";
                                 echo "<div data-toggle='tooltip' data-placement='top' title='{$hotel->meal_type($hotel2->meal_type)[1]}'>{$hotel->meal_type($hotel2->meal_type)[0]}</div>";
							echo "</td>";



							echo "<td>".$supports_cancellation ."</td>";
							echo "<td>" . $hotel2->price .' '.$hotel2->currency.  "</td>";
						?>
						 <td> <a href="HotelBooking.php?code=<?=$hotel2->code;?>"> <button  class='bookNowBtn'>Book Now</button> </a> </td>  

						 <?php                      

             echo "</tr>";


				endforeach;



			 ?>

                </table>
            </div>

			</div>

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
				<?=$name;?>
			</h2>
			<span class="adress__hotel">
				<?=$hotel_info['address']?>
			</span>
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