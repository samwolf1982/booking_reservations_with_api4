<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';
require_once   __DIR__ . '/api/api_conections.php';
use CosmosLibs\Cosmos as Cosmos;



//  $login = "PolatkanTurizm";
//  $password = "5wnHwY66PGsn6CRJ";
 
//  $login_static = "sandbox";
//  $password_static = "thisisyourpassw0rd";
// $format="json";

$cosmos=new Cosmos(API_LOGIN,API_PASS,API_STATIC_LOGIN,API_STATIC_PASS);
$res=$cosmos->getAvailability($_GET['code']);

//var_dump($res ); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
</head>

<script type="text/javascript">

 <?php include 'includes/js/develop2/provision.js'; ?>

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

	$(document).on('click', '.book_room', function() {
		var code = $(this).attr('data-code');
		$.ajax({
			url: "/bookRoom.php",
			type: "post",
			data: {
				'code': code
			},
			success: function(data) {
				$('.book_room').after(data);
			}
		});
	});
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

<div class="row"> 
<div class="col-md-1">
	
</div>
<div class="col-md-10">

<table class="table table-striped"> 
<thead>
    <tr>
      <th colspan="4" class="text-center lead">Booking Form</th>
    
    </tr>
  </thead>

    <tbody>
        <tr>
            <td></td>
            <td>Meal Type (<?=$res->meal_type?> )</td>
            <td><?php echo meal_type($res->meal_type)[0];?></td>
            <td> <?php echo meal_type($res->meal_type)[1];?> </td>
           
        </tr>
        <tr>
            <td></td>
            <td>Checkin</td>
            <td></td>
            <td><?=$res->checkin?></td>
        </tr>
        <tr>
            <td></td>
            <td>Checkout</td>
            <td></td>
            <td><?=$res->checkout?></td>
        </tr>
           <tr>
            <td class="text-center lead" colspan="4">Rooms</td>
                 
        </tr>
               <?php $ind=1; ?>
               <?php foreach ($res->rooms as $key => $value): ?>
               	    <tr>
            <td colspan="4" class="info" ><div class="text-center lead"> Room: <?=$ind++?> </div></td>
        </tr>
               	
               	             <tr>
            <td></td>
            <td>Room type(<?=$value->room_type;?>)</td>
            <td><?php echo room_type($value->room_type)[0]; ?></td>
            <td><?php echo room_type($value->room_type)[1]; ?></td>
                      </tr> 

                        <tr>
            <td></td>
            <td>Room category</td>
            <td></td>
            <td><?=$value->room_category;?></td>
                      </tr> 

                                   <tr>
            <td></td>
            <td>Room description</td>
            <td></td>
            <td><?=$value->room_description;?></td>
                      </tr> 


                                     <tr>
            <td></td>
            <td>Adult quantity</td>
            <td></td>
            <td><?=$value->pax->adult_quantity;?></td>
                      </tr> 

             <?php foreach ($value->pax->children_ages as $k => $c_age): ?>
                                                   <tr>
            <td></td>
            <td>Children</td>
            <td></td>
            <td><?=$c_age?> year</td>
                      </tr> 	
                      <?php endforeach ?>   

                                                  <tr>
            <td class="text-center" colspan="4">Nightly prices</td>
            
                      </tr> 
               <?php foreach ($value->nightly_prices as $k => $np): ?>
                                                   <tr>
            <td></td>
            <td><?=$k?></td>
            <td></td>
            <td><?=$np?> <?=$res->currency?></td>
                      </tr> 	
                      <?php endforeach ?>          

             
              

                                              <tr>
            <td colspan="4"></td>
            
                      </tr> 
           
               <?php endforeach ?>
        
           
             <tr>
            <td></td>
            <td>Days remaining</td>
            <td></td>
            <td><?=$res->policies[0]->days_remaining?> days</td>
        </tr> 

 <tr> <td colspan="4"></td> </tr> 
 <tr> <td colspan="4" class="success" > <div class="text-center  lead ">Cancellation policy
   </div>  </td> 

   </tr>
 
         <?php  
       foreach ($res->policies as $key_p => $p) {  ?>
           <tr hidden> 
      <td><div class="text-center" > Ratio:  </div> </td>
      <td></td>
       <td></td>
       <td   > <div class="text-center">
<?=$res->policies[0]->ratio?>%

          
   </div>
     </td>

      </tr>


        <?php }
         ?>

 <tr> 
 <td><div class="text-center">Charge amount</div> </td>
 <td></td>
 <td></td>
 <td><div class="text-center">
<?php 
$ch=$res->policies[0]->ratio*$res->price;

 echo (round($ch,2)).$res->currency;

?></div>

  </td>
  </tr> 







 <tr> <td colspan="4"></td> </tr> 
 <tr> <td colspan="4" class="success" > <div class="text-center  lead ">Total price
   </div>  </td> </tr>
          <tr>
            <td></td>
            <td>Price</td>
            <td></td>
            <td><?=$res->price?>  <?=$res->currency?></td>
        </tr>

           <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>


