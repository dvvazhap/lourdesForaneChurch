<?php
$id=$_GET['id'];
if(isset($_GET['act'])){$act=$_GET['act'];}else{$act=NULL;}
if(isset($_GET['position'])){
$position=$_GET['position'];
if(isset($_POST['post'])){
$post=mysqli_prep($db,$_POST['post']);
$sql = "UPDATE council_members SET post='{$post}' WHERE sub_page={$id} && position={$position}";
$result=mysqli_query($db,$sql);
echo "<script>window.location='admin_{$page}.php?page={$page}&id={$id}&action=24'</script>";
}
else{
$count=0;
$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$id}";
$res=mysqli_query($db,$query);
if(!$res){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($res)){ $count++;}
echo $count;
for($i=1;$i<=$count;$i++){
$query="UPDATE council_members SET temp_id={$i} WHERE position={$i} && sub_page={$id}";
$result=mysqli_query($db,$query);}
$sql="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$id} && position={$position} ORDER by position";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
unlink("../images/council_members/{$page}/{$id}/{$row['image']}");
}
$sql ="DELETE FROM council_members WHERE page='{$page}' && sub_page={$id} && position={$position}";
$result=mysqli_query($db,$sql);
$count = $count-1;
for($i=$position;$i<=$count;$i++){
$tid=$i+1;
$query = "UPDATE council_members SET position={$i} WHERE temp_id={$tid} && page='{$page}' && sub_page={$id}";
$result= mysqli_query($db,$query);
if(!$result){ die("Error ".mysqli_connect_error());}
}	
$sql="UPDATE council_members SET temp_id={$id} WHERE page='{$page}' && sub_page={$id}";
$res=mysqli_query($db,$sql);
echo "<script>window.location='admin_{$page}.php?page={$page}&id={$id}&action=24'</script>";
}
}
else{
$sql="SELECT * FROM {$page}_table WHERE id={$id}";
$result=mysqli_query($db,$sql);
if(!$result){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($result)){
$selected=$row['name'];
}
echo "<br/>{$selected} Edit page :<hr/>";
echo "<br/>Page :".$page;
$sql="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$id} ORDER by position";
$result=mysqli_query($db,$sql);
if(!$result){ die("Error ".mysqli_connect_error());}
echo "<table border><tr><th>Post</th></tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr>
<form action=\"admin_{$page}.php?page={$page}&id={$row['sub_page']}&position={$row['position']}&action=24\"  method=\"post\">
<td><input type=\"text\" maxlength=\"30\" name=\"post\" value=\"{$row['post']}\"/></td>
<td><input type=\"submit\" value=\"Save\"/></td></form>";
echo"<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?page={$page}&id={$row['sub_page']}&position={$row['position']}&action=24'\" value=\"Delete\"/></td>
</tr>";
}
echo "</table><hr/>";
if($act==1){
echo "<table><form action=\"admin_{$page}.php?page={$page}&id={$id}&action=24&act=2\" method=\"post\"><tr>
<th>Enter the post name :</th>
<td><input type=\"text\" name=\"new_post\" maxlength=\"30\"></td>
<td><input type=\"submit\" value=\"Add\"/></td>
</tr></form></table><br/>";
}
elseif($act==2){
if(isset($_POST['new_post'])){$new_post=mysqli_prep($db,$_POST['new_post']);}else{$new_post=NULL;}
$count=1;
$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$id}";
$res=mysqli_query($db,$query);
if(!$res){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($res)){
$count++;
}
$query="INSERT INTO council_members(`page`,`sub_page`,`temp_id`,`position`,`post`,`name`,`address`,`phone`,`landline`) 
VALUES ('{$page}',{$id},{$id},{$count},'{$new_post}','Name','Address','1234567890','7654321')";
$result=mysqli_query($db,$query);
echo "<script>window.location='admin_{$page}.php?page={$page}&id={$id}&action=24'</script>";
} echo "<br/><a href=\"admin_{$page}.php?page={$page}&id={$id}&action=24&act=1\">---->Add a new post</a>";
} ?>