<?php include("admin_header.php")?>
<div id='content'>
<style>
#create_event_button{margin-left:700px; position:absolute;}
#create_event{width:350px; margin-left:800px; padding:0px; position:absolute; font-size:30px; -webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px; background-color:black; color:red;}
th{color:white;}
#flash_news{ margin-left:10px;}
#important_news{margin-left:400px;}
#wrapper{height:270px; border:solid white;}
#button{float:left;}
#show_tables{height:270px; width:700px; float:right;background-color:black;}
#change_password_button,#add_user_button,#view_users_button,#show_gallery_button,#show_information_button{width:250px;}
div{color:white;}
th{color:white;}
#show_information{margin-left:300px;position:absolute; width:690px; margin-top:-290px; height:250px;}
#view_users{margin-left:300px; position:absolute; width:690px; margin-top:-305px; overflow-y:scroll; height:270px;}
#password_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
#add_user_table{margin-left:280px; position:absolute; width:640px; margin-top:-290px; padding:30px;}
</style>
<script>
window.onload=init;
function init(){
document.getElementById('create_event').style.visibility='hidden';
document.getElementById('password_table').style.visibility='hidden';
document.getElementById('show_information').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
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
				document.getElementById("del").innerHTML=xmlhttp.responseText;
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
echo"<div id='wrapper'><table id='button'><tr><td><button id='change_password_button' onclick='show_change_password()'>Change Password</button></td></tr>
<tr><td><button id='show_information_button' onclick='show_information()'>Edit Information</button></td></tr>";
if($admin_right<=1){
echo "<tr><td><button id='add_user_button' onclick='add_user_table()'>Add User</button></td></tr>";
echo "<tr><td><button id='view_users_button' onclick='show_users()'>Show Additional Users</button></td></tr>";
}echo "<tr><td><button id='show_gallery_button' onclick='show_gallery()'>Show Gallery</button></td></tr></table>";
echo "<div id='show_tables'></div></div>";
include("../include/change_password.php");
include("../include/info.php");
if($admin_right<=1){
include("../include/view_users.php");
include("../include/add_user.php");
}
include("../include/add_gallery_image.php");


$query = "SELECT * FROM page_content WHERE page='home' && sub_page=2";
$result = mysqli_query($db,$query);
$c=mysqli_num_rows($result);
if($c==0){$sql="INSERT into page_content(`page`,`sub_page`,`sub_no`,`temp_id`) VALUES('home',2,1,1)"; $res=mysqli_query($db,$sql);}
confirm_query($result);
if(isset($result)){ while($display = mysqli_fetch_array($result)){
echo "<form id='flash_news' method='post'><b style='color:black'>Main Heading:</b><br/>
<textarea name='flash_content' rows='2' cols='50'>{$display['sub_content']}</textarea>
<input type='submit' name='submit_flash_news' value= 'Save' /></form>";}}
if(isset($_POST['submit_flash_news'])){
if(isset($_POST['flash_content'])){$flash_content=mysqli_prep($db,$_POST['flash_content']);}else{$flash_content=NULL;}
$query="UPDATE `page_content` SET `sub_content`='{$flash_content}' 
WHERE `sub_no`=1 && `sub_page`=2 && page='home'";
$result = mysqli_query($db,$query);
echo "<script>window.location='admin_home.php?page=home&sub_page=0'</script>";}
include("../include/display_admin_page_content.php");


echo "<h2>List of event</h3>";
echo "<button id='create_event_button' onclick='create_event()'>Add an event</button>";
echo "<div id='create_event'></div>";
echo "<div id='events'></div>";
echo "<div id='del'></div>";


echo"<hr/><b style='color:black'>Latest News :</b><br/>";
$count=0;
$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){$count++;}
if($count>0){
echo"<table cellpadding=10 cellspacing=2><tr><th>File Description</th><th>File Name</th><th>New File</th><th>Visible</th><th>File Type</th></tr>";}
else{ echo"No file exists in the latest news...!";}

$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
while($display = mysqli_fetch_array($result)){
if ($display['new_file']==1)
{$check_n= "checked='checked'";}
else{$check_n=" ";}
if ($display['visible']==1)
{$check_v="checked='checked'";}
else{$check_v=" ";}

echo"<form action=\"admin_home.php?sub_page=3&file_id={$display['file_id']}&page={$page}\" method='post'><tr>
<td><textarea rows='5' cols=50 name='file_desc'>{$display['file_desc']}</textarea></td><td>";
if($display['file_name']=="0"){echo "No file ";} else{echo $display['file_name'];}
echo"</td><td><input type='checkbox' name='new_file' {$check_n}/></td>
<td><input type='checkbox' name='visible' {$check_v}/></td>
<td>{$display['file_type']}</td>
<td><input type='button' onClick=\"location.href='admin_home.php?sub_page=2&file_id={$display['file_id']}&page={$page}'\" value='Delete'/></td>
<td><input type='submit' value= 'Save' /></td>
</tr></form>";}
echo "</table>";
echo"<br/><a href ='admin_home.php?sub_page=1&page={$page}'><button>Insert a new file</button></a><br/>";
}
elseif(($sub_page==1) && ($action==NULL)){ //Insert a new file
echo"Latest News<br/>";
$count=0;
$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
confirm_query($result);
while($row=mysqli_fetch_array($result)){$count++;}
if($count>0){
echo"<table cellpadding=10 cellspacing=2>
<tr><th>File Description</th><th>File Name</th><th>New File</th><th>Visible</th><th>File Type</th></tr>";}
else{echo "There are no files in latest news";}
$query = "SELECT * FROM latest_news";
$result = mysqli_query($db,$query);
confirm_query($result);
while($display = mysqli_fetch_array($result)){
if ($display['new_file']==1)
{$check_n= "checked='checked'";}
else{$check_n=" ";}
if ($display['visible']==1)
{$check_v="checked='checked'";}
else{$check_v=" ";}
echo"<tr><td width=\"450\">{$display['file_desc']}</td>
<td>{$display['file_name']}</td>
<td><input type='checkbox' name='new_file' {$check_n} disabled='disabled'/></td>
<td><input type='checkbox' name='visible' {$check_v} disabled='disabled'/></td>
<td>{$display['file_type']}</td></tr>";
}
echo "</table>";
echo"<br/><br/><br/>Insert a new file";
echo"<form action='admin_home.php?sub_page=4&page={$page}' method='post' enctype='multipart/form-data'>
<br/>File Description:<br/><textarea rows='5' cols=50 name='file_desc'></textarea>
<br/><input type='file' name='file' />
<br/>New File:<input type='checkbox' name='new_file' />
Visible:<input type='checkbox' name='visible' checked='checked' />
<input type='submit' value='Insert' /></form>";
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
$query="SELECT * FROM latest_news";$res=mysqli_query($db,$query);confirm_query($res);
while($row = mysqli_fetch_array($res)){$count++;}
/* -----$count==> No of rows----- */
for($i=$file_id;$i<=$count;$i++){
$tid=$i+1;
$query = "UPDATE latest_news SET file_id={$i} WHERE temp_id={$tid}";
$result= mysqli_query($db,$query);
confirm_query($result);
if(isset($result)){
$sql="SELECT * FROM latest_news";
$res=mysqli_query($db,$sql);
confirm_query($res);
while($row = mysqli_fetch_array($res)){
$sql_query = "UPDATE latest_news SET temp_id={$row['file_id']} WHERE file_id={$row['file_id']}";
$result= mysqli_query($db,$sql_query);}
}else{echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}}
echo "<script>window.location='admin_home.php?sub_page=0&page={$page}'</script>";
die;
}
else{echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
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
else{echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
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
confirm_query($res);
if(!isset($res)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
while($row = mysqli_fetch_array($res)){$file_id++;}
$query = "INSERT INTO latest_news (`page`,`file_id`,`temp_id`,`file_desc`,`file_name`, `visible`, `new_file`) 
VALUES ('{$page}',{$file_id},{$file_id},'{$file_desc}', '{$name}', {$visible}, {$new_file})";
$result = mysqli_query($db,$query);
if($result){echo "<script>window.location='admin_home.php?sub_page=0&page={$page}'</script>";
exit;}
else{echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
}
elseif($action==11){/*Insert Content Form*/ echo "<br/><h3>Add contents into your History page :</h3>";
include("../include/insert_form_admin_page_content.php");}
elseif($action==13){/*Update page_content*/ include("../include/update_admin_page_content.php");}
elseif($action==14){/*Delete the page_content */include("../include/delete_admin_page_content.php");}
?>
</div>
<?php include("admin_footer.php")?>