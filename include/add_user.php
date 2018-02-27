<?php
if(!isset($_GET['add'])){
echo "<div id='add_user' ></div>
<div class='container-fluid' id='add_user_table'>
<div class='row'>
<div class='col-md-4'>Username:</div>
<div class='col-md-6'><input type='text' id='add_username' size='40' maxlength ='30' /></div>
</div>
<div class='row'>
<div class='col-md-4'>Password:</div>
<div class='col-md-6'><input type='password' id='add_password' size='40' maxlength ='30' /></div>
</div>
<div class='row'>
<div class='col-md-4'><button onclick='add_user()'>Add User</button></div>
</div>
</div>";
}
?>
<script>
function add_user_table(){

var aub = document.getElementById('add_user_button'); if(aub) document.getElementById('add_user_button').style.visibility='hidden';
var au = document.getElementById('add_user'); if(au) document.getElementById('add_user').style.visibility='visible';
var aut = document.getElementById('add_user_table'); if(aut) document.getElementById('add_user_table').style.visibility='visible';

var sib = document.getElementById('show_information_button'); if(sib) document.getElementById('show_information_button').style.visibility='visible';
var si = document.getElementById('show_information'); if(si) document.getElementById('show_information').style.visibility='hidden';

var cpb= document.getElementById('change_password_button'); if(cpb) document.getElementById('change_password_button').style.visibility='visible';
var pt = document.getElementById('password_table'); if(pt) document.getElementById('password_table').style.visibility='hidden';

var vub = document.getElementById('view_users_button'); if(vub) document.getElementById('view_users_button').style.visibility='visible';
var vu = document.getElementById('view_users'); if(vu) document.getElementById('view_users').style.visibility='hidden';

var atb = document.getElementById('add_teacher_button'); if(atb) document.getElementById('add_teacher_button').style.visibility='visible';
var at = document.getElementById('add_teacher'); if(at) document.getElementById('add_teacher').style.visibility='hidden';

var dtb = document.getElementById('del_teacher_button'); if(dtb) document.getElementById('del_teacher_button').style.visibility='visible';
var dt = document.getElementById('delete_teacher'); if(dt) document.getElementById('delete_teacher').style.visibility='hidden';
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
		echo "<div ></div>";



		echo"<div class='container-fluid' id='add_user_table'>
		<div class='row'>
		<div class='col-md-12' id='error_notify'>
			Sorry..! Someone have already registered with that username. Try with an altername username.
		</div>
		</div>
		<div class='row'>
		<div class='col-md-4'>Username:</div>
		<div class='col-md-6'><input type='text' id='add_username' size='40' maxlength ='30' /></div>
		</div>
		<div class='row'>
		<div class='col-md-4'>Password:</div>
		<div class='col-md-6'><input type='password' id='add_password' size='40' maxlength ='30' /></div>
		</div>
		<div class='row'>
		<div class='col-md-4'><button onclick='add_user()'>Add User</button></div>
		</div>
		</div>";
	}
	$r = mysqli_query($db,"SELECT * FROM security WHERE username = '{$_SESSION['user']}'");
	while($row = mysqli_fetch_array($r)){
		$page = $row['admin_page'];
		$sub_page = $row['admin_sub_page'];
		$admin_right = $row['admin_right'];
	}
	if($page=="home"){
		$new_admin_right=$admin_right+1;
	}
	elseif(($page=="wards")||($page=="associations")||($page=="catechism")){$new_admin_right=3;} 
	$query="INSERT into security(`id`,`temp_id`,`admin_page`,`admin_sub_page`,`admin_right`,`username`,`password`) 
		VALUES(1,1,'{$page}',{$sub_page},{$new_admin_right},'{$add_user}','{$add_pass}')";
	$result=mysqli_query($db,$query);
	if($result){echo "<div id='pass_notify'>User created successfully</div>";}
}
?>