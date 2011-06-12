<?php

//this is a mess but I needed it earlier than I thought I did. I also need to incorporate it with the DB class
class cj_theme {

	public $loc;
	public $theme_target;
	
	 public function __construct() {
	 	global $db, $table_prefix;
	 	
	 	//might function this later could be usefull because this is long winded.
		$get_default_theme = $db->get_var("SELECT setting_value FROM ".$table_prefix."settings WHERE setting_name='core_default_theme' LIMIT 0,1");
		
		//set theme path
      $this->loc =  ABSPATH."themes/".$get_default_theme."/";
      define("THEMEPATH", RELPATH."themes/".$get_default_theme."/");
    }
	
	public function set_theme_target ($file = null) {
		global $cj_pathfinder, $cj_modules;
		$this->theme_target = $this->loc.$cj_modules->m_list[$cj_pathfinder->primary]['name'];
		if ($cj_pathfinder->secondary != null){
			$this->theme_target .= "/secondary";
			if ($file != null) {
				$this->theme_target .= "/".$file.".php";
			}else {
				$this->theme_target .= "/".$cj_modules->m_list[$cj_pathfinder->secondary]['name'].".php";
			}
		}else {
			if ($file != null) {
				$this->theme_target .= "/".$file.".php";
			} else {
				$this->theme_target .= "/index.php";
			}
		}
	}
    
}
?>