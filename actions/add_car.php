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
	$status = $_POST[ 'status' ];

	$image_name = "car-default.png";
	if( isset( $_FILES["car_image"]["name"] ) ) {
		$target_dir = "assets/images/";
		$image_name = basename($_FILES["car_image"]["name"]);
		$target_file = $target_dir . $image_name;
		if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
	        //set_message( "The file ". basename( $_FILES["car_image"]["name"]). " has been uploaded." );
	    } else {
	        //set_message( "Sorry, there was an error uploading your file." );
	    }
	}

	if( isset( $_POST[ 'id' ] ) ) {
		$id = $_POST[ 'id' ];
		if( $DB->query( "UPDATE cars SET car_model='$car_model', plate_no='$plate_no', capacity='$capacity', car_unit='$car_unit', car_color='$car_color', car_type='$car_type', car_name='$car_name', price='$price', manufacturer='$manufacturer', image='$image_name', status='$status' WHERE car_id = $id" ) ) {
			set_message( "Car updated." );
		} else {
			set_message( $DB->error );
		}
	} else {
		if( $DB->query( "INSERT INTO cars (car_model, plate_no, capacity, car_unit, car_color, car_type, car_name, price, manufacturer, created, image, status) VALUES( '$car_model', '$plate_no', '$capacity', '$car_unit', '$car_color', '$car_type', '$car_name', '$price', '$manufacturer', NOW(), '$image_name', '$status' )" ) ) {
			set_message( "Car Added!" );
		} else {
			set_message( $DB->error );
		}
	}
	
	redirect( "cars" );