<?php /*if(!isset($_SESSION['user']))session_start();*/?>
<! DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<?php require_once("include/connection.php");
require_once("include/functions.php");
if(isset($_POST['submit_login'])){
$username=mysql_prep($_POST['username']);
$password=mysql_prep($_POST['password']);
$admin_page = NULL;$admin_sub_page = NULL;$admin_right = NULL;
$sql = "SELECT * FROM security WHERE username='{$username}' && password='{$password}' ";
$result = mysql_query($sql,$db);
while($row=mysql_fetch_array($result))
{$_SESSION['user']=$username;$_SESSION['pass']=$password;
$_SESSION['admin_right']=$row['admin_right'];
$admin_page = $row['admin_page'];
$admin_sub_page = $row['admin_sub_page'];
$admin_right = $row['admin_right'];
}
if(($admin_page==NULL)&&($admin_sub_page==NULL)){$reply=1;}
else if(($admin_page!=NULL)&&($admin_sub_page!=NULL)){
echo "<script>window.location='admin/admin_{$admin_page}.php?page={$admin_page}&sub_page={$admin_sub_page}'</script>";}}
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lourdes Forane Church</title>
<link rel="shortcut icon" href="images/cross.png" />
<meta name="keywords" content="Lourdes Forane Church, Lourdes Church, Lourde Church, Church in Coimbatore, Roman Catholic Church, Gandhipuram Church, Lourdes Forane Church Gandhipuram\" />
<meta name="description" content="Lourdes Forane Church | Roman Catholic Church in Gandhipuram" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?php
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=NULL;}
if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=NULL;} ?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="css/other_pages.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
if(navigator.appName == "Microsoft Internet Explorer"){alert("This page cannot be viewed in Internet Explorer\n Please view in some other browser...!\nThank You :) ");window.location="http://www.google.com";}
</script>
</head>
<body id='body' onload="init()" onresize="init()">
<embed src="music.mp3" autostart="true" loop="true" width="2" height="0"></embed>
<img src="images/backgroun.jpg" style='position:absolute;width:100%;height:300px;' />
<div id="fb-root"></div>
<script>(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id='wrapper_outer'>
<div id="map_doc"><div id="map_view">
<iframe width="550" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="https://maps.google.com/maps/ms?msa=0&amp;msid=208968991286282719637.0004c284b66b7a1dd2a45&amp;ie=UTF8&amp;t=m&amp;ll=11.00978,76.985321&amp;spn=0.041957,0.059738&amp;z=13&amp;output=embed"></iframe><br />
<small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=208968991286282719637.0004c284b66b7a1dd2a45&amp;ie=UTF8&amp;t=m&amp;ll=11.00978,76.985321&amp;spn=0.041957,0.059738&amp;z=13&amp;source=embed" 
style="color:#0000FF;text-align:left">Coimbatore, Tamil Nadu</a> in a larger map</small></div>
<div id="location_name">Lourdes Forane Church</div><div id="location_address">Sathy Road, Near GP Hospital<br/>Gandhipuram, Coimbatore<br/>
Tamil Nadu, India<br/>Pincode: 641012</div>
<div id="satellite_view"><iframe width="550" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
src="https://maps.google.com/maps/ms?msa=0&amp;msid=208968991286282719637.0004c284b66b7a1dd2a45&amp;ie=UTF8&amp;t=h&amp;ll=11.009275,76.983948&amp;spn=0.041957,0.059738&amp;z=13&amp;output=embed"></iframe>
<br /><small>View <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=208968991286282719637.0004c284b66b7a1dd2a45&amp;ie=UTF8&amp;t=h&amp;ll=11.009275,76.983948&amp;spn=0.041957,0.059738&amp;z=13&amp;source=embed" 
style="color:#0000FF;text-align:left">Coimbatore, Tamil Nadu</a> in a larger map</small></div><div id="see_map" onclick="mapinout()">Location</div></div>
<div id='wrapper_right'>
<img id='mary_image' src="images/mary4.png" />
	<div id='viewers'>
	<?php $sql="SELECT views from views";$res=mysql_query($sql,$db);
	while($row=mysql_fetch_array($res)){$new_view = $row['views'] + 1;
	$view = $row['views']; echo "Number of viewers :  ". $new_view;}
	if(($page=='home')||($page==NULL)){$sql = "UPDATE views set views ={$new_view} WHERE id=1"; $res=mysql_query($sql,$db);}?></div>

	<div id="admin_panel"><div onmouseover="moveout()">Admin</div></div><div id="admin_input_wrapper" onmouseout="movein()"></div>
	<div id="admin_input"><br/><br/><br/><br/><br/><br/>
	<form method="post"><table><tr><td>Username </td><td>:</td><td><input id='username' type="text" onClick="validate_user()" name="username" placeholder="Username" /></td></tr>
	<tr><td>Password </td><td>:</td><td><input id='password' type="password" onClick="validate_user()" name="password" placeholder="Password" /></td></tr>
	</table><center><input type='submit' name='submit_login' value='Log In' /><a onClick='forgot_pass()'>Forgot Password</a></center></form></div>
	<div id='forgot' style="z-index:30;"></div>
	<div id='wrapper'>
	<div id='header'>
	<ul id="social_box"><li><a href="https://www.facebook.com/LourdesForaneChurch" target="_blank"><img src="images/facebook.png" alt="facebook" /></a></li>
	<li><a href="https://twitter.com/#!/ForaneLourdes" target="_blank"><img src="images/twitter.png" alt="twitter" /></a></li></ul>
	<div class="cleaner"></div></div>
		<div><ul id="nav">
		<li><a id="tab_home" href="#" style='color:red' onclick="show_home()">HOME</a></li>    
		<li><a href="#" id="tab_diocese" onclick="show_tab('history')">OUR DIOCESE</a>
		<ul>
		<li><a href="#" onclick="show_tab('history')">History</a></li>
		<li><a href="#" onclick="show_tab('bishop')">Our Bishop</a></li>
		<li><a href="#" onclick="show_parishes(2)">Parishes</a></li>
		<li><a href="#" onclick="show_institutions(1)">Institutions</a></li>
		<li><a href="#" onclick="show_convents(1)">Convents</a></li>
		</ul>
		</li>
		<li><a id="tab_associations" href='#' onclick="show_associations(0,0)">ASSOCIATIONS</a>
		<ul><?php $query = "SELECT * FROM associations_table ORDER by name"; $result = mysql_query($query,$db);
		while($row=mysql_fetch_array($result)){
		$id=$row['id'];
		echo "<li><a href='#' onclick='show_associations({$id},1)'>{$row['name']}</a><ul>
		<li><a href='#' onclick='show_associations({$id},1)'>About {$row['name']} </a></li>
		<li><a href='#' onclick='show_associations({$id},2)'>Council Members</a></li></ul></li>";}?>
		</ul></li>
		<li><a href='#' id="tab_wards" onclick="show_wards(0,0)">WARDS</a>
		<ul><?php $query = "SELECT * FROM wards_table ORDER by name";$result = mysql_query($query,$db);
		while($row=mysql_fetch_array($result)){
		$id=$row['id'];
		echo "<li><a href='#' onclick='show_wards({$id},1)'>{$row['name']}</a><ul>
		<li><a href='#' onclick='show_wards({$id},1)'>{$row['name']} Ward </a></li>
		<li><a href='#' onclick='show_wards({$id},2)'>Council Members</a></li>
		<li><a href='#' onclick='show_wards({$id},3)'>Prayer Meeting</a></li></ul></li>";}
		?></ul></li>
		<li><a id="tab_gallery" href="#" onclick="show_tab('gallery')">GALLERY</a></li>
		<li><a id="tab_catechism" href="#" onclick="show_catechism(0)">CATECHISM</a>
		<ul><li><a href="#" onclick="show_catechism(1)">Teaching Staff</a></li>
		<li><a href="#" onclick="show_catechism(2)">Class Photos</a></li>
		</ul></li>
		<li><a id="tab_links" href="#" onclick="show_links('0')" >LINKS</a></li>
		<li><a id="tab_contact" href="#" onclick="show_tab('contact')">CONTACT</a></li></ul></div><!-- end of nav -->
	</div>
<script>
document.getElementById('forgot').style.visibility= 'hidden';
</script>