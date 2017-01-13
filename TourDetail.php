
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Turlar</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
</head>
<body class="" id="top">
	<!--==============================header=================================-->
	<?php include ('includes/php/navmenu.php'); ?>
	<!--=====================Content======================-->
	<?
	include( 'Services/Pronto/ProntoSettings.php' );

	$packageid = array("packageID" => "$PID"); 
	$getpackage = array_merge($prontoaccess, $packageid);
	$search = $client->GetTourPackageDetail($getpackage);	

	$detail = $search->GetTourPackageDetailResult->TourPackageSearchResultItem;
	$caption = $detail->Region;
	$PackageName = $detail->PackageName;

	$TourImage=str_replace('http://localhost/', 'http://www.prontotour.com/', $detail->ImagePath);
	
	// echo "HAHAHAHAHAHA:".count($search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour);
	// print_r($search);

	?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?echo $PackageName;?></h3>
				</div>
				<div class="clear"></div>
				<div class="col-m-8">
					<h5 class="col1 txf">TUR PROGRAMI</h5>
					<?foreach ($search->GetTourPackageDetailResult->TourPlan->Day->TourPackagePlanDay as $days) {?>	
					<div class="txf text1"><?echo $days->Caption;?></div>		
					<div class="col2"><?echo $days->Content;?></div>		
					<?}
					if (count($search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour)>0) {
						?>		
						<br>
						<br>

						<h5 class="col1 txf">EKSTRA TURLAR</h5>
						<?
						if (count($search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour)>1) {
							foreach ($search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour as $extra) {?>	
							<div class="txf text1"><?echo $extra->Caption;?></div>		
							<div class="col2"><?echo nl2br($extra->Content);?></div>		
							<?}
						}
						else 
							{?>	
						<div class="txf text1"><?echo $search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour->Caption;?></div>		
						<div class="col2"><?echo nl2br($search->GetTourPackageDetailResult->ExtraTour->Tour->ExtraTour->Content);?></div>
						<?
					}}?>		
					<br>
					<br>

				</div> 
				<div class="col-md-4">
					<div class="box">
						<div class="box_top"><?echo $caption;?></div>
						<img src="<?echo $TourImage;?>" alt="">

						<div class="box_bot">
							<div class="col2"><?echo nl2br($detail->PackageExplanation);?></div>
							<br>			
							<div class="text1"><?echo $detail->PackageStartDate."-".$detail->PackageEndDate;?></div>
							<div class="col2"><?echo $detail->DayNightString;?></div>
							<div class="col2"><?echo $detail->PackageClass;?> İki Kişilik Oda</div>
							<br>
							<ul>
								<li>
									<div class="col1"><?echo $detail->Price->PriceForDouble . " ". $detail->Price->PriceCurrency;?></div>
									<div class="col2">Kişi Başı</div>
								</li>              
								<li>
									<div class="col1"><?echo $detail->Price->AdditionalBedPriceForThird . " ". $detail->Price->PriceCurrency;?></div>
									<div class="col2">İlave Yatak</div>
								</li>             
								<li>
									<div class="col1"><?echo $detail->Price->PriceForSingle . " ". $detail->Price->PriceCurrency;?></div>
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
							<div class="col2"><?echo nl2br($search->GetTourPackageDetailResult->TourPlan->FlightInfo);?></div>
							<br>			

							<div class="text1">NELER ÜCRETE DAHİL?</div>
							<div class="col2"><?echo nl2br($search->GetTourPackageDetailResult->TourPlan->FreeOfChargeServices);?></div>
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
<script>
</script>
</body>
</html>

