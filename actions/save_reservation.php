<?php

$transaction_no = date( "Y" ) . "-" . substr(md5( strtotime( "now" ) ), 0, 8 );
$payment_info = json_encode($_POST);
$status = "pending";
$total_amount = $_POST[ 'payment_gross' ];
$q = "INSERT INTO transactions (transaction_no, user_id, payment_info, total_amount, status) VALUES( '$transaction_no', {$_SESSION['userid']}, '$payment_info', $total_amount, '$status' )";
$custom = json_decode( $_POST[ 'custom' ] );


$cars = $custom->cars;
$pickup_date = $custom->pickup_date;
$return_date = $custom->return_date;
$pickup_time = $custom->pickup_time;
$return_time = $custom->return_time;

if( $DB->query( $q ) ) {
	$trans_id = $DB->insert_id;
	foreach( $cars as $car ) {
		$DB->query( "INSERT INTO car_trans (trans_id, car_id, pick_up_date, pick_up_time, return_date, return_time, total_price ) VALUES($trans_id, {$car[0]}, '$pickup_date', '$pickup_time', '$return_date', '$return_time', {$car[1]} )" );
	}
	
	redirect( "success&trans_no=$transaction_no" );
} else {
	redirect( "reserve_cars" );
}

exit;