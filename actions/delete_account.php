<?php 

	$id = $_GET[ 'id' ];
	$DB->query( "DELETE FROM users WHERE user_id = $id" );
	redirect( "accounts" );