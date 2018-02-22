<?php
require_once("include/connection.php");

	if(isset($_GET['src'])){$src=$_GET['src'];}
	echo "<hr/><img id='show_album_image_big' src='{$src}' />
	<hr/>";
	
?>
<style>#show_album_image_big{ position:relative; width:100%; margin-left: auto;	margin-right: auto;	display: block;}</style>