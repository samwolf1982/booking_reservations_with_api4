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

	// $packagetype = array("searchCriteria" => array("StartDate" => "01/05/2016","EndDate" => "30/05/2018", "RegionGroupCode" => "$RGC", "RegionCode" => "0", "CountryCode" => "0", "CityCode" => "0",  "Keyword" => "", "OperationType" => "All", "RegionType" => "Region", "PackageType" => "All"));
	// $getpackages = array_merge($prontoaccess, $packagetype);
	// $search = $client->SearchTourPackage($getpackages);	
	// $control=$search->SearchTourPackageResult->ItemCount;
?>
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      	<h3></h3>
      </div>
    <div id="owln" class="owl1">
       <img src="https://api.asm.skype.com/v1/objects/0-weu-d3-dd6e76fe8206b69476bbbdf49f9f2b34/views/imgpsh_fullsize" class="img-responsive" alt="Cinque Terre">
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

