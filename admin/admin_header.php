<?php 
require_once("../include/connection.php");
require_once("../include/functions.php"); 
if(isset($_GET['reply'])){$reply=$_GET['reply'];}else{$reply=NULL;}
if(isset($_GET['page'])){$page=$_GET['page'];}else{$page=NULL;}
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{	$sub_page = 0;}
include("admin_verify.php");?>
<!DOCTYPE html><html><head>
<title>Lourdes Forane Church</title>
<link rel="shortcut icon" href="../images/cross.png" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#pass_notify{color:green;}
#error_notify{color:red;}
</style>
</head>
<body><div id="header">Lourdes Forane Church<div id='logout'><form action="admin_verify.php?logout=1" method="post" /><input class='button' type="submit" value="Logout" /></form></div></div>
<div id="body">
<?php if($admin_right<=1){ include("admin_navigate.php");}?>