<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
</head>
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
					<div class="col-md-offset-1 col-md-10 form_block">
						<?php
						if (isset ($_POST) && !empty($_POST)){
							/*
							echo '<pre>';
							print_r($_POST);
							echo '</pre>';
							*/
							$countOfPeople = $_POST['countOfPeople'];
							$processId = $_POST['processId'];
							$hotelCode = $_POST['hotelCode'];
							$nationality = $_POST['nationality'];
						}
						?>
						<form action="OtelBooking.php" method="post">
							<input type="hidden" name="processId" id="processId" value="<?php echo $processId;?>">
							<input type="hidden" name="hotelCode" id="hotelCode" value="<?php echo $hotelCode;?>">
							<input type="hidden" name="nationality" id="nationality" value="<?php echo $nationality;?>">

							<div class="row">
								<div class="leader_travel col-md-12">
									<div class="col-md-12">
										<h4 class="p0">Main traveller</h4>
									</div>
									<div class="col-md-3 select_title">
										<label for="title_select_leader">Select a title</label>
										<select name="title_select_leader" id="title_select_leader" class="form-control" required>
											<option value="">Select a title</option>
											<option value="Mr">Mr</option>
											<option value="Ms">Ms</option>
										</select>
									</div>
									<div class="col-md-3 first_name">
										<label for="first_name_leader">First name</label>
										<input type="text" name="first_name_leader" id="first_name_leader" class="form-control" required>
									</div>
									<div class="col-md-4 last_name">
										<label for="last_name_leader">Last name</label>
										<input type="text" name="last_name_leader" id="last_name_leader" class="form-control" required>
									</div>
								</div>
								<div class="other_travel col-md-12">
									<?php if($countOfPeople > 1){ ?>	
									<div class="col-md-12">
										<h4 class="p0">Other</h4>
									</div>
									<?php for ($i=0; $i < $countOfPeople - 1; $i++) { ?>	
									<div class="other_tourist col-md-12 p0">
										<div class="col-md-3 select_title">
											<label for="title_select[]">Select a title</label>
											<select name="title_select[]" id="title_select[]" class="form-control" required>
												<option value="">Select a title</option>
												<option value="Mr">Mr</option>
												<option value="Ms">Ms</option>
											</select>
										</div>
										<div class="col-md-3 first_name">
											<label for="first_name[]">First name</label>
											<input type="text" name="first_name[]" id="first_name[]" class="form-control" required>
										</div>
										<div class="col-md-4 last_name">
											<label for="last_name[]">Last name</label>
											<input type="text" name="last_name[]" id="last_name[]" class="form-control" required>
										</div>
									</div>
									<?php }} ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 licence_header">
									<h4 class="p0">ARTLAR VE KOŞULLAR</h4>
								</div>
								<div class="col-md-12 licence_agreement">
									<h5 class="p0">ŞARTLAR VE KOŞULLARDAKİ DEĞİŞİKLİKLER</h5>
									<p>HotelsPro, bu şartlar ve koşulları dilediği 
										zaman değiştirme ve düzeltme hakkını saklı tutar. 
										Değişiklikler, HotelsPro web sitesinde yayınlandıkları 
										andan itibaren geçerli olacaktır.
									</p>
									<h5 class="p0">SEYAHAT EDEN MİSAFİRLERİN İSİMLERİ</h5>
									<p>HotelsPro TBA,TEST ya da ceşitli kısaltmalar 
										kullanılarak yapılan rezervasyonların oteller tarafından kabul 
										edilmemesi durumunda herhangi bir sorumluluk kabul etmez, 
										bu sekilde yapılmıs rezervasyonları iptal etme hakkını saklı tutar.
										Seyahat eden tüm misafirlerin gercek isim ve soy isimleri rezervasyon
										formunda mutlaka bildirilmedir.
									</p>
									<h5 class="p0">E.POSTA HESAPLARI</h5>
									<p>HotelsPro üyelerinin sisteme doğru e.posta 
										adresi kayıt etmesi ve e.posta adresi değişikliklerini 
										HotelsPro'ya bildirmesi kendi sorumluluğu altındadır. 
										Eğer, HotelsPro tarafından gönderilmiş bir  e.posta, Gereksiz 
										( Junk ) veya Toplu ( Bulk ) posta klasörüne gelmiş ise, 
										bu e.posta'yı açtıktan sonra "gereksiz değil" (not spam) veya 
										"bu gereksiz değildir" ( this is not spam ) butonunu işaretleyerek,
										bunun tekrar gerçekleşmesini engelleyebilirsiniz.
									</p>
									<h5 class="p0">ODA TİPLERİ</h5>
									<p>Seyahat eden misafirler için yapılan rezervasyondaki 
										oda tipinin uygunluğu, tamamen rezervasyonu yapan HotelsPro acentasının 
										sorumluluğundadır. Eğer rezervasyon yapılmış odanın kapasitesinden daha fazla kişi aynı odada konaklamak isterse, otelin rezervasyonu kabul etmeme hakkı vardır. İptal edilmesi halinde ise belirtilmiş iptal kuralları geçerli olacaktır.
										HotelsPro oda ile ilgili talepleri
										( sigara içilen/içilmeyen, yatak tipi ) 
										alır ve otele iletir. Ancak bu taleplerin 
										gerçekleşeceğini garanti etmez.
										HotelsPro rezervasyon esnasında seçilmiş 
										oda tipini otele aynı şekilde iletir ve seçilen
										kişi sayısına uygun oda tipinin verilmesini garanti eder.
										Ancak rezervasyon yapılmış oda içerisindeki yatak dağılımı/tipi
										HotelsPro'nun kontrolu altında değildir, giriş gününde otel tarafından 
										belirlenip, tahsis edilir. Örneğin iki yataklı bir oda yerine, çift kişilik 
										tek yataklı bir odanın temin edildiği ve /veya çift kişilik tek bir yatağın, 
										iki ayrı yatağın birleştirilmesinden meydana getirilmiş olduğu durumlar olabilir.
										Oda tiplerine dair tüm tercihler otele yönlendirilirken, oda tahsisi otel tarafından 
										yapılır ve kayıt işlem zamanındaki uygunluğa bağlıdır. Oda numaraları HotelsPro 
										tarafından belirlenemez ya da garanti edilemez.
										Otel rezervasyonlarında belirtilen, yetişkinler ile konaklayacak çocuk sayısı ve 
										yaşlarının doğruluğu acentenin kendi sorumluluğundadır. Belirtilen yaş sınırı içerisindeki 
										çocuklar için kimlik talep edilebilir.
									</p>
									<h5 class="p0">OTEL KATEGORİLERİ / YEREL SINIFLANDIRMALAR VE * ( YILDIZ ) DERECELENDİRMELERİ</h5>
									<p>Yıldız değerlendirmeleri, otelin kalitesinin, sunulan aktivitelerin ve servislerin yaklaşık 
										seviyesinin genel bir görüntüsünü vermeyi amaçlar. Bununla birlikte, bu değerlendirme sistemi 
										ülkeden ülkeye değişebilir. Örneğin, 5 *'lı bir Bangkok oteli, 5* 'lı bir Londra Oteli ile aynı 
										olmayacaktır. HotelsPro, oteller tarafından sağlanmış, kategori ve *( yıldız ) 
										değerlendirilmelerinden sorumlu değildir.
									</p>
									<h5 class="p0">ÖDEME VE FİYAT</h5>
									<p>Döviz kurları genelde, piyasadaki hareketlere bağlı olarak günlük bazda değişir. HotelsPro web 
										sitesinde gösterilen oda fiyatları her türlü piyasa hareketliliğine bağlı olarak güncelleme 
										hakkını saklı tutar. Döviz kuru hareketliliğiyle ilgili her türlü değişiklik hali hazırda teyit 
										edilmiş bir rezervasyonun fiyatını etkilemez ve hiç bir geri ödeme yapılmaz.
									</p>
									<h5 class="p0">ÖNEMLİ</h5>
									<p>Şirketimizin ismi, otel rezervasyonu yapmak için kullanılan kredi kartının hesap özetinde 
										HotelsPro olarak görülecektir. Eğer HotelsPro üyesi bir acente, otel rezervasyonu yapmak için 
										misafire ait bir kredi kartı kullanmış ise herhangi bir yanlış anlaşılmaya meydan vermemek için 
										bu bilgiyi misafire iletmek ile yükümlüdür.
										Yayınlanan Fiyatlardaki Değişiklik - döviz kuru hareketleri haricinde.
										HotelsPro, herhangi bir fiyatlandırma hata ve/veya eksikliğini düzeltme hakkını saklı tutar. 
										Bu, otel veya yerel acente tarafından yapılmış hata ve/veya eksiklikleri de içerir. Fiyat hata 
										ve/veya eksikliği olması halinde, HotelsPro, rezervasyonu yapan acenteye aşağıda belirtilmiş üç 
										seçeneği sunar.- Rezervasyonu doğru fiyat üzerinden teyid etmek.- Rezervasyonu cezasız iptal etmek.
										- Uygunluğa bağlı olarak müsait bir alternatif otel sunmak.
									</p>
									<h5 class="p0">FARKLI PAZAR FİYATLARI</h5>
									<p>HotelsPro online sistemi üzerinde gösterilmiş tüm fiyatlar her pazar ve/veya milliyet için geçerli
										değildir. Farklı bir pazar ve/veya milliyet için otelin herhangi bir ön bildirim yapmaksızın fiyatı
										değiştirme hakkı vardır. HotelsPro uzerinde belirtilmis tum fiyatlar sadece gezi, eglence ve tatil 
										amaclı konaklamalar icin gecerlidir. HotelsPro, belirtilen nedenler dısında seyahat eden misafirlerin
										rezervasyonlarından kaynaklanabilecek sorunlardan sorumlu tutulamaz.
									</p>
									<h5 class="p0">TATİL YERİ VE ULUSLARARASI İŞLEM ÜCRETLERİ</h5>
									<p>Bazı kredi kart tedarikçileri, uluslararası işlem ücretleri talep edebilir. HotelsPro, kontrolü 
										dışında uygulanan hiçbir uluslararası işlem masraflarından sorumlu değildir.
										Bazı tesisler, özellikle ABD otelleri, doğrudan otele ödenmesi gereken tatil yeri ücreti tahsil 
										edebilir. Bu ücret genelde bir gece/bir oda için 10$ ile 20$ arasında değişebilir. HotelsPro tatil 
										yeri ücretlerinden sorumlu değildir ve otellerin uygulamaları üzerinde kontrolü yoktur.
									</p>
									<h5 class="p0">İPTAL VE DEĞİŞİKLİK</h5>
									<p>Tüm iptal ve değişiklik taleplerinin HotelsPro web sitesi üzerinden talep edilmiş veya yapılmış olması gerekmektedir. Telefon ile iptal veya değişiklik talepleri kabul edilemez.
										Herhangi bir rezervasyon için sadece bir değişiklik yapılabilmektedir.Tüm değişiklik işlemlerinde (tarih, oda tipi, vb.) güncel indirim oranları ve fiyatlar geçerli olacaktır.
										HotelsPro, doğrudan otel ile yapılmış herhangi bir değişiklik veya iptal işlemi için sorumluluk kabul etmeyecektir. Otelin değil, HotelsPro'nun koşulları geçerli olacaktır..
										Özel günler, belirli tarihler ve erken rezervasyon süresince geçerli olacak iptal ve değişiklik kuralları, otel tarafından bildirildiği anda HotelsPro tarafından bilgilendirme ve güncelleme yapılmaktadır.
										Ücretsiz geceleme, erken rezervasyon indirimi gibi çeşitli promosyonlar içeren herhangi bir rezervasyon farklı kural ve sınırlamalara tabidir. Genel olarak bu kural ve sınırlamalar; isim ve tarih değişikliği yapılamaması ya da değişiklik halinde yeni fiyatların uygulanmasını içerir. Eğer bir ücretsiz geceleme içeren rezervasyonunuz var ise (örn; 5 kal 4 öde), bir gecenin iptal edilmesi durumunda geri iade yapılamaz, çünkü iptali talep edilen geceleme ücretsizdir.
										Konfirme olan bir rezervasyon için istemiş olduğunuz değişiklerde, gece sayısını azaltmış olsanız bile gecelik fiyatlarda değişiklik olabileceğini lütfen unutmayınız. Bunun sebebi rezervasyon ilk yapıldığı zaman geçerli olan promosyonlardır.
										Tüm değişiklik işlemlerinizde ( tarih, isim, oda tipi vs.) gece sayısını azaltmış olmanız durumunda bile fiyatlarda farklılık olabileceğini lütfen unutmayınız.</p>
										<h5 class="p0">KİMLİK TESPİTİ</h5>
										<p>HotelsPro, hesabınızı korumak amacıyla, rezervasyon ödemesinin yapıldığı kredi kartının sahibinden kimlik bilgisi talep etme hakkını saklı tutar. Bu önlem kart sahibini herhangi bir yanlış kredi kartı kullanımı karşısında korumak amacıyla alınmıştır.</p>
										<h5 class="p0">ALTERNATİF BİR OTELDE KONAKLAMA DURUMU ( BOOK OUT )</h5>
										<p>Eğer rezervasyon yapılmış olan otel kapalı, mevcut kapasitesinden fazla rezervasyon kabul etmiş 
											ve/veya otelde teknik bir arızadan dolayı tamirat-inşaat mevcut ise otel, onayladığı rezervasyonu 
											kabul etmeyebilir. Bu durumda otel ve/veya tedarikçisinin benzer bir standartta farklı bir konaklama 
											sunma yükümlülüğü vardır.
											Konaklamanın orjinal otelden başka bir otele değiştirilmesinden HotelsPro sorumlu tutulamaz.  
											HotelsPro kendisine iletilmiş alternatif otel bilgisini rezervasyonu yapan acenteye aynı anda e-posta 
											ile bildirmek ile yükümlüdür. Bu durum sonucu olarak ortaya çıkabilecek herhangi bir zarar veya masraf tamamen 
											otel ve/veya tedarikçisinin sorumluluğundadır.
										</p>
										<h5 class="p0">GRUP REZERVASYONLARI</h5>
										<p>6 ve daha fazla odanın talep edildidiği durumlar grup rezervasyonu olarak değerlendirilir. Grup talepleri
											HotelsPro web sitesi üzerindeki form doldurularak iletilmelidir. Her grup rezervasyonunun birbirinden ve 
											münferit rezervasyonlardan farklı kuralları bulunabilir. Bu kurallar grup departmanı tarafından teklif 
											aşamasında bildirilecektir.
											Grup talepleri HotelsPro web sitesi üzerindeki form doldurularak Grup Departmanına iletilmelidir. 
											HotelsPro sadece yer tutmak ya da gelecekte satısı yapılmak uzere munferit olarak yapılmıs grup rezervasyonlarını ( 6 ve daha fazla oda ) iptal etme hakkını saklı tutar ve sorumluluk almaz.
											HotelsPro otel bilgilerini mümkün olduğunca doğru sunabilmek için çalışmalar yapar, ancak misafirin konaklama süresince otelde mevcut olan/olamayan veya misafirin kişisel beğeni ve tercihlerine uymayan bilgi ve olanakların doğruluğundan sorumlu değildir.
											Dekorasyon/yenileme ve onarım, otelin bakımı için gereklidir ve önceden uyarı olmaksızın yapılabilir. Otel ya da çalışanları tarafından misafire yansıyan herhangi bir rahatsızlık, uygunsuzluk, kaza, hırsızlık HotelsPro sorumluluğunda değildir.
											Klima, kasa, mini bar, televizyon uzaktan kumandanın kiralanması, vb. gibi misafir odaları teferruatları için otelin talep edebileceği herhangi bir ekstra ödeme üzerinde HotelsPro'nun kontrolü yoktur, oluşabilecek ilave ödemelerden sorumlu değildir.
											Otel ve misafir oda fotoğrafları, otelin genel görünümünü vermek amacıyla sağlanır. Misafir oda fotoğrafları rezervasyon yapılmış oda kategorisinden farklı bir kategoride veya misafir için ayrılmış odayla birebir aynı olmayabilir.
											HotelsPro web sitesinde yer alan tüm otellere rezervasyon yapabilmek için seyahat eden misafirlerden birinin en az 18 yaşında olması gerekmektedir. Bu yaş sınırı Amerika Birleşik Devletleri'nde daha üst bir limite ulaşmaktadır. Amerika Birleşik Devletlereri'ndeki bir otel rezervasyonu için misafirler 25 yaşın altında ise, otel ile iletişime geçilmesi gerekir.
										</p>
										<h5 class="p0">HARİTA BİLGİLERİ</h5>
										<p>Haritalar sadece bilgi amacıyla sağlanır. HotelsPro, mümkün olduğunca doğru harita bilgisini sunmak için 
											çalışmalar yaparken, bu bilgilerin doğruluğuna dair her türlü hata ve/veya eksiklikler için herhangi bir sorumluluk kabul etmez. En güncel tam yerleşim bilgileri ve yönlendirmelerini temin etmek için doğrudan otel ile iletişime geçilmesi acentenin kendi sorumluluğundadır.
										</p>
										<h5 class="p0">ŞİKAYETLER</h5>
										<p>Otelde çözümlenemeyen her hangi bir şikayet, HotelsPro sistemi üzerindeki "Mesajlar" bölümünden "Şikayet" kategorisini seçilerek ilgili departmana, otel çıkış tarihinden sonraki 20 gün içinde bildirilmelidir. HotelsPro otel çıkış tarihinden sonraki 20 gün içerisinde iletilmeyen şikayetleri kabul etmez.
											Şikayetin bir kopyası misafir tarafından konaklama sırasında otel yönetimine sunulmalı ve imzalatılmalıdır. Otel hizmetleri ile ilgili şikayetler, HotelsPro tarafından ilgili birime yönlendirilecektir. HotelsPro şikayetleri iletildikleri günden sonraki 5-20 iş günü içerisinde cevaplamak ile yükümlüdür.
										</p>
										<h5 class="p0">VİZE DESTEĞİ</h5>
										<p>HotelsPro, tamamı ödenmemiş ( ödeme sürecinde ) herhangi bir rezervasyon için otelden herhangi bir vize belgesi talep etmek ile yükümlü değildir.
											Ödemesi yapılmış rezervasyonlar için ise mevcut rezervasyonun iptal edilmesi durumunda 30 Euro masrafın kabul edilmesi halinde otelden vize belgesi talep edecektir.
											HotelsPro, vize belgesi talebinin otel tarafından kabul edileceğinin garantisini vermez ve oteller tarafından uygulanan ilave ucret uygulamasından sorumlu tutulamaz.
											Otellerin talep edebilecegi ilave ucret, sehayat eden musteri ya da acentenin kendisi tarafından otelle irtibata gecilip odenmelidir.\
										</p>
										<h5 class="p0">GENEL ŞART VE KOŞULLAR</h5>
										<p>HotelsPro üyesi her acente yaptığı rezervasyonda misafire karşı kendi sorumludur. HotelsPro seyahat eden misafirlerden herhangi bir rezervasyon için talep ve şikayet kabul etmez, iletişime geçmez. HotelsPro sadece rezervasyonu yapan acentenin kendisi ile irtibat halinde olacaktır.
											HotelsPro'ya yapılan telefon çağrıları, hizmet kalitesini gözlemlemek ve geliştirmek için kayıt edilebilir.
											HotelsPro, sel, deprem, ayaklanma, terörist eylemler, ülke içindeki devlet eylemleri veya yönetim değişikliği, kötü hava koşulları, vb. gibi kontrol dışı durumlar ile ilgili hizmetteki herhangi bir aksamadan sorumlu olmayacaktır.
											Farklı ülkelerin iklim değişiklikleri ve enerji tasarruf kuralları, bu belirli bölge ve/veya ülke içinde yerleşik oteldeki ısıtma sistemlerini etkileyebilir. Örneğin, yasal düzenlemelerden dolayı, İtalya'da ısıtma sistemleri sadece 15 Ekim ile 15 Mart arasında çalıştırılabilir. Yüzme havuzlarının açılış ve kapanış tarihleri, iklim ve hava koşullarından etkilenebilir. HotelsPro, bu hususlar ile ilgili olarak otellerin uygulamalarından sorumlu değildir.
											Sistemde arama esnasında geçen sürede satın al görünmesine karşın otel müsaitliğini yitirmiş olabilir.
											Eğer herhangi bir promosyonel e-posta / gazete veya özel teklifler almak istemiyor iseniz, lütfen bizimle info@hotelspro.com'dan iletişime geçiniz.
											Önemli - HotelsPro üyesi bir acente, online rezervasyonu tamamladıktan sonra, konaklama belgesi üzerindeki rezervasyon detaylarını, otel, adres, şehir ve ülke gibi tüm bilgileri kontrol etmeli ve doğru olduğundan emin olmalıdır.
											KABUL EDİYORUM – HotelsPro online sisteminin kullanımı şirketimizin şart ve koşullarını kabul etmenize bağlıdır. Sistemi kullanıyor olmanız bu şart ve koşulları tam olarak okuyup, anlamış olduğunuzu gösterir.
											KABUL ETMİYORUM – Eğer bu Şart ve Koşulları kabul etmiyorsanız online sistemimiz kullanılamaz. Açıklık kazandırmak için bizimle iletişime geçebilirsiniz.
										</p>
									</div>
								</div>	
								<div class="row">
									<div class="col-md-12 agreement">
										<label for="iagree">I agree</label>
										<input type="checkbox" id="iagree" name="iagree" required="required">
									</div>
									<div class="col-md-12 confirm_search_hotel">
										<input type="submit" value="Booking" style="top: 45px;">
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

