<?php


class cj_auth {
	
	public $user;
	public $groups;
	public $login_attempt;
		
	public function __construct() {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error,$cj_theme;
		$this->user = array('auth' => 0, 'name' => 'Guest', 'id' => '0', 'email' => null);
		$this->groups = array();
		$this->login_attempt = null;
		
		//start sessions
		session_start();
		
		
	}
	
	public function init () {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error,$cj_theme;
		//if login chunk detected by pathfinder, then make login test
		if(ISSET($_POST['login'])){
			$this->log_in();
		} else if($cj_pathfinder->logout == TRUE) {
			$this->log_out();
		} 
		
		//check to see if the user is already logged in.
		if (ISSET($_SESSION['user_key']) and ISSET($_SESSION['user_id'])) {
			$this->check_session();
		} 	
	}	
	
	//check that session details match database.
	private function check_session() {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error, $cj_theme;
		$cj_error->put_error("DEBUG", "checking session details");
		$check_session_key = $db->get_row("SELECT count(*) as auth, user_key as ukey, user_name as name, user_email as email, user_id as id FROM ".$table_prefix."users WHERE user_id='".$db->escape($_SESSION['user_id'])."' LIMIT 0,1", ARRAY_A);
		if ($check_session_key['auth'] > 0) {
			if ($check_session_key['ukey'] == $_SESSION['user_key']) {
				$this->user = $check_session_key;
				
				$this->user['groups'] = array();
				//get group info
				$group_details = $db->get_results("SELECT u.group_id AS group_id, g.name AS group_name FROM ".$table_prefix."user_groups AS u INNER JOIN ".$table_prefix."groups AS g WHERE g.id = u.group_id AND u.user_id = '".$this->user['id']."'");
				
				foreach ($group_details as $group) {
					$this->user['groups'][$group->group_id] = $group->group_name;
				}
			}
		}
	}
	
	//perform log in stuff.
	private function log_in() {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error,$cj_theme;

		$cj_error->put_error("DEBUG", "checking login details");
		$username = $db->escape($_POST['username']);
		$password = $_POST['password'];
		$check_username = $db->get_row("SELECT user_id, user_key, user_salt, count(*) as is_real FROM ".$table_prefix."users WHERE user_name='".$username."' LIMIT 0,1", ARRAY_A);
		if ($check_username['is_real'] > 0) {
			$attempted_key = md5($check_username['user_salt'].$password);
			if ($attempted_key == $check_username['user_key']) {
				$_SESSION['user_id'] = $check_username['user_id'];
				$_SESSION['user_key'] = $check_username['user_key'];
			} else {
				//need to work this bit out!
				$this->login_attempt = FALSE;
			}
		} else {
			//need to work this bit out!
			$this->login_attempt = FALSE;
		}
	}	
	
	// check rights options are:
	//"GUEST" - to check if a user is a guest 
	//"SELF" - to check if a user id against another id
	//"GROUP" - to check if a user is in a specified group
	//"SPECIFIC" - to check if a user has access to a specific page/function/whatever.
	
	public function check_rights ($type, $compair = NULL) {
		global $cj_error, $db, $table_prefix;
		switch ($type) {
			case "GUEST":
				if ($this->user['auth'] == 0){
					return (TRUE);
				} else {
					return (FALSE);	
					$cj_error->put_error("WARNING", "you need to be logged to access this page.");
				}
				break;
			case "SELF":
				if ($compair != NULL) {
					if ($this->user['id'] == $compair) {
						return (TRUE);
					} else {
						return (FALSE);	
						$cj_error->put_error("WARNING", "You Do not have access to this page.");
					}
				} else {
					return (FALSE);
					$cj_error->put_error("ERROR", "No comparison given for SELF access check. Format should be $cj_auth->check_rights(\"SELF\", [comparison_id]).");
				}
				break;
			case "GROUP":
				if ($compair != NULL) {
					if (ISSET($this->user['groups'][$compair])) {
						return (TRUE);
					} else {
						return (FALSE);	
						$cj_error->put_error("WARNING", "You Do not have access to this page.");
					}
				} else {
					return (FALSE);
					$cj_error->put_error("ERROR", "No comparison given for GROUP access check. Format should be $cj_auth->check_rights(\"GROUP\", [group_id]).");
				}
				break;
			case "SPECIFIC":
				if ($compair != NULL) { 
					$access = false;
					$page_details = $db->get_results("SELECT group_id FROM ".$table_prefix."spec_pages WHERE page_id='".$compair."' AND access='1'");
					foreach ($page_details as $page_check) {
						if 	($this->check_rights("GROUP", $page_check->group_id)){
							$access = TRUE;
							break 1;
						}
					}
					if ($access) {
						return(TRUE);	
					} else {
						$cj_error->put_error("WARNING", "You Do not have access to this page.");
						return (FALSE);
					}
				}else {
					return (FALSE);
					$cj_error->put_error("ERROR", "No comparison given for SPECIFIC access check. Format should be $cj_auth->check_rights(\"SPECIFC\", [specific_page_identifier]).");
				}
				break;
		}
	}
	
	//perform log out stuff.
	private function log_out() {
		$_SESSION['user_id'] = null;
		$_SESSION['user_key'] = null;
	}	
	
	//check user has rights to where they want to go
	public function auth() {
		
	}
}

?>