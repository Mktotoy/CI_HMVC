<?php 

$databaseOrdered = array();

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
ini_set( 'max_execution_time', 0 );


if( php_sapi_name() === 'cli' ) {

	function p( $message ) {
		echo date("d-m-Y h:i:s") . " || " . $message . "\n" ;
	}

	function save( $content = "" ) {
		file_put_contents( 
			"./data.json", 
			json_encode($content) 
		);

		p( "Sauvegarde dans le fichier data.json." ) ; 
	}

}

$data 		= file_get_contents( "./config.json" );
$data 		= json_decode( $data, true );

$database 	= file_get_contents( "./data.json" );
$database 	= json_decode( $database, true ); 

$actions = array(
	"list",
	"import",
	"moderate",
	"empty",
	"moderate-single" ,

	"html",
	"htmldropdown",

	"moderationhtml"
);

if( !isset($argv[1]) ) {
	p ("Veuillez saisir une action à effectuer parmis les suivantes : " ) ; 
	var_dump( $actions ) ; 
	exit( 1 ) ; 
}

$action = $argv[1] ;
if( !in_array($action, $actions) ) {
	p( "Action '".$action."' invalide." ) ;  
	p( "Action autorisées : " ) ;
	var_dump( $actions ) ; 
	exit( 1 ) ; 
}

include( "functions/" . $action . ".php" ) ; 
