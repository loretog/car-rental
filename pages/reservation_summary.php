<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php
  $total_days = 0;

  if( $_POST[ "pickup_date" ] == $_POST[ "return_date" ]) {
    $total_days = 1;
  } else {
    $pick_up_date = date_create( $_POST[ "pickup_date" ] . " 00:00" );
    $return_date = date_create( $_POST[ "return_date" ] . " 23:59" );
    $diff =  date_diff( $return_date, $pick_up_date  );

    $total_days = $diff->format("%a") + 1;
  }

  $car_ids = implode( ",", $_POST[ 'car_items' ] );

  $cars = $DB->query( "SELECT * FROM cars WHERE car_id IN ($car_ids)" );
  $rec = $DB->query( "SELECT SUM(price) AS total_price FROM cars WHERE car_id IN ($car_ids)" );
  $rec = $rec->fetch_object();
  $total_price = $rec->total_price;
  $total_amount_days = $total_days * $total_price;

  $custom[ "pickup_date" ] = $_POST[ "pickup_date" ];
  $custom[ "return_date" ] = $_POST[ "return_date" ];
  $custom[ "pickup_time" ] = $_POST[ "pickup_time" ];
  $custom[ "return_time" ] = $_POST[ "return_time" ];
  
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Reservation Summary</h1>
          <div class="row">
            <div class="col-md-6">
              <p>From <u><?php echo $_POST[ "pickup_date" ] . " " . $_POST[ "pickup_time" ]; ?></u> to <u><?php echo $_POST[ "return_date" ] . " " . $_POST[ "return_time" ]; ?></u></p>  
              <?php if( $cars->num_rows ) : ?>
                <table class="table">       
                  <tr>
                    <th>Cars Selected</th>
                    <th>Price</th>
                  </tr>         
                <?php while( $car = $cars->fetch_object() ) : ?>
                  <?php
                    /*

                      ADD CARS TO SUBMIT TO PAYPAL

                    */
                      $custom[ "cars" ][] = [ $car->car_id, $car->price ];
                  ?>
                  <tr>
                    <td><?php echo $car->car_model ?></td>
                    <td><?php echo CURRENCY . " " . number_format( $car->price ) ?></td>
                  </tr>
                <?php endwhile; ?>
                  <tr>
                    <td>Amount</td>
                    <td><?php echo CURRENCY . " " . number_format( $total_price ) ?></td>
                  </tr>
                  <tr>
                    <td>Total Amount in <?php echo $total_days ?> day(s)</td>
                    <td><strong><?php echo CURRENCY . " " . number_format( $total_amount_days ) ?></strong></td>
                  </tr>
                </table>
              <?php else: ?>
                No cars selected
              <?php endif; ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-1">
              <a href="<?php echo SITE_URL ?>/?page=reserve_cars">&laquo; Back</a>
            </div>
            <div class="col-md-2">
              <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="5K5FYVNWJ5R3W">
              <input type="hidden" name="rm" value="2">
              
              <table>
                <tr>
                  <td>
                    <input type="hidden" name="on0" value="Total Amount">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="hidden" name="os0" maxlength="200" value="<?php echo number_format( $total_price ) ?>">
                  </td>
                </tr>
              </table>
              <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
              </form> -->

              <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="SGN6V9LRYLZ8E">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value="Car Rental Payment">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="0">
                <input type="hidden" name="cn" value="Add special instructions to the seller:">
                <input type="hidden" name="no_shipping" value="2">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="return" value="http://localhost/car-rental/?action=save_reservation">
                <input type="hidden" name="currency_code" value="PHP">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHosted">
                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">                
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                <input type="hidden" name="amount" value="<?php echo $total_amount_days ?>">
                <input type="hidden" name="custom" value='<?php echo json_encode($custom) ?>'>
              </form>              
            </div>            
          </div>
	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>