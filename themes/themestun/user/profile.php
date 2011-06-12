<?PHP
include($cj_theme->loc."header.php");
?>
<div id="default-page-header">
<h5>USER PROFILE:</h5>
<div class="float-left"><img src="<?php print RELPATH."content/user/profile/64_64/".$get_user_info['user_id'].".jpg"; ?>" /></div>
<div class="float-left"><h2><?php print $get_user_info['user_name']; ?></h2></div>
</div>

<?PHP
include($cj_theme->loc."footer.php");
?>