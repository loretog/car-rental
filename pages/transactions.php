<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php
  $WHERE = ""; 
  if( isset( $_SESSION[ AUTH_TYPE ] ) && $_SESSION[ AUTH_TYPE ] == "customer" ) {
    $WHERE = "WHERE T.user_id=" . $_SESSION[ AUTH_ID ];
  }
	$transactions = $DB->query( "SELECT T.trans_id, T.transaction_no, T.payment_info, T.total_amount, T.created, T.status, U.username, U.first_name, U.last_name FROM transactions AS T LEFT JOIN users AS U ON T.user_id=U.user_id $WHERE ORDER BY T.created DESC" );
  
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
                  <th>Total Amount</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>
                   
                  </th>            
                </tr>
              </thead>
              <?php if( $transactions && $transactions->num_rows ) { ?>
              <tbody>
                <?php while( $transaction = $transactions->fetch_object() ) : ?>
                <tr>
                  <td><?php echo $transaction->first_name . " " . $transaction->last_name ?></td>
                  <td><?php echo strtoupper( $transaction->transaction_no ) ?></td>                  
                  <td><?php echo CURRENCY . " " . number_format( $transaction->total_amount ) ?></td>
                  <td><?php echo $transaction->created ?></td>
                  <td>
                    <?php if( $transaction->status == "pending" ) : ?>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?action=confirm_reservation&id=<?php echo $transaction->trans_id ?>">Confirm</a>
                    <?php else: ?>
                      Verified
                    <?php endif; ?>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL ?>/?page=view_transaction&id=<?php echo $transaction->trans_id ?>">View</a>                    
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