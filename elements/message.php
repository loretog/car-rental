<?php if( isset( $_SESSION[ 'MESSAGE' ] ) && !empty( $_SESSION[ 'MESSAGE' ] ) ) { ?>	
	<div class="row">
	  <div class="col-md-12 grid-margin">
	    <div class="card">
	      <div class="card-body">
	        <?php 
	        	echo $_SESSION[ 'MESSAGE' ]; 
	        	unset( $_SESSION[ 'MESSAGE' ] );
	        ?>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>


