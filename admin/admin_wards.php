<?php include("admin_header.php")?>
<div id="content">
<style>
#wrapper{height:270px; border:solid white;}
#button{float:left;}
#show_tables{height:270px; color:white; width:700px; float:right;background-color:black; margin-top:-272px;}
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:250px;}
div{color:white;}
th{color:white;}
#show_information{margin-left:300px;position:absolute; width:690px; margin-top:-290px; }
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
		VALUES('{$page}',{$count},{$count},'about our ward','location of our ward',43)";
	$result = mysql_query($sql,$db);
	if(!isset($result)){ echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=23'</script>"; }
	$sql = "INSERT INTO prayer_meeting (`page`,`sub_page`,`temp_id`,`date`,`time`,`name`,`address`,`information`)
			VALUES ('{$page}',{$count},{$count},'21 may 2012','5.30 p.m','Name','Address','Information')";
	$result=mysql_query($sql,$db);
	if(!isset($result)){ echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=23'</script>"; }	
	echo "<script>window.location='admin_{$page}.php?page={$page}'</script>";
}
elseif($action==23){   //Delete a ward from wards_table,ward_info,council_members and prayer meeting
	include("../include/update_admin_aw_position.php");}
elseif($action==24){ include("../include/aw_admin_one_post.php");}
elseif(($action==NULL)&&($sub_page!=0)){
	
	if($admin_right==2){echo "<div id='wrapper'>";}
	echo"<table>";
	if($admin_right>1){	echo"<tr><td><button id='change_password_button' onclick='show_change_password()'>Change Password</button></td></tr>
	<tr><td><button id='show_information_button' onclick='show_information()'>Edit Information</button></td></tr>";}
	if($admin_right==2){
	echo "<tr><td><button id='add_user_button' onclick='add_user_table()'>Add User</button></td></tr>";
	echo "<tr><td><button id='view_users_button' onclick='show_users()'>Show Additional Users</button></td></tr>";
	}
	echo "<tr><td><button id='show_gallery_button' class='album' onclick='show_gallery()'>Show Gallery</button></td></tr></table>";
	if($admin_right==2) echo "<div id='show_tables'></div>";
	if($admin_right==2){echo"</div>";}

	if($admin_right>1){include("../include/change_password.php");include("../include/info.php");}
	if($admin_right==2){include("../include/add_user.php");
	include("../include/view_users.php");}
	include("../include/add_gallery_image.php"); /*---------Add Gallery Image-----------*/
	
	$query = "SELECT * FROM {$page}_table WHERE id={$sub_page}";
	$result=mysql_query($query,$db);
	while($row = mysql_fetch_array($result)){
	$page_name = $row['name'];
	echo "<br/><br/><br/><h4>Welcome to {$row['name']} Ward</h4><br/>";
	include("../include/page_table_image.php"); /*------ Page Table Image ----*/
	}
	include("../include/display_admin_council_members.php"); /*-----display_admin_council_members.php----------*/
	include("../include/display_admin_page_content.php");

	$query="SELECT * FROM ward_info WHERE sub_page={$sub_page}";
	$result=mysql_query($query,$db);
	confirm_query($result);
	if(!isset($result)){echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}
	echo"<br/>About {$page_name} Ward :";
	
	echo"<table cellpadding=10 cellspacing=4>";
	while($display = mysql_fetch_array($result)){
		echo"<form action =\"admin_{$page}.php?page={$page}&action=0&sub_page={$sub_page}&admin_right={$admin_right} \" method=\"post\">
		<tr><td>About {$page_name} Ward:</td><td><textarea name=\"about\" rows=\"4\" cols=\"50\">{$display['about']}</textarea></td></tr>
		<tr><td>Location :</td><td><textarea name=\"location\" rows=\"3\" cols=\"50\">{$display['location']}</textarea></td></tr>
		<tr><td>Number of Families :</td><td><input type=\"text\" size=\"1\" name=\"nof\" value=\"{$display['nof']}\"/></td>
		<td><input type=\"submit\" value=\"Save\"/></td></tr></form>";
	}
	echo"</table><hr/>";
	
	$query="SELECT * FROM prayer_meeting WHERE sub_page={$sub_page} ";
	$result=mysql_query($query,$db);
	echo"St.{$page_name} Ward Prayer Meeting Info:";
	echo "<table>";
	while($row=mysql_fetch_array($result)){
	echo"<form action = \"admin_{$page}.php?page={$page}&action=2&sub_page={$sub_page}\" method=\"post\" />
	<tr><td>Date</td><td><input type=\"text\" name=\"date\" value=\"{$row['date']}\"/></td></tr>
	<tr><td>Time</td><td><input type=\"text\" name=\"time\" value=\"{$row['time']}\"/></td></tr>
	<tr><td>Name</td><td><input type=\"text\" name=\"name\" value=\"{$row['name']}\"/></td></tr>
	<tr><td>Address</td><td><textarea rows=\"3\" cols=\"50\" name=\"address\" >{$row['address']}</textarea></td>
	<tr><td>Information for all</td><td><textarea rows=\"5\" cols=\"50\" name=\"information\" >{$row['information']}</textarea></td>
	<td><input type=\"submit\" value=\"Save\"></td></tr></form>";
	}
	echo "</table><hr/>";
	if(isset($_GET['if'])){echo"<script type='text/javascript'>alert('Invalid File')";echo"</script>";}
}
elseif($action==0){     //Save the contents of wards info 
	if(isset($_POST['location'])){$location=$_POST['location'];} else{$location=NULL;}
	if(isset($_POST['about'])){$about=$_POST['about'];}	else{$about=NULL;}
	if(isset($_POST['nof'])){$nof=$_POST['nof'];} else{$nof=NULL;}
	$query="UPDATE ward_info
			SET location='{$location}',about='{$about}',nof={$nof}
			WHERE sub_page={$sub_page} ";
	$result=mysql_query($query,$db);
	if($result){ 
		echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>";
		exit;
	}
	else{echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}
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
	$result=mysql_query($query,$db);
	confirm_query($result);
	if(isset($result)){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>";}
	else{echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}
}
elseif($action==11){  /* Insert Content Form */ include("../include/insert_form_admin_page_content.php");}
elseif($action==13){  /*Update the page_content */ include("../include/update_admin_page_content.php");}
elseif($action==14){  /*Delete the page_content */ include("../include/delete_admin_page_content.php");}
?>
</div>
<?php include("admin_footer.php")?>