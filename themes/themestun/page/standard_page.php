<?php
include($cj_theme->loc."header.php");
if (ISSET($page_details)){
print "<h3>".$page_details['page_title']."</h3><br/>";
print "<div>".$page_details['page_content']."</div>";
} else {
	print "pagenot found";
}
include($cj_theme->loc."footer.php");


?>
