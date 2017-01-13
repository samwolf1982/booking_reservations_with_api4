<!DOCTYPE html>
<html lang="en">
<head>
 <title>BookingRoll | Turlar</title>
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

  $gruplist = array("packageRegionType" => "YDB"); 
  $getgruplist = array_merge($prontoaccess, $gruplist);
  $regiongroup = $client->GetRegionGroupList($getgruplist);

  ?>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Yurtdışı Turlar</h3>
        </div>
        <div id="owln" class="owl1">
          <?php 
          foreach ($regiongroup->GetRegionGroupListResult->regionGroupItem->WidgetItem as $product) {?>			
          <div class="col-md-3 tour_item">
            <div class="item">
             <img src="prontoimages/<?echo $product->Value;?>.jpg" alt="">
             <a href="TourList.php?Tour=<?echo $product->Text;?>&RGC=<?echo $product->Value;?>&StartDate=08/05/2016&EndDate=08/05/2018"><?echo $product->Text;?></a>
           </div>
         </div>
         <?}?>
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

