<?php
/* Plugin Name: wordpress plugin youtube gallery 
Plugin URI: http://icodewell.izenbridge.com
Description: Custom Youtube embedder with additional search feaures
Version: 1.0
Author: iZenBridgeCodeTeam@izenbridge.com
License: CC0 1.0 Universal
*/
include "admin/admin.php";
include "shortcode.php";
include "utilities.php";
global $wpdb;
global $icw_lm_table,$icw_lm_playlist_table,$icw_lm_settings_table;
global $settings;

$icw_lm_table=$wpdb->prefix . 'icw_lm';
$icw_lm_playlist_table=$wpdb->prefix . 'icw_playlist';
$icw_lm_settings_table=$wpdb->prefix . 'icw_settings';
$settings=ParseIni();
 	wp_register_style( 'bootstrap-style',  plugin_dir_url( __FILE__ ) . 'assets/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-style' );
    wp_register_style( 'font-awesome-style',  plugin_dir_url( __FILE__ ) . 'assets/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome-style' );
    wp_register_style( 'icw-style',  plugin_dir_url( __FILE__ ) . 'assets/icw.css' );
    wp_enqueue_style( 'icw-style' );
		// Bootstrap
		//wp_register_style('bootstrap-styles', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css', array(), null, 'all');
		//wp_enqueue_style('bootstrap-styles');
		// jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false);
		wp_enqueue_script('jquery');
		// Bootstrap
		wp_register_script('bootstrap-scripts', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap-scripts');
/*function -----------------------------*/
function icw_lm_activation() {
	
   	global $wpdb;
  	global $icw_lm_table,$icw_lm_playlist_table,$icw_lm_settings_table;
	//Create category
	$video_category_id = wp_create_category('Videos', 0);

	//------------------
 	$charset_collate = $wpdb->get_charset_collate();
	// create the video database table
	if($wpdb->get_var("show tables like '$icw_lm_table'") != $icw_lm_table || 1==1) 
	{
		$sql = "CREATE TABLE IF NOT EXISTS " . $icw_lm_table . " (
		`id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`youtube_v` mediumtext NOT NULL,
		`title` mediumtext NOT NULL,
		`description` mediumtext NOT NULL,
		`tags` tinytext NOT NULL,
		`votes` int(10) NOT NULL,
		`playlist` int(10) NOT NULL,
		
		UNIQUE KEY id (id)
		)DEFAULT CHARSET=$charset_collate ;";

			/*First Video*/
			$title="Resource Leveling and Resource Smoothing | iZenBridge";
	 		$description= "Our webinar on SAFe Requirement Hierarchy discussed details on the relationship 
					between strategic themes, epic, feature and User story.We discussed 
					various methods of defining requirement
 					hierarchy and its importance in an agile project. ";
			$tags="SAFe ©, AGile, PMP ©";
			
			$sql.="INSERT INTO `$icw_lm_table` (`id`, `youtube_v`, `title`, `description`, `tags`, `votes`,`playlist`) VALUES
				(NULL, '2cN0xcjZEI4', '$title', '$description', '$tags', 0,1);";
			/*2nd Video*/
 			$title="Introduction of Meetup on Test First Approach";
			$description ="Agile Software Developers Network is Scrum Alliance approved User Group which is 
						   dedicated to promote agile values, principles and practices. Join us at www.discussagile.com.";
			$tags="Test First Approach";
			$sql.="INSERT INTO `$icw_lm_table` (`id`, `youtube_v`, `title`, `description`, `tags`, `votes`,`playlist`) VALUES
			(NULL, 'b10Ue60joCk', '$title', '$description', '', 0,1);";
			/*3rd Video*/
 			$title="Webinar : Is Project Manager’s Role Vanishing in Scrum?";
			$description ="Enroll in iZenBridge 21 Contact Hours PMI-ACP Online Training Program http://goo.gl/CSLnJN
							Join us at forum.izenbridge.com and become a part of the latest discussions 
							on varied PMI-ACP® and CSP topics.";
			$tags="Test First Approach";
			$sql.="INSERT INTO `$icw_lm_table` (`id`, `youtube_v`, `title`, `description`, `tags`, `votes`,`playlist`) VALUES
			(NULL, 'm_oVFrCXZrk', '$title', '$description', '', 0,1);";


		$sql .= "CREATE TABLE " . $icw_lm_playlist_table . " (
		`pl_id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`title` mediumtext NOT NULL,
		UNIQUE KEY id (pl_id)
		)DEFAULT CHARSET=$charset_collate ;";
		

			$sql.="INSERT INTO `iCodeWell`.`$icw_lm_playlist_table` (`pl_id` ,`title`)
					VALUES (NULL , 'Default');";

		$sql.="INSERT INTO `iCodeWell`.`$icw_lm_playlist_table` (`pl_id` ,`title`)
				VALUES (NULL , 'Default');";


		$sql .= "CREATE TABLE `" . $icw_lm_settings_table . "` (
		`setting_id` mediumint(9) NOT NULL AUTO_INCREMENT,
		`category` mediumtext NOT NULL,
		`key` mediumtext NOT NULL,
		`value` mediumtext NOT NULL,
		UNIQUE KEY id (setting_id)
		)DEFAULT CHARSET=$charset_collate ;";

		$sql .="INSERT INTO  `" . $icw_lm_settings_table . "` (`setting_id` ,`category` ,`key` ,`value`)
				VALUES 
		(NULL , 'bootstrap', 'load', 'y'), 
		(NULL , 'new_video', 'add_post', 'y'), 
		(NULL , 'new_video', 'add_comment', 'y'), 
		(NULL , 'youtube_thumbnail', 'size', 'h'),
		(NULL , 'new_video', 'category_id', '$video_category_id');";


		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}// end if
	//Call the Create the video page function to create the sample page

	CreateNewPage();
}// end function
/*function -----------------------------*/
register_activation_hook(__FILE__, 'icw_lm_activation');
/*function -----------------------------*/
function icw_lm_deactivation() {
}
/*function -----------------------------*/
register_activation_hook(__FILE__, 'icw_lm_deactivation');

//*WIDGET ON DASH BOARD*/
/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function icodewell_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'icodewell_dashboard_widget',         // Widget slug.
                 'iCodeWell Updates Widget',         // Title.
                 'icodewell_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'icodewell_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function icodewell_dashboard_widget_function() {

	$content_file=dirname( __FILE__ ).'/admin/dashboard_video.php';
	include_once($content_file );
}
/*function -----------------------------*/
function CreateNewPage(){
$content_file=dirname( __FILE__ ).'/assets/video_page_templet.php';
$content=(file_get_contents($content_file ));
$my_page = array(
	'post_title' => 'My Video Room',
	'post_content' => $content,
	'post_status' => 'publish',
	'post_type' => 'page',
	'post_author' => 1,
	'post_date' => $date
);

$post_id = wp_insert_post($my_page);
}
/*function -----------------------------*/
function ParseIni(){

global $wpdb, $icw_lm_settings;
global $wpdb ;
global $icw_lm_settings_table;
	$sql="SELECT * From `".$icw_lm_settings."`";
	$res = $wpdb->get_results($sql);
	foreach ($res as $rs) {
			$setting[$rs->category][$rs->key]=$rs->value;
		}
	

	$sql="SELECT * From `".$icw_lm_settings_table."`";

	$res = $wpdb->get_results($sql);
	foreach ($res as $rs) {
			$setting[$rs->category][$rs->key]=$rs->value;	
		}

	return $setting;
}

?>
