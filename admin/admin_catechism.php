<?php include("admin_header.php")?>
<div id="content">
<style>
#wrapper{height:270px; border:solid white;}
#show_gallery_button{float:right;}
#show_tables{height:270px; color:white; width:700px; float:right;background-color:black; margin-top:-273px;}
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:250px;}
div{color:white;}
th{color:white;}
#add_teacher_button,#del_teacher_button{float:right;}
#show_information{margin-left:300px;position:absolute; width:690px; margin-top:-290px; height:250px;}
#view_users{margin-left:300px;position:absolute; width:685px; margin-top:-300px; overflow-y:scroll; height:270px;}
#password_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
#add_user_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
</style>
<script>
window.onload=init;
function init(){
document.getElementById('password_table').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
}
</script>
<h2>Catechism Page</h2><br/><br/><br/>
<?php if(isset($_GET['action'])){ $action=$_GET['action'];} else{$action=NULL;} ?>
<?php if(($sub_page==0)&&($action==NULL)){
if($admin_right==2){echo "<div id='wrapper'>";}
	echo"<table>";
	if($admin_right>1){echo"<tr><td><button id='change_password_button' onclick='show_change_password()'>Change Password</button></td></tr>
	<tr><td><button id='show_information_button' onclick='show_information()'>Edit Information</button></td></tr>";}
	if($admin_right==2){
	echo "<tr><td><button id='add_user_button' onclick='add_user_table()'>Add User</button></td></tr>";
	echo "<tr><td><button id='view_users_button' onclick='show_users()'>Show Additional Users</button></td></tr>";
	}
	echo "<tr><td><br/><br/></td></tr></table>";
	if($admin_right==2)echo "<div id='show_tables'></div>";
	if($admin_right==2){echo"</div>";}
	
	if($admin_right>1){include("../include/change_password.php"); include("../include/info.php");}
	if($admin_right==2){include("../include/add_user.php"); include("../include/view_users.php");}
	if($admin_right==2){
	echo"<button id='add_teacher_button' onclick='add_teacher()'>Add a Teacher</button>";
	echo"<button id='del_teacher_button' onclick='del_teacher()'>Delete a Teacher</button>";
	include("../include/add_teacher.php");
	include("../include/del_teacher.php");
	}
	include("../include/display_admin_teachers.php");
	include("../include/display_admin_page_content.php");echo"<hr/>";
	if(isset($_GET['if'])){echo "<script>alert('No image selected');</script>";}
}
elseif($action==11){  //Insert Content Form 
include("../include/insert_form_admin_page_content.php");}
elseif($action==13){  //Update the page_content 
include("../include/update_admin_page_content.php");}
elseif($action==14){  //Delete the page_content
include("../include/delete_admin_page_content.php");} ?>
</div>
<?php include("admin_footer.php")?>