<div class="container">
	<div class="row">
		<?php
/*
echo "<pre>";
	print_r($_POST);
echo "</pre>";
*/
$client = new SoapClient("../b2bHotelSOAP.wsdl", array('trace' => 1));
if (isset ($_POST) && !empty($_POST)){
	//$processId = $_POST['processId'];
	$processId = $_POST['trackingIdCansellation'];
	//echo $processId;
}

try {
	$getHotelCancellationPolicy = $client->getHotelCancellationPolicy("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $processId);
}
catch (SoapFault $exception) {
	echo $exception->getMessage();
	exit;
}
?>
<?php
?>
<div class="cansellation_policy">
	<?php
	$policies = is_array($getHotelCancellationPolicy->cancellationPolicy) ? $getHotelCancellationPolicy->cancellationPolicy : array($getHotelCancellationPolicy->cancellationPolicy);
	foreach ($policies as $policy) {
		?>
		<div class="col-md-4 p0 data_of_cansellation">
			<div class="cansellation_day col-md-12 p0">
				<p class="col-md-6 p0">Cancellation Day</p>
				<p class="col-md-6 p0"><?php echo $policy->cancellationDay;?></p>
			</div>
			<div class="fee_type col-md-12 p0">
				<p class="col-md-6 p0">Fee Type</p>
				<p class="col-md-6 p0"></p>
			</div>
			<div class="fee_amount col-md-12 p0">
				<p class="col-md-6 p0">Fee Amount</p>
				<p class="col-md-6 p0"><?php echo $policy->feeAmount;?></p>
			</div>
			<div class="currency col-md-12 p0">
				<p class="col-md-6 p0">Currency</p>
				<p class="col-md-6 p0"><?php echo $policy->currency;?></p>
			</div>
			<div class="remarks col-md-12 p0">
				<p class="col-md-6 p0">Remarks</p>
				<p class="col-md-6 p0"><?php echo $policy->remarks;?></p>
			</div>
		</div>
		<?php
	}
	?>
</div>
</div>
</div>
