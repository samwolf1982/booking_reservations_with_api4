<div class="container">
	<div class="row">
		<?php
		$client = new SoapClient("../b2bHotelSOAP.wsdl", array('trace' => 1));
		if (isset ($_POST) && !empty($_POST)){
	//$processId = $_POST['processId'];
			$processId = $_POST['trackingIdBookingStatus'];
	//echo $processId;
		}
		try {
			$getHotelBookingStatus = $client->getHotelBookingStatus("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $trackingId);
		}
		catch (SoapFault $exception) {
			echo $exception->getMessage();
			exit;
		}
		?>

		responseId: <?php echo $getHotelBookingStatus->responseId?><br/>
		trackingId: <?php echo $getHotelBookingStatus->trackingId?><br/>
		<table border="1">
			<thead>
				<tr>
					<th colspan="10">Book Info</th>
				</tr>
				<tr>
					<th>bookingStatus</th>
					<th>confirmationNumber</th>
					<th>hotelCode</th>
					<th>checkIn</th>
					<th>checkOut</th>
					<th>totalPrice</th>
					<th>currency</th>
					<th>boardType</th>
					<th>agencyReferenceNumber</th>
					<th>comments</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->bookingStatus;?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->confirmationNumber;?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->hotelCode;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->checkIn;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->checkOut;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->totalPrice;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->currency;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->boardType;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->agencyReferenceNumber;
					?>&nbsp;</td>
					<td><?php echo $getHotelBookingStatus->hotelBookingInfo->comments;
					?>&nbsp;</td>
				</tr>
				<tbody>
				</table>
				<table border="1">
					<thead>
						<tr>
							<th colspan="5">Pax List</th>
						</tr>
						<tr>
							<th>Pax Type</th>
							<th>Title</th>
							<th>Name</th>
							<th>LastName</th>
							<th>Age</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$rooms = is_array($getHotelBookingStatus->hotelBookingInfo->rooms) ? $getHotelBookingStatus->hotelBookingInfo : array($getHotelBookingStatus->hotelBookingInfo);

						foreach ($rooms as $room) {
							$paxes = is_array($room->paxes) ? $room->paxes : array($room->paxes);
							foreach ($paxes as $pax) {
								?>
								<tr>
									<td><?php echo $pax->paxType;?>&nbsp;</td>
									<td><?php echo $pax->title;?>&nbsp;</td>
									<td><?php echo $pax->firstName;?>&nbsp;</td>
									<td><?php echo $pax->lastName;?>&nbsp;</td>
									<td><?php echo $pax->age;?>&nbsp;</td>
								</tr>
								<?php
							}
						}
						?>

						<table border="1">
							<thead>
								<tr>
									<th colspan="5">Price Per Night</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($rooms as $roomId => $room) {
									$prices = is_array($room->ratesPerNight) ? $room->ratesPerNight : array($room->ratesPerNight);
									?>
									<tr>
										<th>Room <?=$roomId + 1;?></th>
										<th>Day</th>
										<th>Amount</th>
									</tr>
									<?php
									foreach ($prices as $price) {
										?>
										<tr>
											<td>&nbsp;</td>
											<td><?php echo $price->date;?>&nbsp;</td>
											<td><?php echo $price->amount;?>&nbsp;</td>
										</tr>
										<?php
									}
								}
								?>

								<table border="1">
									<thead>
										<tr>
											<th colspan="4">Cancellation Policy</th>
										</tr>
										<tr>
											<th>cancellationDay</th>
											<th>feeType</th>
											<th>feeAmount</th>
											<th>currency</th>
											<th>remarks</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$policies = is_array($getHotelBookingStatus->hotelBookingInfo->cancellationPolicy) ? $getHotelBookingStatus->hotelBookingInfo->cancellationPolicy : array($getHotelBookingStatus->hotelBookingInfo->cancellationPolicy);
										foreach ($policies as $policy) {
											?>
											<tr>
												<td><?php echo $policy->cancellationDay;?>&nbsp;</td>
												<td><?php echo $policy->feeType;?>&nbsp;</td>
												<td><?php echo $policy->feeAmount;?>&nbsp;</td>
												<td><?php echo $policy->currency;?>&nbsp;</td>
												<td><?php echo $policy->remarks;?>&nbsp;</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>

							</div>
						</div>