<?php include("admin_header.php")?>
<div id="content">
<style>
/* #show_gallery_button{float:right;}
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:250px;} */
 #add_teacher_button,#del_teacher_button,#show_teachers_button{width:100%;}
/* #show_information{margin-left:300px;position:absolute; width:690px; margin-top:-290px; height:250px;}
#view_users{margin-left:300px;position:absolute; width:685px; margin-top:-300px; height:270px;}
#password_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
#add_user_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;} */
</style>
<script>
window.onload=init;
function init(){
var pt = document.getElementById('password_table');
if(pt){
	document.getElementById('password_table').style.visibility='hidden';
	console.log("password_table :",document.getElementById('password_table').style.visibility);
} 

var aut = document.getElementById('add_user_table'); 
if(aut){
	document.getElementById('add_user_table').style.visibility='hidden';
	console.log("add_user_table :",document.getElementById('add_user_table').style.visibility);
} 

}
</script>
<h2>Catechism Page</h2><br/><br/>
<?php if(isset($_GET['action'])){ $action=$_GET['action'];} else{$action=NULL;} ?>
<?php if(($sub_page==0)&&($action==NULL)){
	
	echo "<div class='container-fluid'>
	<div class='row' id='adminWrapper'>
	<div class='col-md-3'>";
	if($admin_right>=2){
	echo "<button id='change_password_button' onclick='show_change_password()'>Change Password</button>
	<button id='show_information_button' onclick='show_information()'>Edit Information</button>";
	}
	if($admin_right<=2){
		echo "<button id='add_user_button' onclick='add_user_table()'>Add User</button>";
		echo "<button id='view_users_button' onclick='show_users()'>Show Additional Users</button>
		<button id='add_teacher_button' onclick='add_teacher()'>Add a Teacher</button>
		<button id='del_teacher_button' onclick='del_teacher()'>Delete a Teacher</button>
		";
	}
	echo"</div>
	<div class='col-md-9'>";
	
	if($admin_right>=2){
		include("../include/change_password.php");
		include("../include/info.php");
	}
	if($admin_right<=2){
		include("../include/view_users.php");
		include("../include/add_user.php");
		include("../include/add_teacher.php");
		include("../include/del_teacher.php");
	}

	echo "</div>
	</div>
	</div><hr/>";
	
	echo"<div id='show_teachers'>";
	include("../include/display_admin_page_teachers.php");
	echo "</div>";
	
	
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



<?php include("admin_footer.php")?>