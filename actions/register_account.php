<?php

 function generate_code() {
    $string = '';
    $random_string_length = 5;
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $random_string_length; $i++) {
      $string .= $characters[ mt_rand(0, $max) ];
    }
    return $string;
  }

  //##########################################################################
  // ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
  // Visit www.itexmo.com/developers.php for more info about this API
  //##########################################################################
  $api    = "TR-ABEGA316590_3WAAN";
  function itexmo($number,$message,$apicode){
    $url = 'https://www.itexmo.com/php_api/api.php';    
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
      ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
  }
  //##########################################################################

  $username = $_POST[ 'username' ];
  $password = md5( $_POST[ 'password' ] );
  $email = $_POST[ 'email' ];
  $first_name = $_POST[ 'first_name' ];
  $middle_name = $_POST[ 'middle_name' ];
  $last_name = $_POST[ 'last_name' ];
  $phone_no = $_POST[ 'phone_no' ];
  $address = $_POST[ 'address' ]; 
  $usertype = isset( $_POST[ 'usertype' ] ) ? $_POST[ 'usertype' ] : 'customer';
  $redirect = isset( $_REQUEST[ "redirect" ] ) ? $_REQUEST[ "redirect" ] : 'accounts';


  if( $DB->query( "INSERT INTO users (username, password, email, first_name, middle_name, last_name, phone_no, address, usertype, date_created ) VALUES( '$username', '$password', '$email', '$first_name', '$middle_name', '$last_name', '$phone_no', '$address', '$usertype', NOW() )" ) ) {
    $code = generate_code();
    $message = "Car Rental.\nThank you for your registration. \nTo activate your account, please follow this link: <a href='" . SITE_URL . "/?page=activate_account&code=" . md5( $code ) . "'>" . SITE_URL . "/?page=activate_account&code=" . md5( $code ) . "</a>";

    $result = itexmo( $phone_no, $message, $api );
    if ( $result == "" ) {
      echo "iTexMo: No response from server!!!
      Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
      Please CONTACT US for help. ";  
    } else if ($result == 0) {
      echo "Message Sent!";
    } else { 
      echo "Error Num ". $result . " was encountered!";
    }
  }