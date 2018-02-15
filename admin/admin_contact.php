<?php include("admin_header.php")?>
<div id="content">
<h2>Contact Page</h2>
<?php if(isset($_GET['action'])){$action=$_GET['action'];} else{$action=NULL;}
if($action==NULL){

$query="SELECT * FROM contact"; $result=mysql_query($query,$db); confirm_query($result);
if(!isset($result)){echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}
echo"<table cellpadding=10 cellspacing=4>
<tr><th>Post</th><th>Name</th><th>Address</th><th>Phone Number</th><th>Landline</th><th>Email</th></tr>";
while($display = mysql_fetch_array($result)){
echo"<form action =\"admin_contact.php?page={$page}&action=1&position={$display['position']} \" method=\"post\">
<tr><td width=\"30px\" >{$display['post']}</td>
<td><input type=\"text\" name=\"name\" size=\"20\" value=\"{$display['name']}\" maxlength=\"30\"/></td>
<td><textarea name=\"address\" rows=\"5\" size=\"50\">{$display['address']}</textarea></td>
<td><input type=\"text\" name=\"phone\" size=\"10\" value=\"{$display['phone']}\" maxlength=\"10\"/></td>
<td><input type=\"text\" name=\"landline\" size=\"7\" value=\"{$display['landline']}\" maxlength=\"7\"/></td>
<td><input type=\"text\" name=\"email\" size=\"15\" value=\"{$display['email']}\" maxlength=\"30\"/></td>
<td><input type=\"submit\" value=\"Save\"/></td></tr></form>";
}echo"</table>";}
elseif($action==1){/*Save the Council member's info*/
$position=$_GET['position']; $name=mysql_prep($_POST['name']);$address=mysql_prep($_POST['address']);if(isset($_POST['phone'])){$phone=mysql_prep($_POST['phone']);}else{$phone=NULL;}$landline=mysql_prep($_POST['landline']);$email=mysql_prep($_POST['email']);
$query="UPDATE contact 
SET `name`='{$name}', `address`='{$address}', `phone`='{$phone}',`landline`='{$landline}',`email`='{$email}' 
WHERE position={$position} ";
$result=mysql_query($query,$db);
if($result){echo "<script>window.location='admin_contact.php?page={$page}'</script>"; exit;}
else{echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}}?>
</div><?php include("admin_footer.php")?>