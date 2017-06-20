<?php 

/********************
 * Tri par date     *
 ********************/

// petit ré-arrangement des noms des channels.
$channels = array();

foreach( $data['channels'] AS $channelName => $channel ) {
	$channelId = $channel['id'] ; 

	$channels[$channelId] 			= $channel ; 
	$channels[$channelId]['name'] 	= $channelName ;
}

// dans un premier temps, on ordonne les vidéos dans un tableau dont l'index est le timestamp : 
foreach( $database AS $channelId => $channel ) {
	foreach( $database[$channelId]['videos'] AS $key => &$video ) {
		if( isset($channels[$channelId]) && isset($channels[$channelId]['type'][0]) && ($channels[$channelId]['type'][0] == $categories) ) {	// on vérifie que la vidéo est dans les vidéos filtrées.
			$video['channel'] 						= $channels[$channelId];  
			$video['videoChannelId'] 				= $channelId ; 
			$databaseOrdered[ $video['videoDate'] ] = $video ; 
		}
	}
}

// tri multisort PHP (https://secure.php.net/manual/fr/function.array-multisort.php)
krsort( $databaseOrdered ) ; 