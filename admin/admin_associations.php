<?php include("admin_header.php")?>
<div id="content">
<style>
#button{float:left;}
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:250px;}
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
<?php if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=NULL;}
if(isset($_GET['action'])){$action=$_GET['action'];}else{$action=NULL;}
if($sub_page==NULL){echo"<h2>Associations Page</h2>";}
$pag='association';
if(($sub_page==0)&&($action==NULL)){ include("../include/aw_admin_ed.php");}
elseif($action==20){   /*Add a new ASSOCIATION  */	include("../include/aw_admin_create.php");}
elseif($action==21){ include("../include/aw_admin_get_posts.php"); }
elseif($action==23){   /*Delete a ward from associations_table and council_members */
include("../include/update_admin_aw_position.php");}
elseif($action==24){ include("../include/aw_admin_one_post.php");}
elseif(($action==NULL)&&($sub_page!=0)){
	if($admin_right==2){echo "<div id='adminWrapper'>";}
	echo"<table>";
	if($admin_right>1){echo"<tr><td><button id='change_password_button' onclick='show_change_password()'>Change Password</button></td></tr>
	<tr><td><button id='show_information_button' onclick='show_information()'>Edit Information</button></td></tr>";}
	if($admin_right==2){
	echo "<tr><td><button id='add_user_button' onclick='add_user_table()'>Add User</button></td></tr>";
	echo "<tr><td><button id='view_users_button' onclick='show_users()'>Show Additional Users</button></td></tr>";
	}
	echo "<tr><td><button id='show_gallery_button' class='album' onclick='show_gallery()'>Show Gallery</button></td></tr></table>";
	if($admin_right==2){echo"</div>";}
	
	if($admin_right>1){include("../include/change_password.php"); include("../include/info.php");}
	if($admin_right==2){include("../include/add_user.php");
	include("../include/view_users.php");}
	include("../include/add_gallery_image.php"); /*---------Add Gallery Image-----------*/
$query = "SELECT * FROM {$page}_table WHERE id={$sub_page}";$result=mysqli_query($db,$query);
while($row = mysqli_fetch_array($result)){$page_name = $row['name'];echo "<br/><br/><br/><h4>Welcome to {$row['name']} Association</h4><br/>";include("../include/page_table_image.php");}
include("../include/display_admin_council_members.php");
include("../include/display_admin_page_content.php");echo"<hr/>";
if(isset($_GET['if'])){echo"<script type='text/javascript'>alert('Invalid File')";echo"</script>";}}
elseif($action==11){  /* Insert Content Form */ include("../include/insert_form_admin_page_content.php");}
elseif($action==13){  /*Update the page_content */ include("../include/update_admin_page_content.php");}
elseif($action==14){  /*Delete the page_content */ include("../include/delete_admin_page_content.php");}
echo "</div>";
include("admin_footer.php");?>