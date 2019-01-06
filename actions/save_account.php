<?php

	$username = $_POST[ 'username' ];
	$password = md5( $_POST[ 'password' ] );
	$email = $_POST[ 'email' ];
	$first_name = $_POST[ 'first_name' ];
	$middle_name = $_POST[ 'middle_name' ];
	$last_name = $_POST[ 'last_name' ];
	$phone_no = $_POST[ 'phone_no' ];
	$address = $_POST[ 'address' ];	
	$usertype = $_POST[ 'usertype' ];

	if( isset( $_POST[ 'user_id' ] ) ) {
		$id = $_POST[ 'user_id' ];
		$DB->query( "UPDATE users SET username='$username', password='$password', email='$email', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', phone_no='$phone_no', address='$address', usertype='$usertype' WHERE user_id = $id" );
	} else {
		$DB->query( "INSERT INTO users (username, password, email, first_name, middle_name, last_name, phone_no, address, usertype, date_created ) VALUES( '$username', '$password', '$email', '$first_name', '$middle_name', '$last_name', '$phone_no', '$address', '$usertype', NOW() )" );
	}
	redirect( "accounts" );