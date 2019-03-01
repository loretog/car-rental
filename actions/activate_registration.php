<?php

	$email = $_REQUEST[ 'email' ];
	$code = $_REQUEST[ 'code' ];

	$user = $DB->query( "SELECT * FROM users WHERE email='$email' AND token='$code'" );

	if( $user->num_rows ) {
		if( $DB->query( "UPDATE users SET active=1 WHERE email='$email' AND token='$code'" ) ) {
			set_message( "Account activated, you may login now." );
			redirect( "login" );
		} else {
			set_message( "Something went wrong with the activation. Please try again later." );
			redirect( "activate_account" );
		}
	} else {
		set_message( "Email or Activation code does not match. Please check and enter the correct info." );
		redirect( "activate_account" );
	}

