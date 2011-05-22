<?php

class cj_pathfinder {
	public $init_location;
	public $primary;
	public $secondary;
	public $hooks;
	private $path_with_hooks; 
	global $cj_modules;
	
	 public function __construct() {
	 	global $db, $table_prefix, $init_location;
		$get_primary_default = $db->get_results("SELECT setting_value FROM ".$table_prefix."settings WHERE setting_name='core_default_primary' LIMIT 0,1");
		$this->primary = $get_primary_default;
		$this->secondary = null;
		$this->hooks = array();
		$this->path_with_hooks = "/";
                $this->init_location =  explode("/", $init_location);
    }
    
   public function get_path () {
   	$this->find_path();
   	return($this->path_with_hooks);
   }	
	
	
	private function find_path () {
		global $db, $table_prefix;
		$path_prefix = "/";
		
		print "\n";
		print_r($this->init_location);
		if ($this->init_location[0] != "") {
			foreach ($this->init_location as $path_chunk) {
				$check_hook = $this->check_if_hook($path_chunk, $path_prefix);
				if (!$check_hook) {
					if($path_prefix != "/") $path_prefix .= "/";
					$path_prefix .= "{%hook%}";
                                        $this->hooks[] = $path_chunk;
				}else{
					if($path_prefix != "/") $path_prefix .= "/";
					$path_prefix .= $path_chunk;
					if(ISSET($cj_modules->m_list[$check_hook])){
						print $cj_modules[$check_hook]['name'];
					}
				}
			}
		}
		$this->path_with_hooks = $path_prefix;
	} 		
	
	private function check_if_hook ($chunk, $path_prefix) {
		global $db, $table_prefix;
		$look_for_hook = $db->get_results("SELECT id FROM ".$table_prefix."pathfinder WHERE path_chunk='".$chunk."' and path_prefix='".$path_prefix."' LIMIT 0,1");
		//$db->debug();
		if ($look_for_hook == "") {
			return (FALSE);
		} else {
			return ($look_for_hoook->id);
		}
	}	
	
	private function match_path_chunk_to_mod ($chunk) {
		global $db, $table_prefix;
		//do something
	}	
			
	
	
}

?>
