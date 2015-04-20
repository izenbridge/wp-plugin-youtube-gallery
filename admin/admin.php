<?php
add_action('admin_menu', 'icw_lm__setup_menu');
//loadBootstrapCss();
function icw_lm__setup_menu(){
        add_menu_page( 'iZenbridge\'s iCodeWell Link Manager Settings', 'iCW Link manager', 'manage_options', 'icw_lm_plugin', 'icw_lm_admin_page_loaded' );
		add_submenu_page( "icw_lm_plugin", "settings", "settings", 'manage_options', 'settings_page', 'settings_page');
		add_submenu_page( "icw_lm_plugin", "help", "help", 'manage_options', 'help', 'help');

		/*
		add_submenu_page( "icw_lm_plugin", "Add a single video", "Add Video", 'manage_options', 'add_video', 'icw_lm_admin_video_add_loaded');
		add_submenu_page( "icw_lm_plugin", "Manage videos", "Manage", 'manage_options', 'manage_video', 'icw_lm_admin_video_manage_loaded');
		add_submenu_page( "icw_lm_plugin", "Import Channel", "Import Channel", 'manage_options', 'import_channel', 'icw_lm_admin_import_channel_loaded');
*/
}
/**
**********
*/
function settings_page(){
global $settings;
    echo "<h1>Settings</h1>";
	//print_r($settings);
/*
	foreach ($settings as $category=>$aryData){
		$aryCategory[]=$name;
		echo "<b><u>$category</u></b><br>"; 
		foreach ($aryData as $key=>$Val){
 
			echo "$key: <input type='text' name='$key' value='$Val'><br>";

		}	

	}	
echo "<button type='submit' class='btn btn-success'>Submit</button>";	

*/
	$content_file=dirname( __FILE__ ).'/adminSettingLayout.php';
		//$content_file=dirname( __FILE__ ).'/adminLayout.php';
	include($content_file);
}
/**
*************************************
**/ 
function icw_lm_admin_page_loaded(){
	add_action( 'wp_enqueue_scripts', 'loadBootstrapCss' );
	//choose the page to load
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="add_single_video"){
		$content_file=dirname( __FILE__ ).'/admin_add_video.php';
		
		try {
	    		require($content_file);
		} catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}		
		
	}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="save_single_video"){
		$content_file=dirname( __FILE__ ).'/save_single_video.php';
		include($content_file);
		
	}else{
		$content_file=dirname( __FILE__ ).'/adminLayout.php';
		include($content_file);
	}
}
/**
*************************************
**/ 
function icw_lm_admin_video_add_loaded(){
    echo "<h1>iZenbridge®'s iCodeWell Link Manager Settings</h1>";
    echo "<h2>Add a single video</h2> TEST";
	
}

/**
*************************************
**/ 
function icw_lm_admin_video_manage_loaded(){
    echo "<h1>iZenbridge®'s iCodeWell Link Manager Settings</h1>";
    echo "<h2>Manage Video</h2>";
}
/**
*************************************
**/ 
function icw_lm_admin_import_channel_loaded(){
print_r($_REQUEST);
    echo "<h1>iZenbridge®'s iCodeWell Link Manager Settings</h1>";
    echo "<h2>Import Channel</h2>";

}

/**
*************************************
**/ 
function help(){
    echo "<h1>help</h1>";
	$content_file=dirname( __FILE__ ).'/help.php';
		include($content_file);
	
}



?>
