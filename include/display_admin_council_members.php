<?php
echo"<div id='show_council_members'></div>
<button id='show_council_members_button' onclick='show_admin_council_members()'>Show Council Members</button>";
?>
<script>
function show_admin_council_members(){
document.getElementById('show_council_members_button').style.visibility='hidden';
var page= document.getElementById('page').value;
var sub_page= document.getElementById('sub_page').value;
var pagename= document.getElementById('page_name').value;
var adminright= document.getElementById('admin_right').value;

var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show_council_members").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("GET","../include/display_admin_page_council_members.php?page="+page+"&sub_page="+sub_page+"&page_name="+pagename+"&admin_right="+adminright,true);
	xmlhttp.send();
	
}
</script>
<style>
#show_council_members_button{float:right;}
</style>
<?php
echo "<input type='hidden' value='{$page}' id='page'>";
echo "<input type='hidden' value='{$sub_page}' id='sub_page'>";
echo "<input type='hidden' value='{$page_name}' id='page_name'>";
echo "<input type='hidden' value='{$admin_right}' id='admin_right'>";
if(isset($_GET['council'])){echo"<script>show_admin_council_members();</script>";}
if(isset($_GET['position'])){
	$position=$_GET['position'];
	if(isset($_POST['update'])){
		$name=mysql_prep($_POST['name']);
		$address=mysql_prep($_POST['address']);
		if(isset($_POST['phone'])){	$phone=mysql_prep($_POST['phone']);}
		else{$phone=NULL;}
		$landline=mysql_prep($_POST['landline']);
		$query="UPDATE council_members 
			SET `name`='{$name}',`address`='{$address}',`phone`='{$phone}',`landline`='{$landline}' 
			WHERE page='{$page}' && sub_page={$sub_page} && position={$position} ";
		$result=mysql_query($query,$db);
		if($result){
			echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&council=1'</script>"; exit;
		}
		else{
			echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>Go to home page and retry...')</script>";
		}
	}
	if(isset($_POST['upload'])){
		if($_FILES['file']['name']==NULL){
			echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&if=1'</script>";
		}
		if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 500000))
		{
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else{
				if($_FILES['file']['name']!=NULL){
					$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$sub_page} && position={$position}";
					$result=mysql_query($query,$db);
					while($row=mysql_fetch_array($result)){
						if(($row['image']!='0')&&($row['image']!=NULL))
					unlink("../images/council_members/{$page}/{$sub_page}/{$row['image']}");
					}
				}
				$path="../images/council_members/{$page}/{$sub_page}/";
				move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
				$name=$_FILES["file"]["name"];
				$query="UPDATE council_members SET `image`='{$name}' WHERE page='{$page}' && sub_page={$sub_page} && position={$position} ";
				$result=mysql_query($query,$db);
				if($result){
					echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&council=1'</script>";exit;
				}
				else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>Go to home page and retry...')</script>";}
			}
		}
		else{
			echo"Error..!";
		}
	}
	if(isset($_POST['delete'])){
		$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$sub_page} && position={$position}";
		$result=mysql_query($query,$db);
		while($row=mysql_fetch_array($result)){
			unlink("../images/council_members/{$page}/{$sub_page}/{$row['image']}");
		}
		$query="UPDATE council_members SET `image`=0 WHERE page='{$page}' && sub_page={$sub_page} && position={$position} ";
		$result=mysql_query($query,$db);
		if($result){
			echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}&council=1'</script>";
			exit;
		}
		else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";}
	}
}
?>