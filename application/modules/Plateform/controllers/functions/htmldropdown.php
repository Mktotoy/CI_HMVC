<?php 

include('./lib/databaseOrdered.php'); 

// enfin, on affiche
$i = 0 ; 
echo '<select name="choixVideo">' ; 
	foreach( $databaseOrdered AS $videoId => $video ) {
		$i++;
			echo '<option value="'.$i.'">' ; 
				echo $video['videoTitle'] . " (".$video['channel']['name'].")" ; 
			echo '</option>' ;
	}
echo '</select>' ; 