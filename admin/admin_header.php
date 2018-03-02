<?php 
require_once("../include/connection.php");
include("admin_verify.php");
if($_SESSION['admin_right'] != $admin_right){echo "<script>window.location= '../'</script>";die; }else{if($_SESSION['admin_right']>1){if(($_SESSION['admin_page']!=$_GET['page'])||($_SESSION['admin_sub_page']!=$_GET['sub_page'])){echo "<script>window.location= '../'</script>";die;}}}?>

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