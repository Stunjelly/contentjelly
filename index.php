<?php
//going to base this stuff off how wordpress does it kinda.
//grab intended location, set for global useage
error_reporting(-1);
$init_location = $_GET['i_l'];


// set ABSPATH to this parent level directory
define( 'ABSPATH', dirname(__FILE__) . '/' );
define('RELPATH', array_shift(explode('index.php',$_SERVER['SCRIPT_NAME'])));


//Load the Loader

require_once(ABSPATH . '/core/contjell-loader.php');



?>
