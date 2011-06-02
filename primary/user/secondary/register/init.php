<?php

$register_error = "";
if (ISSET($_POST['register'])){
	
	
	//passwords match?	
	if ($_POST['password'] != $_POST['password2']) {
		$register_error .= "Passwords don't match!";
	}
	
	//password not nul and greater than 4 chars
	if(strlen($_POST['password']) < 4 ) {
		$register_error .= "Please Enter a password greater 4 characters!";
	}
	
	//username not null
	if(strlen($_POST['username']) < 1 ) {
		$register_error .= "Please Enter a username";
	}
	
	//email validation
	if(!check_email_address($_POST['email'])) {
		$register_error .= "Please Enter a valid email address!";
	}
	
	// no intial errors, time to check database
	if ($register_error == "") {
		
		//username, email queries
		$username_check = $db->get_var("SELECT count(*) FROM ".$table_prefix."users WHERE user_name='".$db->escape($_POST['username'])."' LIMIT 0,1");
		$email_check = $db->get_var("SELECT count(*) FROM ".$table_prefix."users WHERE user_email='".$db->escape($_POST['email'])."' LIMIT 0,1");
		
		//username is in use?
		if ($username_check > 0){
			$register_error .= "Username already in use!";
		}
		
		//email is in use?
		if ($email_check > 0){
			$register_error .= "Email Address is already in use!";
		}
		
		//if all is still good, generate stuff then add user to the database.
		if ($register_error == "") {
			$salt = rand(10000,99999);
			$password = md5($_POST['password']);
			$key = md5($salt.$_POST['password']);
			$activation = md5($salt.$key);
			$db->query("INSERT INTO ".$table_prefix."users (user_name, user_password, user_salt, user_key, user_email, user_activation, user_status) VALUES ('".$db->escape($_POST['username'])."','".$password."','".$salt."','".$key."','".$db->escape($_POST['email'])."','".$activation."','1')");
			$new_user_id = mysql_insert_id();
			
			//send registration email
			$activation_email = new send_email($_POST['email'],'bill@test.com','Content Jelly Activation','please click the link below to activate your Content Jelly Account\n\n http://localhost/contjell/activate/'.$new_user_id.'/'.$activation);
			$activation_email->send();	
			
				
		}
	}	
	if ($register_error != ""){
		include($cj_theme->loc."primary/user/secondary/register.php");
	}
} else {
	include($cj_theme->loc."primary/user/secondary/register.php");
}





?>