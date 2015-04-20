<?php
/*function -----------------------------*/
add_shortcode( 'icw_video', 'icw_video' );
/*function -----------------------------*/
function icw_video( $atts ){
	$artSettings=ParseIni();

	//print_r($atts);
	$video_id=$atts['video'];
	$ini_Content=ParseIni();
	switch($artSettings['youtube_thumbnail']['size']){
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




	/*The Fetch Data*/
	global $wpdb;
	$res = $wpdb->get_results("SELECT * FROM `wp_icw_lm` WHERE `id` =$video_id LIMIT 0 , 30");


	foreach ($res as $rs) {
		$curVideo=$rs->youtube_v;
		echo "<h2>".$rs->title."</h2>";
		echo "<div class='row'>";
			echo "<div class='col-md-4'>";
			echo "<img class='img-rounded img-thumbnail img-responsive' src='http://img.youtube.com/vi/$curVideo/$thumb_name' alt='iZenBridge Video'>";
			echo "</div>";
		echo "<div class='col-md-8'><i class='fa fa-quote-left  pull-left fa-border'></i>".$rs->description;
		echo "<i class='fa fa-quote-right  fa-border'></i>";
			echo "<br><div class='btn-group'>";
			echo "<a class='btn btn-warning' href='https://www.youtube.com/watch?v=$curVideo'  target='_blank' ><i class='fa fa-youtube fa-lg'></i> Watch my You tube video</a>";
			echo " <button type='button' class='btn btn-primary'>Attend a real class</button>";
			echo "</div>";
				
		echo "</div>";
		echo "</div>"; // end row

	}
$url = "http://gdata.youtube.com/feeds/api/videos/$curVideo?v=2&alt=json";

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  

$output = curl_exec($ch); 
curl_close($ch);  

$result = json_decode($output, true); //adding true, objects is converted to array 
$viewCount = $result['entry']['yt$statistics']['viewCount']; //view count
$dislikes = $result['entry']['yt$rating']['numDislikes']; //dislikes
$likes = $result['entry']['yt$rating']['numLikes']; //likes
$length=$result['entry']['media$group']['yt$duration']['seconds'];
$published=$result['entry']['published']['$t'];
$title=$result['entry']['title']['$t'];
$authorName=$result['entry']['author'][0]['name']['$t'];
$authorAtomUri=$result['entry']['author'][0]['uri']['$t'];
echo "Title: $title <br>";
echo "<div class='alert alert-warning' role='alert'>";
echo "views: <a><span class='badge badge-success'>$viewCount</span></a>, Likes: <span class='badge'>$likes</span>, Length: <span class='badge badge-warning'>$length</span>, Published: <span class='badge badge-warning'>$published</span><br><br>" ;
echo "author: $authorName, AuthorAtom: $authorAtomUri<br><br>" ;
print_r($result['entry']['yt$display']);
echo "</div>";
}

/*function -----------------------------*/
add_action( 'wp_enqueue_scripts', 'loadBootstrapCss' );

/*function to Loads bootstrap css into the public page*/
function loadBootstrapCss() {
    wp_register_style( 'bootstrap-style',  plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-style' );
    wp_register_style( 'font-awesome-style',  plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome-style' );
    wp_register_style( 'icw-style',  plugin_dir_url( __FILE__ ) . 'assets/icw.css' );
    wp_enqueue_style( 'icw-style' );
}
?>
