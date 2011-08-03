<?php
$cj_theme->set_theme_target("control_panel");

if ($cj_auth->check_rights("SPECIFIC", "Admin Panel")){
	include(ABSPATH."primary/admin/functions.php");
	$menu = get_menu ();
	$menu['pathfinder'] = array('name' => 'Pathfinder');
	$menu['modules'] = array('name' => 'Modules');
	$menu['settings'] = array('name' => 'Settings');
	
} else {
	$cj_theme->set_theme_target("general", TRUE);
	$general_error_message = "you don't have access fool";
}

?>
