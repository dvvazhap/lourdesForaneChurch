<?php
echo"<div id='show_teachers'></div>
<button id='show_teachers_button' onclick='show_admin_teachers()'>Show Teachers</button>";
?>
<script>
function show_admin_teachers(){
document.getElementById('show_teachers_button').style.visibility='hidden';
var adminright= document.getElementById('admin_right').value;
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show_teachers").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("GET","../include/display_admin_page_teachers.php?admin_right="+adminright,true);
	xmlhttp.send();
}
</script>
<style>
#show_teachers_button{float:right;}
</style>
<?php
echo "<input type='hidden' value='{$admin_right}' id='admin_right'>";
if(isset($_GET['council'])){
echo "<script>show_admin_teachers();</script>";
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
	if(isset($_POST['update'])){
		$name=mysqli_prep($db,$_POST['name']);
		$address=mysqli_prep($db,$_POST['address']);
		if(isset($_POST['phone'])){	$phone=mysqli_prep($db,$_POST['phone']);}
		else{$phone=NULL;}
		$landline=mysqli_prep($db,$_POST['landline']);
		$query="UPDATE teachers 
			SET `name`='{$name}',`address`='{$address}',`phone`='{$phone}',`landline`='{$landline}' 
			WHERE id={$id} ";
		$result=mysqli_query($db,$query);
		if($result){
			echo "<script>window.location='admin_catechism.php?page=catechism&council=1'</script>"; exit;
		}
	}
	if(isset($_POST['upload'])){
		if($_FILES['file']['name']==NULL){
			echo "<script>window.location='admin_catechism.php?page=catechism&if=1'</script>";
		}
		if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 500000))
		{
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else{
				if($_FILES['file']['name']!=NULL){
					$query="SELECT * FROM teachers WHERE id={$id}";
					$result=mysqli_query($db,$query);
					while($row=mysqli_fetch_array($result)){
						if(($row['image']!='0')&&($row['image']!=NULL))
					unlink("../images/catechism/{$row['image']}");
					}
				}
				$path="../images/catechism/";
				move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
				$name=$_FILES["file"]["name"];
				$query="UPDATE teachers SET `image`='{$name}' WHERE id={$id} ";
				$result=mysqli_query($db,$query);
				if($result){
					echo "<script>window.location='admin_catechism.php?page=catechism&council=1'</script>";exit;
				}
				else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>Go to home page and retry...')</script>";}
			}
		}
		else{
			echo"<script>alert('Upload a jpg/png file less than 500Kb');</script>";
		}
	}
	if(isset($_POST['delete'])){
		$query="SELECT * FROM teachers WHERE id={$id}";
		$result=mysqli_query($db,$query);
		while($row=mysqli_fetch_array($result)){
			unlink("../images/catechism/{$row['image']}");
		}
		$query="UPDATE teachers SET `image`=0 WHERE id={$id} ";
		$result=mysqli_query($db,$query);
		if($result){
			echo "<script>window.location='admin_catechism.php?page=catechism&council=1'</script>";
			exit;
		}
		else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";}
	}
}
?>