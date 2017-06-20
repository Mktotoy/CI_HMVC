<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
ini_set( 'max_execution_time', 0 );

$ip 		= $_SERVER['REMOTE_ADDR']; 
$admin 		= false ; 
if( $ip == "188.165.242.15" ) {
	$admin = true; 
}

if( $admin == true ) {
	$page = 1 ; 
	if( isset($_GET['page']) ) {
		$page = $_GET['page'] ; 
	}

	$argv[1] = "moderationhtml"  ; 
	$argv[2] = $page ; 
	include('cli.php'); 
}

die( "" ) ; 