<div class="pull-right">
<button class="btn btn-primary btn-lg" onclick="provision('<?php echo $_GET['code']; ?>')"> Book</button>


</div>


<!-- row diw
 -->
 </div>
 <div class="col-md-1"></div>
</div>
<!-- </div>
 -->



	
	<button hidden type="button" class="book_room" data-code="<?= $_GET['code'] ?>">Бронировать</button>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?echo $PackageName;?></h3>
				</div>
				<div class="clear"></div>
				<div class="col-m-8">
					<h5 class="col1 txf">TUR PROGRAMI</h5>
					
					<div class="txf text1">days caption</div>		
					<div class="col2">days content</div>
						<br>
						<br>

						<h5 class="col1 txf">EKSTRA TURLAR</h5>	
							<div class="txf text1">extra caption</div>		
							<div class="col2">extra content</div>
						<div class="txf text1">extra tour caption</div>		
						<div class="col2">extra tour content</div>
					<br>
					<br>

				</div> 
				<div class="col-md-4">
					<div class="box">
						<div class="box_top">caption</div>
						<img src="" alt="img">

						<div class="box_bot">
							<div class="col2">detail package explanation</div>
							<br>			
							<div class="text1">start date - end date</div>
							<div class="col2">day night string</div>
							<div class="col2">package class İki Kişilik Oda</div>
							<br>
							<ul>
								<li>
									<div class="col1">price for double - price for currency</div>
									<div class="col2">Kişi Başı</div>
								</li>              
								<li>
									<div class="col1">addition bed price for third - price for currency</div>
									<div class="col2">İlave Yatak</div>
								</li>             
								<li>
									<div class="col1">price for single - price for currency</div>
									<div class="col2">Tek Kişi</div>
								</li>
							</ul>
						</div>
					</div>	
				</div>	
				<div id="owln" class="owl1">
					<div class="col-md-4">
						<div class="item">
							<a href="#">ONLINE REZERVASYON</a>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box">
						<div class="box_top">DİĞER DETAYLAR</div>

						<div class="box_bot">
							<div class="text1">NASIL GİDİLİR?</div>
							<div class="col2">fligth info</div>
							<br>			

							<div class="text1">NELER ÜCRETE DAHİL?</div>
							<div class="col2">free of charge</div>
							<br>
			<!--
			<div class="text1">NELER ÜCRETE DAHİL DEĞİL?</div>
			<div class="col2"><?echo nl2br($search->GetTourPackageDetailResult->TourPlan->NonFreeOfChargeServices);?></div>
			<br>			
		-->
						</div>
					</div>	
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--==============================footer=================================-->
	<?php include ('includes/php/footer.php'); ?>



<!-- modal  -->
<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalHorizontal">
    Launch Horizontal Form
</button>

<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
   
</div>




<!-- modal end  -->







</body>
</html>










<?php


//         [cod=>['shord','description']]
function meal_type($cod)
{

$arr=['RO'=>['Room Only','Room Only'],
       'AI'=>['All Inclusive','All Inclusive, where the host providers Breakfast, Champagne Brunch buffet, Late Breakfast,Lunch Food, Kids Dinner, Dinner.'],
       'FB'=>['Full Board','FB	Full Board, where the host providers all three daily meals.'],  
       'HB'=>['Half Board','HB	Half Board, where the host providers only a breakfast and dinner or lunch meals.'],
       'BE'=>['Breakfast','Breakfast English'],
       'BC'=>['Breakfast','Breakfast'],
       'UL'=>['Ultra','Ultra All Inclusive, where the host providers Breakfast,
Champagne Brunch buffet, Late Breakfast, Lunch Food,
Kids Dinner, Dinner, Mini Bar and Room Service'], 
       'SC'=>['Self Catering','Self Service Catering'],
        ];

          
        return  isset( $arr[$cod])?$arr[$cod]:'';

}

function room_type($cod)
{
	

	$arr=['SB'=>['Single','Single, where the host provide single bed.'],
       'DB'=>['Double','Double, where the host provide double bed.'],
       'TW'=>['Twin','Twin, where the host provide twin bed.'],  
       'TB'=>['Triple','Triple, where the host provide one double and a single bed or a combination of beds  and roll-aways.'],
       'QB'=>['Quad','Quad, where the post provide 2 double beds or 1 double + 2 single bed or 4 single beds.'],
       'FL5'=>['Family Room','5 people Family Room, where the post provide 2 double beds + 1 single bed or or a combination of beds  and roll-aways.'],
       'FL6'=>['Family Room','6 people Family Room, where the post provide 2 double beds + 2 single beds or or a combination of beds  and roll-aways.'], 
       'FL7'=>['Family Room','7 people Family Room, where the post provide 2 double beds + 3 single beds or or a combination of beds  and roll-aways.'],
       'FL8'=>['Family Room','8 people Family Room, where the post provide 3 double beds + 2 single beds or or a combination of beds  and roll-aways.'],
       'FL'=>['Family Room','Family Room'],
        ];

          
        return  isset( $arr[$cod])?$arr[$cod]:'';

}

?>