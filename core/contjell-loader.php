<?php


// define ABSPATH as directory in which index is first loaded


if ( file_exists( ABSPATH . 'core/contjell-config.php') ) {
	//config file exists, load that shit
	require_once( ABSPATH . 'core/contjell-config.php' );
	
	require_once( ABSPATH . 'core/contjell-db.php' );	
	require_once(ABSPATH . 'core/contjell-modules.php');
	require_once(ABSPATH . 'core/contjell-pathfinder.php');
	require_once(ABSPATH . 'core/contjell-auth.php');
	
	
	$db = new ezSQL_mysql(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
	$cj_modules = new cj_modules();
	$cj_modules->get_mods();
	$cj_pathfinder = new cj_pathfinder();
	print_r($cj_pathfinder->get_path());
	
} else {

	// If is doesn't exist dump error

	// Need to work out what to do here
	// wordpress has installation stuff and error reporting
	
	//if ( strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false )
	//	$path = '';
	//else
	//	$path = 'wp-admin/';

	// Die with an error message
	//require_once( ABSPATH . '/wp-includes/class-wp-error.php' );
	//require_once( ABSPATH . '/wp-includes/functions.php' );
	//require_once( ABSPATH . '/wp-includes/plugin.php' );
	//$text_direction = /*WP_I18N_TEXT_DIRECTION*/"ltr"/*/WP_I18N_TEXT_DIRECTION*/;
	//wp_die(sprintf(/*WP_I18N_NO_CONFIG*/"There doesn't seem to be a <code>wp-config.php</code> file. I need this before we can get started. Need more help? <a href='http://codex.wordpress.org/Editing_wp-config.php'>We got it</a>. You can create a <code>wp-config.php</code> file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file.</p><p><a href='%ssetup-config.php' class='button'>Create a Configuration File</a>"/*/WP_I18N_NO_CONFIG*/, $path), /*WP_I18N_ERROR_TITLE*/"WordPress &rsaquo; Error"/*/WP_I18N_ERROR_TITLE*/, array('text_direction' => $text_direction));
	
	//I'm just going to print that the config file doesn't exist for the time being
	
	print "No config file found";
	die();

}

?>