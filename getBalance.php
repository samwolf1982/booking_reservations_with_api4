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
	<div class="getBalanceInfo">
		<div class="container">
			<div class="row">

				<?php
				$client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));

				try {
					$getBalance = $client->getBalance("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==");
				}
				catch (SoapFault $exception) {
					echo $exception->getMessage();
					exit;
				}
				?>

				Deposit Currency : <?php echo $getBalance->currency?><br/>
				Total Deposit: <?php echo $getBalance->totalDeposit?><br/>
				Total Booking Amount:  <?php echo $getBalance->totalBookingAmount
				?><br/>
				Currenct Balance:  <?php echo $getBalance->currentBalance?><br/>

			</div>
		</div>
	</div>
	<!--==============================footer=================================-->
	<?php include ('includes/php/footer.php'); ?>
</body>
</html>