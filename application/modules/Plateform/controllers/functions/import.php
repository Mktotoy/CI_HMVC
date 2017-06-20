<?php

$apiKey = "AIzaSyAQhy_liXyD9XFA8YGJ9kTbml5QbmJEzok" ;

$done = array();

foreach( $data['channels'] AS $channelName => $channel ) {
	$channelId = $channel['id']; 

	// 1 : get playlist id
	$url 			= "https://www.googleapis.com/youtube/v3/channels?key={$apiKey}&id={$channelId}&part=contentDetails" ; 
	$response 		= file_get_contents( $url );
	$searchResponse = json_decode($response,true);
	$d 				= $searchResponse['items'];
	if( !isset($d[0]) ) {
		die( "Erreur : chaîne '". $channelId."' introuvable..." ) ; 
	}
	if( in_array($channelId, $done) ) {
		die( "$channelId déjà traité... Il doit y avoir un doublon dans le fichier de configuration..." ) ; 
	}
	array_push($done, $channelId);
 	$pid 			= $d[0]['contentDetails']['relatedPlaylists']['uploads'];

 	p( "Traitement de la chaîne d'identifiant " . $channelId ) ; 

	// 2 : get all videos in playlist
 	$nextPageToken 		= '';
	$end 				= false ; 
	while( !is_null($nextPageToken) ) {
		if( $end == true ) {
			p( "Fin pour cette utilisateur..." ) ; 
			break ; 
		}

		$url 			= "https://www.googleapis.com/youtube/v3/playlistItems?key={$apiKey}&order=date&playlistId={$pid}&part=snippet&maxResults=50&pageToken=$nextPageToken";
		p( "	> URL de la requête : " . $url );
		$response 		= file_get_contents( $url );
		$videos 		= json_decode( $response, true );
		if( isset($videos['nextPageToken']) ) {
			$nextPageToken = $videos['nextPageToken'];
		} else {
			$end = true ; 
		}

		foreach( $videos['items'] AS $video ) {
			$videoId 				= $video['id']; 
			$videoDate				= strtotime($video['snippet']['publishedAt']); 
			$videoTitle				= $video['snippet']['title']; 
			$videoDescription 		= $video['snippet']['description']; 
			$videoRessourceId 		= $video['snippet']['resourceId']['videoId'];
			
			$message = "	Traitement de la vidéo " . $videoId . " en date du " . $videoDate ; 

			// si c'est une nouvelle entrée 
			if( !isset($database[$channelId]['videos'][$videoId]) ) {
				
				// on ajoute notre nouvelle entrée. 
				$database[$channelId]['videos'][$videoId] = array(
					'videoId' 				=> $videoId, 
					'videoDate'				=> $videoDate, 
					'videoTitle'			=> $videoTitle, 
					'videoDescription' 		=> $videoDescription, 
					'videoRessourceId'		=> $videoRessourceId, 
					'videoState'			=> 'public',
					'channelId'				=> $channel['id'] 
				); 

				$database[$channelId]['lastUpdate'] = $videoDate ; 
				$message .= " (NOUVELLE !)" ; 
			} else {
				$message .= " (déjà ajoutée)" ; 
			}

			p( $message );  

			if( !isset($database[$channelId]['lastUpdate']) ) {
				$database[$channelId]['lastUpdate'] = 0 ;  
			}

			// si la date de cette vidéo est plus vieille que la dernière vidéo ajoutée, c'est qu'il n'y a plus rien à faire.
			if( $videoDate < $database[$channelId]['lastUpdate'] || $database[$channelId]['lastUpdate'] == 0 ) {
				p( " > FIN. La date de cette vidéo est plus vieille que la dernière ajoutée à nos données." ); 
				$end = true ; 
				break ; 
			} else {
				p( $videoDate . " < " . $database[$channelId]['lastUpdate'] ) ; 
				$database[$channelId]['lastUpdate'] = $videoDate ; 
			}

			p( " " ) ;
			p( " " ) ;
		}
	}
}

save( $database ) ; 