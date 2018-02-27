<?php include("admin_header.php")?>
<div id="content">
<style>
/* #button{float:left;} */
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:100%;}
/* #show_information{margin-left:300px;position:absolute; width:690px; margin-top:-290px; }
#view_users{margin-left:300px;position:absolute; width:685px; margin-top:-300px; height:270px;}
#password_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
#add_user_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;} */
</style>
<script>
window.onload=init;
function init(){
document.getElementById('password_table').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
}
</script>
<?php
	if(isset($_GET['action'])){	$action = $_GET['action'];}else{$action = NULL;}
	//DISPLAY WARDS INFO
$pag='ward';
if(($sub_page==0)&&($action==NULL)){ include("../include/aw_admin_ed.php"); }
elseif($action==20){   /*Add a new WARD  */	include("../include/aw_admin_create.php");}
elseif($action==21){ include("../include/aw_admin_get_posts.php"); }
elseif($action==22){   /*INSERT WARD INFO and PRAYER MEETING DEFAULT */
	$count=$_GET['count'];
	$sql = "INSERT INTO ward_info (`page`,`sub_page`,`temp_id`,`about`,`location`,`nof`) 
		VALUES('{$page}',{$count},{$count},'','',0)";
	$result = mysqli_query($db,$sql);
	if(!isset($result)){ echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=23'</script>"; }
	$sql = "INSERT INTO prayer_meeting (`page`,`sub_page`,`temp_id`,`date`,`time`,`name`,`address`,`information`)
			VALUES ('{$page}',{$count},{$count},'21 may 2012','5.30 p.m','Name','Address','Information')";
	$result=mysqli_query($db,$sql);
	if(!isset($result)){ echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=23'</script>"; }	
	echo "<script>window.location='admin_{$page}.php?page={$page}'</script>";
}
elseif($action==23){   //Delete a ward from wards_table,ward_info,council_members and prayer meeting
	include("../include/update_admin_aw_position.php");}
elseif($action==24){ include("../include/aw_admin_one_post.php");}
elseif(($action==NULL)&&($sub_page!=0)){


	if($admin_right>1){echo "<div class='container-fluid'><div class='row' id='adminWrapper'>"; }
	echo "<div class='col-md-3'>";
	if($admin_right>1){
		echo"<button id='change_password_button' onclick='show_change_password()'>Change Password</button>
		<button id='show_information_button' onclick='show_information()'>Edit Information</button>";}
	if($admin_right==2){
		echo "<button id='add_user_button' onclick='add_user_table()'>Add User</button>";
		echo "<button id='view_users_button' onclick='show_users()'>Show Additional Users</button>";
	}
	echo "<button id='show_gallery_button' class='album' onclick='show_gallery()'>Show Gallery</button></div>
	<div class='col-md-9'>";
	if($admin_right>1){include("../include/change_password.php");include("../include/info.php");}
	if($admin_right==2){include("../include/add_user.php");include("../include/view_users.php");}
	echo"</div>";
	if($admin_right>1){echo"</div></div>";}
	include("../include/add_gallery_image.php"); /*---------Add Gallery Image-----------*/
	
	
	
	
	
	$query = "SELECT * FROM {$page}_table WHERE id={$sub_page}";
	$result=mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result)){
	$page_name = $row['name'];
	echo "<br/><br/><br/><h4>Welcome to {$row['name']} Ward</h4><br/>";
	include("../include/page_table_image.php"); /*------ Page Table Image ----*/
	}
	include("../include/display_admin_page_content.php");

	//About the ward
	$query="SELECT * FROM ward_info WHERE sub_page={$sub_page}";
	$result=mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	if(!isset($result)){echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
	echo"<br/><h2 class='heading' >About {$page_name} Ward </h2><div class='container-fluid'><div class='row'><div class='col-md-12'><form action =\"admin_{$page}.php?page={$page}&action=0&sub_page={$sub_page}&admin_right={$admin_right} \" method=\"post\">";
	while($display = mysqli_fetch_array($result)){
		echo"<div class='row'><div class='col-md-3'></div><div class='col-md-4'><div class='row'><div class='col-md-3'>Location:</div><div class='col-md-9'><input type=\"text\" name='location' value=\"{$display['location']}\"/><br/><br/></div></div></div><div class='col-md-3'><div class='row'><div class='col-md-9'>Number of Families:</div><div class='col-md-3'><input type=\"text\" size=\"1\" name=\"nof\" value=\"{$display['nof']}\"/></div></div></div><div class='col-md-2'><input type=\"submit\" value=\"Save\"/></div></div><div class='row'><div class='col-md-4'>Something unique about {$page_name} Ward:</div><div class='col-md-8'><textarea name=\"about\" rows=\"4\" cols=\"50\">{$display['about']}</textarea></div></div>";
	}
	echo"</form></div></div></div>";
	include("../include/display_admin_council_members.php"); /*-----display_admin_council_members.php----------*/

	// $query="SELECT * FROM prayer_meeting WHERE sub_page={$sub_page} ";
	// $result=mysqli_query($db,$query);
	// echo"St.{$page_name} Ward Prayer Meeting Info:";
	// echo "<table>";
	// while($row=mysqli_fetch_array($result)){
	// echo"<form action = \"admin_{$page}.php?page={$page}&action=2&sub_page={$sub_page}\" method=\"post\" />
	// <tr><td>Date</td><td><input type=\"text\" name=\"date\" value=\"{$row['date']}\"/></td></tr>
	// <tr><td>Time</td><td><input type=\"text\" name=\"time\" value=\"{$row['time']}\"/></td></tr>
	// <tr><td>Name</td><td><input type=\"text\" name=\"name\" value=\"{$row['name']}\"/></td></tr>
	// <tr><td>Address</td><td><textarea rows=\"3\" cols=\"50\" name=\"address\" >{$row['address']}</textarea></td>
	// <tr><td>Information for all</td><td><textarea rows=\"5\" cols=\"50\" name=\"information\" >{$row['information']}</textarea></td>
	// <td><input type=\"submit\" value=\"Save\"></td></tr></form>";
	// }
	// echo "</table><hr/>";
if(isset($_GET['if'])){echo"<script type='text/javascript'>alert('Invalid File')";echo"</script>";}
}
elseif($action==0){     //Save the contents of wards info 
	if(isset($_POST['location'])){$location=$_POST['location'];} else{$location=NULL;}
	if(isset($_POST['about'])){$about=$_POST['about'];}	else{$about=NULL;}
	if(isset($_POST['nof'])){$nof=$_POST['nof'];} else{$nof=NULL;}
	$query="UPDATE ward_info
			SET location='{$location}',about='{$about}',nof={$nof}
			WHERE sub_page={$sub_page} ";
	$result=mysqli_query($db,$query);
	if($result){ 
		echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>";
		exit;
	}
	else{echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
}

elseif($action==2){  // Save the contents of prayer meeting
	$date=$_POST['date'];
	$time=$_POST['time'];
	$name=$_POST['name'];
	$address=$_POST['address'];	
	$information=$_POST['information'];
	$query = "UPDATE prayer_meeting 
				SET date='{$date}',time='{$time}',name='{$name}',address='{$address}',information='{$information}' 
				WHERE sub_page={$sub_page}";
	$result=mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	if(isset($result)){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>";}
	else{echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
}
elseif($action==11){  /* Insert Content Form */ include("../include/insert_form_admin_page_content.php");}
elseif($action==13){  /*Update the page_content */ include("../include/update_admin_page_content.php");}
elseif($action==14){  /*Delete the page_content */ include("../include/delete_admin_page_content.php");}
?>
</div>
<?php include("admin_footer.php")?>