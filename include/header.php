<?php /*if(!isset($_SESSION['user']))session_start();*/?>
<! DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<?php include("include/connection.php");
if(isset($_POST['submit_login'])){
$username=mysqli_prep($db,$_POST['username']);
$password=mysqli_prep($db,$_POST['password']);
$admin_page = NULL;$admin_sub_page = NULL;$admin_right = NULL;
$sql = "SELECT * FROM security WHERE username='{$username}' && password='{$password}' ";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
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

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
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
<div id="fb-root"></div>
<script>(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="admin_input">
	<form method="post"><table><tr><td>Username </td><td>:</td><td><input id='username' type="text" name="username" placeholder="Username" /></td></tr>
	<tr><td>Password </td><td>:</td><td><input id='password' type="password" name="password" placeholder="Password" /></td></tr>
	</table><button type='submit' name='submit_login' />Log In</button><button onClick='movein()'>Close</button><a onClick='forgot_pass()'>Forgot Password</a></form>
</div>
<div id='forgot' style="z-index:30;"></div>

<div id='wrapper_outer' class="container-fluid">
</div id='wrapper_right'>
	<div class="row" >
		<div class="col-md-7 church_title">Lourdes Forane Church</div>
		<div class="col-md-3" style="height:50px; font-size:20px;text-align:right;padding-top:20px;">
			<?php $sql="SELECT views from views";$res=mysqli_query($db,$sql);
			while($row=mysqli_fetch_array($res)){$new_view = $row['views'] + 1;
			$view = $row['views']; echo "Number of viewers :  ". $new_view;}
			if(($page=='home')||($page==NULL)){$sql = "UPDATE views set views ={$new_view} WHERE id=1"; $res=mysqli_query($db,$sql);}?>
		</div>
		<div id="admin_panel" class="col-md-2" onClick="moveout()" >Admin</div>

	</div>
	<div class="row" id='wrapper' style="height:50px;">
		<div class="col-md-11"><ul id="nav">
			<li><a id="tab_home" href="#" onclick="show_home()">HOME</a></li>    
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
			<ul><?php $query = "SELECT * FROM associations_table ORDER by name"; $result = mysqli_query($db,$query);
			while($row=mysqli_fetch_array($result)){
			$id=$row['id'];
			echo "<li><a href='#' onclick='show_associations({$id},1)'>{$row['name']}</a><ul>
			<li><a href='#' onclick='show_associations({$id},1)'>About {$row['name']} </a></li>
			<li><a href='#' onclick='show_associations({$id},2)'>Council Members</a></li></ul></li>";}?>
			</ul></li>
			<li><a href='#' id="tab_wards" onclick="show_wards(0,0)">WARDS</a>
			<ul><?php $query = "SELECT * FROM wards_table ORDER by name";$result = mysqli_query($db,$query);
			while($row=mysqli_fetch_array($result)){
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
			<li><a id="tab_contact" href="#" onclick="show_tab('contact')">CONTACT</a></li></ul>
		</div><!-- end of nav -->
		<div id="social_box" class="col-md-1" style="height:50px;">
			<a href="https://www.facebook.com/LourdesForaneChurch" target="_blank"><img src="images/facebook.png" alt="facebook" /></a>
			<a href="https://twitter.com/#!/ForaneLourdes" target="_blank"><img src="images/twitter.png" alt="twitter" /></a>
		</div>
	</div><!-- end of wrapper -->
</div><!-- end of wrapper_right -->
</div><!-- end of wrapper_outer -->
<script>
document.getElementById('forgot').style.visibility= 'hidden';
</script>