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
document.getElementById('add_user').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
document.getElementById('add_user_button').style.visibility='visible';

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
$temp_user=mysqli_prep($db,$_GET['delete_user']);
$sql="DELETE FROM security WHERE username='{$temp_user}'";
$result=mysqli_query($db,$sql);
if($result){echo "<script>alert('User have been deleted successfully...!');</script>";}
}
if((isset($_GET['view']))&&(!isset($_GET['delete_user']))){



if(!isset($_SESSION['user'])){session_start();}
require_once("connection.php");
$r = mysqli_query($db,"SELECT * FROM security WHERE username = '{$_SESSION['user']}'");
while($row = mysqli_fetch_array($r)){
	$page = $row['admin_page'];
	$sub_page = $row['admin_sub_page'];
	$admin_right = $row['admin_right'];
}
echo "<div class='container-fluid' style='max-height:250px;overflow-y:scroll;'>
<div class='row'>
	<div class='col-md-3'><b>Username</b></div>
	<div class='col-md-4'><b>Page Name</b></div>
	<div class='col-md-3'><b>Access Right</b>
	<br/><br/></div>
	<div class='col-md-2'></div>
</div>";

if(($page=='wards')||($page=='associations')){
	$sql="SELECT * FROM security WHERE admin_page='{$page}' && admin_sub_page={$sub_page} && admin_right=3";
	$res=mysqli_query($db,$sql);
	while($row1= mysqli_fetch_array($res)){
		$query="SELECT * FROM {$page}_table WHERE id={$row1['admin_sub_page']} "; 
		$res1=mysqli_query($db,$query);
		while($display=mysqli_fetch_array($res1)){
		$page_name=$display['name'];
		echo"<div class='row'>
		<div class='col-md-3'>{$row1['username']}</div>
		<div class='col-md-4'>{$page_name}</div>
		<div class='col-md-3'>{$row1['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row1['username']}\">Delete</button></div>
		</div>";
		}
		}
}
elseif($page=='catechism'){
	$sql="SELECT * FROM security WHERE admin_page='catechism' && admin_right=3";
	$res=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($res)){
		echo"<div class='row'>
		<div class='col-md-3'>{$row['username']}</div>
		<div class='col-md-4'>Catechism</div>
		<div class='col-md-3'>{$row['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete</button></div>
		</div>";
	}
}
elseif($page=='home'){


	$sql="SELECT * FROM security WHERE admin_page='home' && admin_right>{$admin_right} && admin_right!=2";
	$res=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($res)){
		echo"<div class='row'>
		<div class='col-md-3'>{$row['username']}</div>
		<div class='col-md-4'>Home</div>
		<div class='col-md-3'>{$row['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete</button></div>
		</div>";
	}

	$sql="SELECT * FROM security WHERE admin_page='catechism' && admin_right=3";
	$res=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($res)){
		echo"<div class='row'>
		<div class='col-md-3'>{$row['username']}</div>
		<div class='col-md-4'>Catechism</div>
		<div class='col-md-3'>{$row['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row['username']}\">Delete</button></div>
		</div>";
	}

	$sql1="SELECT DISTINCT * FROM security WHERE admin_page='wards' && admin_right=3";
	$res1=mysqli_query($db,$sql1);
	while($row1=mysqli_fetch_array($res1)){
		$sq2="SELECT * FROM wards_table WHERE id={$row1['admin_sub_page']}";
		$res2=mysqli_query($db,$sq2);
		while($row2=mysqli_fetch_array($res2)){$page_name=$row2['name'];}
		echo"<div class='row'>
		<div class='col-md-3'>{$row1['username']}</div>
		<div class='col-md-4'>{$page_name}</div>
		<div class='col-md-3'>{$row1['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row1['username']}\">Delete</button></div>
		</div>";
	}

	$sql3="SELECT DISTINCT * FROM security WHERE admin_page='associations' && admin_right=3";
	$res3=mysqli_query($db,$sql3);
	while($row3=mysqli_fetch_array($res3)){
		$sq4="SELECT * FROM associations_table WHERE id={$row3['admin_sub_page']}";
		$res4=mysqli_query($db,$sq4);
		while($row4=mysqli_fetch_array($res4)){$page_name=$row4['name'];	}

		echo"<div class='row'>
		<div class='col-md-3'>{$row3['username']}</div>
		<div class='col-md-4'>{$page_name}</div>
		<div class='col-md-3'>{$row3['admin_right']}</div>
		<div class='col-md-2'><button id='temp_user' onclick='delete_temp_user(this.value)' value=\"{$row3['username']}\">Delete</button></div>
		</div>";
	}

	echo "</div>"; //closing container-fluid
}
}
?>
