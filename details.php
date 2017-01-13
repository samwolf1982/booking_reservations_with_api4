<!DOCTYPE>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
	<?php include ('connection_to_db.php'); ?>
	<!--
	<script src="http://maps.googleapis.com/maps/api/js?v=3.3&amp;sensor=false" type="text/javascript"></script>
	<script src="includes/js/gmaps.min.js?key=AIzaSyDfJUkn13DAAm7tiWg8QSeubTbJRWUhXO0"></script>
-->
<!--AIzaSyDfJUkn13DAAm7tiWg8QSeubTbJRWUhXO0-->
</head>
<body class="" id="top">
	<!--==============================header=================================-->
	<?php include ('includes/php/navmenu.php'); ?>
	<!--==============================main info=================================-->
	<div class="all_info_hotel_block">
		<div class="container">
			<div class="row">
				<?php
				$client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));
				if (isset ($_POST) && !empty($_POST)){
					/*
					echo "<pre>";
					print_r($_POST);
					echo "</pre>";
					*/
					$nationality = $_POST['select_nationality'];
					$hotelCode = $_POST['hotelCode'];
					$processId = $_POST['processId'];
					$searchId = $_POST['searchId'];
					$countOfPeople = $_POST['countOfPeople'];

				}
				try {
					$allocateHotelCode = $client->allocateHotelCode("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $searchId, $hotelCode);
				}
				catch (SoapFault $exception) {
					$exception->getMessage();
					exit;
				}
				?>
<!--
				responseId: <?php echo $allocateHotelCode->responseId?><br/>
				searchId: <?php echo $allocateHotelCode->searchId?><br/>
				hotelCode: <?php echo $allocateHotelCode->hotelCode?><br/>
			-->








			<?php

			$sql = "SELECT *
			FROM `hotels_list`
			INNER JOIN `description_list` ON hotels_list.HotelCode=description_list.HotelCode
			INNER JOIN `amenities_list` ON hotels_list.HotelCode=amenities_list.HotelCode
			WHERE hotels_list.HotelCode='". $hotelCode ."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {

    // output data of each row
				while($row = $result->fetch_assoc()) {
					?>

					<div class="col-md-12 hotel_info_block">
						<div class="col-md-6 hotel_name">
							<h4><?php echo $row["HotelName"];?></h4>
						</div>
						<div class="col-md-6 star_rating">
							<div class="stars" style="float: right;">
								<?php
								if($row["StarRating"] == 5){
									echo "<span></span><span></span><span></span><span></span><span></span>";
								} else if($row["StarRating"] == 4){
									echo "<span></span><span></span><span></span><span></span><span class='emp'></span>";
								} else if($row["StarRating"] == 3){
									echo "<span></span><span></span><span></span><span class='emp'></span><span class='emp'></span>";
								} else if($row["StarRating"] == 2){
									echo "<span></span><span class='emp'></span><span class='emp'></span><span class='emp'></span><span class='emp'></span>";
								} else {
									echo "<span class='emp'></span><span class='emp'></span><span class='emp'></span><span class='emp'></span><span class='emp'></span>";
								}
								?>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="image_of_hotel col-md-6">
							<?php
							$images = unserialize($row["HotelImages"]);
							?>
							<img src="<?php print_r($images[0]);?>" alt="hotel image">
						</div>
						<div class="hotel_info col-md-6">
							<p class="description_p"><?php echo $row["HotelInfo"];?></p>
							<div class="accordion">
								<!-- panel-group -->
								<div class="panel-group" id="accordion">
									<!-- panel -->
									<div class="panel-default panel-faq">
										<!-- panel-heading -->
										<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#acc_<?php echo $hnum;?>">
												<h5 class="panel-title">Hotel amenities<span class="pull-right"><i class="fa fa-plus"></i></span></h5>
											</a>
										</div>
										<!-- panel-heading -->
										<div id="acc_<?php echo $hnum;?>" class="panel-collapse collapse">
											<!-- panel-body -->
											<div class="panel-body">
												<p class="description_p">
													<?php 
													/*echo $row["PAmenities"];*/
													echo preg_replace("/([^\s]?)\s?([.,?!:;])\s?([^\s]?)/u", "\$1\$2 \$3" , $row["PAmenities"]);
													?>
												</p>
												<p class="description_p">
													<?php 
													/*echo $row["RAmenities"];*/
													echo preg_replace("/([^\s]?)\s?([.,?!:;])\s?([^\s]?)/u", "\$1\$2 \$3" , $row["RAmenities"]);
													?>
												</p>
											</div><!-- panel-body -->
										</div>
									</div>
									<!-- panel -->
									<!-- panel -->
									<div class="panel-default panel-faq">
										<!-- panel-heading -->
										<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#hotel_photos_<?php echo $hnum;?>">
												<h5 class="panel-title">More photos<span class="pull-right"><i class="fa fa-plus"></i></span></h5>
											</a>
										</div>
										<!-- panel-heading -->
										<div id="hotel_photos_<?php echo $hnum;?>" class="panel-collapse collapse">
											<!-- panel-body -->
											<div class="panel-body">

												<?php
												$images = unserialize($row["HotelImages"]);
                    											//print_r($images);
												if(count($images) <= 1){
													echo "no more images";
												} else { ?>

												<!-- featured -->
												<?php foreach ($images as $url){
													echo "<div class='col-md-6 additional_images'><img src='". $url ."' alt='' class='img-respocive'></div>";
												}
											}
											?>
										</div>
										<!-- panel-body -->
									</div>
								</div>
								<!-- panel -->

							</div>
						</div>
					</div>
					<div class="col-md-12 map_here">
						<div id="map">

						</div>
					</div>
					<?php
					if (is_object($allocateHotelCode->availableHotels)) {
						$availableHotels[] = $allocateHotelCode->availableHotels;
					} else {
						$availableHotels = $allocateHotelCode->availableHotels;
					}
					foreach ($availableHotels as $hnum => $hotel) {
						?>
						<div class="col-md-12 pot_results">
							<div class="col-md-6 room_info_block">
								<?php
								if (is_object($hotel->rooms)) {
									$roomResponse[] = $hotel->rooms;
								} else {
									$roomResponse = $hotel->rooms;
								}
								foreach ((array)$roomResponse as $rnum => $room) {
									?>
									<div class="col-md-6">
										<p>Room <?php echo($rnum + 1);?> Category</p>
									</div>
									<div class="col-md-6">
										<p><?php echo $room->roomCategory;?></p>

									</div>
									<?php
									unset($ratesPerNight);
									unset($roomsInfo);
								}
								unset($roomResponse);
								?>
							</div>
							<div class="col-md-3 board_type">
								<p>Board type: <?php echo $hotel->boardType?></p>
							</div>
							<div class="col-md-2 total_price p0">
								<p class="p0">Total price: <?php echo $hotel->totalPrice ." ". $hotel->currency;?></p>
							</div>
							<div class="col-md-1 book_it p0">
								<form action="BookingForm.php" method="post">
									<div class="row">
										<input type="hidden" name="nationality" value="<?php echo $nationality?>">
										<input type="hidden" name="countOfPeople" value="<?php echo $countOfPeople ?>">
										<input type="hidden" name="processId" value="<?php echo $hotel->processId?>">
										<input type="hidden" name="searchId" value="<?php echo $checkAvailability->searchId?>">
										<input type="hidden" name="hotelCode" value="<?php echo $hotel->hotelCode?>">
										<input type="submit" value="Booking" style="margin-top: -6px;">
									</div>
								</form>
							</div>
						</div>

						<?php }?>
						<?php }}?>
						<table border="1" style="display: none;">
							<thead>
								<tr>
									<th>processId</th>
									<th>availabilityStatus</th>
									<th>totalPrice</th>
									<th>totalTax</th>
									<th>currency</th>
									<th>boardType</th>
									<th>Room Data</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (is_object($allocateHotelCode->availableHotels)) {
									$availableHotels[] = $allocateHotelCode->availableHotels;
								} else {
									$availableHotels = $allocateHotelCode->availableHotels;
								}
								foreach ($availableHotels as $hnum => $hotel) {
									?>
									<tr>
										<td><?php echo $hotel->processId?>&nbsp;</td>
										<td><?php echo $hotel->availabilityStatus?>&nbsp;</td>
										<td><?php echo $hotel->totalPrice?>&nbsp;</td>
										<td><?php echo $hotel->totalTax?>&nbsp;</td>
										<td><?php echo $hotel->currency?>&nbsp;</td>
										<td><?php echo $hotel->boardType?>&nbsp;</td>
										<td>
											<?php
											if (is_object($hotel->rooms)) {
												$roomResponse[] = $hotel->rooms;
											} else {
												$roomResponse = $hotel->rooms;
											}
											foreach ((array)$roomResponse as $rnum => $room) {
												?>
												<table border="1" style="margin: 10px; width: 300px; float: left;">
													<tr>
														<td><b>Room <?php echo($rnum + 1);?> Category</b></td>
														<td><?php echo $room->roomCategory;?>&nbsp;</td>
													</tr>
													<tr>
														<td><b>Total Room Rate</b></td>
														<td><?php echo $room->totalRoomRate;?>&nbsp;</td>
													</tr>
													<tr>
														<td><b>Paxes</b></td>
														<td>
															<?php
															if (is_object($room->paxes)) {
																$roomsInfo[] = $room->paxes;
															} else {
																$roomsInfo = $room->paxes;
															}
															if (is_object($room->ratesPerNight)) {
																$ratesPerNight[] = $room->ratesPerNight;
															} else {
																$ratesPerNight = $room->ratesPerNight;
															}
															foreach ((array)$roomsInfo as $pnum => $pax) {
																?>
																<?php echo $pax->paxType;?> (<?php echo $pax->age;?>)<br/>
																<?php
															}
															?>
														</td>
													</tr>
													<tr>
														<td><b>ratesPerNight</b></td>
														<td>
															<?php
															foreach ((array)$ratesPerNight as $rpnum => $price) {
																?>
																<?php echo $price->date;?> (<?php echo $price->amount;?>)<br/>
																<?php
															}
															?>
														</td>
													</tr>
												</table>
												<?php
												unset($ratesPerNight);
												unset($roomsInfo);
											}
											unset($roomResponse);
											?>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!--==============================footer=================================-->
			<?php include ('includes/php/footer.php'); ?>


		</body>
		</html>

