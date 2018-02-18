<?php 
$page='service';
require_once("include/connection.php");

if(isset($_GET['submit'])){
require_once("include/connection.php");
if(isset($_POST['name'])){$name=$_POST['name'];}
else{$name=NULL;}
if(isset($_POST['email'])){$email=$_POST['email'];}
else{$email=NULL;}
if(isset($_POST['subject'])){$subject=$_POST['subject'];}
else{$subject=NULL;}
if(isset($_POST['detail'])){$detail=$_POST['detail'];}else{$detail=NULL;}
$count=1;
$query="SELECT * FROM service_table"; $res=mysqli_query($db,$query); confirm_query($res);
if(!isset($res)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
while($row = mysqli_fetch_array($res)){$count++;}
$query = "INSERT into service_table(sid,tempid,page,name,email,subject,detail) VALUES({$count},{$count},'{$page}','{$name}','{$email}','{$subject}','{$detail}')";
mysqli_query($db,$query); 
}
?>
<style type="text/css">#error_msg{color:red;font-size:20px;}
label{color:black;font-style:italic;}
#service_address{float:right;color:brown;font-style:italic; width:400px; margin-left:420px; position:absolute;}
#content_wrapper{clear: both;position:relative;margin-left:50px;margin-top:100px; height:600px; 
width:1000px;padding: 4% 0%; background-image:url(images/aaa.png); background-size:100%;
-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#content{padding:0px 50px;width:1000px;margin:20px 0px 0px 50px;}
#content p{margin-bottom: 10px;}
.field{background-color:#262626;color:white;font-style:italic;font-size:20px;font-family:"Times New Roman",Cooper,serif;}
#reset{float:right;}
#contact{width:380px; overflow:hidden;}
#contact_form{ width:400px; height:400px; float:left;}
</style>
<h2 style='color:#ff5034'>Prayer Request Form</h2>
<div class="hr_divider"></div>
<div id="contact_form">
<div id="contact">
<label for="author">Name:</label><br/><input type="text" class='field' maxlength="20" id="name" size="60" />
<div class="cleaner_h10"></div>	
<label for="email">Email/Mobile No:</label><br/><input type="text" class='field' onchange='val_email()' maxlength="30" id="email" size="60" />
<div class="cleaner_h10"></div>
<label for="subject">Subject:</label><br/> <input type="text" id='subject' class='field' maxlength="40" size="60" />
<div class="cleaner_h10"></div>
<label for="text">Prayer Regarding:</label><br/> <textarea id='detail' class='field' rows='7' cols='45' ></textarea>
<div class="cleaner_h10"></div>
<button onclick='val_submit()' id="submit" class='field' />SEND</button>
<button onclick='reset()' id='reset' class='field'> RESET</button>
</div></div>
<div id="service_address"><br/><h4 style='color:#ff5034'>Mailing Address</h4><h6 style='color:#002537'>Lourdes Forane Church</h6>Sathy Road, Near GP Hospital<br/>Gandhipuram, Coimbatore<br/>Tamil Nadu, India<br/>Pincode: 641012<br/><br/>Tel: 0422-2525284<br/> <br/><br/>
<?php $sql="SELECT * FROM contact WHERE position=1"; $result=mysqli_query($db,$sql); confirm_query($result);
while($row=mysqli_fetch_array($result)){echo "<h6 style='color:#002537'>{$row['name']}</h6>";if(isset($row['phone'])){echo "Phone: +91-{$row['phone']}<br/>";}if(isset($row['landline'])){echo "Landline: 0422-{$row['landline']}<br/>";}if(isset($row['email'])){echo "EMail: {$row['email']}<br/>";}echo "<br/>";}
$sql="SELECT * FROM contact WHERE position=2"; $result=mysqli_query($db,$sql); confirm_query($result);
while($row=mysqli_fetch_array($result)){ echo "<h6 style='color:#002537'>{$row['name']}</h6>";if(isset($row['phone'])){echo "Phone: +91-{$row['phone']}<br/>";}if(isset($row['landline'])){echo "Landline: 0422-{$row['landline']}<br/>";} if(isset($row['email'])){echo "EMail: {$row['email']}<br/>";}} ?>
</div><div class="cleaner"></div>