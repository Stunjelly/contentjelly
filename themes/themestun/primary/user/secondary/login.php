<?php
$cj_theme->global_header();
print_r($_SESSION);
print_r($cj_auth->user_info);
//print $register_error;

?>
<form action="" method="post">
<input type="hidden" name="login" value="1"/>
Username: <input name="username" type="textbox"/><br/>
Password: <input name="password" type="password"/><br/>
<input type="submit" value="login">
</form>

<?php
$cj_theme->global_footer();
?>