<?php 

	$id = $_GET[ 'id' ];
	$DB->query( "DELETE FROM cars WHERE id = $id" );
	redirect( "cars" );