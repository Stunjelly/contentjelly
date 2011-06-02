<?php
$cj_theme->global_header();

print $register_error;

?>
<form action="" method="post">
<input type="hidden" name="register" value="1"/>
Username: <input name="username" type="textbox"/><br/>
Password: <input name="password" type="password"/><br/>
Re-type Password: <input name="password2" type="password"/><br/>
Email: <input name="email" type="textbox"/><br/>
<input type="submit" value="register">
</form>

<?php
$cj_theme->global_footer();
?>