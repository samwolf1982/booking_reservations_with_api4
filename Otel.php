<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
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
			<div class="row">
				<div class="col-md-12 form_sh">
					<div class="col-md-12 description_block">
						<h3>Description</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias est facilis, officiis,
							tempora totam, minus repellendus hic sapiente cupiditate assumenda culpa animi, tenetur dolores. 
							Voluptas, magnam! Iure culpa earum animi!</p>
						</div>
					</div>
					<div class="col-md-offset-1 col-md-10 form_block kdlsjflskf">
						<form action="OtelResult.php" method="post">
							<div class="row">
								<div class="form_container room_spec_class">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="form-group ui-widget">
											<label for="location_for_search">Location</label>
											<input name="location_for_search" type="text" id="location_for_search" placeholder="Please, enter location" class="form-control" autocomplete="on" required>
											<div class="messages_here">
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="form-group check_in_date">
											<label for="check_in">Check In :</label><br>
											<div class='input-group date'>
												<input name="check_in" id="check_in" type='text' class="form-control" required="required" readonly/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6">
										<div class="form-group check_out_date">
											<label for="check_out">Check Out :</label><br>
											<div class='input-group date'>
												<input name="check_out" id="check_out" type='text' class="form-control" required="required" readonly/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group select_nationality">
											<div class="col-md-12 select_nationality">
												<label for="select_nationality">Select nationality</label>
												<select name="select_nationality" id="select_nationality" class="form-control" required="required">
													<option value="">Select...</option>
													<option value="AF">Afghanistan</option>
													<option value="AX">Aland Islands</option>
													<option value="AL">Albania</option>
													<option value="DZ">Algeria</option>
													<option value="AS">American Samoa</option>
													<option value="AD">Andorra</option>
													<option value="AO">Angola</option>
													<option value="AI">Anguilla</option>
													<option value="AQ">Antarctica</option>
													<option value="AG">Antigua And Barbuda</option>
													<option value="AR">Argentina</option>
													<option value="AM">Armenia</option>
													<option value="AW">Aruba</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="AZ">Azerbaijan</option>
													<option value="BS">Bahamas</option>
													<option value="BH">Bahrain</option>
													<option value="BD">Bangladesh</option>
													<option value="BB">Barbados</option>
													<option value="BY">Belarus</option>
													<option value="BE">Belgium</option>
													<option value="BZ">Belize</option>
													<option value="BJ">Benin</option>
													<option value="BM">Bermuda</option>
													<option value="BT">Bhutan</option>
													<option value="BO">Bolivia</option>
													<option value="BA">Bosnia And Herzegovina</option>
													<option value="BW">Botswana</option>
													<option value="BV">Bouvet Island</option>
													<option value="BR">Brazil</option>
													<option value="IO">British Indian Ocean Territory</option>
													<option value="VG">British Virgin Islands</option>												
													<option value="BN">Brunei Darussalam</option>
													<option value="BG">Bulgaria</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="KH">Cambodia</option>
													<option value="CM">Cameroon</option>
													<option value="CA">Canada</option>
													<option value="CV">Cape Verde</option>
													<option value="KY">Cayman Islands</option>
													<option value="CF">Central African Republic</option>
													<option value="TD">Chad</option>
													<option value=""></option>
													<option value="CL">Chile</option>
													<option value="CN">China</option>
													<option value="CX">Christmas Island</option>
													<option value="CC">Cocos (Keeling) Islands</option>
													<option value="CO">Colombia</option>
													<option value="KM">Comoros</option>
													<option value="CG">Congo</option>
													<option value="CK">Cook Islands</option>
													<option value="CR">Costa Rica</option>
													<option value="CI">Cote d'Ivoire</option>
													<option value="HR">Croatia</option>
													<option value="CU">Cuba</option>
													<option value="CY">Cyprus</option>
													<option value="CZ">Czech Republic</option>
													<option value="CD">Democratic Republic Of The Congo</option>
													<option value="DK">Denmark</option>
													<option value="DJ">Djibouti</option>
													<option value="DM">Dominica</option>
													<option value="DO">Dominican Republic</option>
													<option value="EC">Ecuador</option>
													<option value="EG">Egypt</option>
													<option value="SV">El Salvador</option>
													<option value="GQ">Equatorial Guinea</option>
													<option value="ER">Eritrea</option>
													<option value="EE">Estonia</option>
													<option value="ET">Ethiopia</option>
													<option value="FK">Falkland Islands (Malvinas)</option>
													<option value="FO">Faroe Islands</option>
													<option value="FJ">Fiji</option>
													<option value="FI">Finland</option>
													<option value="FR">France</option>
													<option value="GF">French Guiana</option>
													<option value="PF">French Polynesia</option>
													<option value="TF">French Southern Territories</option>
													<option value="GA">Gabon</option>
													<option value="GM">Gambia</option>
													<option value="GE">Georgia</option>
													<option value="DE">Germany</option>
													<option value="GH">Ghana</option>
													<option value="GI">Gibraltar</option>
													<option value="GR">Greece</option>
													<option value="GL">Greenland</option>
													<option value="GD">Grenada</option>
													<option value="GP">Guadeloupe</option>
													<option value="GU">Guam</option>
													<option value="GT">Guatemala</option>
													<option value="GG">Guernsey</option>
													<option value="GN">Guinea</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="GY">Guyana</option>
													<option value="HT">Haiti</option>
													<option value="HM">Heard And McDonald Islands</option>
													<option value="HN">Honduras</option>
													<option value="HK">Hong Kong</option>
													<option value="HU">Hungary</option>
													<option value="IS">Iceland</option>
													<option value="IN">India</option>
													<option value="ID">Indonesia</option>
													<option value="IR">Iran</option>
													<option value="IQ">Iraq</option>
													<option value="IE">Ireland</option>
													<option value="IM">Isle Of Man</option>
													<option value="IL">Israel</option>
													<option value="IT">Italy</option>
													<option value="JM">Jamaica</option>
													<option value="JP">Japan</option>
													<option value="JE">Jersey</option>
													<option value="JO">Jordan</option>												
													<option value="KZ">Kazakhstan</option>
													<option value="KE">Kenya</option>
													<option value="KI">Kiribati</option>
													<option value="KR">Korea</option>
													<option value="XK">Kosovo</option>
													<option value="KW">Kuwait</option>
													<option value="KG">Kyrgyzstan</option>
													<option value="LA">Laos</option>
													<option value="LV">Latvia</option>
													<option value="LB">Lebanon</option>
													<option value="LS">Lesotho</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libyan Arab Jamahiriya</option>
													<option value="LI">Liechtenstein</option>
													<option value="LT">Lithuania</option>
													<option value="LU">Luxembourg</option>
													<option value="MO">Macau</option>
													<option value="MK">Macedonia</option>
													<option value="MG">Madagascar</option>
													<option value="MW">Malawi</option>
													<option value="MY">Malaysia</option>
													<option value="MV">Maldives</option>
													<option value="ML">Mali</option>
													<option value="MT">Malta</option>
													<option value="MH">Marshall Islands</option>
													<option value="MQ">Martinique</option>
													<option value="MR">Mauritania</option>
													<option value="MU">Mauritius</option>
													<option value="YT">Mayotte</option>
													<option value="MX">Mexico</option>
													<option value="FM">Micronesia</option>
													<option value="MD">Moldova</option>
													<option value="MC">Monaco</option>
													<option value="MN">Mongolia</option>
													<option value="ME">Montenegro</option>
													<option value="MS">Montserrat</option>
													<option value="MA">Morocco</option>
													<option value="MZ">Mozambique</option>
													<option value="MM">Myanmar</option>
													<option value="NA">Namibia</option>
													<option value="NR">Nauru</option>
													<option value="NP">Nepal</option>
													<option value="NL">Netherlands</option>
													<option value="AN">Netherlands Antilles</option>
													<option value="NC">New Caledonia</option>
													<option value="NZ">New Zealand</option>
													<option value="NI">Nicaragua</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="NU">Niue</option>
													<option value="NF">Norfolk Island</option>
													<option value="KP">North Korea</option>
													<option value="MP">Northern Mariana Islands</option>
													<option value="NO">Norway</option>
													<option value="OM">Oman</option>
													<option value="PK">Pakistan</option>
													<option value="PW">Palau</option>
													<option value="PS">Palestinian Territory</option>
													<option value="PA">Panama</option>
													<option value="PG">Papua New Guinea</option>
													<option value="PY">Paraguay</option>
													<option value="PE">Peru</option>
													<option value="PH">Philippines</option>
													<option value="PN">Pitcairn</option>
													<option value="PL">Poland</option>
													<option value="PT">Portugal</option>	
													<option value="PR">Puerto Rico</option>
													<option value="QA">Qatar</option>
													<option value="RE">Reunion</option>
													<option value="RO">Romania</option>
													<option value="RU">Russia</option>
													<option value="RW">Rwanda</option>
													<option value="BL">Saint Barthelemy</option>
													<option value="SH">Saint Helena</option>
													<option value="KN">Saint Kitts And Nevis</option>
													<option value="LC">Saint Lucia</option>
													<option value="MF">Saint Martin</option>
													<option value="PM">Saint Pierre And Miquelon</option>
													<option value="VC">Saint Vincent And The Grenadines</option>
													<option value="WS">Samoa</option>
													<option value="SM">San Marino</option>
													<option value="ST">Sao Tome And Principe</option>
													<option value="SA">Saudi Arabia</option>
													<option value="SN">Senegal</option>
													<option value="RS">Serbia</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leone</option>
													<option value="SG">Singapore</option>
													<option value="SK">Slovakia</option>
													<option value="SI">Slovenia</option>
													<option value="SB">Solomon Islands</option>
													<option value="SO">Somalia</option>
													<option value="ZA">South Africa</option>
													<option value="GS">South Georgia And Sandwich Islands</option>
													<option value="ES">Spain</option>
													<option value="LK">Sri Lanka</option>
													<option value="SD">Sudan</option>
													<option value="SR">Suriname</option>
													<option value="SJ">Svalbard And Jan Mayen</option>
													<option value="SZ">Swaziland</option>
													<option value="SE">Sweden</option>
													<option value="CH">Switzerland</option>
													<option value="SY">Syrian Arab Republic</option>
													<option value="TW">Taiwan</option>
													<option value="TJ">Tajikistan</option>
													<option value="TZ">Tanzania</option>
													<option value="TH">Thailand</option>
													<option value="TL">Timor-Leste</option>
													<option value="TG">Togo</option>
													<option value="TK">Tokelau</option>
													<option value="TO">Tonga</option>
													<option value="TT">Trinidad And Tobago</option>
													<option value="TN">Tunisia</option>
													<option value="TR">Turkey</option>
													<option value="TM">Turkmenistan</option>
													<option value="TC">Turks And Caicos Islands</option>
													<option value="TV">Tuvalu</option>
													<option value="UG">Uganda</option>
													<option value="UA">Ukraine</option>
													<option value="AE">United Arab Emirates</option>
													<option value="UK">United Kingdom</option>
													<option value="US">United States</option>
													<option value="UY">Uruguay</option>
													<option value="UM">US Minor Outlying Islands</option>
													<option value="VI">US Virgin Islands</option>
													<option value="UZ">Uzbekistan</option>
													<option value="VU">Vanuatu</option>
													<option value="VA">Vatican City State (Holy See)</option>
													<option value="VE">Venezuela</option>
													<option value="VN">Vietnam</option>
													<option value="WF">Wallis And Futuna</option>
													<option value="EH">Western Sahara</option>
													<option value="YE">Yemen</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabwe</option>
												</select>
											</div>	
										</div>
									</div>
									<div class="col-md-12 p0 room_1 room_check">
										<div class="col-md-offset-2 col-md-2 col-sm-3 col-xs-6">
											<div class="form-group">
												<label for="rooms_for_search">Rooms</label>
												<select name="rooms_for_search" id="rooms_for_search" class="form-control">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6">
											<div class="form-group adult_search">
												<label for="adults_for_search[]">Adult(s)</label>
												<select name="adults_for_search[]" id="adults_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6 child_selecting">
											<div class="form-group child_search">
												<label for="child_for_search[]">Children(s)</label>
												<select name="child_for_search[]" id="child_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 child_age_wrapper p0">
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_0">
												<div class="form-group">
													<label for="child_age_for_search[0][]">Children(s) age</label>
													<select name="child_age_for_search[0][]" id="child_age_for_search[0][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_1">
												<div class="form-group">
													<label for="child_age_for_search[0][]">Children(s) age</label>
													<select name="child_age_for_search[0][]" id="child_age_for_search[0][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_2">
												<div class="form-group">
													<label for="child_age_for_search[0][]">Children(s) age</label>
													<select name="child_age_for_search[0][]" id="child_age_for_search[0][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_3">
												<div class="form-group">
													<label for="child_age_for_search[0][]">Children(s) age</label>
													<select name="child_age_for_search[0][]" id="child_age_for_search[0][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_4">
												<div class="form-group">
													<label for="child_age_for_search[0][]">Children(s) age</label>
													<select name="child_age_for_search[0][]" id="child_age_for_search[0][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p0 room_2 room_check">
										<div class="col-md-offset-4 col-md-2 col-sm-3 col-xs-6">
											<div class="form-group adult_search">
												<label for="adults_for_search[]">Adult(s)</label>
												<select name="adults_for_search[]" id="adults_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6 child_selecting">
											<div class="form-group child_search">
												<label for="child_for_search[]">Children(s)</label>
												<select name="child_for_search[]" id="child_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 child_age_wrapper p0">
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_0">
												<div class="form-group">
													<label for="child_age_for_search[1][]">Children(s) age</label>
													<select name="child_age_for_search[1][]" id="child_age_for_search[1][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_1">
												<div class="form-group">
													<label for="child_age_for_search[1][]">Children(s) age</label>
													<select name="child_age_for_search[1][]" id="child_age_for_search[1][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_2">
												<div class="form-group">
													<label for="child_age_for_search[1][]">Children(s) age</label>
													<select name="child_age_for_search[1][]" id="child_age_for_search[1][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_3">
												<div class="form-group">
													<label for="child_age_for_search[1][]">Children(s) age</label>
													<select name="child_age_for_search[1][]" id="child_age_for_search[1][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_4">
												<div class="form-group">
													<label for="child_age_for_search[1][]">Children(s) age</label>
													<select name="child_age_for_search[1][]" id="child_age_for_search[1][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p0 room_3 room_check">
										<div class="col-md-offset-4 col-md-2 col-sm-3 col-xs-6">
											<div class="form-group adult_search">
												<label for="adults_for_search[]">Adult(s)</label>
												<select name="adults_for_search[]" id="adults_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6 child_selecting">
											<div class="form-group child_search">
												<label for="child_for_search[]">Children(s)</label>
												<select name="child_for_search[]" id="child_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 child_age_wrapper p0">
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_0">
												<div class="form-group">
													<label for="child_age_for_search[2][]">Children(s) age</label>
													<select name="child_age_for_search[2][]" id="child_age_for_search[2][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_1">
												<div class="form-group">
													<label for="child_age_for_search[2][]">Children(s) age</label>
													<select name="child_age_for_search[2][]" id="child_age_for_search[2][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_2">
												<div class="form-group">
													<label for="child_age_for_search[2][]">Children(s) age</label>
													<select name="child_age_for_search[2][]" id="child_age_for_search[2][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_3">
												<div class="form-group">
													<label for="child_age_for_search[2][]">Children(s) age</label>
													<select name="child_age_for_search[2][]" id="child_age_for_search[2][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_4">
												<div class="form-group">
													<label for="child_age_for_search[2][]">Children(s) age</label>
													<select name="child_age_for_search[2][]" id="child_age_for_search[2][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p0 room_4 room_check">
										<div class="col-md-offset-4 col-md-2 col-sm-3 col-xs-6">
											<div class="form-group adult_search">
												<label for="adults_for_search[]">Adult(s)</label>
												<select name="adults_for_search[]" id="adults_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6 child_selecting">
											<div class="form-group child_search">
												<label for="child_for_search[]">Children(s)</label>
												<select name="child_for_search[]" id="child_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 child_age_wrapper p0">
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_0">
												<div class="form-group">
													<label for="child_age_for_search[3][]">Children(s) age</label>
													<select name="child_age_for_search[3][]" id="child_age_for_search[3][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_1">
												<div class="form-group">
													<label for="child_age_for_search[3][]">Children(s) age</label>
													<select name="child_age_for_search[3][]" id="child_age_for_search[3][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_2">
												<div class="form-group">
													<label for="child_age_for_search[3][]">Children(s) age</label>
													<select name="child_age_for_search[3][]" id="child_age_for_search[3][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_3">
												<div class="form-group">
													<label for="child_age_for_search[3][]">Children(s) age</label>
													<select name="child_age_for_search[3][]" id="child_age_for_search[3][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_4">
												<div class="form-group">
													<label for="child_age_for_search[3][]">Children(s) age</label>
													<select name="child_age_for_search[3][]" id="child_age_for_search[3][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 p0 room_5 room_check">
										<div class="col-md-offset-4 col-md-2 col-sm-3 col-xs-6">
											<div class="form-group adult_search">
												<label for="adults_for_search[]">Adult(s)</label>
												<select name="adults_for_search[]" id="adults_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 col-sm-3 col-xs-6 child_selecting">
											<div class="form-group child_search">
												<label for="child_for_search[]">Children(s)</label>
												<select name="child_for_search[]" id="child_for_search[]" class="form-control count_select">
													<option value="">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-md-2 child_age_wrapper p0">
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_0">
												<div class="form-group">
													<label for="child_age_for_search[4][]">Children(s) age</label>
													<select name="child_age_for_search[4][]" id="child_age_for_search[4][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_1">
												<div class="form-group">
													<label for="child_age_for_search[4][]">Children(s) age</label>
													<select name="child_age_for_search[4][]" id="child_age_for_search[4][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_2">
												<div class="form-group">
													<label for="child_age_for_search[4][]">Children(s) age</label>
													<select name="child_age_for_search[4][]" id="child_age_for_search[4][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_3">
												<div class="form-group">
													<label for="child_age_for_search[4][]">Children(s) age</label>
													<select name="child_age_for_search[4][]" id="child_age_for_search[4][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
											<div class="col-md-12 col-sm-3 col-xs-6 child_age_4">
												<div class="form-group">
													<label for="child_age_for_search[4][]">Children(s) age</label>
													<select name="child_age_for_search[4][]" id="child_age_for_search[4][]" class="form-control">
														<option value="">0</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
														<option value="13">13</option>
														<option value="14">14</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
													</select>
													<p class="warning_0">Please, set child age</p>
												</div>
											</div>
										</div>
									</div>
									<div class="confirm_search_hotel col-md-12">
										<input type="submit" value="Search">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--==============================footer=================================-->
			<?php include ('includes/php/footer.php'); ?>


		</body>
		</html>

