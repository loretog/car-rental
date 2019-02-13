<?php

	$id = $_GET[ 'id' ];
	$active = $_GET[ 'active' ];

	$DB->query( "UPDATE users SET active=$active WHERE user_id = $id" );

	set_message( "Account is " . ( $active ? 'activated' : 'deactivated' ) );

	redirect( "accounts" );

	exit;