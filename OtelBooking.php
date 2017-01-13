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
  <div class="result_hotel_block">
    <div class="container">
      <div class="row">


        <?php
        $client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));

        try {
      // lead traveller
          $leadTravellerInfo = array();
          if (isset ($_POST) && !empty($_POST)){
            /*
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            */
            $title_of_leader = $_POST['title_select_leader'];
            $first_name_leader = $_POST['first_name_leader'];
            $last_name_leader = $_POST['last_name_leader'];
            $nationality_of_leader = $_POST['nationality'];
            $title_of_another = $_POST['title_select'];
            $first_name_of_another = $_POST['first_name'];
            $last_name_of_another = $_POST['last_name'];

          }
          $paxInfo = array("paxType" => "Adult", "title" => "$title_of_leader", "firstName" => "$first_name_leader", "lastName" => "$last_name_leader");

          $leadTravellerInfo["paxInfo"] = $paxInfo;

          $leadTravellerInfo["nationality"] = $nationality_of_leader;

/*
  $otherTravellerInfo = array();
  $otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Mark", "lastName" => "TEST");
  $otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Mark", "lastName" => "TEST");
  $otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Mark", "lastName" => "TEST");
  $otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Mark", "lastName" => "TEST");
  $otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Mark", "lastName" => "TEST");
      //$otherTravellerInfo[] = array("title" => "Ms", "firstName" => "Jane", "lastName" => "TEST");
      //$otherTravellerInfo[] = array("title" => "Mr", "firstName" => "Baby", "lastName" => "TEST");
      //$preferences = "nonSmoking";
*/
  $travellerCounter = 0;
  $otherTravellerInfo = array();
  foreach ($_POST["title_select"] as $another_traveller){
    for ($i = 0; $i <= $travellerCounter; $i++) {
      $otherTravellerInfo[$i] = array("title" =>  $title_of_another[$i], "firstName" => $first_name_of_another[$i], "lastName" => $last_name_of_another[$i]);
    }
    $travellerCounter++;
  }


/*
  print_r($leadTravellerInfo);
  echo "<br>";
  print_r($otherTravellerInfo);
  echo "<br>";
  */
  $preferences = "";
  $note = "";   
  $hotelCode = $_POST['hotelCode']; 
  $agencyReferenceNumber = '';
  $processId = $_POST['processId'];
  $makeHotelBooking = $client->makeHotelBooking("dzZZaDE4QnBOMUlHTUlmd3NKaHNZUFpVdld1dTh6WHRJdFRmTENWaWxrUmdUaHYxRG9EeWg2MjNqbVBhQS9rRg==", $processId, $agencyReferenceNumber, $leadTravellerInfo, $otherTravellerInfo, $preferences, $note, $hotelCode);

  $hotel = $makeHotelBooking->hotelBookingInfo;
  $rooms = is_array($hotel->rooms) ? $hotel->rooms : array($hotel->rooms);
  $policies = is_array($hotel->cancellationPolicy) ? $hotel->cancellationPolicy : array($hotel->cancellationPolicy);
}
catch (SoapFault $exception) {
  echo $exception->getMessage();
  exit;
}
?>
<?php
if (false == empty($hotel)){
  ?>
  <div class="col-md-12 all_booking_info">
    <div class="col-md-12 dates_of_reserving_info_in">
      <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="form-group">
          <label for="check_in">Check In :</label><br>
          <div class='input-group date'>
            <input type='text' class="form-control" value="<?php echo $hotel->checkIn;?>" readonly/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="form-group dates_of_reserving_info_out">
          <label for="check_in">Check Out :</label><br>
          <div class='input-group date'>
            <input type='text' class="form-control" value="<?php echo $hotel->checkOut;?>" readonly/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      <div class="col-dm-3">
        <p>Your Tracking ID: <?php echo $makeHotelBooking->trackingId?></p>
      </div>
    </div>
    <?php
    foreach ($rooms as $room) {
      ?>
      <div class="col-md-6 room_info">
        <div class="col-md-12 p0 room_category">
          <p class="col-md-6">Room <?php echo($room + 1);?> Category</p>
          <p class="col-md-6"><?php echo $room->roomCategory;?></p>
        </div>
        <div class="col-md-12 p0 room_rate">
          <p class="col-md-6">Total Room Rate</p>
          <p class="col-md-6"><?php echo $room->totalRoomRate;?></p>
        </div>
        <div class="col-md-12 p0 room_paxes">
          <p class="col-md-6">Paxes</p>
          <p class="col-md-6">                      
            <?php
            $paxes = is_array($room->paxes) ? $room->paxes : array($room->paxes);
            ?>
            <?php
            foreach ($paxes as $pax) {
              ?>
              <?php echo "{$pax->title} $pax->firstName $pax->lastName - {$pax->paxType}";
              ?> <!--(<?php //echo $pax->age;?>)--><br/>
              <?php
            }
            ?>
          </p>
        </div>
        <div class="col-md-12 room_rates p0">
          <p class="col-md-6">Rates per night</p>
          <p class="col-md-6">
            <?php
            $prices = is_array($room->ratesPerNight) ? $room->ratesPerNight : array($room->ratesPerNight);
            ?>
            <?php
            foreach ($prices as $price) {
              ?>
              <?php
              echo $price->date;
              ?> (<?php echo $price->amount;?>)<br/>
              <?php
            }
            ?>
          </p>
        </div>
        <div class="col-md-12 board_type p0">
          <p class="col-md-6">Board type</p>
          <p class="col-md-6"><?php echo $hotel->boardType;?></p> 
        </div>
      </div>
      <?php } ?>
      <div class="col-md-12 policies_block">
        <h4>Cancellation policy</h4>
        <?php
        foreach ($policies as $policy) {
          ?>
          <div class="col-md-6 policies">
            <div class="col-md-12 p0">
              <p class="col-md-6">Days</p>
              <p class="col-md-6"><?php echo $policy->cancellationDay;?></p>
            </div>
            <div class="col-md-12 p0">
              <p class="col-md-6">Fee type</p>
              <p class="col-md-6"><?php echo $policy->feeType;?></p>
            </div>
            <div class="col-md-12 p0">
              <p class="col-md-6">Fee amount</p>
              <p class="col-md-6"><?php echo $policy->feeAmount;?></p>
            </div>
            <div class="col-md-12 p0">
              <p class="col-md-6">Currency</p>
              <p class="col-md-6"><?php echo $policy->currency; ?></p>
            </div>
            <div class="col-md-12 p0">
              <p class="col-md-6">Remarks</p>
              <p class="col-md-6"><?php echo $policy->remarks; ?></p>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <?php
      if($hotel->comments > 0){
        ?>
        <div class="col-md-12 ">
          <p><?php echo $hotel->comments;?></p>
        </div>
        <?php
      }
      ?>
    </div>
    <?php } ?>

<!--
    responseId: <?php //echo $makeHotelBooking->responseId?><br/>
    trackingId: <?php //echo $makeHotelBooking->trackingId?><br/>
  -->    
  <table border="1" style="display: none;">
    <thead>
      <tr>
        <th>bookingStatus</th>
        <th>checkIn</th>
        <th>checkOut</th>
        <th>boardType</th>
        <th>Room Data</th>
        <th>cancellationPolicy</th>
        <th>comments</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (false == empty($hotel)) {
        ?>
        <tr>
          <td><?php echo $hotel->bookingStatus;?></td>
          <td><?php echo $hotel->checkIn;?></td>
          <td><?php echo $hotel->checkOut;?></td>
          <td><?php echo $hotel->boardType;?></td>
          <td>
            <?php
            foreach ($rooms as $room) {
              ?>
              <table border="1" style="margin: 10px; width: 350px; float: left;">
                <tr>
                  <td><b>Room <?php echo($room + 1);?> Category</b></td>
                  <td><?php echo $room->roomCategory;?>&nbsp;</td>
                </tr>
                <tr>
                  <td><b>Total Room Rate</b></td>
                  <td><?php echo $room->totalRoomRate;?></td>
                </tr>
                <tr>
                  <td><b>Paxes</b></td>
                  <td>
                    <?php
                    $paxes = is_array($room->paxes) ? $room->paxes : array($room->paxes);
                    ?>
                    <?php
                    foreach ($paxes as $pax) {
                      ?>
                      <?php echo "{$pax->title} $pax->firstName $pax->lastName - {$pax->paxType}";
                      ?> (<?php echo $pax->age;?>)<br/>
                      <?php
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td><b>ratesPerNight</b></td>
                  <td>
                    <?php
                    $prices = is_array($room->ratesPerNight) ? $room->ratesPerNight : array($room->ratesPerNight);
                    ?>
                    <?php
                    foreach ($prices as $price) {
                      ?>
                      <?php
                      echo $price->date;
                      ?> (<?php echo $price->amount;?>)<br/>
                      <?php
                    }
                    ?>
                  </td>
                </tr>
              </table>
              <?php
            }
            ?>
          </td>
          <td>
            <table border="1">
              <thead>
                <tr>
                  <th>Days</th>
                  <th>feeType</th>
                  <th>feeAmount</th>
                  <th>currency</th>
                  <th>remarks</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($policies as $policy) {
                  ?>
                  <tr>              
                    <td><?php echo $policy->cancellationDay;?>&nbsp;</td>
                    <td><?php echo $policy->feeType;?>&nbsp;</td>
                    <td><?php echo $policy->feeAmount;?>&nbsp;</td>
                    <td><?php echo $policy->currency; ?>&nbsp;</td>
                    <td><?php echo $policy->remarks; ?>&nbsp;</td>
                  </tr>
                  <?php
                }
                ?>

              </tbody>
            </table>
          </td>
          <td><?php echo $hotel->comments;?>&nbsp;</td>
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