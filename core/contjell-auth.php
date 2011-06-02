<?php


class cj_auth {
	
	public $user;
	public $groups;
	public $login_attempt;
		
	public function __construct() {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error,$cj_theme;
		$this->user_info = array('name' => 'Guest', 'id' => '0', 'email' => null);
		$this->groups = array();
		$this->login_attempt = null;
		
		//start sessions
		session_start();
		
		
	}
	
	public function init () {
		global $db, $table_prefix, $cj_pathfinder, $cj_modules, $cj_error,$cj_theme;
		//if login chunk detected by pathfinder, then make login test
		if($_POST['login'] == 1){
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
				$this->user_info = $check_session_key;
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