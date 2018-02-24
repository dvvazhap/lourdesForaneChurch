<?php 
require_once("../include/connection.php");
if(isset($_GET['reply'])){$reply=$_GET['reply'];}else{$reply=NULL;}
if(isset($_GET['page'])){$page=$_GET['page'];}else{$page=NULL;}
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{	$sub_page = 0;}
include("admin_verify.php");?>
<!DOCTYPE html><html><head>
<title>Lourdes Forane Church</title>
<link rel="shortcut icon" href="../images/cross.png" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#pass_notify{color:green;}
#error_notify{color:red;}
</style>
</head>
<body><div id="header">Lourdes Forane Church</div>
<div id="body">
<?php include("admin_navigate.php");?>