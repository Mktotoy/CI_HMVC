<?php 

foreach( $database AS $channelId => $channel ) {
	p( "Chaîne d'identifiant $channelId" ) ; 
	foreach( $database[$channelId]['videos'] AS $video ) {
		$state = "N.C" ; 
		if( !empty($video['videoState']) ) {
			$state = $video['videoState'] ; 
		}
		
		p( "		> Vidéo d'identifiant ".$video['videoId']." [".$state."] (".$video['videoTitle'].")." ) ;
	}
}