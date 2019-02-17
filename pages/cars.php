<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
	$cars = $DB->query( "SELECT * FROM cars" );
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Cars</h1>          
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
                  <td><?php echo CURRENCY . " " . number_format( $car->price ) ?></td>
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