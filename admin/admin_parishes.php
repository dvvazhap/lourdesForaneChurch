<?php include("admin_header.php")?>
<div id="content"><style type='text/css'>
#parish_wrapper{font-size:15px;color:black;margin:1% 1%;position:relative;height:230px;}
#image_wrapper{height:200px;width:40%;z-index:3;}
#image_wrapper:hover{z-index:-2;cursor:pointer;}
#image_wrapper img{height:220px;width:100%;}
#form1{margin-left:41%;margin-top:-200px;}
#form2{margin-top:-60px;width:40%;position:absolute;z-index:0;}
</style><h2>Parishes Page</h2>
<?php if(isset($_POST['add_parish'])){
$sql="SELECT * FROM parishes_table"; $res=mysqli_query($db,$sql);
$count=mysqli_num_rows($res); $c=$count+1;
$sql="INSERT into parishes_table(`page`,`id`)VALUES('{$page}',{$c})"; $result = mysqli_query($db,$sql);
echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";}
elseif(isset($_POST['update_parish'])){ $id=$_POST['id'];
$forane=$_POST['forane'];
$place=mysqli_prep($db,$_POST['place']);
$name=mysqli_prep($db,$_POST['name']); $landline=mysqli_prep($db,$_POST['landline']);
$address=mysqli_prep($db,$_POST['address']); $p_name=mysqli_prep($db,$_POST['p_name']);
$p_phone=mysqli_prep($db,$_POST['p_phone']); $ap_name=mysqli_prep($db,$_POST['ap_name']);
$ap_phone=mysqli_prep($db,$_POST['ap_phone']);
$sql="UPDATE parishes_table SET name='{$name}',place='{$place}',forane={$forane},landline='{$landline}',address='{$address}',p_name='{$p_name}',ap_name='{$ap_name}',p_phone='{$p_phone}',ap_phone='{$ap_phone}' WHERE id={$id}";
$result=mysqli_query($db,$sql);
echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";}
elseif(isset($_POST['update_forane'])){ $id=$_POST['id'];
$place=mysqli_prep($db,$_POST['place']);
$name=mysqli_prep($db,$_POST['name']); $landline=mysqli_prep($db,$_POST['landline']);
$address=mysqli_prep($db,$_POST['address']); $p_name=mysqli_prep($db,$_POST['p_name']);
$p_phone=mysqli_prep($db,$_POST['p_phone']); $ap_name=mysqli_prep($db,$_POST['ap_name']);
$ap_phone=mysqli_prep($db,$_POST['ap_phone']);
$sql="UPDATE forane_table SET name='{$name}',place='{$place}',landline='{$landline}',address='{$address}',p_name='{$p_name}',ap_name='{$ap_name}',p_phone='{$p_phone}',ap_phone='{$ap_phone}' WHERE id={$id}";
$result=mysqli_query($db,$sql);
echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";}
if(isset($_POST['upload_parish'])){
if($_FILES['file']['name']==NULL){ echo "<script>window.location='admin_parishes.php?page=parishes&sub_page={$sub_page}&if=1'</script>";}
if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 500000))
{ if ($_FILES["file"]["error"] > 0){ echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
else {$id=$_POST['id'];
if(!is_dir("../images/parishes")){mkdir("../images/parishes");}
if($_FILES['file']['name']!=NULL){
$query="SELECT * FROM parishes_table WHERE id={$id}";
$result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
if($row['image']!=NULL)unlink("../images/parishes/{$row['image']}");}}
$path="../images/parishes/";
move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
$name=$_FILES["file"]["name"];
$query="UPDATE parishes_table SET `image`='{$name}' WHERE id={$id} ";
$result=mysqli_query($db,$query);
if($result){echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";exit;}
else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
Go to home page and retry...')</script>";}}}else{echo"Error..!";}}

if(isset($_POST['upload_forane'])){
if($_FILES['file']['name']==NULL){ echo "<script>window.location='admin_parishes.php?page=parishes&sub_page={$sub_page}&if=1'</script>";}
if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 500000))
{ if ($_FILES["file"]["error"] > 0){ echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
else {$id=$_POST['id'];
if(!is_dir("../images/forane")){mkdir("../images/forane");}
if($_FILES['file']['name']!=NULL){
$query="SELECT * FROM forane_table WHERE id={$id}";
$result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){unlink("../images/forane/{$row['image']}");}}
$path="../images/forane/";
move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
$name=$_FILES["file"]["name"];
$query="UPDATE forane_table SET `image`='{$name}' WHERE id={$id} ";
$result=mysqli_query($db,$query);
if($result){echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";exit;}
else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
Go to home page and retry...')</script>";}}}else{echo"Error..!";}}

$page='parishes'; 

echo "<h3>Forane Churches</h3><hr/>";
$sql = "SELECT * FROM forane_table"; $result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){$id=$row['id'];
echo "<div id='parish_wrapper'><div id='image_wrapper'>";
if($row['image']==NULL)	echo "<img src='../images/no_image.jpg'/>";
else echo"<img src='../images/forane/{$row['image']}'/>";
echo"<form id='form2' method='post' enctype='multipart/form-data'><input type='file' name='file' /><input type='hidden' value='{$id}' name='id'><input type='submit' value='Upload' name='upload_forane'/></form></div>
<form id='form1' method='post'>";
$place=mysqli_prep($db,$row['place']);
$landline=mysqli_prep($db,$row['landline']);$name=mysqli_prep($db,$row['name']);$address=mysqli_prep($db,$row['address']);$p_name=mysqli_prep($db,$row['p_name']);$ap_name=mysqli_prep($db,$row['ap_name']);$p_phone=mysqli_prep($db,$row['p_phone']);$ap_phone=mysqli_prep($db,$row['ap_phone']);
echo "<b>Name of the Forane:</b><input type='text' name='name' size='28' maxlength='50' value='".$name."' />
<b>Landline:</b><input type='text' name='landline' size='6' maxlength='8' value='".$landline."' />
<br/><b>Place:</b><input type='text' name='place' size='20' maxlength='50' value='".$place."' />

<br/><b>Parish Priest</b>
<table><tr><td>Name:</td><td><input type='text' name='p_name' size='20' maxlength='50' value='{$row['p_name']}'/></td>
<td>Phone:</td><td><input type='text' name='p_phone' size='8' maxlength='10' value='{$row['p_phone']}'/></td></tr></table><b>Asst Parish Priest</b>
<table><tr><td>Name:</td><td><input type='text' name='ap_name' size='20' maxlength='50' value='{$row['ap_name']}'/></td><td>Phone:</td><td><input type='text' name='ap_phone' size='8' maxlength='10' value='{$row['ap_phone']}'/></td></tr></table>
<b>Address:</b><br/><textarea name='address' rows='3' cols='25' >{$row['address']}</textarea><input type='hidden' value='{$id}' name='id'>
<input type='submit' value='Save Changes' name='update_forane'/></form></div><hr/>";}

echo "<h3>Parishes under the Forane...!</h3><hr/>";
$sql = "SELECT * FROM parishes_table"; $result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){$id=$row['id'];
echo "<div id='parish_wrapper'><div id='image_wrapper'>";
if($row['image']==NULL)	echo "<img src='../images/no_image.jpg'/>";
else echo"<img src='../images/parishes/{$row['image']}'/>";
echo"<form id='form2' method='post' enctype='multipart/form-data'><input type='file' name='file' /><input type='hidden' value='{$id}' name='id'><input type='submit' value='Upload' name='upload_parish'/></form></div>
<form id='form1' method='post'>";
$place=mysqli_prep($db,$row['place']); $forane=$row['forane'];
if($forane==1){$for='Ramanathapuram';}elseif($forane==2){$for='Gandhipuram';}elseif($forane==3){$for='Erode';}else{$for='Gandhipuram';$forane=2;}
$landline=mysqli_prep($db,$row['landline']);$name=mysqli_prep($db,$row['name']);$address=mysqli_prep($db,$row['address']);$p_name=mysqli_prep($db,$row['p_name']);$ap_name=mysqli_prep($db,$row['ap_name']);$p_phone=mysqli_prep($db,$row['p_phone']);$ap_phone=mysqli_prep($db,$row['ap_phone']);
echo "<b>Name of the Parish:</b><input type='text' name='name' size='28' maxlength='50' value='".$name."' />
<b>Landline:</b><input type='text' name='landline' size='6' maxlength='8' value='".$landline."' />
<br/><b>Forane:</b><select name='forane'><option value='{$forane}'>{$for}</option>";
if($forane!=1)echo "<option value='1'>Ramanathapuram</option>";
if($forane!=2)echo "<option value='2'>Gandhipuram</option>";
if($forane!=3)echo "<option value='3'>Erode</option>";
echo "</select>
<b>Place:</b><input type='text' name='place' size='20' maxlength='50' value='".$place."' />
<br/><b>Parish Priest</b>
<table><tr><td>Name:</td><td><input type='text' name='p_name' size='20' maxlength='50' value='{$row['p_name']}'/></td>
<td>Phone:</td><td><input type='text' name='p_phone' size='8' maxlength='10' value='{$row['p_phone']}'/></td></tr></table><b>Asst Parish Priest</b>
<table><tr><td>Name:</td><td><input type='text' name='ap_name' size='20' maxlength='50' value='{$row['ap_name']}'/></td><td>Phone:</td><td><input type='text' name='ap_phone' size='8' maxlength='10' value='{$row['ap_phone']}'/></td></tr></table>
<b>Address:</b><br/><textarea name='address' rows='3' cols='25' >{$row['address']}</textarea><input type='hidden' value='{$id}' name='id'>
<input type='submit' value='Save Changes' name='update_parish'/></form></div><hr/>";}
if(isset($_GET['if'])){echo "<script type='text/javascript'>alert('No file selected')</script>";}
echo"<form method='post'><input type='submit' value='Add a new parish' name='add_parish'></form>";
?></div>
<?php include("admin_footer.php")?>