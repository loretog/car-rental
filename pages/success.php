<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?php element( 'header' ); ?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body" style="min-height: 600px;">
	        <h1>Reservation Successfully Added</h1>
        		<br><br>
				<h2>Thank you for your reservation!</h2>

				<p>Payment needs to be verified and you will receive an sms text mometarily. Please use Transaction No.: <strong><?php echo $_GET[ 'trans_no' ]; ?></strong> for referrence.</p>

	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>