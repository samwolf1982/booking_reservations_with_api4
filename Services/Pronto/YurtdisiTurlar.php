<!DOCTYPE html>
<?
include( '../Services/Pronto/prontosettings.php' );
 
		$gruplist = array("packageRegionType" => "YDB",); 

		$getgruplist = array_merge($prontoaccess, $gruplist);

		$regiongroup = $client->GetRegionGroupList($getgruplist);


?>
<html lang="en">
	<head>
		<title>Pronto Services Test</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>

		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>

	</head>
	<body>
<!--==============================Content=================================-->
		<div class="content">
			<div class="container_12">
				<div class="banners">
				<?foreach ($regiongroup->GetRegionGroupListResult->regionGroupItem->WidgetItem as $product) {?>			
					<div class="grid_4">
						<div class="banner">
							<img src="prontoimages/<?echo $product->Value;?>.jpg" alt="">
							<div class="label">
								<a href="#"><?echo $product->Text;?></a>
							</div>
						</div>
					</div>
				<?}?>					
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</body>
</html>