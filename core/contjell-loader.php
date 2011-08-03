<?php


// define ABSPATH as directory in which index is first loaded


if ( file_exists(ABSPATH . 'core/contjell-config.php') ) {
	//config file exists, load that shit
	require_once(ABSPATH . 'core/contjell-config.php' );
	
	//load core classes
	require_once(ABSPATH . 'core/contjell-errors.php');
	require_once(ABSPATH . 'core/contjell-db.php' );	
	require_once(ABSPATH . 'core/contjell-modules.php');
	require_once(ABSPATH . 'core/contjell-pathfinder.php');
	require_once(ABSPATH . 'core/contjell-auth.php');
	require_once(ABSPATH . 'core/contjell-theme.php');
	require_once(ABSPATH . 'core/contjell-functions.php');
	
	//start core classes
	$cj_error = new cj_error();
	$db = new ezSQL_mysql(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
	$cj_modules = new cj_modules();
	$cj_pathfinder = new cj_pathfinder();
	$cj_auth = new cj_auth();
	$cj_theme = new cj_theme();
	
	
	//testing stuff
	$cj_modules->get_mods();
	$cj_pathfinder->get_path();
	$cj_auth->init();
	$cj_modules->load_mods();
	
	//loadtheme
	//$cj_theme->set_theme_target();
	
	//include($cj_theme->theme_target);
	//if suffix /debug on path then fireup the debug window.
	if ($cj_pathfinder->debug_mode() and CJ_DEBUG_MODE_ON == TRUE){
		$cj_error->debugger();
	}
	
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
