<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php 
	$transactions = $DB->query( "SELECT T.trans_id, T.transaction_no, T.payment_info, T.payment_status, U.username FROM transactions AS T LEFT JOIN users AS U ON T.user_id=U.id" );
  
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Transactions</h1>          
	        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Transaction No.</th>
                  <th>Payment Info</th>
                  <th>Payment Status</th>
                  <th>
                    <a class="btn btn-success btn-xs" href="<?php echo SITE_URL ?>/?page=add_car">New Transactions</a>
                  </th>            
                </tr>
              </thead>
              <?php if( $transactions && $transactions->num_rows ) { ?>
              <tbody>
                <?php while( $transaction = $transactions->fetch_object() ) : ?>
                <tr>
                  <td><?php echo $transaction->username ?></td>
                  <td><?php echo $transaction->transaction_no ?></td>
                  <td><?php echo $transaction->payment_info ?></td>
                  <td><?php echo $transaction->payment_status ?></td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?page=edit_car&id=<?php echo $transaction->trans_id ?>">Edit</a>
                    <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL ?>/?action=delete_car&id=<?php echo $transaction->trans_id ?>">Delete</a>
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