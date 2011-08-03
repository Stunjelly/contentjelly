<?php

function make_menu ($proto_menu) {
	global $cj_modules;
	$menu = "";
	$menu .= "<ul>";
	foreach ($proto_menu as $menu_item) {
		$menu .= "<li>".$menu_item['name'];
		if (ISSET($menu_item['children'])) {
			$menu .= "<ul>";
			foreach($menu_item['children'] as $secondary) {
				$menu .= "<li>".$secondary['name']."</li>";
			}
			$menu .= "</ul>";
		}
		$menu .= "</li>";
	} 
	$menu .= "</ul>";
	return ($menu);
}

function get_menu () {
	global $cj_modules;
	$proto_menu = array();
	foreach ($cj_modules->m_list as $id => $module) {
		if ($module['type'] != 2) {
			$proto_menu[$id] = $module;
		} 
	}
	return ($proto_menu);
}

