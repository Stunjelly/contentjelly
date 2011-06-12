<html>
<head>
<title>STUNJELLY TEST</title>
<link href="<?php print THEMEPATH; ?>style.css" rel="stylesheet"/>
</head>


<body >

<div id="main-wrapper">

    <div id="header-wrapper">
        <div id="header-logo">
        	<img src="<?php print THEMEPATH; ?>images/contjell_logo.jpg"/ >
        </div>
        <div id="header-user">
        	<?php
	  	
				if ($cj_auth->user['auth'] == 1) {
					print "<div id=\"header-user-trait\"><img src=\"".RELPATH."content/user/profile/40_40/".$cj_auth->user['id'].".jpg\" /></div>\n<div id=\"header-user-text\">You are logged in as: <b>".$cj_auth->user['name']."</b>\n<p />\n<b><a href=\"".RELPATH."logout\">Log Out</a> | <a href=\"".RELPATH."account\">My Account</a>";
					
				if ($cj_auth->check_rights("SPECIFIC", "Admin Panel")){
					print "	| <a href=\"".RELPATH."admin\">Admin Panel</a>";
				}
					print "</b></div>";
				} else {
			?>
            <form action="" method="post">
				<input type="hidden" name="login" value="1"/>
				Username: <input name="username" type="textbox" class="top-login"/><br/>
				Password: <input name="password" type="password" class="top-login"/><br/>
				<input type="submit" value="login">
			</form>
            <?php
				}
			?>
			
        </div>    
    </div>
    
    <div id="content-wrapper">
    