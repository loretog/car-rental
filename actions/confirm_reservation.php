<?php
	
	$id = $_GET[ 'id' ];

	if( $DB->query( "UPDATE transactions SET status = 'verified' WHERE trans_id=$id" ) ) {		
	    $message = "Car Rental. We have verified your reservation, please come on time for the pick up date.";
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
	}
	redirect( "transactions" );