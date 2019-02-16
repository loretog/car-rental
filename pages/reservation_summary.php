<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>
<?php element( 'header' ); ?>

<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <h1>Reservation Summary</h1>
          <div class="col-md-5">
            <h3>Reservation Summary:</h3>
            <p>Total Days: <span class="reservation-summary-total-days"></span></p>
            <p>Total Amount: <span class="reservation-summary-total-amount"></span></p>
          </div>
          <?php var_dump($_POST) ?>
	      </div>
	    </div>
	  </div>
	</div>

<?php element( 'footer' ); ?>