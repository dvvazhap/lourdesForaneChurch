<?php
if(!isset($_GET['change'])){
echo "<div id='change_password'></div>";

if($admin_right==3){echo "<div id='password_table' style='margin-top:-180px;'>";}
else{echo "<div id='password_table'>";}
echo"Password should contain characters such as ' \" $ / \ & % ? 
<table><tr><th align='left'>Enter the old password</th><td>:</td><td><input type='password' id='old_pass' size='40' maxlength='30'></td></tr>
<tr><th align='left'>Enter the new password</th><td>:</td><td><input type='password' id='pass1' size='40' maxlength='30' ></td></tr>
<tr><th align='left'>Confirm password</th><td>:</td><td><input type='password' id='pass2' size='40' maxlength='30'></td></tr>
<tr><th></th><td></td><td><button id='submit_change_password' OnClick='change_password()'>Change Password</button></td></tr>
</table></div>";
$actual_pass = mysql_prep($_SESSION['pass']);
echo"<input type='hidden' id='actual_pass' value=$actual_pass >";
}
elseif(isset($_GET['change'])){
session_start();
require_once("connection.php");
require_once("functions.php");
if(isset($_POST['pass1'])){
$pass1 = mysql_prep($_POST['pass1']);
$session_user = $_SESSION['user'];
$sql = "UPDATE security SET password='{$pass1}' WHERE username='{$session_user}'";
$result=mysql_query($sql,$db);
if($result){
$query="SELECT * FROM security WHERE username='{$session_user}' ";
$res=mysql_query($query,$db);
while($row=mysql_fetch_array($res)){$sub_page=$row['admin_sub_page'];$admin_right=$row['admin_right'];}
$_SESSION['pass'] = $pass1;
echo "<div id='pass_notify' style='width:500px; font-size:30px; margin-left:300px;'>Password changed successfully...!</div>";
}}
}
?>
<script>
function show_change_password(){
document.getElementById('password_table').style.visibility='visible';
document.getElementById('show_information').style.visibility='hidden';
document.getElementById('show_information_button').style.visibility='visible';
document.getElementById('change_password_button').style.visibility='hidden';
var admin_right= document.getElementById('admin_right').value;
if(admin_right<=2){
document.getElementById('add_user').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
document.getElementById('add_user_button').style.visibility='visible';
document.getElementById('view_users').style.visibility='hidden';
document.getElementById('view_users_button').style.visibility='visible';
}
}
function change_password(){
var actual_pass = document.getElementById('actual_pass').value;
var old_pass = document.getElementById('old_pass').value;
var pass1 = document.getElementById('pass1').value;
var pass2 = document.getElementById('pass2').value;
if(actual_pass!=old_pass)alert('Old Password is not valid');
else if(actual_pass==old_pass){
	if(pass1=='') alert('Password should not be empty');
	if(old_pass==pass1) alert('Old password and new password are same');
	else{
		if(pass1!=pass2)alert('New Password and Confirm Password Columns do not match');
		else{
			document.getElementById('password_table').style.visibility='hidden';
			var xmlhttp;
			if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
			else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("change_password").innerHTML=xmlhttp.responseText;
					}
			}
			xmlhttp.open("POST","../include/change_password.php?change=1",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("pass1="+pass1);
		}
	}
}
}
</script>