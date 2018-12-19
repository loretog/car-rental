<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
	$cars = $DB->query( "SELECT * FROM cars" );
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Reservations</h1>          
	        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Transactions</th>
                  <th>Payment Type</th>
                  <th>
                    <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?page=add_car">New Transactions</a>
                  </th>            
                </tr>
              </thead>
              <?php if( $cars->num_rows ) { ?>
              <tbody>
                <?php while( $car = $cars->fetch_object() ) : ?>
                <tr>
                  <td><?php echo $car->model_name ?></td>
                  <td><?php echo $car->plate_number ?></td>
                  <td><?php echo $car->created ?></td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?page=edit_car&id=<?php echo $car->id ?>">Edit</a>
                    <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL ?>/?action=delete_car&id=<?php echo $car->id ?>">Delete</a>
                  </td>
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