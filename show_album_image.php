<?php
require_once("include/connection.php");
require_once("include/functions.php");

	if(isset($_GET['src'])){$src=$_GET['src'];}
	echo "<hr/><img id='show_album_image_big' src='{$src}' />
	<hr/>";
	
?>
<style>#show_album_image_big{width:880px; height:500px;}</style>