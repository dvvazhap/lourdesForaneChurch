<?php
include("functions.php");
	$db = mysql_connect('localhost','root','');
	confirm_query($db);
	$db_select = mysql_select_db('church',$db);
	confirm_query($db_select);
?>