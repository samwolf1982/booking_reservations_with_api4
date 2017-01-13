<!DOCTYPE html>
<html lang="en">
	
	<head>
		<?php include ('includes/head.php'); ?>
	</head>
	
	<?php //echo getCities(); ?>
	
	<body class="page1" id="top">
	
		<!--==============================header=================================-->
		<header>
			<div id="stuck_container">
				<div class="container">
					<div class="row">
						<div class="grid_12">        <h1>
							<a href="index.html">
								<img src="images/logo.png" alt="Your Happy Family">
							</a>
						</h1>   
						
						<div class="menu_block ">
							<?php include ('includes/navmenu.php'); ?>
							<div class="clear"></div>       
						</div>  
						
						<div class="clear"></div></div>
						
					</div>
				</div>    
			</div>        
		</header> 
		
		<div class="booking_block">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<div class="title">Hayallerinizdeki <span>tatil</span></div> <br>
						<span class="sub">bir tık kadar yakınınızda...</span>
						<div class="clear"></div>
						<form id="bookingForm">
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
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="grid_12">
						<h2>Neden bizimle rezervasyon yapmalısınız?<span class="col1">Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem</span></h2>
					</div>
					<div class="grid_4">
						<div class="prop">
							<div class="maxheight">
								<div class="fa fa-trophy"></div>
								<div class="title">En İYİ FİYAT GARANTİSİ</div>
								<p>Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem</p>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="prop pp1">
							<div class="maxheight">
								<div class="fa fa-book"></div>
								<div class="title">Kolay Rezervasyon</div>
								<p>Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem</p>
							</div>
						</div>
					</div>
					<div class="grid_4">
						<div class="prop pp2">
							<div class="maxheight">
								<div class="fa fa-comments"></div>
								<div class="title">24/7 MÜŞTERİ DESTEĞİ</div>
								<p>Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem </p>
							</div>
						</div>
					</div>
					<div class="grid_12 oh">
						<h3 class="mb0">Öne Çıkanlar</h3>
						<div id="owl">
							<div class="item">
								<img src="images/page1_img1.jpg" alt="">
								<div class="box_mid">
									<div class="title">Tayland</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img2.jpg" alt="">
								<div class="box_mid">
									<div class="title">New York</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img3.jpg" alt="">
								<div class="box_mid">
									<div class="title">Paris</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img4.jpg" alt="">
								<div class="box_mid">
									<div class="title">Hawaii</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img1.jpg" alt="">
								<div class="box_mid">
									<div class="title">Thailand</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img2.jpg" alt="">
								<div class="box_mid">
									<div class="title">New York</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img3.jpg" alt="">
								<div class="box_mid">
									<div class="title">Paris</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
							<div class="item">
								<img src="images/page1_img4.jpg" alt="">
								<div class="box_mid">
									<div class="title">Hawaii</div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
									<div class="col1">From  $550</div>
								</div>
								<a href="#">rezervasyon</a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="grid_8">
						<h3 class="head1">öne çıkan oteller</h3>
						<img src="images/page1_img5.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1"><a href="#">Vestibulum sed ante</a><span><span class="col3">&amp;155</span>/  Gece</span></div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							<div class="clear cl2"></div>
							<div class="stars">
								<span></span>
								<span></span>
								<span class="emp"></span>
								<span class="emp"></span>
								<span class="emp"></span>
							</div>
							<div class="sep"></div>
							<strong class="col4"><span class="fa fa-thumbs-o-up"></span><a href="#">12 Reviews</a></strong>
						</div>
						<div class="clear cl1"></div>
						<img src="images/page1_img6.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1"><a href="#">Elementum</a><span><span class="col3">&amp;155</span>/  Gece</span></div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							<div class="clear cl2"></div>
							<div class="stars">
								<span></span>
								<span></span>
								<span class="emp"></span>
								<span class="emp"></span>
								<span class="emp"></span>
							</div>
							<div class="sep"></div>
							<strong class="col4"><span class="fa fa-thumbs-o-up"></span><a href="#">12 Yorum</a></strong>
						</div>
						<div class="clear cl1"></div>
						<img src="images/page1_img7.jpg" alt="" class="img_inner fleft">
						<div class="extra_wrapper">
							<div class="text1"><a href="#">Nulla facilisi</a><span><span class="col3">&amp;155</span>/  Gece</span></div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							<div class="clear cl2"></div>
							<div class="stars">
								<span></span>
								<span></span>
								<span class="emp"></span>
								<span class="emp"></span>
								<span class="emp"></span>
							</div>
							<div class="sep"></div>
							<strong class="col4"><span class="fa fa-thumbs-o-up"></span><a href="#">12 Yorum</a></strong>
						</div>
						<div class="clear"></div>
						<a href="#" class="btn">tüm otelleri gör</a>
					</div>
					<div class="grid_4">
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
					<div class="grid_12">
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
					</div>
				</div>
			</div>
		</div>
		<!--==============================footer=================================-->
		<footer>   
			<div class="f_top">
				<div class="container">
					<div class="row">
						<div class="grid_4">
							<h4>hakkımızda</h4>
							Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. 
						</div>
						<div class="grid_4">
							<h4>haberler</h4>
							<img src="images/f_img1.jpg" alt="">
							<div class="extra_wrapper">
								<strong class="col2"><a href="#">Phasellus porta. </a></strong> <br>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.
								<br>
								<time class="col4" datetime="2014-01-01">25 April. 2014</time>
							</div>
							<div class="clear cl2"></div>
							<img src="images/f_img2.jpg" alt="">
							<div class="extra_wrapper">
								<strong class="col2"><a href="#">Phasellus porta. </a></strong> <br>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.
								<br>
								<time class="col4" datetime="2014-01-01">25 April. 2014</time>
							</div>
						</div>
						<div class="grid_4">
							<h4>adres</h4>
							<address>
								...
								<div class="col4">+90 000 000 000</div>
							</address>
							<div class="socials">
								<a href="#" class="fa fa-facebook"></a>
								<a href="#" class="fa fa-google-plus"></a>
								<a href="#" class="fa fa-rss"></a>
								<a href="#" class="fa fa-pinterest"></a>
								<a href="#" class="fa fa-linkedin"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="grid_12">        
						<div class="copy"><span class="f_logo"><a href="index.html">Polatkan Turizm</a></span>  &copy; <span id="copyright-year"></span> <a href="index-7.html">Gizlilik</a> <!--{%FOOTER_LINK} -->
						</div>
					</div>
				</div>
			</div>  
		</footer>
		
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
		
	</body>
</html>

