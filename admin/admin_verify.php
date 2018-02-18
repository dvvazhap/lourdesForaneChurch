<?php 
if(!isset($_SESSION['user'])){session_start();}
require_once("../include/connection.php");
if(isset($_GET['reply'])){$reply=$_GET['reply'];}else{$reply=NULL;}
if(isset($_GET['page'])){$page=$_GET['page'];}else{$page=NULL;}
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{	$sub_page = 0;}
if(isset($_POST['username'])){$username=mysqli_prep($db,$_POST['username']);}
if(isset($_POST['password'])){$password=mysqli_prep($db,$_POST['password']);}
if(isset($_GET['logout']))
{session_destroy();
echo "<script>window.location='../home.php'</script>";}
if(($_SESSION['user']!=NULL)&&($_SESSION['pass']!=NULL)){
$username=mysqli_prep($db,$_SESSION['user']);$password=mysqli_prep($db,$_SESSION['pass']);$admin_right = $_SESSION['admin_right'];
$sql = "SELECT * FROM security WHERE username='{$username}' && password='{$password}'";$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){$admin_page = $row['admin_page'];$admin_sub_page = $row['admin_sub_page'];$admin_right = $row['admin_right'];}}
else{echo "<script>window.location= '../home.php'</script>";die;}
echo "Welcome {$username}...!";?>