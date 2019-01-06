<?php

	$car_model = $_POST[ 'car_model' ];
	$plate_no = $_POST[ 'plate_no' ];
	$capacity = $_POST[ 'capacity' ];
	$car_unit = $_POST[ 'car_unit' ];
	$car_color = $_POST[ 'car_color' ];
	$car_type = $_POST[ 'car_type' ];
	$car_name = $_POST[ 'car_name' ];
	$price = $_POST[ 'price' ];
	$manufacturer = $_POST[ 'manufacturer' ];

	if( isset( $_POST[ 'id' ] ) ) {
		$id = $_POST[ 'id' ];
		$DB->query( "UPDATE cars SET car_model='$car_model', plate_no='$plate_no', capacity='$capacity', car_unit='$car_unit', car_color='$car_color', car_type='$car_type', car_name='$car_name', price='$price', manufacturer='$manufacturer' WHERE car_id = $id" );
	} else {
		$DB->query( "INSERT INTO cars (car_model, plate_no, capacity, car_unit, car_color, car_type, car_name, price, manufacturer, created) VALUES( '$car_model', '$plate_no', '$capacity', '$car_unit', '$car_color', '$car_type', '$car_name', '$price', '$manufacturer', NOW() )" );
	}
	redirect( "cars" );