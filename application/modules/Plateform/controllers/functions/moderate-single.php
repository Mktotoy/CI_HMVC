<?php

$videoId = $argv[2] ;

foreach( $database AS $channelId => $channel ) {
	p( "Chaîne d'identifiant $channelId" ) ; 
	foreach( $database[$channelId]['videos'] AS $videoId => $video ) {
		if( $video["videoId"] == $video["videoId"] ) {
			if( $database[$channelId]['videos'][$videoId]['videoState'] == "deleted" ) {
				$database[$channelId]['videos'][$videoId]['videoState'] = "public" ; 
			} else {
				$database[$channelId]['videos'][$videoId]['videoState'] = "deleted" ; 
			}
		}
	}
}

save( $database ) ; 