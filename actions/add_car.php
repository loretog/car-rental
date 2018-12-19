<?php

	$model_name = $_POST[ 'model_name' ];
	$plate_number = $_POST[ 'plate_number' ];

	if( isset( $_POST[ 'id' ] ) ) {
		$id = $_POST[ 'id' ];
		$DB->query( "UPDATE cars SET model_name='$model_name', plate_number='$plate_number' WHERE id = $id" );
	} else {
		$DB->query( "INSERT INTO cars (model_name, plate_number, created) VALUES( '$model_name', '$plate_number', NOW() )" );
	}
	redirect( "cars" );