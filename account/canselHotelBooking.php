<div class="container">
	<div class="row">
		<?php
		$client = new SoapClient("../b2bHotelSOAP.wsdl", array('trace' => 1));
		if (isset ($_POST) && !empty($_POST)){
	//$processId = $_POST['processId'];
			$trackingId = $_POST['trackingIdCanselBooking'];
	//echo $processId;
		}
		try {
			$cancelHotelBooking = $client->cancelHotelBooking("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $trackingId);
		}
		catch (SoapFault $exception) {
			echo $exception->getMessage();
			exit;
		}
		?>

		<table border="1">
			<thead>
				<tr>
					<th>agencyReferenceNumber</th>
					<th>bookingStatus</th>
					<th>note</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $cancelHotelBooking->agencyReferenceNumber;?>&nbsp;</td>
					<td><?php echo $cancelHotelBooking->bookingStatus;?>&nbsp;</td>
					<td><?php echo $cancelHotelBooking->note;?>&nbsp;</td>
				</tr>
				<tbody>
				</table>

			</div>
		</div>