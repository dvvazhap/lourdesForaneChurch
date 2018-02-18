<?php
if(!isset($_GET['add'])){
echo "<div id='add_user' style='width:auto'></div>
<table id='add_user_table'>
	<tr><th>Username</th><th>:</th><td><input type='text' id='add_username' size='40' maxlength ='30' /></td></tr>
	<tr><th>Password</th><th>:</th><td><input type='password' id='add_password' size='40' maxlength ='30' /></td></tr>
	<tr><th></th><td></td><td><button onclick='add_user()'>Add User</button></td></tr>
</table>";
}
?>
<script>
function add_user_table(){

document.getElementById('add_user_button').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='visible';
	document.getElementById('show_information').style.visibility='hidden';
	document.getElementById('show_information_button').style.visibility='visible';
	document.getElementById('password_table').style.visibility='hidden';
	document.getElementById('change_password').style.visibility='hidden';
	document.getElementById('change_password_button').style.visibility='visible';
	var admin_right= document.getElementById('admin_right').value;
	if(admin_right<=2){
	document.getElementById('view_users').style.visibility='hidden';
	document.getElementById('view_users_button').style.visibility='visible';
}
}
function add_user(){
	var add_user = document.getElementById('add_username').value;
	var add_pass = document.getElementById('add_password').value;

	if((add_user=='')||(add_pass==''))alert('Username and password should not be empty');
	else if((add_user!='')&&(add_pass!='')){
		document.getElementById('add_user_table').style.visibility='hidden';
		var xmlhttp;
		if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
		else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("add_user").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("POST","../include/add_user.php?add=1",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("add_user="+add_user+"&add_pass="+add_pass);
	}
}
</script>

<?php
if(isset($_GET['add'])){
session_start();
require_once("connection.php");
$add_user=mysqli_prep($db,$_POST['add_user']);
$add_pass=mysqli_prep($db,$_POST['add_pass']);
	$sql="SELECT * FROM security where username='{$add_user}'";
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){
		echo "<div id='error_notify'>Sorry..! Someone have already registered with that username<br/>Try with an altername username<br/></div>
		<table id='add_user_table'>
		<tr><th>Username</th><th>:</th><td><input type='text' id='add_username' size='40' maxlength ='30' /></td></tr>
		<tr><th>Password</th><th>:</th><td><input type='password' id='add_password' size='40' maxlength ='30' /></td></tr>
		<tr><th></th><td></td><td><button onclick='add_user()'>Add User</button></td></tr></table>";
	}
	$r = mysqli_query($db,"SELECT * FROM security WHERE username = '{$_SESSION['user']}'");
	while($row = mysqli_fetch_array($r)){
		$page = $row['admin_page'];
		$sub_page = $row['admin_sub_page'];
		$admin_right = $row['admin_right'];
	}
	if($page=="home"){
		if($admin_right==0)$new_admin_right=1;
		elseif($admin_right==1)$new_admin_right=3;
	}
	elseif(($page=="wards")||($page=="associations")||($page=="catechism")){$new_admin_right=3;} 
	$query="INSERT into security(`id`,`temp_id`,`admin_page`,`admin_sub_page`,`admin_right`,`username`,`password`) 
		VALUES(1,1,'{$page}',{$sub_page},{$new_admin_right},'{$add_user}','{$add_pass}')";
	$result=mysqli_query($db,$query);
	if($result){echo "<div id='pass_notify'>User created successfully</div>";}
}
?>