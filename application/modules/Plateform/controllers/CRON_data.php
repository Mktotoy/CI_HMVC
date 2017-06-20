<?php

/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 05/12/2016
 * Time: 23:02
 */
class CRON_data extends MX_Controller
{
    
    private $done;

    private $data;
    private $database;
    private $videos;
    private $nextPageToken;

    private $key;

    function __construct()
    {
        //$this->is_logged_in();
       // $this->load->library('Google_oauth');
        //$params['apikey'] = $this->config->item('youtube_api_key');
        //$this->load->library('youtube', $params);
        //$this->load->helper('oauth_helper');
        $this->template->set_theme("gentelella");

        $this->key ='AIzaSyAQhy_liXyD9XFA8YGJ9kTbml5QbmJEzok';
        
        $this->done = array();

        $this->data 		= file_get_contents( base_url()."data/config.json" );
        $this->data 		= json_decode( $this->data, true );

        $this->database 	= file_get_contents( base_url()."data/data.json" );
        $this->database 	= json_decode( $this->database, true );

        set_time_limit (300);

        $this->load->model('admin/Channel_model','Channel_model');
        $this->load->model('admin/Videos_model','Videos_model');
    }

    function import(){

        $this->data['channels'] = $this->Channel_model->get_all_array();
        //print_r($this->data['channels']);
        foreach( $this->data['channels'] AS $channel ) {
            //$DBchannelId = $channel['channelID'];
            $channelId = $channel['channelID'];

            $url 			= "https://www.googleapis.com/youtube/v3/channels?key={$this->key}&id={$channelId}&part=contentDetails,snippet" ;
            $response 		= file_get_contents( $url );
            $searchResponse = json_decode($response,true);
            $d              = $searchResponse['items'];


            //print_r($d[0]);echo "<br>";

            if(!isset($d[0]))
                die( "Erreur : chaîne '". $channelId."' introuvable..." );
            if( in_array($channelId, $this->done) )
                die( "$channelId déjà traité... Il doit y avoir un doublon dans le fichier de configuration..." ) ;

            array_push($this->done, $channelId);
            //  "Traitement de la chaîne d'identifiant " . $channelId;
            $pid =$d[0]['contentDetails']['relatedPlaylists']['uploads'];
            $channelName =$d[0]['snippet']['title'];
            $channelthumb =$d[0]['snippet']['thumbnails']['high']['url'];
            //echo $channelId." ".$pid." ".$channelthumb."<br>";

            $channelinsert = array(
                'channelID' =>$channelId,
                'channelName' =>$channelName,
                'channelLastUpdate' => 0,
                'channelThumbnail' => $channelthumb,
            );
            $this->Channel_model->update(array('channelId'=>$channelId), $channelinsert);

            if($pid){
                $this->nextPageToken= '';
                $end = false ;
                $lastupdatetmp =0;
                while( !is_null($this->nextPageToken) ) {
                    if ($end == true) {
                        //"Fin pour cette utilisateur..."
                        break;
                    }
                    $url = "https://www.googleapis.com/youtube/v3/playlistItems?key={$this->key}&order=date&playlistId={$pid}&part=snippet&maxResults=50&pageToken={$this->nextPageToken}";
                    $response = file_get_contents( $url );
                    $this->videos = json_decode( $response, true );
                    if(isset($videos['nextPageToken']))
                        $this->nextPageToken = $videos['nextPageToken'];
                    else
                        $end = true ;
                    //print_r($d[0]['id']);echo "<br>";

                    $lastupdatetmp =0;

                    foreach( $this->videos['items'] AS $video ) {

                        $videoId 				= $video['id'];
                        $videoDate				= strtotime($video['snippet']['publishedAt']);
                        $videoTitle				= $video['snippet']['title'];
                        $videoRessourceId 		= $video['snippet']['resourceId']['videoId'];
                        $videoThumbnail         = $video['snippet']['thumbnails']['high']['url'];

                        // si c'est une nouvelle entrée
                        $ret = $this->Videos_model->get_by_cols_array(array('channelID' => $channelId,'videoId' => $videoId));

                        if((!$ret)){
                            // on ajoute notre nouvelle entrée.
                            $video_data = array(
                                'videoId' => $videoId,
                                'videoDate' => $videoDate,
                                'videoTitle' =>$videoTitle,
                                'videoRessourceId' => $videoRessourceId,
                                'videoState' => 'public',
                                'channelID' => $d[0]['id'],
                                'videoThumbnail' => $videoThumbnail,
                            );
                            //$array_data = array("videos" => $video_data);
                            $this->Videos_model->insert($video_data);
                        }
                        $lastupdatetmp = ($lastupdatetmp>$videoDate?$lastupdatetmp:$videoDate);

                    }
                    $channelinsert = array(
                        'channelLastUpdate' => $lastupdatetmp
                    );
                    $this->Channel_model->update(array('channelId'=>$channelId), $channelinsert);
                }

            }            
        } 
    }


}