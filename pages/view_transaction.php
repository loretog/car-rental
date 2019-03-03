<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<?php
	$id = $_GET[ 'id' ];

	$transactions = $DB->query( "SELECT T.trans_id, T.transaction_no, T.payment_info, T.total_amount, T.created, U.username, U.first_name, U.last_name FROM transactions AS T LEFT JOIN users AS U ON T.user_id=U.user_id WHERE T.trans_id=$id ORDER BY T.created DESC" );
	
?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Transaction</h1>          
	        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Transaction No.</th>                  
                  <th>Total Amount</th>
                  <th>Created</th>
                  <th>
                   Payment Info
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
                    <?php 
                    	$info = json_decode( $transaction->payment_info );
                    	var_dump($info['payer_email']);
                    	//var_dump((object)$transaction->payment_info);

                    	/*$jsonIterator = new RecursiveIteratorIterator(
									    new RecursiveArrayIterator(json_decode($transaction->payment_info, TRUE)),
									    RecursiveIteratorIterator::SELF_FIRST);

									foreach ($jsonIterator as $key => $val) {
									    if(is_array($val)) {
									        echo "$key:\n";
									    } else {
									        echo "$key => $val\n";
									    }
									}*/						
                	?>
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
          	<?php
          		$car_trans = $DB->query( "SELECT * FROM car_trans AS CT LEFT JOIN cars AS C ON CT.car_id=C.car_id WHERE CT.trans_id = $id" );
          	?>
          	<hr>
          	<h2>Cars Rented</h2>
          	<div class="table-responsive">
	            <table class="table table-hover">
	              <thead>
	                <tr>
	                  <th>Car</th>
	                  <th>Pickup</th>                  
	                  <th>Return</th>
	                  <th>Price</th>	                             
	                </tr>
	              </thead>
	              <?php if( $car_trans->num_rows ) : ?>
	              <tbody>
              		<?php while( $car_tran = $car_trans->fetch_object() ) : ?>
              			<tr>
              				<td><?php echo $car_tran->car_model ?></td>
			              	<td><?php echo $car_tran->pick_up_date . " " . $car_tran->pick_up_time ?></td>
			              	<td><?php echo $car_tran->return_date . " " . $car_tran->return_time ?></td>
			              	<td><?php echo CURRENCY . " " . $car_tran->total_price ?></td>
              			</tr>	              	
	              	<?php endwhile; ?>
				  </tbody>
          		  <?php endif; ?>
	          	</table>
	          	<hr>
	          	<a href="<?php echo SITE_URL ?>/?page=transactions"></a>
      		</div>
	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>