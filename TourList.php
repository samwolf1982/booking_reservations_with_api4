<?
if(!empty($_GET)) extract($_GET);
if(!empty($_POST)) extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">
     <head>
     <title>BookingRoll | Turlar - <?echo $Tour;?></title>
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

	$packagetype = array("searchCriteria" => array("StartDate" => "01/05/2016","EndDate" => "30/05/2018", "RegionGroupCode" => "$RGC", "RegionCode" => "0", "CountryCode" => "0", "CityCode" => "0",  "Keyword" => "", "OperationType" => "All", "RegionType" => "Region", "PackageType" => "All"));
	$getpackages = array_merge($prontoaccess, $packagetype);
	$search = $client->SearchTourPackage($getpackages);	
	$control=$search->SearchTourPackageResult->ItemCount;
?>
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      	<h3><?echo $Tour;?></h3>
      </div>
    <div id="owln" class="owl1">
		<?
		if ($control>1) {
		foreach ($search->SearchTourPackageResult->Item->TourPackageSearchResultItem as $tours) {?>			
			<div class="col-md-3 tour_item">
				<div class="item">
					<?
					$TourImage=str_replace('http://localhost/', 'http://www.prontotour.com/', $tours->ImagePath);
					// $TourImage=str_replace('.jpg', '_S.jpg', $TourImage);
					?>
					<img class="tourlist" src="<?echo $TourImage;?>" alt="">
					  <div class="box_mid">
						<div class="maxheight">
						  <div class="text1">
							<a href="TourDetail.php?PID=<?echo $tours->PackageID;?>">
								<?echo $tours->Region."<br><span class=\"col3\">".$tours->PackageStartDate." - ".$tours->PackageEndDate."</span>";?>
							</a></div>
						</div>
					  </div>					
					<a href="TourDetail.php?PID=<?echo $tours->PackageID;?>"><?echo $tours->Price->PriceForDouble ." " . $tours->Price->PriceCurrency . "<span class=\"PriceDesc\">'DAN BAŞLAYAN FİYATLARLA</span>";?></a>
				</div>
			</div>
		<?}}
		else if ($control==1) 
		{
		?>
			<div class="col-md-3 tour_item">
				<div class="item">
					<?
					$tours=$search->SearchTourPackageResult->Item->TourPackageSearchResultItem;
					$TourImage=str_replace('http://localhost/', 'http://www.prontotour.com/', $tours->ImagePath);
					// $TourImage=str_replace('.jpg', '_S.jpg', $TourImage);
					?>
					<img class="tourlist" src="<?echo $TourImage;?>" alt="">
					  <div class="box_mid">
						<div class="maxheight">
						  <div class="text1">
							<a href="TourDetail.php?PID=<?echo $tours->PackageID;?>">
								<?echo $tours->Region."<br><span class=\"col3\">".$tours->PackageStartDate." - ".$tours->PackageEndDate."</span>";?>
							</a></div>
						</div>
					  </div>					
					<a href="TourDetail.php?PID=<?echo $tours->PackageID;?>"><?echo $tours->Price->PriceForDouble ." " . $tours->Price->PriceCurrency . "<span class=\"PriceDesc\">'DAN BAŞLAYAN FİYATLARLA</span>";?></a>
				</div>
			</div>		
		<?}?>
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

