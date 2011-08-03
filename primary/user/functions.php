<?php

//email validation
//www.ilovejackdaniels.com/php/email-address-validation
function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}


function get_user_info ($id) {
	global $db, $table_prefix;
	$user_info = $db->get_row("SELECT user_name, user_id, user_email, user_lastseen FROM ".$table_prefix."users WHERE user_id='".$id."' LIMIT 0,1", ARRAY_A);
	
	if ($user_info['user_id'] > 0) {
		$user_details_get = $db->get_results("SELECT detail_name, detail_value FROM ".$table_prefix."user_details WHERE user_id = '".$user_info['user_id']."'", ARRAY_A);
		foreach ($user_details_get as $detail) {
			$user_info[$detail['detail_name']] = $detail['detail_value'];
		}
		return ($user_info);	
	} else {
		return (FALSE);	
	}
}

?>
