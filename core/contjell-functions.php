<?php


//get settings function
function cj_get_setting($setting_name) {
	global $db, $table_prefix, $cj_error;

	if (ISSET($setting_name)) {
		$get_settings = $db->get_var("SELECT setting_value FROM ".$table_prefix."settings WHERE setting_name='default_page' LIMIT 0,1");
		if ($get_settings != null) {
			return($get_settings);
		} else {
			$cj_error->put_error("WARNING", "Setting name: ".$setting_name." not found!");
			return(false);
		}
	}  else {
		return(false);
	}
}

?>
