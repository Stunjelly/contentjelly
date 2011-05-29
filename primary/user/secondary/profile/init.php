<?php

$team_id = $cj_pathfinder->hooks[0];
$rand_id = $cj_pathfinder->hooks[1];
print "This is the team finder";

print "<br> user id: ".$team_id;
print "<br> random id: ".$rand_id;

print_r($db->get_results("SELECT * FROM ".$table_prefix."modules"));




?>