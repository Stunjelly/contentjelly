<?PHP
include($cj_theme->loc."header.php");
?>
<div id="default-page-header">
<h5>USER PROFILE:</h5>
<div class="float-left"><img src="<?php print RELPATH."content/user/profile/32_32/".$get_user_info['user_id'].".jpg"; ?>" /></div>
<div class="float-left"><h2 class="user-profile-uname"><?php print $get_user_info['user_name']; ?></h2></div>
</div>

<div style="clear:both; margin-top: 70px;">
<b>First Name:</b> <?php print $get_user_info['user_first_name']; ?><br/>
<b>Surname:</b> <?php print $get_user_info['user_surname']; ?><br/>
</div>

<?PHP
include($cj_theme->loc."footer.php");
?>
