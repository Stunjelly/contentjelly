<?php
//going to base this stuff off how wordpress does it kinda.
//grab intended location, set for global useage
error_reporting(-1);
$init_location = $_GET['i_l'];


// set ABSPATH to this parent level directory
define( 'ABSPATH', dirname(__FILE__) . '/' );

//Load the Loader

require_once(dirname(__FILE__) . '/core/contjell-loader.php');



?>
