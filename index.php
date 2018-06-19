<?php
//start session
session_start();

//debug
error_reporting(E_ALL);

		
// - taxiRent v1.0618 -
define( 'taxiRent_APP_VERSION', "1.2.0618" );

//config
define( 'taxiRent_URL', 'https://taxirent-chrisscholes.c9users.io' . '/' );
define( 'taxiRent_APP_URL', taxiRent_URL . 'app/' );
define( 'taxiRent_PUBLIC_URL', taxiRent_URL . 'public/' );
define( 'taxiRent_PUBLIC_CSS_URL', taxiRent_URL . 'public/css/' );
define( 'taxiRent_PUBLIC_JS_URL', taxiRent_URL . 'public/js/' );
define( 'taxiRent_DIR', dirname(__FILE__) );
define( 'taxiRent_APP_DIR', dirname(__FILE__) . '/app/' );
define( 'taxiRent_PUBLIC_DIR', dirname(__FILE__) . '/public/' );

//include class
require_once( taxiRent_APP_DIR . 'taxiRent.php' );

//run class
$taxiRent = new taxiRent;

