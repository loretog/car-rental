<?php

if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' );

define( 'DBHOST', 'localhost' );
define( 'DBUSER', 'root' );
define( 'DBPASS', '' );
define( 'DBNAME', 'car-rental' );
define( 'CURRENCY', '&#8369;' );

/* 
NOTE:
ONLY SET THESE IF YOU WANT TO ALLOW AUTHENTICATION 
IF NOT THEN JUST COMMENT THEM OUT 
*/

define( 'AUTH_ID', 'userid' );
define( 'AUTH_NAME', 'username' );
define( 'AUTH_TYPE', 'usertype' );

$restricted_pages_admin = [];
$restricted_pages_customer = [ "accounts", "transactions", "cars" ];

$restricted_pages = null;
if( isset( $_SESSION[ AUTH_TYPE ] ) ) {
	$res = "restricted_pages_" . $_SESSION[ AUTH_TYPE ];
	$restricted_pages = $$res;	
} else {
	$restricted_pages = [ "default", "transactions" ];
}
