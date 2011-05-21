<?php

class cj_modules {

	public $m_list;
	
	 public function __construct() {
      $this->m_list =  array ();
    }
		
	/* function to load into an array all module information/locations */
	public function get_mods () {
		//make sure we have database class and table prefix varible (there must be a better way of doing this (why am I such a noob?!?))
		global $db, $table_prefix;
		
		//select primary and teriary modules
		$mlist =  $db->get_results("SELECT * FROM ".$table_prefix."modules WHERE module_type=1 or module_type=3");
		
		foreach($mlist as $mod){			
			//create/reset empty child array
			$children = array();
			
			//if primary module look for secondary modules
			if ($mod->module_type == 1){
				//get secondaries corresponding to primary
				if($second_list = $db->get_results("SELECT * FROM ".$table_prefix."modules WHERE module_type=2 and module_parent='".$mod->module_id."'")){
				
					//add all secondaries as primary child
					foreach ($second_list as $mod_sec){
						$children[$mod_sec->module_id] = array("type" => $mod_sec->module_type, "name" => $mod_sec->module_name, "location" => $mod_sec->module_loc);
					}
				}
			}
			//update m_list
			$this->m_list[$mod->module_id] = array("type" => $mod->module_type, "name" => $mod->module_name, "location" => $mod->module_loc, "children" => $children);
		}
	}
	
	/* function to load module class*/
	public function load_mod($id) {
			//currently only debugging
			print_r($this->m_list[$id]);
	}
}

?>