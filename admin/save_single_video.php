<?php
global $wpdb;
global $settings;
global $icw_lm_table,$icw_lm_playlist_table,$icw_lm_settings_table;
$aryCategory_id[]=$settings['new_video']['category_id'];
$title=$_REQUEST['video']['name'];
$description=nl2br($_REQUEST['txtDescription']);
$tags=$_REQUEST['txtTags'];
$aryUser=wp_get_current_user();
$userID=$aryUser->ID;
$video_youtube_id=$_REQUEST['video']['you_id'];

$wpdb->show_errors();

$wpdb->insert( 
	$icw_lm_table, 
		array( 
			'youtube_v' => $video_youtube_id , 
			'description' => $description,
			'tags'=>$tags,
			'playlist'=>1
		)
);

$icw_video_id=$wpdb->insert_id; 

$description2="[icw_video video='" . $icw_video_id . "']<hr />" . $description;



$my_post = array(
  'post_title'    => $title,
  'post_content'  => $description2,
  'post_excerpt'  => $description,
  'post_status'   => 'publish',
  'post_author'   => $userID,
  'tags_input'     =>$tags,
  'post_category' => $aryCategory_id
);


$post_ID=wp_insert_post($my_post);
$icw_message="<h4>Created a post with id <span class='alert-link'><span class='label label-warning'>$post_ID</span></span>
 with video id <span class='label label-warning'>Video Id $icw_video_id</span>. </h4>";
$content_file=dirname( __FILE__ ).'/adminLayout.php';
require($content_file);
//echo $icw_message;
?>
