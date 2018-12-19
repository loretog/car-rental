<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
	$accounts = $DB->query( "SELECT * FROM users" );
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Account</h1>          
	        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Phone no.</th>
                   <th>Address </th>
                  <th>
                    <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?page=add_car">New Car</a>
                  </th>            
                </tr>
              </thead>
              <?php if( $accounts->num_rows ) { ?>
              <tbody>
                <?php while( $account = $accounts->fetch_object() ) : ?>
                <tr>
                  <td><?php echo $account->username ?></td>
                  <td><?php echo $account->usertype ?></td>
                  <td><?php echo $account->date_created ?></td>
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