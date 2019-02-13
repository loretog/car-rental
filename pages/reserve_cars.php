<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 

  /*
    PAYPAL SANDBOX PAYMENT BUTTON - https://developer.paypal.com/docs/classic/paypal-payments-standard/ht_test-pps-buttons/
    buyer - loreto.gabawa.jr.sandbox@gmail.com
    seller - loreto.gabawa.jr.car.rental@gmail.com
  */

  $pick_up_date = isset( $_POST[ 'pick_up_date' ] ) ? $_POST[ 'pick_up_date' ] : date( "Y-m-d" );
  $return_date = isset( $_POST[ 'return_date' ] ) ? $_POST[ 'return_date' ] : date( "Y-m-d" );
  $q = "SELECT * FROM cars WHERE car_id NOT IN (SELECT C.car_id FROM car_trans AS CT RIGHT JOIN cars AS C ON CT.car_id=C.car_id WHERE (CT.pick_up_date BETWEEN '$pick_up_date' AND '$return_date' ) OR (CT.return_date BETWEEN '$pick_up_date' AND '$return_date'))";  
	$cars = $DB->query( $q );
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Reserve Cars</h1>
          <form method="post">
            Pickup: <input type="date" name="pick_up_date" value="<?php echo $pick_up_date ?>"><br>
            Return: <input type="date" name="return_date" value="<?php echo $return_date ?>"><br>
            <br>
            <input type="submit" name="" value="Search">
          </form>  


<!-- PAYPAL BUTTON -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5K5FYVNWJ5R3W">
<table>
<tr><td><input type="hidden" name="on0" value="Total Amount">Total Amount</td></tr><tr><td><input type="text" name="os0" maxlength="200" value="200"></td></tr>
</table>
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<!-- /PAYPAL BUTTON -->

     
	        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>
                    <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?page=add_car">New Car</a>
                  </th> 
                  <th>Model</th>
                  <th>Plate Number</th>
                  <th>Capacity</th>
                  <th>Unit</th>
                  <th>Color</th>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Manufacturer</th>
                  <th>Created</th>                            
                </tr>
              </thead>
              <?php if( $cars->num_rows ) { ?>
              <tbody>
                <?php while( $car = $cars->fetch_object() ) : ?>
                <tr>
                  <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?page=edit_car&id=<?php echo $car->car_id ?>">Edit</a>
                    <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL ?>/?action=delete_car&id=<?php echo $car->car_id ?>">Delete</a>
                  </td>
                  <td><?php echo $car->car_model ?></td>
                  <td><?php echo $car->plate_no ?></td>
                  <td><?php echo $car->capacity ?></td>
                  <td><?php echo $car->car_unit ?></td>
                  <td><?php echo $car->car_color ?></td>
                  <td><?php echo $car->car_type ?></td>
                  <td><?php echo $car->car_name ?></td>
                  <td><?php echo $car->price ?></td>
                  <td><?php echo $car->manufacturer; ?></td>
                  <td><?php echo $car->created ?></td>                  
                </tr>
                <?php endwhile; ?>
              </tbody>
              <?php } else { ?>
            	<tbody>
            		<tr>
            			<td colspan="3">
            				No records yet
            			</td>
            		</tr>
            	</tbody>
              <?php } ?>
              
            </table>
          </div>

	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>