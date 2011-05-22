<?php

//this is a mess but I needed it earlier than I thought I did. I also need to incorporate it with the DB class
class cj_error {

	public $error_list;
	
	 public function __construct() {
      $this->error_list =  array ();
    }
    
    /*main error reporting function*/
    public function put_error($error_type, $error_message) {
    	
    	//check that imminent fatality is not incoming
    	if ($error_type != "FATAL") {
    		$this->error_list[] = array('type' => $error_type, 'message' => $error_message);
    	} else {
    		$this->fatal_error($error_message);
    	}
    }
    
    /*fatal errors cause death to everything*/
    private function fatal_error ($error_message) {
    	print "<div style='z-index: 100; postion: fixed; top: 10; left: 10; width: 50%; height: 100px; background: #FFF; border: 1px solid #000; text-align: center;'><font style='color: #FF0000; font-weight: bold;'>FATAL ERROR</font>: ".$error_message."</div>";
    	die; 
    }
    
    /*debugger console (lol). Messy but I needed it please forgive me*/
    public function debugger () {
    	if (count($this->error_list) > 0) {
    		print "<div style='z-index: 100; postion: fixed; top: 10; left: 10; width: 50%; height: 50%;  background: #FFF; border: 1px solid #000;'>";
    		foreach ($this->error_list as $error_item) {
    			if ($error_item['type'] == "WARNING") {
    					print "<font style='color: #FFA812; font-weight: bold;'>WARNING</font>: ";
    				} else if ($error_item['type'] == "SERIOUS") {
    					print "<font style='color: #FF0000; font-weight: bold;'>SERIOUS</font>: ";
    				} else if ($error_item['type'] == "DEBUG") {
    					print "<font style='color: #0000FF; font-weight: bold;'>DEBUG</font>: ";	
    				}else {
    					print "<font style='color: #8B2500; font-weight: bold;'>ERROR</font>: ";
    				}
    				print $error_item['message']."<br>";
  		 	 	}
   	 		print "</div>";
    	} else {
    		print "<div style='z-index: 100; postion: fixed; top: 10; left: 10; width: 50%; height: 100px; background: #FFF; border: 1px solid #000; text-align: center;'>NO ERRORS</div>";
  		}
    }
}

?>