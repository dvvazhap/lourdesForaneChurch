<?php if(isset($_POST['username'])){$temp_username=mysqli_prep($db,$_POST['username']);}else{$temp_username=NULL;}
if(isset($_POST['password'])){$temp_password=mysqli_prep($db,$_POST['password']);}else{$temp_password=NULL;}
$nop = mysqli_prep($db,$_POST['nop']);
$name = mysqli_prep($db,$_POST['name']);
$count=1;
$query="SELECT * FROM {$page}_table";
$res=mysqli_query($db,$query);
confirm_query($res);
if(!isset($res)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
while($row = mysqli_fetch_array($res)){$count++;}
$new_admin_right=$admin_right+1;
$query="INSERT into security(`id`,`temp_id`,`admin_page`,`admin_sub_page`,`admin_right`,`username`,`password`) VALUES({$count},{$count},'{$page}',{$count},{$new_admin_right},'{$temp_username}','{$temp_password}')";
$result=mysqli_query($db,$query);
if($result){
$sql="INSERT INTO {$page}_table(`id`,`temp_id`,`name`) VALUES({$count},{$count},'{$name}')";
$res=mysqli_query($db,$sql);
for($i=1;$i<=$nop;$i++){
if(isset($_POST["post{$i}"])){
$a= mysqli_prep($db,$_POST["post{$i}"]);
$query="INSERT INTO council_members(`page`,`sub_page`,`temp_id`,`position`,`post`,`name`,`address`,`phone`,`landline`) 
VALUES ('{$page}',{$count},{$count},{$i},'{$a}','Name','Address','1234567890','7654321')";
$result = mysqli_query($db,$query);
if(!isset($result)){echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=23'</script>";}}}
if(!is_dir("../images/council_members")){mkdir("../images/council_members");}
if(!is_dir("../images/council_members/{$page}")){mkdir("../images/council_members/{$page}");}
if(!is_dir("../images/council_members/{$page}/{$count}")){mkdir("../images/council_members/{$page}/{$count}");}
if(!is_dir("../images/gallery")){mkdir("../images/gallery");}
if(!is_dir("../images/gallery/{$page}")){mkdir("../images/gallery/{$page}");}
if(!is_dir("../images/gallery/{$page}/{$count}")){mkdir("../images/gallery/{$page}/{$count}");}
if($page=="wards"){echo "<script>window.location='admin_{$page}.php?page={$page}&action=22&count={$count}'</script>";}
elseif($page=="associations"){echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page=0'</script>";}
} else{confirm_query($result);} ?>