<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookingRoll | Tatil, Her zaman!</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<?php include ('includes/php/head.php'); ?>
	<?php include ('connection_to_db.php'); ?>
</head>
<body class="" id="top">
	<!--==============================header=================================-->
	<?php include ('includes/php/navmenu.php'); ?>
	<!--==============================main info=================================-->
	<div class="result_hotel_block">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<h3>Hilversum Otelleri - <?php echo htmlspecialchars($_POST['location_for_search']) ?></h3>
					<?php
					/*echo htmlspecialchars($_POST['location_for_search']) ."<br>";
					echo htmlspecialchars($_POST['check_in']) ."<br>";
					echo htmlspecialchars($_POST['check_out']) ."<br>";
					echo htmlspecialchars($_POST['rooms_for_search']) ."<br>";
					echo htmlspecialchars($_POST['adults_for_search']) ."<br>";
					echo htmlspecialchars($_POST['child_for_search']) ."<br>";
					echo htmlspecialchars($_POST['child_age_for_search']) ."<br>";*/
					?>
				</div>
				<div class="col-md-2 filters">
					Filters been here
				</div>
				<div class="col-md-10 hotel_display">
					<?php
					$destination = $_POST['location_for_search'];
					//echo $destination . "<br><br>";
					$detect_destination = "SELECT * FROM `hotels_list` WHERE `Destination` = '". $destination ."'";
					//echo $detect_destination . "<br><br>";
					$result_dest = $conn->query($detect_destination);

					if ($result_dest->num_rows > 0) {

            // output data of each row
						if($row = $result_dest->fetch_assoc()) {
              //echo "destinationId: " . $row["DestinationId"].  "<br><br><br><br><br>";
							$destination_id = $row["DestinationId"];
							//echo $destination_id . "<br><br>";
						}
					} else {
						echo "0 results"."<br>";
					}
					//$check_in_date =  $_POST['check_in'];
					//$check_out_date =  $_POST['check_out'];

  // create SOAP client object
					$client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));

					try {
						$rooms = array();
      // First Room
						/*
						$rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"));
						$rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Child", "age" => 10), array("paxType" => "Child", "age" => 11), array("paxType" => "Child", "age" => 12));

						$rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Child", "age" => 5), array("paxType" => "Child", "age" => 6));
						print_r($rooms);
						*/
						if (isset ($_POST) && !empty($_POST))
						{
							//$all_data_from_search = $_POST;
							//print_r($all_data_from_search);\
							/*
							echo "<pre>";
							print_r($_POST);
							echo "</pre>";
							*/
							/* Create all query */
							$rooms = array();

							/*Support variable for room counting */
							$room_count = 0;
							$people = 0;
							/* Main loop */
							foreach ($_POST["adults_for_search"] as $room_adults) {
								/* If room has adults */
								if (!$room_adults)
									continue;

								/* Create new room */
								$room = array();

								/* Add adults to our room */
								for ($i = 0; $i < $room_adults; $i++) {
									$room[] = array('paxType' => 'Adult');
									$people++;
								}

								/* Add children with their ages to our room */
								for ($i = 0; $i < $_POST["child_for_search"][$room_count]; $i++) {
									$room[] = array('paxType' => 'Child', 'age' => $_POST['child_age_for_search'][$room_count][$i]);
									$people++;
								}

								/* Add room to query */
								$rooms[] = $room;
								$room_count++;
							}

							//print_r($rooms);
							$nationality = $_POST['select_nationality'];
						}

      // Second Room
            			//print_r($rooms);
						$filters = array();
            //$filters[] = array("filterType" => "hotelStar", "filterValue" => "3");
						//$filters[] = array("filterType" => "resultLimit", "filterValue" => "5");

      // make getAvailableHotel request (start search)
						$checkAvailability = $client->getAvailableHotel("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $destination_id, $_POST['check_in'], $_POST['check_out'], "", $nationality, "false", $rooms, $filters, $paginationRequest);

					}
					catch (SoapFault $exception) {
						echo $exception->getMessage();
						exit;
					}



					?>
					<?php
					if (is_object($checkAvailability->availableHotels)) {
						$hotelResponse[] = $checkAvailability->availableHotels;
					} else {
						$hotelResponse = $checkAvailability->availableHotels;
					}?>
					<div class="col-md-12 p0"><h3 class="p0">Total Found: <?php echo $checkAvailability->totalFound?></h3></div>
					<?php
					foreach ((array)$hotelResponse as $hnum => $hotel) { 
						$new_data = $hotel->hotelCode;
      //echo $new_data;
                //$sql = "SELECT * FROM `hotels_list` WHERE `HotelCode`='". $new_data ."'";

						$sql = "SELECT *
						FROM `hotels_list`
						INNER JOIN `description_list` ON hotels_list.HotelCode=description_list.HotelCode
						INNER JOIN `amenities_list` ON hotels_list.HotelCode=amenities_list.HotelCode
						WHERE hotels_list.HotelCode='". $new_data ."'";
                //echo $sql;
      //echo $sql;
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

    // output data of each row
							while($row = $result->fetch_assoc()) {
								?>
								<div class="col-md-12 hotel_info_block">
									<div class="image_of_hotel col-md-4">
										<?php
										$images = unserialize($row["HotelImages"]);
										?>
										<img src="<?php print_r($images[0]);?>" alt="hotel image">
									</div>

									<div class="col-md-8">
										<div class="col-md-12">
											<div class="col-md-3 hotel_name p0">
												<h4><?php echo $row["HotelName"];?></h4>
											</div>
											<div class="col-md-3 star_rating">
												<div class="stars">
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
											<div class="col-md-4 total_price">
												<p>Total price: <?php echo $hotel->totalPrice ." ". $hotel->currency;?></p>
											</div>
											<div class="col-md-2 book_it">
												<form action="details.php" method="post">
													<input type="hidden" name="countOfPeople" value="<?php echo $people ?>">
													<input type="hidden" name="select_nationality" value="<?php echo $nationality?>">
													<input type="hidden" name="processId" value="<?php echo $hotel->processId?>">
													<input type="hidden" name="searchId" value="<?php echo $checkAvailability->searchId?>">
													<input type="hidden" name="hotelCode" value="<?php echo $hotel->hotelCode?>">
													<input type="submit" value="Read more">
												</form>
											</div>
										</div>
										<div class="col-md-12 hotel_info">
											<p class="description_p"><?php echo $row["HotelInfo"];?></p>
										</div>
										<div class="col-md-12">
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
															<a data-toggle="collapse" data-parent="#accordion" href="#room_<?php echo $hnum;?>">
																<h5 class="panel-title">More details<span class="pull-right"><i class="fa fa-plus"></i></span></h5>
															</a>
														</div>
														<!-- panel-heading -->
														<div id="room_<?php echo $hnum;?>" class="panel-collapse collapse">
															<!-- panel-body -->
															<div class="panel-body">
																<?php
																if (is_object($hotel->rooms)) {
																	$roomResponse[] = $hotel;
																} else {
																	$roomResponse = $hotel->rooms;
																}
																foreach ((array)$roomResponse as $rnum => $room) {
																	?>
																	<div class="col-md-12 included">
																		<div class="col-md-12">
																			<p class="col-md-6">Board Type</p>
																			<p class="col-md-6"><?php echo $hotel->boardType?></p>
																		</div>
																	</div>
																	<div class="col-md-12 room_description">

																		<div class="col-md-12 room_category">
																			<p class="col-md-6">Room <?php echo($rnum + 1);?> Category</p>
																			<p class="col-md-6"><?php echo $room->roomCategory;?></p>
																		</div>
																		<div class="col-md-12 total_room_rate">
																			<p class="col-md-6">Total Room Rate</p>
																			<p class="col-md-6"><?php echo $room->totalRoomRate;?></p>
																		</div>
																		<div class="col-md-12 room_paxes">
																			<p class="col-md-6">Paxes</p>
																			<p class="col-md-6"><?php																				if (is_object($room->paxes)) {
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
																				echo $pax->paxType /*. " (" . $pax->age . ")*/."<br/>";
																			}?></p>
																		</div>
																		<div class="col-md-12 rates_per_night">
																			<p class="col-md-6">ratesPerNight</p>
																			<p class="col-md-6">																				<?php
																			foreach ((array)$ratesPerNight as $rpnum => $price) {                          
																				echo $price->date;
																				?> (<?php echo $price->amount;?>)<br/>
																				<?php
																			}
																			?></p>
																		</div>
																	</div>
																	<?php
																	unset($ratesPerNight);
																	unset($roomsInfo);
																}
																unset($roomResponse);
																?>
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
								</div>
							</div>
							<?
						}
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<!--==============================footer=================================-->
<?php include ('includes/php/footer.php'); ?>


</body>
</html>

