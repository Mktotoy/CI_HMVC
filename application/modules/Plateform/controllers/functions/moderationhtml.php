<?php 

function save( $content = "" ) {
	file_put_contents( 
		"./data.json", 
		json_encode($content) 
	);
}

if( isset($_POST['action']) ) {
	$videoId 	= $_POST['videoId'] ; 
	$action 	= $_POST['action'] ; 

	foreach( $database AS $channelId => &$channel ) {
		foreach( $database[$channelId]['videos'] AS &$video ) {
			if( $video['videoId'] == $videoId ) {
				$video['videoUpdated'] 	= time(); 
				$video['videoState'] 	= $action  ;

				if( isset($_POST['categories']) ) {
					$video['videoCategories'] = ($_POST['categories']);
				}
			}
		}
	}
}

save( $database ) ;

// categories 
$channels = array();
foreach( $data['channels'] AS $channelName => $channel ) {
	$channelId = $channel['id'] ; 

	$channels[$channelId] 			= $channel ; 
	$channels[$channelId]['name'] 	= $channelName ;
} 
$categories = array();
foreach( $channels AS $channel ) {
	foreach( $channel['type'] AS $category ) {
		if( !in_array($category, $categories)) {
			array_push($categories, $category);
		}
	}
}

function show_dropdown( $categories = array(), $selectedCategories = "" ) {
	$dropdown = "<select name='categories'>" ; 
	foreach( $categories AS $cat ) {
		$selected = "" ;
		if( $categories ) {
			if( $cat == $selectedCategories ) {
				$selected = ' selected="selected" ' ; 
			}
		}
		$dropdown .= '<option '.$selected.' value="'.$cat.'">'.$cat.'</option>' ;
	}
	$dropdown .= '</select>' ; 

	return $dropdown;
}

// dans un premier temps, on ordonne les vidéos dans un tableau dont l'index est le timestamp : 
foreach( $database AS $channelId => $channel ) {
	foreach( $database[$channelId]['videos'] AS $key => &$video ) {
		$video['videoChannelId'] 				= $channelId ; 
		$databaseOrdered[ $video['videoDate'] ] = $video ; 
	}
}

// tri multisort PHP (https://secure.php.net/manual/fr/function.array-multisort.php)
krsort( $databaseOrdered ) ; 

// enfin, on affiche
$i = 0 ; 
echo '<table name="choixVideo">' ; 
	foreach( $databaseOrdered AS $videoId => $video ) {
		$i++;
		echo '<tr>' ;
			echo '<td class="'.$i.'">' ; 
				echo $video['videoTitle'];
				echo ' <a target="_blank" href="https://youtu.be/'.$video['videoRessourceId'].'">Lien</a>' ;  
			echo '</td>' ;

			echo '<td>' ;
				echo $video['videoState'] ; 
			echo '</td>' ; 

			$lastUpdate = 0 ; 
			echo '<td>' ;
				if( isset($video['videoUpdated']) ) {
					$lastUpdate = $video['videoUpdated']; 
				}
				echo $lastUpdate ; 
			echo '</td>' ; 

			echo '<td>' ;
				echo '<form method="post">' ;
					echo '<input type="hidden" name="videoId" value="'.$video["videoId"].'" />' ;
					echo '<input type="submit" name="action" value="public" />' ; 
					echo '<input type="submit" name="action" value="moderated" />' ; 
					$selectedCategories = "" ;
					if( isset($video['videoCategories']) ) {
						$selectedCategories = ($video['videoCategories']) ;
					}
					echo show_dropdown( $categories, $selectedCategories );
				echo '</form>' ;  
			echo '</td>' ; 
		echo '</tr>' ; 
	}
echo '</table>' ; 

echo '<h1>Total vidés : ' . $i . '</h1>' ; 