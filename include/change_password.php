<?php
if(!isset($_GET['change'])){
echo "<div id='change_password'></div>";

if($admin_right==3){echo "<div id='password_table'>";}
else{echo "<div id='password_table'>";}

echo"
<div class='container-fluid'>
	<div class='row'>
	<div class='col-md-6'>Enter the old password:</div>
	<div class='col-md-6'><input type='password' id='old_pass' size='40' maxlength='30'></div>
	</div>
	<div class='row'>
	<div class='col-md-6'>Enter the new password:</div>
	<div class='col-md-6'><input type='password' id='pass1' size='40' maxlength='30' ></div>
	</div>
	<div class='row'>
	<div class='col-md-6'>Confirm password</div>
	<div class='col-md-6'><input type='password' id='pass2' size='40' maxlength='30'></div>
	</div>
	<div class='row'>
	<div class='col-md-6'><button id='submit_change_password' OnClick='change_password()'>Change Password</button></div>
	</div>
</div></div>";
$actual_pass = mysqli_prep($db,$_SESSION['pass']);
echo"<input type='hidden' id='actual_pass' value=$actual_pass >";
}
elseif(isset($_GET['change'])){
session_start();
require_once("connection.php");
if(isset($_POST['pass1'])){
$pass1 = mysqli_prep($db,$_POST['pass1']);
$session_user = $_SESSION['user'];
$sql = "UPDATE security SET password='{$pass1}' WHERE username='{$session_user}'";
$result=mysqli_query($db,$sql);
if($result){
$query="SELECT * FROM security WHERE username='{$session_user}' ";
$res=mysqli_query($db,$query);
while($row=mysqli_fetch_array($res)){$sub_page=$row['admin_sub_page'];}
$_SESSION['pass'] = $pass1;
echo "<script>window.alert('Password changed successfully...!')</script>";
}}
}
?>
<script>
function show_change_password(){
var cpb= document.getElementById('change_password_button'); if(cpb) document.getElementById('change_password_button').style.visibility='hidden';
var pt = document.getElementById('password_table'); if(pt) document.getElementById('password_table').style.visibility='visible';
var sib = document.getElementById('show_information_button'); if(sib) document.getElementById('show_information_button').style.visibility='visible';
var si = document.getElementById('show_information'); if(si) document.getElementById('show_information').style.visibility='hidden';
var aub = document.getElementById('add_user_button'); if(aub) document.getElementById('add_user_button').style.visibility='visible';
var au = document.getElementById('add_user'); if(au) document.getElementById('add_user').style.visibility='hidden';
var aut = document.getElementById('add_user_table'); if(aut) document.getElementById('add_user_table').style.visibility='hidden';
var vub = document.getElementById('view_users_button'); if(vub) document.getElementById('view_users_button').style.visibility='visible';
var vu = document.getElementById('view_users'); if(vu) document.getElementById('view_users').style.visibility='hidden';
var atb = document.getElementById('add_teacher_button'); if(atb) document.getElementById('add_teacher_button').style.visibility='visible';
var at = document.getElementById('add_teacher'); if(at) document.getElementById('add_teacher').style.visibility='hidden';
var dtb = document.getElementById('del_teacher_button'); if(dtb) document.getElementById('del_teacher_button').style.visibility='visible';
var dt = document.getElementById('delete_teacher'); if(dt) document.getElementById('delete_teacher').style.visibility='hidden';
var smb = document.getElementById('show_mass_button'); if(smb) document.getElementById('show_mass_button').style.visibility='visible';
var mt = document.getElementById('mass_table'); if(mt) document.getElementById('mass_table').style.visibility='hidden';
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