<?php

$cj_theme->set_theme_target("standard_page");

if (ISSET($cj_pathfinder->hooks[0])){
	$page_details = $db->get_row("SELECT * FROM ".$table_prefix."pages WHERE page_permalink='".$db->escape($cj_pathfinder->hooks[0])."' LIMIT 0,1", ARRAY_A);
	
	if (!ISSET($page_details['id'])) {
		$cj_theme->set_theme_target("404", true);
	}
} else {
	$default_page = cj_get_setting("default_page");
	if (!$default_page) {
		$cj_theme->set_theme_target("404", true);
	} else {
		$page_details = $db->get_row("SELECT * FROM ".$table_prefix."pages WHERE id='".$default_page."' LIMIT 0,1", ARRAY_A);
	}
}

?>
