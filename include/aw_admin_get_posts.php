<?php if(isset($_POST['username'])){$temp_username=mysql_prep($_POST['username']);}else{$temp_username=NULL;}
if(isset($_POST['password'])){$temp_password=mysql_prep($_POST['password']);}else{$temp_password=NULL;}
$nop = mysql_prep($_POST['nop']);
$name = mysql_prep($_POST['name']);
$count=1;
$query="SELECT * FROM {$page}_table";
$res=mysql_query($query,$db);
confirm_query($res);
if(!isset($res)){echo"Sorry ! ".mysql_error()." Go to home page and retry...";}
while($row = mysql_fetch_array($res)){$count++;}
$new_admin_right=$admin_right+1;
$query="INSERT into security(`id`,`temp_id`,`admin_page`,`admin_sub_page`,`admin_right`,`username`,`password`) VALUES({$count},{$count},'{$page}',{$count},{$new_admin_right},'{$temp_username}','{$temp_password}')";
$result=mysql_query($query,$db);
if($result){
$sql="INSERT INTO {$page}_table(`id`,`temp_id`,`name`) VALUES({$count},{$count},'{$name}')";
$res=mysql_query($sql,$db);
for($i=1;$i<=$nop;$i++){
if(isset($_POST["post{$i}"])){
$a= mysql_prep($_POST["post{$i}"]);
$query="INSERT INTO council_members(`page`,`sub_page`,`temp_id`,`position`,`post`,`name`,`address`,`phone`,`landline`) 
VALUES ('{$page}',{$count},{$count},{$i},'{$a}','Name','Address','1234567890','7654321')";
$result = mysql_query($query,$db);
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