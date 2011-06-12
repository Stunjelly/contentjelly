<?php
include(ABSPATH."primary/user/functions.php");
$cj_theme->set_theme_target("profile");

if (ISSET($cj_pathfinder->hooks[0]) and $cj_pathfinder->secondary == null) {
	$get_user_info = get_user_info($db->escape($cj_pathfinder->hooks[0]));
	if (!$get_user_info) {
		$cj_theme->set_theme_target("notfound");
	}
}

?>