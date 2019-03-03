<?php 
	
	$username = $_POST[ 'username' ];
	$password = md5( $_POST[ 'password' ] );	
	$check = $DB->query( "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1" );
	if( $check && $check->num_rows ) {
		$user = $check->fetch_object();
		if( $user->active && $user->active == 1 ) {
			$_SESSION[ AUTH_ID ] = $user->user_id;
			$_SESSION[ AUTH_NAME ] = $user->username;
			$_SESSION[ AUTH_TYPE ] = $user->usertype;
			$_SESSION[ 'last_name' ] = $user->last_name;
			$_SESSION[ 'first_name' ] = $user->first_name;
			$_SESSION[ 'phone_no' ] = $user->phone_no;
			
			$_SESSION[ 'MESSAGE' ] = "Welcome back!";
			redirect();
		} else {
			$_SESSION[ 'MESSAGE' ] = "Need to confirm and activate account. You can ented the activate code <a href='" . SITE_URL . "/?page=activate_account'>here.</a>";
		}		
	} else {
		$_SESSION[ 'MESSAGE' ] = "failed";
	}