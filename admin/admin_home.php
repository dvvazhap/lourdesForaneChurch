<?php include("admin_header.php")?>
<div id='content'>
<style>
#create_event{width:500px;z-index:90; left:0; padding:10px; position:absolute; font-size:18px; background-color:#272727;color:#fff;}
</style>
<script>
window.onload=init;
function init(){
document.getElementById('create_event').style.visibility='hidden';
var pt = document.getElementById('password_table'); if(pt) document.getElementById('password_table').style.visibility='hidden';
var si = document.getElementById('show_information'); if(si) document.getElementById('show_information').style.visibility='hidden';
var aut = document.getElementById('add_user_table'); if(aut) document.getElementById('add_user_table').style.visibility='hidden';
var mt = document.getElementById('mass_table'); if(mt) document.getElementById('mass_table').style.visibility='hidden';
show_events();
}
function create_event(){
document.getElementById('create_event').style.visibility='visible';
document.getElementById('create_event_button').style.visibility='hidden';
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("create_event").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("GET","../include/update_events.php?create_event=1",true);
	xmlhttp.send();
	setTimeout('show_events()',300);
}
function save_event(){
var day = document.getElementById('days').value;
var month = document.getElementById('month').value;
var year = document.getElementById('year').value;
var event = document.getElementById('event').value;
document.getElementById('create_event_button').style.visibility='visible';
document.getElementById('create_event').style.visibility='hidden';
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("create_event").innerHTML=xmlhttp.responseText;
			}
	}
	var date=year+"-"+month+"-"+day;
	xmlhttp.open("POST","../include/update_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("date="+date+"&event="+event);
	setTimeout('show_events()',300);
}
function delete_event(id){
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("events").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/update_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id);
	setTimeout('show_events()',300);
}
function show_events(){
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("events").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/update_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("show=1");
}
</script>
<h2>Home Page</h2>
<?php
if(isset($_GET['action'])){$action=$_GET['action'];}else{$action=NULL;}
if(($sub_page==0) && ($action==NULL)){
	echo "<div class='container-fluid'>
	<div class='row' id='adminWrapper'>
		<div class='col-md-3'>
		<button id='change_password_button' onclick='show_change_password()'>Change Password</button>
		<button id='show_information_button' onclick='show_information()'>Edit Information</button>";
		if($admin_right<=1){
			echo "<button id='add_user_button' onclick='add_user_table()'>Add User</button>";
			echo "<button id='view_users_button' onclick='show_users()'>Show Additional Users</button>";
		}
		echo"<button id='show_mass_button' onclick='show_mass()'>Change Mass Timings</button>
		<button id='show_gallery_button' onclick='show_gallery()'>Show Gallery</button>
		</div>
		<div class='col-md-9'>";
		include("../include/change_password.php");
		include("../include/info.php");
		include("../include/mass.php");
		if($admin_right<=1){
		include("../include/view_users.php");
		include("../include/add_user.php");
		}
		echo "</div>
	</div>
	<div class='row'>
		<div class='col-md-12'>";
		include("../include/add_gallery_image.php");
		echo "</div>
	</div>
	</div><hr/>";

	


$query = "SELECT * FROM page_content WHERE page='home' && sub_page=2";
$result = mysqli_query($db,$query);
$c=mysqli_num_rows($result);
if($c==0){$sql="INSERT into page_content(`page`,`sub_page`,`sub_no`,`temp_id`) VALUES('home',2,1,1)"; $res=mysqli_query($db,$sql);}
if(!$result){ die("Error ".mysqli_connect_error());}
if(isset($result)){ while($display = mysqli_fetch_array($result)){
echo "<div class='container-fluid'><div class='row'><div class='col-md-12'><form id='flash_news' method='post'><div class='row'>
	<div class='col-md-2'>Main Heading:</div>
	<div class='col-md-6'><input type='text' name='flash_content' value=\"{$display['sub_content']}\" /></div>
	<div class='col-md-2'><input type='submit' name='submit_flash_news' value= 'Save' /></div>
</div></form></div></div></div><br><br>";}}

if(isset($_POST['submit_flash_news'])){
if(isset($_POST['flash_content'])){$flash_content=mysqli_prep($db,$_POST['flash_content']);}else{$flash_content=NULL;}
$query="UPDATE `page_content` SET `sub_content`='{$flash_content}' 
WHERE `sub_no`=1 && `sub_page`=2 && page='home'";
$result = mysqli_query($db,$query);
echo "<script>window.location='admin_home.php?page=home&sub_page=0'</script>";}
include("../include/display_admin_page_content.php");

echo "<hr/><br/><br/><h2 class='heading'>LIST OF EVENTS</h3><br/>";
echo "<button id='create_event_button' onclick='create_event()'>Add an event</button><br/><br/>";
echo "<div id='create_event'></div>";
echo "<div id='events'></div>";


echo"<hr/><h2 class='heading'>LATEST NEWS</h2><br/>";
echo"<a href ='admin_home.php?page={$page}&sub_page=1'><button>Insert a new file</button></a><br/><br/>";

$count=0;
$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){$count++;}
if($count==0){echo"No file exists in the latest news...!";}
else{
	
	$query = "SELECT * FROM latest_news";
	$result = mysqli_query($db,$query);
	echo "<div class='container-fluid'><div class='row'>";
	while($display = mysqli_fetch_array($result)){
	if ($display['new_file']==1){$check_n= "checked='checked'";}
	else{$check_n=" ";}
	if ($display['visible']==1){$check_v="checked='checked'";}
	else{$check_v=" ";}
	
	echo "<div class='col-md-6'>
	<form action=\"admin_home.php?sub_page=3&file_id={$display['file_id']}&page={$page}\" method='post'>
	<div class='row'>
		<div class='col-md-6'>File Description<br/>
		<textarea rows='5' cols=50 name='file_desc'>{$display['file_desc']}</textarea>
		</div>
		<div class='col-md-6'>
			<div class='row'>
				<div class='col-md-6'>New File:</div>
				<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='new_file' {$check_n}/></div>
			</div>
			<div class='row'>
				<div class='col-md-6'>Visible:</div>
				<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='visible' {$check_v}/></div>
			</div>
			<div class='row'>
				<div class='col-md-6'>File Name:</div>
				<div class='col-md-6'>";
				if($display['file_name']=="0"){echo "No file ";} else{echo $display['file_name'];}
				echo"</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
				<input type='button' onClick=\"location.href='admin_home.php?sub_page=2&file_id={$display['file_id']}&page={$page}'\" value='Delete'/>	
				</div>
			</div>
			<div class='row'><div class='col-md-12'><input type='submit' value= 'Save' /></div></div>
		</div>
	</div></form><br/><br/><hr/></div>";
	}
	echo"</div></div>";
}

}
elseif(($sub_page==1) && ($action==NULL)){ //Insert a new file
echo"<b>Insert a new file</b><br/>";

echo "<div class='container-fluid'><div class='row'>";

echo "<div class='col-md-6'>
<form action='admin_home.php?sub_page=4&page={$page}' method='post' enctype='multipart/form-data'>
<div class='row'>
	<div class='col-md-6'>
		File Description<br/><textarea rows='5' cols=50 name='file_desc'></textarea>
	</div>
	<div class='col-md-6'>
		<div class='row'>
			<div class='col-md-6'>New File:</div>
			<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='new_file' /></div>
		</div>
		<div class='row'>
			<div class='col-md-6'>Visible:</div>
			<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='visible' checked='checked' /></div>
		</div>
		<div class='row'>
			<div class='col-md-6'>File Name:</div>
			<div class='col-md-6'>
			<input type='file' name='file' />
			</div>
		</div>
		<div class='row'><div class='col-md-12'><input type='submit' value='Insert' /></div></div>
	</div>
</div></form><br/><hr/></div>";


$count=0;
$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
if(!$result){ die("Error ".mysqli_connect_error());}
while($row=mysqli_fetch_array($result)){$count++;}
if($count==0){
	echo "<div class='col-md-6'>There are no files in latest news</div>";
}
else{	
	$query = "SELECT * FROM latest_news";
	$result = mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	while($display = mysqli_fetch_array($result)){
		if ($display['new_file']==1){$check_n= "checked='checked'";}else{$check_n=" ";}
		if ($display['visible']==1){$check_v="checked='checked'";}else{$check_v=" ";}
		echo "<div class='col-md-6'>
		<div class='row'>
			<div class='col-md-6'>File Description<br/>
			{$display['file_desc']}
			</div>
			<div class='col-md-6'>
				<div class='row'>
					<div class='col-md-6'>New File:</div>
					<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='new_file' {$check_n} disabled='disabled'/></div>
				</div>
				<div class='row'>
					<div class='col-md-6'>Visible:</div>
					<div class='col-md-6'><input type='checkbox' style='width: 30px;height:30px' name='visible' {$check_v} disabled='disabled'/></div>
				</div>
				<div class='row'>
					<div class='col-md-6'>File Name:</div>
					<div class='col-md-6'>{$display['file_name']}</div>
				</div>
			</div>
		</div><br/><br/><br/><hr/></div>";	
	}
}
echo"</div></div>";
}
elseif(($sub_page==2)&&($action==NULL)){//Delete a file
$file_id=$_GET['file_id'];
$sql="SELECT * from latest_news WHERE file_id={$file_id}";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){if($row['file_name']!=0)unlink("../latest_news/".$row['file_name']);}
$query="DELETE FROM latest_news WHERE file_id = {$file_id}";
$result = mysqli_query($db,$query);
if($result){
/*-----count the no of rows----*/
$count=0;
$query="SELECT * FROM latest_news";$res=mysqli_query($db,$query);if(!$res){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($res)){$count++;}
/* -----$count==> No of rows----- */
for($i=$file_id;$i<=$count;$i++){
$tid=$i+1;
$query = "UPDATE latest_news SET file_id={$i} WHERE temp_id={$tid}";
$result= mysqli_query($db,$query);
if(!$result){ die("Error ".mysqli_connect_error());}
if(isset($result)){
$sql="SELECT * FROM latest_news";
$res=mysqli_query($db,$sql);
if(!$res){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($res)){
$sql_query = "UPDATE latest_news SET temp_id={$row['file_id']} WHERE file_id={$row['file_id']}";
$result= mysqli_query($db,$sql_query);}
}else{echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}}
echo "<script>window.location='admin_home.php?sub_page=0&page={$page}'</script>";
die;
}
else{echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
}
elseif(($sub_page==3) && ($action==NULL)){ //Edit the file
$file_id=mysqli_prep($db,$_GET['file_id']);
$file_desc=mysqli_prep($db,$_POST['file_desc']);
if(!isset($_POST['new_file'])){$new_file=0;}
else{$new_file=1;}
if(!isset($_POST['visible'])){$visible=0;}
else{$visible=1;}
$query="UPDATE `latest_news` 
SET `file_desc`='{$file_desc}',
`visible`={$visible},`new_file`={$new_file} 
WHERE `file_id`={$file_id}";
$result = mysqli_query($db,$query);
if($result){
echo "<script>window.location='admin_home.php?sub_page=0&page={$page}'</script>";
exit;
}
else{echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
}

elseif(($sub_page==4) && ($action==NULL)){   //Submit Insert Button
$file_desc=mysqli_prep($db,$_POST['file_desc']);
$abc = is_dir("../latest_news");
if(!$abc){mkdir("../latest_news");}
$path="../latest_news/";
if(isset($_POST['file'])){$file=$_POST['file'];}else{$file=NULL;}
$name = 0;
if($_FILES["file"]["error"] <= 0){
move_uploaded_file($_FILES["file"]["tmp_name"],"{$path}". $_FILES["file"]["name"]);
$name=$_FILES["file"]["name"];}
if(!isset($_POST['new_file'])){$new_file=0;}else{$new_file=1;}
if(!isset($_POST['visible'])){$visible=0;}else{$visible=1;}
$file_id=1;
$query="SELECT * FROM latest_news";
$res=mysqli_query($db,$query);
if(!$res){ die("Error ".mysqli_connect_error());}
if(!isset($res)){echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
while($row = mysqli_fetch_array($res)){$file_id++;}
$query = "INSERT INTO latest_news (`page`,`file_id`,`temp_id`,`file_desc`,`file_name`, `visible`, `new_file`) 
VALUES ('{$page}',{$file_id},{$file_id},'{$file_desc}', '{$name}', {$visible}, {$new_file})";
$result = mysqli_query($db,$query);
if($result){echo "<script>window.location='admin_home.php?sub_page=0&page={$page}'</script>";
exit;}
else{echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
}
elseif($action==11){/*Insert Content Form*/ echo "<br/><h3>Add contents into your History page :</h3>";
include("../include/insert_form_admin_page_content.php");}
elseif($action==13){/*Update page_content*/ include("../include/update_admin_page_content.php");}
elseif($action==14){/*Delete the page_content */include("../include/delete_admin_page_content.php");}
?>
</div>
<?php include("admin_footer.php")?>