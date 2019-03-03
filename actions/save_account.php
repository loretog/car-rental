<?php

	$username = $_POST[ 'username' ];
	$password = isset( $_POST[ 'password' ] ) && !empty( $_POST[ 'password' ] ) ? md5( $_POST[ 'password' ] ) : null;
	$email = $_POST[ 'email' ];
	$first_name = $_POST[ 'first_name' ];
	$middle_name = $_POST[ 'middle_name' ];
	$last_name = $_POST[ 'last_name' ];
	$phone_no = $_POST[ 'phone_no' ];
	$address = $_POST[ 'address' ];	
	$usertype = isset( $_POST[ 'usertype' ] ) ? $_POST[ 'usertype' ] : 'customer';
	$redirect = isset( $_REQUEST[ "redirect" ] ) ? $_REQUEST[ "redirect" ] : 'accounts';

	if( isset( $_POST[ 'user_id' ] ) ) {
		$set = [];
		$id = $_POST[ 'user_id' ];
		unset( $_POST[ 'user_id' ] );
		unset( $_POST[ 'action' ] );
		foreach( $_POST as $index => $value ) {
			if( isset( $value ) && !empty( $value ) ) {
				$set[] = "$index='$value'";
			}
		}

		/*$DB->query( "UPDATE users SET username='$username', password='$password', email='$email', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', phone_no='$phone_no', address='$address', usertype='$usertype' WHERE user_id = $id" );*/
		//echo "UPDATE users SET " . implode( ',', $set ) . " WHERE user_id = $id"; exit;
		$DB->query( "UPDATE users SET " . implode( ',', $set ) . " WHERE user_id = $id" );
		set_message( "Account Updated." );
	} else {		
		$DB->query( "INSERT INTO users (username, password, email, first_name, middle_name, last_name, phone_no, address, usertype, date_created ) VALUES( '$username', '$password', '$email', '$first_name', '$middle_name', '$last_name', '$phone_no', '$address', '$usertype', NOW() )" );
	}
	redirect( $redirect );