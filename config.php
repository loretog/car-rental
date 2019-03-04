<?php

if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' );

define( 'DBHOST', 'localhost' );
define( 'DBUSER', 'root' );
define( 'DBPASS', '' );
define( 'DBNAME', 'car-rental' );
define( 'CURRENCY', '&#8369;' );
define( "API", "TR-ABEGA316590_3WAAN" );

/*
NOTE:
ONLY SET THESE IF YOU WANT TO ALLOW AUTHENTICATION
IF NOT THEN JUST COMMENT THEM OUT
*/

define( 'AUTH_ID', 'userid' );
define( 'AUTH_NAME', 'username' );
define( 'AUTH_TYPE', 'usertype' );

$restricted_pages_admin = [];
$restricted_pages_customer = [ "cars", "add_car", "edit_car" ];
$restricted_pages = [ "default", "transactions", "accounts", "cars", "add_car", "edit_car", "reserve_cars", "reservation_summary" ];
$menu_pages_admin = [ "dashboard", "accounts", "cars", "reserve cars", "transactions", "logout" ];
$menu_pages_customer = [ "accounts", "reserver_cars", "transactions" ];

if( isset( $_SESSION[ AUTH_TYPE ] ) ) {
	$res = "restricted_pages_" . $_SESSION[ AUTH_TYPE ];
	$restricted_pages = $$res;
}
