<?PHP
include($cj_theme->loc."header.php");

if($general_error_message != null) {
	print $general_error_message;
} else {
	print "SOMETHING HAS GONE WRONG.... OH NOES!";
}

include($cj_theme->loc."footer.php");
?>
