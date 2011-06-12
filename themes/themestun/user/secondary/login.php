<?php

include($cj_theme->loc."header.php");
//$cj_theme->global_header();
//print $register_error;
if ($cj_auth->check_rights("GUEST")){
?>


<form action="" method="post">
<input type="hidden" name="login" value="1"/>
Username: <input name="username" type="textbox"/><br/>
Password: <input name="password" type="password"/><br/>
<input type="submit" value="login">
</form>
<?php

} else {
	
	print "YOU ARE ALREADY LOGGED IN FOOL!";	
}
include($cj_theme->loc."footer.php");
?>