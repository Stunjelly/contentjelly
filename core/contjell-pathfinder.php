<?php

class cj_pathfinder {
	public $init_location;
	public $primary;
	public $secondary;
	public $hooks;
	private $path_with_hooks;
	private $debug_mode_on;
	
	 public function __construct() {
	 	global $db, $table_prefix, $init_location;
	 	//find default module for "/" page
		$get_primary_default = $db->get_results("SELECT setting_value FROM ".$table_prefix."settings WHERE setting_name='core_default_primary' LIMIT 0,1");
		
		$this->primary = $get_primary_default[0];
		$this->primary = $this->primary->setting_value;
		
		$this->secondary = null;
		$this->hooks = array();
		$this->path_with_hooks = "/";
      $this->init_location =  explode("/", $init_location);
      $this->debug_mode_on = FALSE;
    }
   
   /*for debugging at the moment but might have a use later*/
   public function get_path () {
   	$this->find_path();
   	return($this->path_with_hooks);
   }	
	
	/*function for working out what modules to load*/
	private function find_path () {
		global $db, $table_prefix, $cj_modules, $cj_error;
		//this is a pretend path and bears no relation to file location
		$path_prefix = "/";
		
		//check we are not on the default page
		if ($this->init_location[0] != "") {
			
			//inter through exploded path as chunks
			foreach ($this->init_location as $path_chunk) {
				
				//make sure we ignore special chunks, there might be more of these later (/login, /logout, /edit, /admin, etc)
				if ($path_chunk != "debug") {
					
					//check to see if chunk is a hook or indicating a module
					$check_hook = $this->check_if_hook($path_chunk, $path_prefix);	
					
					//if a hook...
					if ($check_hook == FALSE) {
						if($path_prefix != "/") $path_prefix .= "/";
						
						//add hook holder to imaginary path
						$path_prefix .= "{%hook%}";
						
						//add content of hook to hook array, later this will get passed to the selected module
     	          	$this->hooks[] = $path_chunk;
     	         
     	         //or not a hook... 	
					}else{
						if($path_prefix != "/") $path_prefix .= "/";
						
						//add module indicator to imaginary path 
						$path_prefix .= $path_chunk;
						
						//check to see if the module exists and is loaded, (this will also be 'is enabled' later I think
						if(ISSET($cj_modules->m_list[$check_hook]['name'])){
							
							//if parent is not defined then it's a primary or tertiary module and doesn't have a parent dependency
							//it may still have dependencies but I think it will be set up so that it won't 'enable' without 
							//dependencies already installed. 
							if (!ISSET($cj_modules->m_list[$check_hook]['parent'])) {

								//tertiaries won't be called from the address bar (or at least not directly), so this is a primary because it's not a secondary 
								$this->primary = 	$check_hook;
							
							//if it does have a parent we need to make sure that both parent and child module is loaded
							} else {
								$this->primary = 	$cj_modules->m_list[$check_hook]['parent'];
								$this->secondary = 	$check_hook;
							}
						
						// if we can't find module_id in database then the module clearly hasn't made it that far (installation failure)
						} else {
							
							//add to error log for debugging (other things might be going wrong(?) 
							$cj_error->put_error("ERROR", "no module with id: ".$check_hook." could be found!");
						}
					}
				}
			}
		}
		
		//not sure if this will be useful later on, but setting anyway for the time being (it's our imaginary path)
		$this->path_with_hooks = $path_prefix;
		
		//check to see if last chunk is "/debug" and if so set debug mode on.
		if ($this->init_location[count($this->init_location)-1] == "debug"){
			$this->debug_mode_on = TRUE;
		}
	} 		
	
	
	/*function to check if chunk is a hook or not*/
	private function check_if_hook ($chunk, $path_prefix) {
		global $db, $table_prefix, $cj_error;
		
		//search the pathfinder table for anything that mataches our imaginary path prefix and our chunk.
		$look_for_hook = $db->get_results("SELECT path_module FROM ".$table_prefix."pathfinder WHERE path_chunk='".$chunk."' and path_prefix='".$path_prefix."' LIMIT 0,1");

		//if a match is not found
		if (!ISSET($look_for_hook[0]->path_module)) {
			return (FALSE);
			
		//if a match is found...
		} else {
			
			//return it's id
			return ((INT)$look_for_hook[0]->path_module);
		}
	}	
	
	/*function to trigger the debugger console in core/contjell-loader.php*/
	public function debug_mode() {
		if ($this->debug_mode_on){
			return(TRUE);
		} else {
			return(FALSE);
		}
	} 	
			
	
	
}

?>
