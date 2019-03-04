<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?php
    $message = "Car Rental. Thank you for your servation, the owner has been notified and we will reply to you mometarily.";
    // SEND EMAIL
    mail( $email, "Car Rental Registration", $message);
    
    // SEND TEXT    
    $result = itexmo( $phone_no, $message, API );
    if ( $result == "" ) {
      $_SESSION[ 'MESSAGE' ] = "iTexMo: No response from server!!!
      Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
      Please CONTACT US for help. ";  
    } else if ($result == 0) {
      $_SESSION[ 'MESSAGE' ] =  "Message Sent!";
    } else { 
      $_SESSION[ 'MESSAGE' ] =  "Error Num ". $result . " was encountered!";
    }
?>

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