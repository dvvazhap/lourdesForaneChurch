<?php
$sub_no=$_GET['sub_no'];
$query="DELETE FROM page_content WHERE page='{$page}' && sub_no ={$sub_no} && sub_page={$sub_page}";
$result = mysql_query($query,$db);
if($result){
$count=0;
$query="SELECT * FROM page_content WHERE sub_page={$sub_page} && page='{$page}'";
$res=mysql_query($query,$db);
confirm_query($res);
while($row = mysql_fetch_array($res)){ $count++;}
for($i=$sub_no;$i<=$count;$i++){
$tid=$i+1;
$query = "UPDATE page_content SET sub_no={$i} WHERE temp_id={$tid} && page='{$page}' && sub_page={$sub_page}";
$result= mysql_query($query,$db);
confirm_query($result);
if(isset($result)){
$sql="SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$res=mysql_query($sql,$db);
confirm_query($res);
while($row = mysql_fetch_array($res)){$sql_query = "UPDATE page_content SET temp_id={$row['sub_no']} WHERE page='{$page}' && sub_no={$row['sub_no']} && sub_page={$sub_page}";
$result= mysql_query($sql_query,$db);}}
else{echo"Sorry ! ".mysql_error()." Go to home page and retry...";}}
if($page=='home')$sub_page=0;
echo "<script>window.location='admin_{$page}.php?sub_page={$sub_page}&page={$page}'</script>";
exit;}
else{echo"Sorry ! ".mysql_error()." Go to home page and retry...";}
?>