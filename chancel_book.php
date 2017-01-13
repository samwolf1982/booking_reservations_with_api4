<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';
$user_search=session_get();
         // var_dump($user_search);
		    if(is_null($user_search)) {die('redirect empty sesion');}//die('redirect empty sesion');
use CosmosLibs\Cosmos as Cosmos;
use CosmosLibs\Destination as Destination;
use CosmosLibs\Hotels as Hotels;

 $login = "PolatkanTurizm";
 $password = "5wnHwY66PGsn6CRJ";
 
 $login_static = "sandbox";
 $password_static = "thisisyourpassw0rd";

$format="json";

$cosmos=new Cosmos($login,$password,$login_static,$password_static);

$res=$cosmos->chancel_book2($_POST['data']);




 if (isset($res->error_code)) {
       $html= create_modal_error($res)     ;
  }
  else{
   $html= create_chancel_modal($res); 
  }




                                 
       echo    json_encode(['res'=>$res,'html'=>$html], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);







// always get 'user_search' or null 
//value == ['code_search','result']
function session_get()
{
      $session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
    //$session->destroy();
   $segment = $session->getSegment('Vendor\Package\ClassName');
      // var_dump( $segment->get('user_search'));
  return  $segment->get('user_search');
}

function create_chancel_modal($res){

   $result=' <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cancellation
                </h4>
            </div>
           
            <!-- Modal Body -->
            <div class="modal-body">
                
   
    <div class="col-sm-12 col-md-12">
    
        <br/><br/>


          <table class="table table-striped">
 
    <tbody>
      <tr>
        <td>Code:</td>
        <td>'.$res->code.'</td>
    
      </tr>
      <tr>
        <td>Charge amount:</td>
        <td>'.$res->charge_amount.$res->currency.'</td>
        
      </tr>

    </tbody>
  </table>
           

';















                
                
                
                
                
                
            $result.= '</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">



    <button class="btn btn-primary" onclick="window.location.href=`Hotels.php`">Home</button>




            </div>

          
        </div>
    </div>';

    return $result;








}
function create_modal($res)
{
   $result=' <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Booking
                </h4>
            </div>
           
            <!-- Modal Body -->
            <div class="modal-body">
                
   
    <div class="col-sm-12 col-md-12">
      <form class="form-horizontal span6" method="POST" action="booking.php">
        <br/><br/>

<table class="table table-striped"> 
 <thead>
    <th class="text-center" colspan="2">Info</th>

  </thead>

    <tbody>
        <tr>
            <td>Products code </td>
            <td><input type="text" style="background-color: #DEDEDE;" name="code" value='.$res->code.' readonly  >
          <input type="text" style="background-color: #DEDEDE;" name="hotel_code" value='.$res->hotel_code.' readonly  >
              
             </td>
   
           
        </tr>
        <tr>
            <td>Additional info</td>
            <td>'.$res->additional_info.'</td>
         
        </tr>

          <tr>
            <td colspan="2" class="text-center" >Adult and children</td>
        </tr>';
                         foreach ($res->rooms as $key => $value) {
                         	# code...
                              for ($i=0; $i < $value->pax->adult_quantity ; $i++) { 
                                 
                                   $result.= '<tr>
            <td><label for="adult_name'.$i.'">'.($i+1).' Adult name:</label> <input type="text" placeholder="name"  name="adult_name[]" id="adult_name'.$i.'" pattern="[^0-9]{2,}"   required title="2 characters minimum"  value="Jon" ></td>
            <td >
<label for="adult_sname'.$i.'">'.($i+1).' Adult surname:</label> <br/>
<input type="text" placeholder="surname"  name="adult_sname[]" id="adult_sname'.$i.'"  pattern="[^0-9]{2,}"   required title="2 characters minimum" value="Dou">
             </td>   
                                               </tr>';

                                      } 

                                     $j=1;
                              foreach ( $value->pax->children_ages as $k1 => $v1) {
                                           $result.= '<tr>
            <td><label for="children_name'.$j.'">'.($j).' Children name:</label> <input type="text" placeholder="name"  name="children_name[]" id="children_name'.$j.'"  pattern="[^0-9]{2,}"   required title="2 characters minimum" value="JonCh"></td>
            <td >
<label for="children_sname'.$j.'">'.($j).' Children surname:</label> <br/>
<input type="text" placeholder="surname"  name="children_sname[]" id="children_sname'.$j.'" pattern="[^0-9]{2,}"   required title="2 characters minimum " value="DouCh">
             </td>   
                                               </tr>';
                                               $j++;
                                      }
      $result.= "<tr>
            <td colspan='2'></td>
                  </tr>";


                         }

$result.= '<tr>
            <td><label for="email"> Email:</label> </td>
            <td >
<input type="email" placeholder="email"  name="email" id="email"  required  value="lorem@lor.com"></td>
         
        </tr>
<tr>
            <td><label for="phone_number"> Phone number:</label> </td>
            <td >
<input type="tel" placeholder="phone_number"  name="phone_number" id="phone_number"  required  value="+965888888888"></td>
         
        </tr>
        ';

        







       $result.= '<tr>
            <td>Price</td>
            <td >'.$res->price.' '. $res->currency.'</td>
         
        </tr>


      

    </tbody>
</table>';



   $result.= '
            


  


                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>


                <button type="submit" class="btn btn-primary">
                    BOOK
                </button>

  

             </form>
    ';












             //   if pay at hotel
         $card= ' <div class="form-group">
            <label class="control-label">Card Holder\'s Name</label>
            <div class="controls">
              <input type="text" class="form-control" pattern="\w+ \w+.*" title="Fill your first and last name" required="">
            </div>
          </div>
       
          <div class="form-group">
            <label class="control-label">Card Number</label>
            <div class="controls">
              <div class="row">
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="First four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required="">
                </div>
              </div>
            </div>
          </div>







   
       
          <div class="form-group">
            <label class="control-label">Card Holder\'s Name</label>
            <div class="controls">
              <input type="text" class="form-control" pattern="\w+ \w+.*" title="Fill your first and last name" required="">
            </div>
          </div>
       
          <div class="form-group">
            <label class="control-label">Card Number</label>
            <div class="controls">
              <div class="row">
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="First four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required="">
                </div>
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required="">
                </div>
              </div>
            </div>
          </div>
       
          <div class="form-group">
            <label class="control-label">Card Expiry Date</label>
            <div class="controls">
              <div class="row">
                <div class="col-sm-9 col-md-9">
                  <select class="">
                    <option>January</option>
                    <option>...</option>
                    <option>December</option>
                  </select>
                </div>
                <div class="col-sm-3 col-md-3">
                  <select class="">
                    <option>2013</option>
                    <option>...</option>
                    <option>2015</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
       
          <div class="form-group">
            <label class="control-label">Card CVV</label>
            <div class="controls">
              <div class="row">
                <div class="col-sm-3 col-md-3">
                  <input type="text" class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="">
                </div>
                <div class="col-sm-8 col-md-8">
                  <!-- screenshot may be here -->
                </div>
              </div>
            </div>
          </div>
       
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default">Cancel</button>
          </div>
      
     
    </div>';

                
                
                
                
                
                
            $result.= '</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">




            </div>

          
        </div>
    </div>';

    return $result;
}


function create_modal_error($res)
{
   $result=' <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Error
                </h4>
            </div>
           
            <!-- Modal Body -->
            <div class="modal-body">
                
   
    <div class="col-sm-12 col-md-12">
    
        <br/><br/>
        <div class="text-center">'.$res->error_code.'</div>
            <div class="text-center">'.$res->detail.'</div>

';















                
                
                
                
                
                
            $result.= '</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>




            </div>

          
        </div>
    </div>';

    return $result;
}
?>