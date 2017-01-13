<div class="container">
	<div class="row">

		<?php
		$client = new SoapClient("../b2bHotelSOAP.wsdl", array('trace' => 1));

		try {
      // lead traveller
			$leadTravellerInfo = array();

			$paxInfo = array("paxType" => "Adult", "title" => "Mr", "firstName" => "John", "lastName" => "TEST");

			$leadTravellerInfo["paxInfo"] = $paxInfo;
			$leadTravellerInfo["nationality"] = "UK";

			$rooms = array();
			$rooms [] = array(array("paxType" => "Adult", "title" => "Mr", "firstName" => "Mark", "lastName" => "TEST"), array("paxType" => "Child", "title" => "Mr", "firstName" => "Baby", "lastName" => "TEST", "age" => 2), array("paxType" => "Child", "title" => "Ms", "firstName" => "Baby2", "lastName" => "TEST", "age" => 1) );
			$rooms [] = array(array("paxType" => "Adult", "title" => "Ms", "firstName" => "Jane", "lastName" => "TEST"), array("paxType" => "Adult", "title" => "Mr", "firstName" => "Brad", "lastName" => "TEST"));

			$preferences = "";
			$note = "";

			$amendHotelBooking = $client->amendHotelBooking("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $trackingId, "2011-11-15", "2011-11-17", $leadTravellerInfo, $rooms, $preferences, $note);
		}
		catch (SoapFault $exception) {
			echo $exception->getMessage();
			exit;
		}
		?>

		responseId: <?php echo $amendHotelBooking->responseId?><br/>
		trackingId: <?php echo $amendHotelBooking->trackingId?><br/>
		<table border="1">
			<thead>
				<tr>
					<th>amendStatus</th>
					<th>note</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $amendHotelBooking->amendStatus;?>&nbsp;</td>
					<td><?php echo $amendHotelBooking->note;?>&nbsp;</td>
				</tr>
				<tbody>
				</table>
			</div>
		</div>