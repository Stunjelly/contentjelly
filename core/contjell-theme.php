<?php

//this is a mess but I needed it earlier than I thought I did. I also need to incorporate it with the DB class
class cj_theme {

	public $loc;
	
	 public function __construct() {
	 	global $db, $table_prefix;
	 	
	 	//might function this later could be usefull because this is long winded.
		$get_default_theme = $db->get_results("SELECT setting_value FROM ".$table_prefix."settings WHERE setting_name='core_default_theme' LIMIT 0,1");
		$get_default_theme = $get_default_theme[0];	 	
		
		//set theme path
      $this->loc =  ABSPATH."themes/".$get_default_theme->setting_value."/";
      define("THEMEPATH", RELPATH."themes/".$get_default_theme->setting_value."/");
    }
    
    public function global_header() {
    	include($this->loc."header.php");
    }
    public function global_footer() {
    	include($this->loc."footer.php");
    }
    
}

?>