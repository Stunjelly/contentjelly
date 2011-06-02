<?php
//going to base this stuff off how wordpress does it kinda.
//grab intended location, set for global useage
error_reporting(-1);
$init_location = $_GET['i_l'];


// set ABSPATH to this parent level directory
define( 'ABSPATH', dirname(__FILE__) . '/' );

//there must be a better way of doing this!
$rel_path = explode('index.php',$_SERVER['SCRIPT_NAME']);
define('RELPATH', array_shift($rel_path));


//Load the Loader

require_once(ABSPATH . '/core/contjell-loader.php');



?>
