<script>
function show_gallery(){
document.getElementById('show_gallery_button').style.visibility='hidden';
var page= document.getElementById('page').value;
var sub_page= document.getElementById('sub_page').value;

var admin_right= document.getElementById('admin_right').value;
if((admin_right<=1)&&(page=='home')){
document.getElementById('add_user').style.visibility='hidden';
document.getElementById('add_user_table').style.visibility='hidden';
document.getElementById('add_user_button').style.visibility='visible';
document.getElementById('view_users').style.visibility='hidden';
document.getElementById('view_users_button').style.visibility='visible';
document.getElementById('password_table').style.visibility='hidden';
document.getElementById('change_password').style.visibility='hidden';
document.getElementById('show_information').style.visibility='hidden';
document.getElementById('show_information_button').style.visibility='visible';
document.getElementById('change_password_button').style.visibility='visible';
}
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show_gallery").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/show_gallery.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("page="+page+"&sub_page="+sub_page);
}
function show_album(album_name){
var page= document.getElementById('page').value;
var sub_page= document.getElementById('sub_page').value;
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show_album").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/show_gallery.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("page="+page+"&sub_page="+sub_page+"&album_name="+album_name);
}
function init(){
var a = document.getElementById('gallery').value;
document.getElementById('gallery').value = 0;
if(a==1){show_gallery();}else{show_album(a);}
}
</script>
<style>
#show_gallery_button{float:right;}
#show_gallery .album{
height:60px; width:500px; padding:10px;
color:#272727; font-size:30px;
}
#show_album{
-webkit-border-radius:45px;-moz-border-radius:45px;border-radius:45px;
background-color:#272727; padding:30px;}

</style>
<?php
echo "<input type='hidden' value='{$page}' id='page'>";
echo "<input type='hidden' value='{$sub_page}' id='sub_page'>";
echo "<input type='hidden' value='{$admin_right}' id='admin_right'>";
if(isset($_GET['gallery'])){
if($_GET['gallery']=='1')echo "<input type='hidden' id='gallery' value='1'><script>init();</script>";
else{$album_name=mysqli_prep($db,$_GET['gallery']);
echo "<input type='hidden' id='gallery' value='{$album_name}'><script> init();</script>";}
}
if(isset($_POST['delete_image'])){
	$image=$_POST['image'];
	$file_name=$_POST['file_name'];
	$page_name=$_POST['album_name'];
	$sql="DELETE FROM albums WHERE page='{$page}' && sub_page='{$sub_page}' && name='{$file_name}' && page_name='{$page_name}'";
	$result=mysqli_query($db,$sql);
	unlink("{$_POST['image']}");
	if($page!='gallery'){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&gallery=1'</script>";}
	if($page=='gallery'){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&gallery={$page_name}'</script>";}		
}
if(isset($_POST['upload_image'])){
	if($_FILES['file']['name']==NULL){echo"<script type='text/javascript'>alert('Please select a file to upload'); </script>";}
	elseif($_FILES["file"]["size"] > 1000000){echo"<script type='text/javascript'>alert('Please choose an Image less than 1 Mb');</script>";}
	elseif((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/png")||($_FILES["file"]["type"] == "image/ppng"))&&($_FILES["file"]["size"] < 1000000))
	{
		if ($_FILES["file"]["error"] > 0){echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
		else
		{	if(isset($_POST['album_name']))
			{
				if(!is_dir("../images/gallery/gallery")){
					mkdir("../images/gallery/gallery");
				}
				$page_name=$_POST['album_name'];
				if(!is_dir("../images/gallery/gallery/{$page_name}")){mkdir("../images/gallery/gallery/{$page_name}");}
				$path="../images/gallery/gallery/{$page_name}/";
			}
			elseif(($page=='wards')||($page=='associations'))
			{
				$res = mysqli_query($db,"SELECT * FROM {$page}_table WHERE id={$sub_page}");
				while($row = mysqli_fetch_array($res)){
				$page_name = $row['name'];
				}
				if(!is_dir("../images/gallery/{$page}")){
					mkdir("../images/gallery/{$page}");
				}
				if(!is_dir("../images/gallery/{$page}/{$sub_page}")){
					mkdir("../images/gallery/{$page}/{$sub_page}");
				}
				$path="../images/gallery/{$page}/{$sub_page}/"; 
			}
			else
			{	$page_name=0; 
				if(!is_dir("../images/gallery/{$page}"))
				{
					mkdir("../images/gallery/{$page}");
				}
				$path="../images/gallery/{$page}/"; 
			}
			move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
			$fname=$_FILES['file']['name'];
			$query="INSERT INTO albums (`name`,`page`,`page_name`,`sub_page`,`temp_id`) VALUES('{$fname}','{$page}','{$page_name}','{$sub_page}','{$sub_page}')";
			$result=mysqli_query($db,$query);
			if($result)
			{
			if($page!='gallery'){
			echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&gallery=1'</script>";
			}
			if($page=='gallery'){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&gallery={$page_name}'</script>";}
			}
			else
			{
				echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";
			}
		}
	}
}

if($page=="gallery"){
	echo"<h3 class='heading'>Create a new Album</h3>
	<div class='container-fluid'>
		<div class='row'>
		<div class='col-md-12'>
			<form method='post'>
			<div class='row'>
				<div class='col-md-3'>Enter the album Name :</div>
				<div class='col-md-4'><input type='text' maxlength='50' name='album_name' /></div>
				<div class='col-md-2'><input type='submit' name='album_name_submit' value='Create' /></div>
				<div class='col-md-3'></div>
			</div>
			</form>
		</div>		
		</div>
	</div><br/><br/>";
}
if(isset($_POST['album_name_submit'])){
	echo"<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-3'>
				<h3>Upload images to ".$_POST['album_name']." album</h3>
				<h4>Upload a new Image...!</h4>
				<form method='post' enctype='multipart/form-data'>
				<input type='hidden' value=\"{$_POST['album_name']}\" name='album_name' />
				<input type='file' name='file' />
				<input type='submit' name='upload_image' value='Upload'>
				</form>
			</div>
		</div>
	</div>";
}
if($page!='gallery'){
	echo "<div id='show_gallery'></div>";
}
elseif($page=='gallery'){
	$sql1="SELECT DISTINCT page_name FROM albums WHERE page='gallery' && sub_page=0 ORDER BY page_name";
	$res1=mysqli_query($db,$sql1);
	echo "<div id='show_album'>";
	while($display = mysqli_fetch_array($res1)){
	echo"<button  class='album' onclick='show_album(this.value)' value=\"{$display['page_name']}\" >{$display['page_name']}</button>";
	}
	echo"</div>";
}
?>