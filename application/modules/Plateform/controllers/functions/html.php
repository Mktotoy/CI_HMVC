<?php 

$categories = "" ;
if( isset($argv[2]) ) {
	$categories = $argv[2] ; 
} 

include('./lib/databaseOrdered.php');

// enfin, on affiche
$i = 0 ; 
foreach( $databaseOrdered AS $videoId => $video ) {
		if( /*$video['videoState'] == "public"*/ true ) {
			$i++;

			echo '<span class="videoContainer">'; 
				echo '<img title="'.$video['videoTitle'].' par '.$video['channel']['name'].'" class="lazy hide ThumbnailYoutube" data-id="'.$i.'" data-original="//img.youtube.com/vi/'.$video['videoRessourceId'].'/mqdefault.jpg" alt="Miniature de la vidéo '.$video['videoTitle'].'" data-video-id="'.$video['videoRessourceId'].'" />' ; 
	

			echo '</span>' ; 
		} else {
			// echo $video['videoState'] ; 
		}
}