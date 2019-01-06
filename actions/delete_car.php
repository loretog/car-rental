<?php 

	$id = $_GET[ 'id' ];
	$DB->query( "DELETE FROM cars WHERE car_id = $id" );
	redirect( "cars" );