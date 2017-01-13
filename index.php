<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';
require_once   __DIR__ . '/api/api_conections.php';
require_once   __DIR__ . '/includes/php/translate.php';


use CosmosLibs\Cosmos as Cosmos;
use CosmosLibs\Destination as Destination;
use CosmosLibs\Hotels as Hotels;



 $hotels=new Hotels('get hotels');
 $featured=$hotels->get_hotels_featured(['10001d','100033','100038','10003f','100040']);
  $main_hotels=$hotels->get_hotels_featured(['10001d','100033','100038','10003f',]);
	function t_fordel($text) {

		$lang = 'en'; // global variablein config

		// include translations file instead array here		

		$t = array();
		$t['en'] = array();
		$t['tr'] = array();

		$t['en']['title'] = 'hi';
		$t['tr']['title'] = 'hiklkl';
			// 
		if (isset($t[$lang][$text])) {
			echo $t[$lang][$text];
		} else {
			echo $text;
		}
			//
		// 
	}

?>
<style type="text/css">
	.item{
	float: left;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
</head>

<body class="page1" id="top">	
	<!--==============================header=================================-->
	<?php include ('includes/php/navmenu.php'); ?>
	<div class="booking_block top_block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title"><?php t('Vacation')?> <?php t('of your dream')?></span></div> <br>
					<span class="sub"><?php t('can be reached with one click')?></span>
					<div class="clear"></div>
					<form id="bookingForm" style="display: none;">
						<div class="sect1">
							<div class="count"><span class="col1">01.</span> Ne?</div>
							<div class="tmRadio">
								<div class="lf">
									<input name="Hotel" value="hotel" type="radio" checked/>
									<span>Otel</span>
									<div class="clear"></div>
									<input name="Hotel" value="ucus" type="radio"/>
									<span>Uçuş</span>
									<div class="clear"></div>
									<input name="Hotel" value="ucus_otel" type="radio"/>
									<span>Uçuş + Otel</span>
								</div>
								<div class="rf">
									<input name="Hotel" type="radio" value="ucus_otel_araba" />
									<span>Uçuş + Otel + Araba</span>
									<div class="clear"></div>
									<input name="Hotel" type="radio" value="kruz" />
									<span>Kruz</span>
									<div class="clear"></div>
									<input name="Hotel" type="radio" value="kiralik_araba" />
									<span>Kiralık Araba</span>
								</div>
							</div>
						</div>

						<div class="sect2">
							<div class="count">
								<span class="col1">02.</span> Nereye?
							</div>

							<div class="tmInput">
								<span>Şehir</span>
								<input id="City" name="City" type="text">
								<input id="CityId" name="CityId" type="hidden" value="">
								<input id="CountryId" name="CountryId" type="hidden" value="">
							</div>

						</div>

						<div class="sect2">
							<div class="count"><span class="col1">03.</span> Ne Zaman?</div>

							<label class="tmDatepicker">
								<span>Giriş Tarihi</span>
								<input id="StartDate" type="text" name="Check-in"  placeHolder='Giriş Tarihi'>
							</label>

							<label class="tmDatepicker">
								<span>Çıkış Tarihi</span>
								<input id="EndDate" type="text" name="Check-out"  placeHolder='Çıkış Tarihi'>
							</label>
							<div class="clear"></div>
						</div>

						<div class="sect3">

							<div class="count">
								<span class="col1">04.</span> Kim ile?
							</div>
							<div class="inn1">
								<span>Oda</span>
								<select id="Oda" name="Rooms" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
									<option>&nbsp;</option>
									<option selected>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<div class="inn1">
								<span>Yetişkin</span>
								<select id="Yetiskin" name="Adults" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
									<option>&nbsp;</option>
									<option selected>1</option>
									<option>2</option>
									<option>3</option>
								</select>

							</div>
							<div class="inn1">
								<span>Çocuk</span>
								<select id="Cocuk" name="Children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
									<option>&nbsp;</option>
									<option selected>0</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
						</div>

						<div class="clear"></div>
						<a href="javascript:void();" class="subm i_gonder" id="i_gonder" data-type="submit">İstek Gönder</a>

						<div class="clear"></div>
						<input type="hidden" name="CityID" id="txtAllowSearchID"></input>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--=====================Content======================-->
	<div class="content main_info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 style="display: none;">Neden bizimle rezervasyon yapmalısınız?<span class="col1">Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem</span></h2>
				</div>
				<div class="col-md-12">
					<div class="col-md-4">
						<div class="prop">
							<div class="maxheight">
								<div class="fa fa-trophy"></div>
								<div class="title"><?php t('Best price guarantee')?></div>
								<p><?php t('We guarentee you best price or we will match the lower price')?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="prop pp1">
							<div class="maxheight">
								<div class="fa fa-book"></div>
								<div class="title"><?php t('Easy booking')?></div>
								<p><?php t('We are here to help. You can contact us anytime by phone or a click')?></p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="prop pp2">
							<div class="maxheight">
								<div class="fa fa-comments"></div>
								<div class="title"><?php t('24/7 Customer support')?></div>
								<p><?php t('Our page is designed for your comfort to make your reservation easy, faster and safe')?></p>
							</div>
						</div>
					</div>
				</div>










<!--             featured -->

                 <div class="col-md-9 oh">
                <div class="col-md-12 oh">
                <div class="row">
                	 <div class="text-center col-md-12">	<h3 class="mb0 custom_h3"><?php t('Featured')?></h3></div>	
            
				<div class="col-md-12">
			
					
					<div id="owl">


					 <?php 
                         foreach ($featured as $key => $value) { ?>
                         	
                   
						<div class="item">
							<a href="/HotelRooms.php?code=<?=$value['code']?>"> <img class="img-thumbnail" src="<?=$value['large']?>" alt=""> </a>
							<div class="box_mid">
								<div class="title"><?=$value['name']?></div>
								<div class="col1">From  $550</div>
							</div>
							<a href="/HotelRooms.php?code=<?=$value['code']?>" ><?php t('Detailes')?></a>
						</div>
						  <?php    }
					 ?>



					</div>
				</div>


             </div>
				</div>


				<div class="clear"></div>
				

		</div> 
					<div class="col-md-3 oh">
                        <div class="wrap-hot">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.</div>
					</div>
				<!--<div class="col-md-4">
					<h3 class="head1">SEYAHAT KAYNAKLARI</h3>
					<ul class="list col1">
						<li><a href="#">Balayı Kaydı</a></li>
						<li><a href="#">Havalimanı Rötar</a></li>
						<li><a href="#">Turist Sağlığı
						</a></li>
						<li><a href="#">Harita</a></li>
						<li><a href="#">Dünya Saatleri</a></li>
						<li><a href="#">Pasaport / Vize</a></li>
					</ul>
					<h3 class="head1">Güncel Uçuş Fiyatları</h3>
					<div class="block1">
						<div class="text1 tx1"><a href="#">Ultrices posuere </a></div>Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.
						<div class="clear cl2"></div>
						<span class="col4">Orlando</span>
						<div class="sep"></div>
						<span class="numb">&amp;120</span>
					</div>
					<div class="block1">
						<div class="text1 tx1"><a href="#">Pellentesque </a></div>Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.
						<div class="clear cl2"></div>
						<span class="col4">Orlando</span>
						<div class="sep"></div>
						<span class="numb">&amp;120</span>
					</div>
					<div class="block1">
						<div class="text1 tx1"><a href="#">Lorem ipsum dolor </a></div>Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur.
						<div class="clear cl2"></div>
						<span class="col4">Orlando</span>
						<div class="sep"></div>
						<span class="numb">&amp;120</span>
					</div>
				</div>
				<div class="col-md-12" style="display: none;">
					<form id="newsletter">
						<div class="title">Email servisimize kaydolun<span>Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque </span></div>
						<div class="rel">
							<div class="success">Your subscrsibe request has been sent!</div>
							<label class="email">
								<input type="email" value="" >
								<span class="error">*This is not a valid email address.</span>
								<span class="clear"></span>
							</label> 
							<a href="#" class="btn" data-type="submit">Ara</a>
						</div>
					</form>
				</div>-->
			</div>
		</div>
	</div>
	<!--==============================footer=================================-->
	<?php include ('includes/php/footer.php'); ?>

<!--
	<script>
	$(function (){
		$('#bookingForm').bookingForm({
			ownerEmail: '#'
		});
	})
	$(function() {
		$('#bookingForm input, #bookingForm textarea').placeholder();
	});

	/*Tarih Baslangaclarinin Ayarlanmasi*/
	var dateToday = new Date();
	var dates = $("#StartDate, #EndDate").datepicker({
				//defaultDate: "+1w",
				//changeMonth: true,
				//numberOfMonths: 2,
				minDate: dateToday
				/*,
				onSelect: function(selectedDate) {
					var option = this.id == "from" ? "minDate" : "maxDate",
						instance = $(this).data("datepicker"),
						date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
					dates.not(this).datepicker("option", option, date);
				}*/
			});		
	</script>
-->
</body>
</html>

