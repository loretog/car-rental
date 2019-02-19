<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 

  /*
    PAYPAL SANDBOX PAYMENT BUTTON - https://developer.paypal.com/docs/classic/paypal-payments-standard/ht_test-pps-buttons/
    buyer - loreto.gabawa.jr.sandbox@gmail.com
    seller - loreto.gabawa.jr.car.rental@gmail.com
  */

  $pickup_date = isset( $_POST[ 'pickup_date' ] ) ? $_POST[ 'pickup_date' ] : date( "Y-m-d" );
  $return_date = isset( $_POST[ 'return_date' ] ) ? $_POST[ 'return_date' ] : date( "Y-m-d" );

  $pickup_time = isset( $_POST[ 'pickup_time' ] ) ? $_POST[ 'pickup_time' ] : "08:00";
  $return_time = isset( $_POST[ 'return_time' ] ) ? $_POST[ 'return_time' ] : "17:00";
  $q = "SELECT * FROM cars WHERE car_id NOT IN (SELECT C.car_id FROM car_trans AS CT RIGHT JOIN cars AS C ON CT.car_id=C.car_id WHERE (CT.pick_up_date BETWEEN '$pickup_date' AND '$return_date' ) OR (CT.return_date BETWEEN '$pickup_date' AND '$return_date'))";  
	$cars = $DB->query( $q );
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Reserve Cars</h1>
          <form method="post">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  Pickup Date: <input class="form-control form-inline" type="date" name="pickup_date" value="<?php echo $pickup_date ?>">
                  Return Date: <input class="form-control form-inline" type="date" name="return_date" value="<?php echo $return_date ?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  Pickup Time: <input class="form-control form-inline" type="time" name="pickup_time" value="08:00">
                  Return Time: <input class="form-control form-inline" type="time" name="return_time" value="17:00">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input class="btn btn-primary btn-xs form-control" type="submit" name="" value="Search">
                </div>
              </div>
            </div>
          </form>

          </div>
      </div>

        <form class="reserve_cars_form" method="post" action="<?php echo SITE_URL ?>/?page=reservation_summary">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <input type="submit" class="btn btn-success btn-xs reserve_cars" value="Reserve Cars"> <span class="message"></span>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="pickup_date" value="<?php echo $pickup_date ?>">
          <input type="hidden" name="return_date" value="<?php echo $return_date ?>">
          <input type="hidden" name="pickup_time" value="<?php echo $pickup_time ?>">
          <input type="hidden" name="return_time" value="<?php echo $return_time ?>">

          <?php if( $cars->num_rows ) : ?>
            <div class="row">
            <?php while( $car = $cars->fetch_object() ) : ?>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <?php echo $car->car_model ?>
                    <div class="clearfix">
                      <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">Price</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php echo CURRENCY . " " . number_format( $car->price ) ?></h3>
                        </div>
                      </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                      <!-- <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth -->
                      <input class="car_items" type="checkbox" name="car_items[]" value="<?php echo $car->car_id ?>"> Select Car
                    </p>                    
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            </div>
          <?php else: ?>
          <?php endif; ?>
          
	        <!-- <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th></th> 
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
                    <input class="car_items" type="checkbox" name="car_items[]" value="<?php echo $car->car_id ?>">
                  </td>
                  <td><?php echo $car->car_model ?></td>
                  <td><?php echo $car->plate_no ?></td>
                  <td><?php echo $car->capacity ?></td>
                  <td><?php echo $car->car_unit ?></td>
                  <td><?php echo $car->car_color ?></td>
                  <td><?php echo $car->car_type ?></td>
                  <td><?php echo $car->car_name ?></td>
                  <td><?php echo CURRENCY . " " . number_format( $car->price ) ?></td>
                  <td><?php echo $car->manufacturer; ?></td>
                  <td><?php echo $car->created ?></td>                  
                </tr>
                <?php endwhile; ?>
              </tbody>
              <?php } else { ?>
            	<tbody>
            		<tr>
            			<td colspan="11">
            				<h3>No cars on the selected dates.</h3>
            			</td>
            		</tr>
            	</tbody>
              <?php } ?>
              
            </table>
          </div> -->
        </form>
	      
	  </div>
	</div>

<?php element( 'footer' ); ?>