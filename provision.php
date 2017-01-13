<?php
require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/api/db/connection.php';
require_once   __DIR__ . '/api/api_conections.php';
$user_search=session_get();
         // var_dump($user_search);
		    if(is_null($user_search)) {die('redirect empty sesion');}//die('redirect empty sesion');
use CosmosLibs\Cosmos as Cosmos;
use CosmosLibs\Destination as Destination;
use CosmosLibs\Hotels as Hotels;

//  $login = "PolatkanTurizm";
//  $password = "5wnHwY66PGsn6CRJ";
 
//  $login_static = "sandbox";
//  $password_static = "thisisyourpassw0rd";

// $format="json";

$cosmos=new Cosmos(API_LOGIN,API_PASS,API_STATIC_LOGIN,API_STATIC_PASS);

$res=$cosmos->check_hotel_provision($_POST['data']);





       echo    json_encode(['res'=>$res,'html'=>create_modal($res)], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
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


function create_modal($res)
{
   $result=' <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 110%;">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    Booking
                </h4>
            </div>
           
            <!-- Modal Body -->
            <div class="modal-body" style="padding: 0px;">
                
   
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

            <td colspan="2"><input type="text" style="background-color: #DEDEDE;" name="code" value='.$res->code.' readonly  >
          <input type="text" style="background-color: #DEDEDE;" name="hotel_code" value='.$res->hotel_code.' readonly  >
              
             </td>
     
           
        </tr>
        <tr>
            <td>Additional info</td>
               
            <td colspan="2">'.$res->additional_info.'</td>
        
        </tr>

          <tr>
            <td colspan="3" class="text-center" >Adult and children</td>
        </tr>';

        $incr=0;
                         foreach ($res->rooms as $key => $value) {
                         	# code...
                              for ($i=0; $i < $value->pax->adult_quantity ; $i++) { 
                                 
                                   $result.= '<tr>
            <td><label for="adult_name['.$incr.']'.$i.'">'.($i+1).' Adult name:</label> <input type="text" placeholder="name"  name="adult_name['.$incr.'][]" id="adult_name['.$incr.']'.$i.'" pattern="[^0-9]{2,}"   required title="2 characters minimum"   ></td>
            <td >
<label for="adult_sname['.$incr.']'.$i.'">'.($i+1).' Adult surname:</label> <br/>
<input type="text" placeholder="surname"  name="adult_sname['.$incr.'][]" id="adult_sname['.$incr.']'.$i.'"  pattern="[^0-9]{2,}"   required title="2 characters minimum" >
             </td>
                   <td></td>      
                                               </tr>';

                                      } 

                                     $j=1;
                              foreach ( $value->pax->children_ages as $k1 => $v1) {
                                           $result.= '<tr>
            <td><label for="children_name['.$incr.']'.$j.'">'.($j).' Children name:</label> <input type="text" placeholder="name"  name="children_name['.$incr.'][]" id="children_name['.$incr.']'.$j.'"  pattern="[^0-9]{2,}"   required title="2 characters minimum" ></td>
            <td >
<label for="children_sname['.$incr.']'.$j.'">'.($j).' Children surname:</label> <br/>
<input type="text" placeholder="surname"  name="children_sname['.$incr.'][]" id="children_sname['.$incr.']'.$j.'" pattern="[^0-9]{2,}"   required title="2 characters minimum " >
             </td>  

                 <td >
<label for="children_ages['.$incr.']'.$j.'">'.($j).' Children age:</label> <br/>
<input type="text" placeholder="surname"  name="children_ages['.$incr.'][]" id="children_ages['.$incr.']'.$j.'" readonly   style="background-color: #DEDEDE;"  required title="only numbers" value="'.$v1.'">
             </td>   
                                               </tr>';
                                               $j++;
                                      }
      $result.= "<tr>
            <td colspan='3'></td>
                  </tr>";

$incr++;
                         }
                         //end rooms loop

$result.= '<tr>
            <td><label for="email"> Email:</label> </td>
            <td >
<input type="email" placeholder="email"  name="email" id="email"  required ></td>
         <td></td>
        </tr>
<tr>
            <td><label for="phone_number"> Phone number:</label> </td>
            <td >
<input type="tel" placeholder="phone_number"  name="phone_number" id="phone_number"  required ></td>
         <td></td>
        </tr>
        ';

        







       $result.= '<tr>
            <td>Price</td>
            <td >'.$res->price.' '. $res->currency.'</td>
         <td></td>
        </tr>';





 $result.= '<tr>
                 <td colspan="3"> <div class="text-center"> Cancellation policy </div></td>
        </tr>';



      //$result.= '<tr><td>Ratio:</td><td >'.$res->policies[0]->ratio.'%</td><td></td></tr>';
$ch=$res->policies[0]->ratio*$res->price;
   $ch=(round($ch,2)).$res->currency;     
   $result.= '<tr>
            <td>Charge amount:</td>
            <td >'.$ch.'</td>
         <td></td>
        </tr>';






       $result.='<tr>
         <td colspan="3">
           <div class="row">
            
            <div class="col-md-12 text-center">
          <legend>Payment</legend>
            </div>

            <div class="col-md-4 text-center">
              <div class="control-group">
            <label class="control-label">Card Holder\'s Name</label>
            <div class="controls">
              <input type="text" name="client_names" class="input-block-level" pattern="\w+ \w+.*" title="Fill your first and last name" required>
            </div>
          </div>

            </div>


                        <div class="col-md-8 text-center">
                  <div class="control-group">
            <label class="control-label">Card Number</label>
            <div class="controls">
              <div class="row">
              <div class="col-md-2"></div>
                <div class="col-md-2">
                  <input type="text" name="card_number_1"  class="input-block-level cm" autocomplete="off" maxlength="4" pattern="\d{4}" title="First four digits" required>
                </div>
                <div class="col-md-2">
                  <input type="text" name="card_number_2" class="input-block-level cm" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required>
                </div>
                <div class="col-md-2">
                  <input type="text" name="card_number_3" class="input-block-level cm" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required>
                </div>
                <div class="col-md-2">
                  <input type="text" name="card_number_4" class="input-block-level cm" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required>
                </div>
               

              </div>
            </div>
          </div>



            </div>




                <div class="col-md-5 text-center">
              <div class="control-group">
            <label class="control-label">Card Expiry Date</label>
            <div class="">
              <div class="pull-left">
              
                  <select name="expiry_m" class="input-block-level">
                    <option selected value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  
                  </select>
                
                
                  <select name="expiry_y" class="input-block-level">';
                     

                     for ($i=2017; $i <2030 ; $i++) { 
                      $result.="<option value='{$i}'>{$i}</option>";  
                     }
                      
                    
                  $result.='</select>
               
              </div>
            </div>
          </div>

            </div>




                <div class="col-md-7 text-center">
              <div class="control-group">
         
      <div class="control-group">
            <label class="control-label">Card CVV</label>
            <div class="controls">
              <div class="row-fluid">
                <div class="span3">
                  <input name="cvv" type="text" class="input-block-level" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required>
                </div>
                 <div class="span8">
                  <!-- screenshot may be here -->
                 </div>
              </div>
            </div>
      </div>



          </div>

            </div>



        <div class="col-md-12 text-center">
              <div class="control-group">
         
      <div class="control-group">
            <div class="checkbox">
  <label><input type="checkbox" required value="">I do accept to be charged and <a href="/privacy_policy.php" target="_blank"> privacy policy </a>and <a href="/return_policy.php" target="_blank">return policy</a> above by clicking the "Complete Booking" button</label>
</div>
      </div>



          </div>

            </div>


 


</div>




         </td>

       </tr>
       







      

    </tbody>
</table>';



   $result.= '
            


  


                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>


                <button type="submit" class="btn btn-primary">
                    Complete Booking
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

?>