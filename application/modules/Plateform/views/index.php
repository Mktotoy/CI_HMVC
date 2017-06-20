<?php 
	$ip 		= $_SERVER['REMOTE_ADDR']; 
	$admin 		= false ; 
	if( $ip == "127.0.0.1" ) {
		$admin = true; 
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="https://realitygaming.fr/favicon.ico" />

		<!-- BEGIN - Styles -->
		<!-- Bootstrap -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Bootstrap - Theme (more : https://www.bootstrapcdn.com/bootswatch/) -->
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css" rel="stylesheet" integrity="sha384-D9XILkoivXN+bcvB2kSOowkIvIcBbNdoDQvfBNsxYAIieZbx8/SI4NeUvrRGCpDi" crossorigin="anonymous">
		<!-- FontAwesome icons (doc : https://fontawesome.io/examples/) --> 
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<link href="../../../../../../../Users/m418485/Downloads/learn/learn/style.css" rel="stylesheet"> 

		<!-- / END - Styles -->

		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

		<meta name="robots" CONTENT="index,nofollow" />

		<!-- 		
		<link rel="apple-touch-icon" href=""/>
		<link rel="canonical" href=""/>
		<meta name="description" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content=""/>
		<meta property="og:title" content=""/>
		<meta property="og:description" content=""/>
		<meta property="fb:app_id" content=""/> 
		-->

		<title>Learn by RealityGaming</title>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo">
						<i class="fa fa-lightbulb-o fa-5x"></i> BETA by <a href="https://realitygaming.fr" target="_blank"><img src="https://realitygaming.fr/styles/realitygaming/logo.svg" alt="Learn by RealityGaming" /></a> 
					</div>
				</div>

				<div class="col-md-12">
						<!-- Social Button HTML -->
						<div class="socialShare center">
							<?php 
								$url 		= "http://afr624655.france.ad.airfrance.fr/LearnPlateform" ;
								$title 		= "" ; 
							?>

							<!--
							<a href="http://twitter.com/share?url=<?php echo $url; ?>&text=Apprenez avec YouTube, by @RealityGamingFR " target="_blank" class="share-btn twitter">
							    <i class="fa fa-twitter"></i>
							</a>

							<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" class="share-btn facebook">
							    <i class="fa fa-facebook"></i>
							</a>
							-->

							<!-- BUGS -->
							<a href="https://realitygaming.fr/categories/suggestions-bugs-et-aide-du-forum.372/" target="_blank" class="share-btn facebook">
							    Ceci est une version BETA, signaler un BUG ou proposer des SUGGESTIONS <i class="fa fa-hand"></i> 
							</a>
						</div>
				</div>
				
				<div class="col-md-12">

					<div class="vid">
						<?php 
							/*$categories = "" ;
							if( isset($_GET['categories']) ) {
								$categories = htmlspecialchars(stripslashes($_GET['categories']));
							} else {
								header('Location: /Économie');      
							}

							$argv[1] = "html"  ; 
							$argv[2] = $categories ; 
							include('cli.php'); */
                		?>
            		</div>

				</div>

				<div class="col-md-12">
					<ul class="list-group categoriesList">
						<li><a href="/Économie"><i class="fa fa-usd"></i> Économie</a></li>
						<li><a href="/Mentalisme"><i class="fa fa-user"></i> Mentalisme</a></li>
						<!--<li><a href="/Étonnement"><i class="fa fa-exclamation"></i> Étonnement</a></li>-->
						<li><a href="/Santé"><i class="fa fa-heartbeat"></i> Santé</a></li>
						<li><a href="/Sociologie"><i class="fa fa-users"></i> Sociologie</a></li>
						<li><a href="/Littérature"><i class="fa fa-book"></i> Littérature</a></li>
						<li><a href="/Mathématiques"><i class="fa fa-superscript"></i> Mathématiques</a></li>
						<li><a href="/Cinéma"><i class="fa fa-film"></i> Cinéma</a></li>
						<li><a href="/Langues"><i class="fa fa-language"></i> Langues</a></li>
						<li><a href="/Sexologie"><i class="fa fa-venus-mars"></i> Sexologie</a></li>
						<li><a href="/Musique"><i class="fa fa-music"></i> Musique</a></li>
						<li><a href="/Histoire"><i class="fa fa-history"></i> Histoire</a></li>
						<!--<li><a href="/Psychologie"><i class="fa fa-commenting"></i> Psychologie</a></li>-->
						<!--<li><a href="/Réflexion"><i class="fa fa-bullseye"></i> Réflexion</a></li>-->
						<li><a href="/Culture"><i class="fa fa-question"></i> Culture</a></li>
						<li><a href="/Philosophie"><i class="fa fa-square-o"></i> Philosophie</a></li>
						<!--<li><a href="/Politique"><i class="fa fa-hand-grab-o"></i> Politique</a></li>-->
						<li><a href="/Science"><i class="fa fa-flask"></i> Science</a></li>
						<li><a href="/Droit"><i class="fa fa-balance-scale"></i> Droit</a></li>
					</ul>
				</div>

				<div class="col-md-12">

					<div class="dropdown">
						<?php 
                			
                			/*$argv[1] = "htmldropdown"  ;
							include('cli.php');  */

                		?>
            		</div>

				</div>

				<div class="col-md-12 pagination">
						<div class="counter"></div>

						<button class="paginate left"><i></i><i></i></button>
						<button class="paginate right"><i></i><i></i></button>
				</div>
			</div>
		</div>
		<footer>
			<!-- Jquery -->
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

			<!-- Bootstrap JS -->
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

			<!-- Bootstrap 2 --> 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

			<!-- Your JS -->
			<script type="text/javascript">
			/*!
			 * jQuery Cookie Plugin v1.4.1
			 * https://github.com/carhartl/jquery-cookie
			 *
			 * Copyright 2013 Klaus Hartl
			 * Released under the MIT license
			 */
			!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){function c(a){return h.raw?a:encodeURIComponent(a)}function d(a){return h.raw?a:decodeURIComponent(a)}function e(a){return c(h.json?JSON.stringify(a):String(a))}function f(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(b," ")),h.json?JSON.parse(a):a}catch(a){}}function g(b,c){var d=h.raw?b:f(b);return a.isFunction(c)?c(d):d}var b=/\+/g,h=a.cookie=function(b,f,i){if(void 0!==f&&!a.isFunction(f)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setTime(+k+864e5*j)}return document.cookie=[c(b),"=",e(f),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=b?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;n<o;n++){var p=m[n].split("="),q=d(p.shift()),r=p.join("=");if(b&&b===q){l=g(r,f);break}b||void 0===(r=g(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0!==a.cookie(b)&&(a.cookie(b,"",a.extend({},c,{expires:-1})),!a.cookie(b))}});

				var current_index = 1 ; 

				function showThumbnail( image_index ) {
					console.log( "Affichage de la vidéo d'identifiant : " + image_index ) ; 

					// reset.
					$( '.videoContainer img' ).addClass( 'hide' ) ; 
					$( 'iframe.iframeYoutubeVideo' ).remove(); 
					$( '.vid' ).removeClass( 'looking' ) ; 
					//$( '.ThumbnailYoutube' ).tooltip( 'hide' ) ; 

					// affichage de la thumbnail.
					var image 		= $( '.videoContainer img[data-id="'+image_index+'"]' ) ; 
					image.show(); 
					var imageUrl 	= image.attr( 'data-original' );
					var imageId 	= image.attr( 'data-image-id' );
					image.attr( 'src', imageUrl ) ; 
					image.removeClass( 'hide' ) ;	

					$( '.ThumbnailYoutube' ).tooltip({
						placement: 'top',
						trigger: 'manual'
					}).tooltip( 'show' );

					// on affiche un petit "visionné" si la vidéo a déjà été vue 
					var cookie = $.cookie( 'videosSeen' ) ; 
					console.log( cookie ) ;
					if( typeof cookie != "undefined" ) {
						console.log( cookie.split( ',' ).indexOf(image_index) ) ; 
						console.log( cookie.split( ',' ) );
						console.log( image_index ) ;
						// fonction désactivé
						/*if( cookie.split( ',' ).indexOf(image_index) != -1 ) {
							image.parent().parent().addClass( 'seen' ) ; 
						} else {
							image.parent().parent().removeClass( 'seen' ) ; 
						}*/
					}
				}

				$( document ).ready( function() {
					// on affiche la première thumbnail 
					showThumbnail( 1 ) ; 

					$( '.videoContainer img' ).click( function() {
						var image 			= $(this) ;  
						var imageId 		= image.attr( 'data-video-id' );
						var thumbnailId 	= image.attr( 'data-id' ) ; 
						image.addClass( 'hide' ) ; 
						image.parent().append( '<iframe class="iframeYoutubeVideo" width="480" height="360" src="//www.youtube.com/embed/'+imageId+'?autoplay=1" frameborder="0" allowfullscreen=""></iframe>' ) ; 
						image.parent().parent().addClass( 'looking' ) ; 
						image.hide() ; 

						// on stock un cookie indiquant que cette vidéo a été visionnée.
						var cookie = $.cookie( 'videosSeen' )  ; 
						if( typeof cookie == "undefined" ) {
							$.cookie( 'videosSeen', thumbnailId ) ; 
						} else {
							// on vérifie que la vidéo actuelle n'est pas déjà dans cet array.
							var videosAlreadySeen = cookie.split( ',' ) ; 
							if( videosAlreadySeen.indexOf( thumbnailId ) ) {
								$.cookie( 'videosSeen', cookie + ',' + thumbnailId ) ; 
							} else {
								console.log( "Vidéo "+ thumbnailId +" déjà visionnée" ) ; 
							}
						}
					});

					$( '.paginate.right' ).click( function() {
						current_index = current_index + 1; 
						$( "select" ).val( current_index ).trigger( "change" );
					});

					$( '.paginate.left' ).click( function() {
						current_index = current_index - 1; 
						if( current_index > 0 ) {
							$( "select" ).val( current_index ).trigger( "change" );
						} else {
							current_index = 1; 
						}
					});

					$( 'select' ).select2({ width: '400px' }); 
					$( 'select' ).on( "change", function() {
			          // mostly used event, fired to the original element when the value changes
			          var value		 	= $(this).find( ":checked" ).val();
			          current_index 	= Number( value ) ; 
			          showThumbnail( value ) ; 
			        });
				});
			</script>

			<?php 
				if( $admin ) {
					echo '<script type="text/javascript">' ; 
						echo "$( '.videoContainer img' ).click( function() {
							var image 			= $(this) ;  
							var imageId 		= image.attr( 'data-video-id' ); 
							window.open( 'https://learn.realitygaming.fr/moderation.php?videoId=' + imageId ) ; 
						} ); " ; 
					echo '</script>' ;  
				}
			?>
		</footer>
	</body>
</html>