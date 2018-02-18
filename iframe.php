<?php
	require_once("include/connection.php");
	if(isset($_GET['page'])){$page=$_GET['page'];}
	if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
	if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;} 
echo "<iframe width='100%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
src='wards_slider.php?page={$page}&sub_page={$sub_page}&s_sub_page={$s_sub_page}'></iframe>";
?>