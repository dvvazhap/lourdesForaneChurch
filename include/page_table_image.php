<?php if(isset($_POST['upload_page_image'])){
if(!is_dir("../images/{$page}_table")){mkdir("../images/{$page}_table");}
if($_FILES['file']['name']==NULL){ echo"<script type='text/javascript'>alert('Invalid File'); </script>";}
elseif ((($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 1000000))
{if ($_FILES["file"]["error"] > 0){echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
else{if($_FILES['file']['name']!=NULL){
$query="SELECT * FROM {$page}_table WHERE id={$sub_page}";
$result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
if(($row['image']!='0')&&($row['image']!=NULL))
unlink("../images/{$page}_table/{$row['image']}");
}}$path="../images/{$page}_table/";
move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
$name=$_FILES["file"]["name"];
$query="UPDATE {$page}_table SET `image`='{$name}' WHERE id={$sub_page}";
$result=mysqli_query($db,$query);
if($result){
echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>"; exit;
}
else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
Go to home page and retry...')</script>";
}}}else {echo"<script type='text/javascript'>alert('This image is not supported.\n Only jpeg png images less than 1 Mb size is accepted..!'); </script>";}}
$query="SELECT * FROM {$page}_table WHERE id={$sub_page}";
$result=mysqli_query($db,$query);
while($display=mysqli_fetch_array($result)){
echo"<div id=\"page_table_image\" >";
$path="../images/{$page}_table/".$display['image'];
if((!file_exists($path))||($display['image']=="0")||($display['image']==""))
$path="../images/no-photo.png";
echo"<img src='{$path}'/>
</div>";}
echo"<h4>Image for {$row['name']} Ward...!<form method='post' enctype='multipart/form-data'>
<input type='file' name='file' /><input type='submit' name='upload_page_image' value='Upload'></form></h4><hr/>"; ?>