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
                <h2> TERMS &amp; CONDITIONS</h2>
                <p>
                    Please read the following booking conditions carefully as they govern all bookings made (whether through Vanilla Tours’ website or otherwise) with
                   
                    <br>
                    <strong>LEONAR-DO REZERVASYON VE TURIZM SANAYI LTD.STI. and VANGAL TRADING LIMITED</strong>
                    <br>
                The terms set out below apply when you book through Vanilla Tours hotel accommodation and any other travel components. They apply whether you book one component or more than one component. Booking more than one component does not create a package pursuant to the Package Travel, Package Holidays and Package Tours Regulations 1992.
               
                </p>
            </div>


            <div class="panel-group" id="accordion">
                <!-- 1 General terms  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">1. General Terms
                        </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">1.1. </span>By making a booking, you acknowledge and accept these terms &amp; conditions in their entirety.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.2. </span>Bookings must usually be made using the on-line booking system or using the XML Interface. Requests to book, amend or cancel cannot be accepted by telephone.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.3. </span>It is your responsibility to read any documentation and conditions applying to a Booking and to ensure that your staff has taken note of any points which are your responsibility.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.4. </span>We reserve the right to be indemnified by you in full against any and all losses, costs and other expenses we incur as a result of any cancellation you have made.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.5. </span>All the information we supply, be it on our site or not and be it pictures, maps or text, is and will remain our property. No information can be copied without our specific approval.
                            No access to any part of our system can be given by you to anyone who is not an employee in your company without our specific written agreement. If you should stop being our client any and all access to any and all of our systems will stop.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.6. </span>Descriptions of the hotels and their facilities and amenities are provided by our suppliers. Whilst we make every effort to ensure that the descriptions and information are accurate, we cannot accept responsibility for any errors or omissions. Changes may occur which are beyond our control. In the interests of continued improvement, hotels may alter furniture, fittings, amenities, facilities or any part of any activities, either advertised or previously available, without prior notice. Hotels will also show the effects of normal wear and tear and these too are also beyond our control. Please note that hotel classifications and assessments are often based on our own view and may not reflect other sources. We will not accept any claim for compensation based on any description or information either provided or missing.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.7. </span>Triple and quad rooms may not always contain three or four separate full size single beds. One or more folding beds may be used.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.8. </span>All vouchers issued must include our reservation reference number and must state that the reservation is booked and paid by Vanilla Tours. If you have issued a voucher for a booking you later cancel but the voucher is sent to us by the hotel with their invoice as the client arrived and stayed, we will invoice you according to the stay detailed on the voucher.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.9. </span>We act solely as an intermediary and not as a principle when making bookings for hotels or any other services we supply. We are therefore not liable for personal injury, illness, property damage or other loss or expense of any nature whatsoever arising directly or indirectly out of any the actions of the company with which we booked or supplying the service we have reserved on your behalf.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.10.</span>We will always do our best to ensure that all confirmed bookings are accepted by the supplier. If it happens that a supplier is unable to accept a confirmed booking we will do our best to provide you with a suitable alternative of the same standard and in the same location. We cannot guarantee in every case that the alternative accommodation booked by us or the original supplier will be of a matching standard or in the same location as that booked.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.11.</span>We shall not be liable for, and you will fully indemnify us in respect of any loss or third party claim, including cancellation charges, we may incur as a result of any incomplete or inaccurate details in the booking you added to our system or the booking information you sent to us for us to reserve on your behalf.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.12.</span>We will not be liable to you if we are unable to fulfil a booking by reason of fire, earthquake, flood, snowstorm, epidemic, explosion, strike, riot, civil disturbance, war, act of God, any failure or delay of any transportation, power or communications system or any similar events beyond our control. We will always, in any of these circumstances, do our best to provide alternative arrangements or refund any sum already paid unless we are bound by contracts with our suppliers which preclude us from obtaining a refund from them to pass on to you.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.13.</span>We reserve the right to alter these Terms and Conditions from time to time.
                       
                            </div>
                            <div class="clause">
                                <span class="number">1.14.</span> These Terms and Conditions are governed by and construed in accordance with Turkish law. Disputes arising in connection with these terms shall be subject to the exclusive jurisdiction of the Turkish courts.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 Pricing -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">2. Pricing
                        </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">2.1. </span>The final price for any booking is the price quoted on the online system. Prices not on the system are subject to fluctuation and are not guaranteed.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.2. </span>The currency for each item booked will be that displayed on the Hotel Availability search. All hotel rates are inclusive of local taxes, service charge and, at least, continental breakfast where breakfast is included and unless stated otherwise at the time of booking.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.3. </span>We reserve the right to vary prices at any time as a result of changes in taxes, changes in trade fairs and special event periods, or when a currency movement is in excess of 3%. We will only increase the price on an existing confirmed booking if a change in tax is forced on us by our supplier.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.4. </span>During trade fair, exhibition and other special event or peak periods our prices may be higher than the official rack rates.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.5. </span>Our prices to you are strictly private and confidential. You may not disclose them, or anything to do with them, to anyone who is not employed in your company. We reserve the right to cease trading with you, and to cancel all future bookings, if our prices are so disclosed.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.6. </span>The child policies vary for each hotel. You can see the prices on-line in our system.
                       
                            </div>
                            <div class="clause">
                                <span class="number">2.7. </span>If you see any rate marked as ‘Package’, these hotel rates are only available when sold part of a package i.e. combined with one or more transport components (flight, train or car) and sold as one price to the customer. In addition, at no time should the hotel rate be disclosed to the customer or marked-up in any way.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 Cancellations -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">3. Cancellations
                        </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">3.1. </span>The standard cancellation deadline varies for each booking. Bookings cancelled later than deadline are subject to a minimum charge of the first night of the booked period per room cancelled. Bookings changed within the cancellation deadline but so the arrival date is no longer within the cancellation deadline period will still attract a cancellation charge for at least the first of any unused nights. Non-standard cancellation deadlines may apply from time to time. These will be advised in our prices and on the affected bookings.
                       
                            </div>
                            <div class="clause">
                                <span class="number">3.2. </span>If you add group bookings to our system by splitting them to make them appear as FIT bookings, hotels may levy group cancellation charges, and standard FIT cancellation deadlines may not apply, when such individual bookings cancel. You will be liable for these charges.
                       
                            </div>
                            <div class="clause">
                                <span class="number">3.3. </span>We may cancel bookings you have added using our system, and hotels may request us to make cancellations of bookings on their behalf, if they appear to us or to the hotel to be group bookings and not genuine FIT Bookings. Cancellation charges may apply when either we or a hotel believe bookings to be either a group, or made to hold space you hope to sell later. Charges may also apply if the number of rooms booked is reduced within the group cancellation deadline.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 4 Online Bookings -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed">4. Online Booking
                        </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">4.1. </span>When we confirm a reservation we do not require reconfirmation from you. Should the booking not be required it is your responsibility to cancel the booking with us on line, or by email if the booking was sent to us by email. All amendments (to reduce the number of rooms booked or to shorten the stay) and/or cancellations must have been sent to us by email before cancellation deadlines.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.2. </span>We do not charge any amendment fee but new total price of the booking which needs to be amended might differ. Additional payment or refund would be necessary in those cases. Amedments can not be guranteed within deadline period but we would do our best and try to make the amendment according to your request.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.3. </span>Changes to bookings can only be dealt with when requested by you to us and not by the passenger to us. If you cancel direct with one of our suppliers you may still be liable to be charged as the suppliers’ contracts are with us. We may therefore still be liable for charges, which we must pass on, should you cancel direct.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.4. </span>The offer for sale of some hotels on some consumer facing sites and the promotion of such hotels through the use of metatags or any other search engine tool is strictly prohibited. We reserve the right to suspend your account if you openly offer hotels supplied by us in this way when we have advised that they must not be offered and we further reserve the right immediately to cancel any bookings already made in such hotels.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.5. </span>Should any passenger alter their stay directly with a hotel, we will need a confirmation letter from an authorised representative of that hotel stating that the change has been accepted and that no charges will be levied to us as a result of the change. We will require a copy of this letter within 14 days of the change for the client to qualify for any financial adjustment. After that period requests for a credit may not be accepted.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.6. </span>Our system will automatically confirm bookings and cancellations by email if the booking has not been made on XML. Unless you receive such an email from us you cannot consider the booking to be confirmed or cancelled.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.7. </span>We will not accept any liability if there are problems with bookings as a result of your supplying incorrect information such as, but not limited to, the spelling of names, incorrect stay dates and incorrect city or hotel requested.
                       
                            </div>
                            <div class="clause">
                                <span class="number">4.8. </span>The online booking system may only be used to book a maximum of 9 passengers, in no more than 5 rooms. Any more than this is classified as a Group reservation. Such bookings must be sent by email or “Group Request Tab” and will be subject to quotation and prepayment. If bookings are added using our on-line system and the hotel believes they are a group they are not bound to take the booking.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 5 Booking Procedure If The On-line System Is Not Available -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="collapsed">5. Booking Procedure If The On-line System Is Not Available
                        </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">5.1. </span>The following details must be clear and in this order when making a booking by email.
                           
                                <br>
                                <span class="number">A) </span>Passenger family name followed by initials and title
                                <br>
                                <span class="number">B) </span>City name
                                <br>
                                <span class="number">C) </span>Hotel name
                                <br>
                                <span class="number">D) </span>Date of arrival
                                <br>
                                <span class="number">E) </span>Number of nights
                                <br>
                                <span class="number">F) </span>Number and type of rooms - You must request TWB/DWB + Extra bed and give us the child age, when your booking includes a child.
                                <br>
                                <span class="number">G) </span>Remarks
                       
                            </div>
                            <div class="clause">
                                <span class="number">5.2. </span>Bookings must be categorised under the heading of: new, amendment, cancellation or chaser. Unless your email makes this clear, and if it does not have our reservation number, we will assume it is a new request and will confirm accordingly. If we have made an additional booking in error you will have to cancel or will be charged.
                       
                            </div>
                            <div class="clause">
                                <span class="number">5.3. </span>All reservations should be made on the booking system but in exceptional circumstances we will accept emails. To prevent confusion regarding your instructions, when cancelling or amending please do not add new instructions to old e-mails. Please make sure that you’re using info@vanillatours.com while sending your emails.
                       
                            </div>
                            <div class="clause">
                                <span class="number">5.4. </span>For cancellations, please quote our reservation number and state clearly what we have confirmed, which may not be the same as your original request, and what you want to cancel.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 6 Charging, Invoicing And Payment -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" class="collapsed">6. Cancellations and Amendments
                        </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">6.1. </span>Payment must be made before the cancellation deadline of the booking at full by bank transaction/bank loating or credit card. Payment should be made through VanillaTours’ website by credit or debit card. Remind that no reservation will be definite without a payment.
                            IMPORTANT NOTICE:
                            When making the bank transfer, please indicate the confirmation code of the reservation in the first comment field. If further comment fields are available, please indicate the full name of the first passenger in the booking. If only one comment field is available, ONLY enter the confirmation code. If the information entered in the comment field does not match the information of the booking we will not be able to identify the reservation and it will be cancelled.
                            In case of multiple bookings (with different confirmation codes), please make the bank transfer indicating your AGENCY ID and AGENCY NAME in the comment field for the corresponding amounts.
                            All costs associated to bank transfer payments must be born by the customer. The amount of the bank transfer must cover the full amount of the reservation. In case the payment received does not cover the full amount of the reservation, it will be cancelled.
                            If we do not receive the corresponding amount before the cancellation deadline, we reserve the right to cancel your reservation.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.2. </span>If you’re working on fixed terms, payment of each invoice is due in full within the number of days specified in your Credit Agreement. It must be made in the invoice currency by bank transfer to our relevant bank account. We do not accept company cheques. In exceptional circumstances we can arrange to accept payment by credit card for invoices but there will be a supplement for this which must be paid in full by you.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.3. </span>Every payment must be accompanied by a clear remittance advice, in the same currency as our invoice, which must state our invoice number(s) and amounts paid per invoice showing a total which equals the payment sent.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.4. </span>Any payment less than our invoice amount must be explained in full showing our invoice number, reservation number, passenger name, arrival date, hotel, the amount of and the reason for the underpayment, together with all evidence or information backing up any claim for a credit, such as copies of emails.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.5. </span>If there is any item you wish to dispute in any invoice, we must have all details of the dispute in writing within 14 days of the issue date of the disputed invoice(s).
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.6. </span>We will not accept the non-payment of undisputed invoices because of a dispute with another invoice.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.7. </span>If you breach your credit limit or credit period, the on-line system will be blocked automatically and will be requested to remit further funds immediately so that we can continue to take bookings.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.8. </span>If the full payment has not been received by the due date in accordance with these terms, we reserve the right to:-
                           
                                <br>
                                <span class="number">A) </span>Disconnect access to all of our booking systems.
                           
                                <br>
                                <span class="number">B) </span>Stop making bookings when requests for reservations are sent to us by email.
                           
                                <br>
                                <span class="number">C) </span>Insist upon prepayment for any and all existing bookings to ensure that we do not cancel them.
                           
                                <br>
                                <span class="number">D) </span>Cancel any future bookings you have already made.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.9. </span>The full cost of remitting your payment to us must be borne by you. We will not accept any deduction from invoices by you to cover your bank charges nor will we accept any deduction as a result of your bank using an intermediary bank to pay us.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.10. </span>A minimum one night charge to cover the first night of the stay will apply to a no-show booking. During periods when a different minimum stay is stipulated by the hotel or during trade fair or special event periods, the minimum stay period or the entire period of the booking will be charged for.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.11. </span>Should any passenger leave a hotel before the end of their booked stay and without informing the hotel they are doing so, we cannot guarantee any refund for the unused nights and reserve the right to invoice in full for the stay we reserved.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.12. </span>Any payments made into an incorrect bank account will be credited at an exchange rate set by us.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.13. </span>While paying for the invoices, you should use the currency determined by VanillaTours and if there are any exchanges, you should take this currency into consideration.
                       
                            </div>
                            <div class="clause">
                                <span class="number">6.14. </span>In lump sum payments made through Vanilla Tours payment system, system automatically allocates the bonuses, cash amounts and credit card payments and you should accept these allocations. You should not reclaim after all transactions are completed.
                       
                            </div>
                              <div class="clause">
                                <span class="number">6.15. </span>Any amendment would be on request but not guaranteed. Any amendment may cause repricing of the original booking based on the new nightly rates.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 7 Disputes and Agreement Termination -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" class="collapsed">7. Disputes and Agreement Termination
                        </a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">7.1. </span>If your clients are dissatisfied with any of the arrangements we have made for them, they should use the telephone numbers provided before they depart from the hotel or leave the service provider. Hotels and other suppliers are more likely resolve matters if problems are reported at the time.
                            </div>
                            <div class="clause">
                                <span class="number">7.2. </span>We must be notified about complaints within 14 days of the departure from the city in which the complaint arose.
                       
                            </div>
                            <div class="clause">
                                <span class="number">7.3. </span>Our agreement with you will be considered ended if you do not pay any amount owed by the agreed payment date, cease to trade, threaten to cease to trade, go into any form of liquidation, start to be run by an appointed receiver or administrator, breach any of your obligations contained within these and/or any other terms or do not remedy that breach within 7 days of us advising you of the breach and the remedy we require. Such a termination in these circumstances will in no way affect any other rights we have under this agreement.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 8 Disclaimer -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" class="collapsed">8. Disclaimer
                        </a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">8.1. </span>Subject to the limitations set out in these terms and conditions and to the extent permitted by law, we shall only be liable for direct damages actually suffered, paid or incurred by you due to an attributable shortcoming of our obligations in respect to our services, up to an aggregate amount of the aggregate cost of your reservation as set out in the confirmation email (whether for one event or series of connected events).
                       
                            </div>
                            <div class="clause">
                                <span class="number">8.2. </span>However and to the extent permitted by law, neither we nor any of our officers, directors, employees, representatives, subsidiaries, affiliated companies, distributors, affiliate (distribution) partners, licensees, agents or others involved in creating, sponsoring, promoting, or otherwise making available the site and its contents shall be liable for (i) any punitive, special, indirect or consequential loss or damages, any loss of production, loss of profit, loss of revenue, loss of contract, loss of or damage to goodwill or reputation, loss of claim, (ii) any inaccuracy relating to the (descriptive) information (including rates, availability and ratings) of the hotel as made available on our website, (iii) the services rendered or the products offered by the hotel, (iv) any (direct, indirect, consequential or punitive) damages, losses or costs suffered, incurred or paid by you, pursuant to, arising out of or in connection with the use, inability to use or delay of our website, or (v) for any (personal) injury, death, property damage, or other (direct, indirect, special, consequential or punitive) damages, losses or costs suffered, incurred or paid by you, whether due to (legal) acts, errors, breaches, (gross) negligence, willful misconduct, omissions, non-performance, misrepresentations, tort or strict liability by or (wholly or partly) attributable to the hotel (its employees, directors, officers, agents, representatives or affiliated companies), including any (partial) cancellation, overbooking, strike, force majeure or any other event beyond our control.
                       
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 9 Miscellaneous -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" class="collapsed">9. Miscellaneous
                        </a>
                        </h4>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="clause">
                                <span class="number">9.1. </span>Unless stated otherwise, the software required for our services or available at or used by our website and the intellectual property rights (including the copyrights) of the contents and information of and material on our website are owned by LEONAR-DO REZERVASYON VE TURIZM SANAYI LTD.STI. and VANGAL TRADING LIMITED, its suppliers or providers.
                       
                            </div>
                            <div class="clause">
                                <span class="number">9.2. </span>To the extent permitted by law, these terms and conditions and the provision of our services shall be governed by and construed in accordance with Turkish law and any dispute arising out of these general terms and conditions and our services shall exclusively be submitted to the competent courts in Istanbul, Turkey.
                       
                            </div>
                            <div class="clause">
                                <span class="number">9.3. </span>The original English version of these terms and conditions may have been translated into other languages. The translated version is a courtesy and office translation only and you cannot derive any rights from the translated version. In the event of a dispute about the contents or interpretation of these terms and conditions or inconsistency or discrepancy between the English version and any other language version of these terms and conditions, the English language version to the extent permitted by law shall apply, prevail and be conclusive. The English version is available on our website or shall be sent to you upon your written request.
                       
                            </div>
                            <div class="clause">
                                <span class="number">9.4. </span>If any provision of these terms and conditions is or becomes invalid, unenforceable or non-binding, you shall remain bound by all other provisions hereof. In such event, such invalid provision shall nonetheless be enforced to the fullest extent permitted by applicable law, and you will at least agree to accept a similar effect as the invalid, unenforceable or non-binding provision, given the contents and purpose of these terms and conditions.
                            </div>
                        </div>
                    </div>
                </div>
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