<?php 
	
	$username = $_POST[ 'username' ];
	$password = md5( $_POST[ 'password' ] );	
	$check = $DB->query( "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1" );
	if( $check->num_rows ) {
		$user = $check->fetch_object();
		$_SESSION[ AUTH_ID ] = $user->id;
		$_SESSION[ AUTH_NAME ] = $user->username;
		$_SESSION[ AUTH_TYPE ] = $user->usertype;
		
		$_SESSION[ 'MESSAGE' ] = "Welcome back!";
		redirect();
	} else {
		$_SESSION[ 'MESSAGE' ] = "failed";
	}