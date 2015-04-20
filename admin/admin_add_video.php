<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

GetVideoDetails($_REQUEST['txtYouTubeVideoId']);
function GetVideoDetails($videoId){
global $settings;

$url = "http://gdata.youtube.com/feeds/api/videos/$videoId?v=2&alt=json";
	// Use Php Curl extentions to fetch Remote data
	$ch = curl_init($url); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  

	$output = curl_exec($ch); 
	curl_close($ch);  

	// Use Php fopen
	//$result=file_get_contents($url)
	$result 				= json_decode($output, true); //adding true, objects is converted to array 
	$v['title']				= $result['entry']['title']['$t'];
	$v['description']		= $result['entry']['media$group']['media$description']['$t'];
	$v['authorName']		= $result['entry']['author'][0]['name']['$t'];
	$v['authorAtomUri']		= $result['entry']['author'][0]['uri']['$t'];
	$v['viewCount'] 		= $result['entry']['yt$statistics']['viewCount']; //view count
	$v['favoriteCount'] 	= $result['entry']['yt$statistics']['favoriteCount']; //Favourite
	$v['dislikes'] 			= $result['entry']['yt$rating']['numDislikes']; //dislikes
	$v['likes'] 			= $result['entry']['yt$rating']['numLikes']; //likes
	$v['recorded']			= $result['entry']['yt$recorded'];
	$v['length']			= gmdate("H:i:s", $result['entry']['media$group']['yt$duration']['seconds']);
	$v['googleRatingAvg']	= $result['entry']['gd$rating']['average'];
	$v['googleRatingMax']	= $result['entry']['gd$rating']['max'];
	$v['googleRatingMin']	= $result['entry']['gd$rating']['min'];
	$v['commentUrl']		= $result['entry']['gd$comments']['gd$feedLink']['href'];
	$v['published']			= $result['entry']['published']['$t'];
	$v['PublishedFormated']	= date("d-M-Y",strtotime($v['published']));

	$comments			=	file_get_contents($result['entry']['gd$comments']['gd$feedLink']['href']);
	$aryTag				= str_replace(" ", ", ",$v['description'])  ;
	switch($settings['youtube_thumbnail']['size']){
	 case 'm':
		    $thumb_name="mqdefault.jpg";
		    break;
	 case 'h':
		    $thumb_name="hqdefault.jpg";
		    break;
	 case 'l':
		    $thumb_name="default.jpg";
		    break;
	}

/*-------------*/
$content_file=dirname( __FILE__ ).'/admin_add_video_layout.php';
include($content_file);
}
/*--------------------------*/
function parseXml($url){
global $settings;
if($settings['new_video']['add_comment']!="y"){
	echo "<h4><span class='label label-warning'>Importing Comments is off</span></h4><hr />";
}

$xml = simplexml_load_file($url); 
$nCounter=0;
	foreach($xml->entry as $entry){
    	//echo "Title: ".$entry->title."<br />";
		//The feeds oldest comment seem to be empty from the poster him/her self
		$nCounter++;
			if (!empty($entry->content)) {
					if($settings['new_video']['add_comment']=="y"){
					echo "<input  id='comment[".$i."][statement]' name='comment[".$i."][statement]' type='hidden' value='".$entry->content."'/>";				echo "<input  id='comment[".$i."][author]' name='comment[".$i."][author]' type='hidden' value='".$entry->author->name."'/>";

			}// endif
			echo $entry->content."<br />";
			echo "By :<span class='badge badge-success'>".$entry->author->name."</span><br /><hr>";

		}
	}// foreach
}
?>
