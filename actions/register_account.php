<?php  
  
  $username = $_POST[ 'username' ];
  $password = md5( $_POST[ 'password' ] );
  $email = $_POST[ 'email' ];
  $first_name = $_POST[ 'first_name' ];
  $middle_name = $_POST[ 'middle_name' ];
  $last_name = $_POST[ 'last_name' ];
  $phone_no = $_POST[ 'phone_no' ];
  $address = $_POST[ 'address' ]; 
  $usertype = isset( $_POST[ 'usertype' ] ) ? $_POST[ 'usertype' ] : 'customer';
  $token = generate_code();
  $redirect = isset( $_REQUEST[ "redirect" ] ) ? $_REQUEST[ "redirect" ] : 'accounts';


  $success = $DB->query( "INSERT INTO users (username, password, email, first_name, middle_name, last_name, phone_no, address, usertype, date_created, token ) VALUES( '$username', '$password', '$email', '$first_name', '$middle_name', '$last_name', '$phone_no', '$address', '$usertype', NOW(), '$token ' )" );
  
  if( $success ) {

    $message = "Car Rental. Thank you for your registration $first_name $last_name. \nTo activate your account, please follow this link: " . SITE_URL . "/?action=activate_registration&email=$email&code=" . $token;
    // SEND EMAIL

    mail( $email, "Car Rental Registration", $message);
    // SEND TEXT
    $message = "Car Rental.\nThank you for your registration. \nTo activate your account, please enter this code: $token.";
    $result = itexmo( $phone_no, $message, API );
    if ( $result == "" ) {
      $_SESSION[ 'MESSAGE' ] = "iTexMo: No response from server!!!
      Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
      Please CONTACT US for help. ";  
    } else if ($result == 0) {
      $_SESSION[ 'MESSAGE' ] =  "Message Sent!";
    } else { 
      $_SESSION[ 'MESSAGE' ] =  "Error Num ". $result . " was encountered!";
    }

    redirect( "activate_account" );
  } else {
    set_message( "Something went wrong. Please try again." );
  }