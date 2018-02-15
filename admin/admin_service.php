<?php include("admin_header.php")?>
<style type="text/css">
#prayer{background:#000000;color:#ffffff;font-family:90px;font-family:Gabriola,Cooper,serif;}
#prayer_title{font-family:"Times New Roman",Cooper,serif; background:#ffffff; font-size:30px; color:#000000; }
#contact_info td{ font-family:Gabriola,Cooper,serif; font-size:35px;text-align:left;}
th{text-align:left;}</style><div id="content"><h2>Service Page</h2>
<?php if(isset($_GET['action'])){$action=$_GET['action'];}else{$action=NULL;}
if($action==NULL){
if(isset($_GET['prayer_id'])){ $prayer_id=$_GET['prayer_id'];}else{$prayer_id=NULL;}echo"<hr/>";
$query="SELECT * FROM service_table"; $res=mysql_query($query,$db); confirm_query($res);
if(isset($res)){ $count=0; while($row = mysql_fetch_array($res)){$count++;}
if($count>0){ $query = "SELECT * FROM service_table "; $result = mysql_query($query,$db);
while($row=mysql_fetch_array($result)){
echo "<table id=\"contact_info\"><tr><th width=\"75\">Name</th><th>:</th><td width=\"400\">{$row['name']}</td><th>Email:</th><td width=\"400\">{$row['email']}</td></tr></table>
<table id=\"contact_info\"><tr><th width=\"75\">Subject</th><th>:</th><td width=\"600\">{$row['subject']}</td></tr></table>";
if($prayer_id!=$row['sid']){
echo"<table><tr><td></td><td><input type=\"button\" onClick=\"location.href='admin_service.php?page={$page}&prayer_id={$row['sid']}'\" value=\"View Detailed Prayer\"/></td>
<td><input type=\"button\" onClick=\"location.href='admin_service.php?page={$page}&action=2&sid={$row['sid']}'\" value=\"Delete\"/></td></tr></table><hr/>";}
else{echo"<table id=\"prayer\"><tr><th id=\"prayer_title\">Prayer Regarding :</th><td width=\"500\" >{$row['detail']}</td>
<td><br/><br/><input type=\"button\" onClick=\"location.href='admin_service.php?page={$page}'\" value=\"Close Prayer\"/></td>
<td><br/><br/><input type=\"button\" onClick=\"location.href='admin_service.php?page={$page}&action=2&sid={$row['sid']}'\" value=\"Delete\"/></td></tr></table><hr/>";}}}
else{echo "There are no prayer requests...";}}}
elseif($action=2){
if(isset($_GET['sid'])){$sid=$_GET['sid'];}else{$sid=NULL;}
$query="DELETE FROM service_table WHERE `sid` = {$sid}"; $result = mysql_query($query,$db);
if($result){ $count=0; $query="SELECT * FROM service_table"; $res=mysql_query($query,$db); confirm_query($res);
while($row = mysql_fetch_array($res)){$count++;}
for($i=$sid;$i<=$count;$i++){ $tid=$i+1; $query = "UPDATE service_table SET sid={$i} WHERE tempid={$tid}"; $result= mysql_query($query,$db); confirm_query($result);
if(isset($result)){ $sql="SELECT * FROM service_table"; $res=mysql_query($sql,$db); confirm_query($res);
while($row = mysql_fetch_array($res)){ $sql_query = "UPDATE service_table SET tempid={$row['sid']} WHERE sid={$row['sid']}";$result= mysql_query($sql_query,$db);}}
else{echo"Sorry ! ".mysql_error()." Go to home page and retry...";}}
echo "<script>window.location='admin_service.php?page={$page}'</script>";exit;}
else{echo"Sorry !" . mysql_error() ." Go to home page and retry...";}} ?> </div><?php include("admin_footer.php")?>