<script>
function show_users(){
	document.getElementById('view_users_button').style.visibility='hidden';
	document.getElementById('view_users').style.visibility='visible';
	document.getElementById('show_information').style.visibility='hidden';
	document.getElementById('show_information_button').style.visibility='visible';
	document.getElementById('password_table').style.visibility='hidden';
	document.getElementById('change_password').style.visibility='hidden';
document.getElementById('change_password_button').style.visibility='visible';
var admin_right= document.getElementById('admin_right').value;
if(admin_right<=2){
document.getElementById('add_user').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
document.getElementById('add_user_button').style.visibility='visible';
}
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("view_users").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/view_users.php?view=1",true);
	xmlhttp.send();
}
function delete_temp_user(a){
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("view_users").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/view_users.php?delete_user="+a,true);
	xmlhttp.send();
}
</script>
<?php
if((!isset($_GET['view']))&&(!isset($_GET['delete_user']))){
echo "<div id='view_users'></div>";
}
if(isset($_GET['delete_user'])){
session_start();
require_once("connection.php");
require_once("functions.php");
$temp_user=mysql_prep($_GET['delete_user']);
$sql="DELETE FROM security WHERE username='{$temp_user}'";
$result=mysql_query($sql,$db);
if($result){echo "User have been deleted successfully...!<script>alert('hi');</script>";}
}
if((isset($_GET['view']))&&(!isset($_GET['delete_user']))){
if(!isset($_SESSION['user'])){session_start();}
require_once("connection.php");
require_once("functions.php");
$r = mysql_query("SELECT * FROM security WHERE username = '{$_SESSION['user']}'");
while($row = mysql_fetch_array($r)){
	$page = $row['admin_page'];
	$sub_page = $row['admin_sub_page'];
	$admin_right = $row['admin_right'];
}
if(($page=='wards')||($page=='associations')){
	$sql="SELECT * FROM security WHERE admin_page='{$page}' && admin_sub_page={$sub_page} && admin_right=3";
	$res=mysql_query($sql,$db);
	$c=mysql_num_rows($res);
	if($c>0){echo "<table><tr><th>Username</th></tr>";}
	else {echo"No additional users for this page...!";}
	while($row1= mysql_fetch_array($res)){
		$query="SELECT * FROM {$page}_table WHERE id={$row1['admin_sub_page']} "; 
		$res1=mysql_query($query,$db);
		while($display=mysql_fetch_array($res1)){
		$page_name=$display['name'];
		echo"<tr><td align=\"center\">{$row1['username']}</td>
		<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row1['username']}\">Delete this user</button></td></tr>";
		}
		}
		if($c>0){echo"</table>";}
}
elseif($page=='catechism'){
$sql="SELECT * FROM security WHERE admin_page='catechism' && admin_right=3";
$res=mysql_query($sql,$db);
$c=mysql_num_rows($res);
if($c>0){
echo "Catechism page Users...!<br/>";
echo "<table><tr><th>Username</th></tr>";}
else{echo "No additional users in catechism page...!<br/>";}
while($row=mysql_fetch_array($res)){
	echo"<tr><td align=\"center\">{$row['username']}</td>
	<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete this user</button></td></tr>";
}
if($c>0){echo "</table>";}
}
elseif($page=='home'){
$sql="SELECT * FROM security WHERE admin_page='home' && admin_right>{$admin_right} && admin_right!=2";
$res=mysql_query($sql,$db);
$c=mysql_num_rows($res);
if($c>0){
echo "Home page Users...!<br/>";
echo "<table><tr><th>Username</th></tr>";}
else{echo "No additional users in home page...!<br/>";}
while($row=mysql_fetch_array($res)){
	echo"<tr><td align=\"center\">{$row['username']}</td>
	<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete this user</button></td></tr>";
}
if($c>0){echo "</table>";}

$sql="SELECT * FROM security WHERE admin_page='catechism' && admin_right=3";
$res=mysql_query($sql,$db);
$c=mysql_num_rows($res);
if($c>0){
echo "Catechism page Users...!<br/>";
echo "<table><tr><th>Username</th></tr>";}
else{echo "No additional users in catechism page...!<br/>";}
while($row=mysql_fetch_array($res)){
	echo"<tr><td align=\"center\">{$row['username']}</td>
	<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete this user</button></td></tr>";
}
if($c>0){echo "</table>";}


$sql1="SELECT DISTINCT admin_sub_page,username FROM security WHERE admin_page='wards' && admin_right=3";
$res1=mysql_query($sql1,$db);
$c=mysql_num_rows($res1);
if($c>0){
echo "<hr/>Wards users...!<br/>";
echo "<table border><tr><th>Username</th><th>Page Name</th></tr>";}
else{echo "No additional users in Wards page...!<br/>";}
while($row1=mysql_fetch_array($res1)){
	$sq2="SELECT * FROM wards_table WHERE id={$row1['admin_sub_page']}";
	$res2=mysql_query($sq2,$db);
	while($row2=mysql_fetch_array($res2)){$page_name=$row2['name'];}
	echo"<tr><td align=\"center\">{$row1['username']}</td><td align=\"center\">{$page_name}</td>
	<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row1['username']}\">Delete this user</button></td></tr>";
}
if($c>0){echo "</table>";}

$sql3="SELECT DISTINCT admin_sub_page,username FROM security WHERE admin_page='associations' && admin_right=3";
$res3=mysql_query($sql3,$db);
$c=mysql_num_rows($res3);
if($c>0){
echo "<hr/>Association users...!";
echo "<table border><tr><th>Username</th><th>Page Name</th></tr>";}
else{echo "No additional users in Associations page...!";}
while($row3=mysql_fetch_array($res3)){
	$sq4="SELECT * FROM associations_table WHERE id={$row3['admin_sub_page']}";
	$res4=mysql_query($sq4,$db);
	while($row4=mysql_fetch_array($res4)){$page_name=$row4['name'];	}
	echo"<tr><td align=\"center\">{$row3['username']}</td><td align=\"center\">{$page_name}</td>
	<td><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row3['username']}\">Delete this user</button></td></tr>";
}
if($c>0){echo "</table>";}	
}
}
?>
