<?php $page = 'priests';
require_once("include/connection.php");
require_once("include/functions.php");
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}
?>
<style type="text/css">
#contact_info{float:left;width:60%; margin-top:30px; margin-left:150px;	text-align:right; font-size:25px; font-family:Cooper,Arial,monospace;}
#name{color:#004356; line-height:1.5em;}
#contact_details{color:#000000;font-family:Forte,Cooper,monospace; line-height:1.2em;font-size:20px;}
#page_content{ margin-top:100px;}
#sub_title{	font-size:40px; font-family:"Blackadder ITC",Chiller,Forte,Cooper,monospace; line-height:1.5em; color:#eeffaa;}
#sub_content{color:#bfbfbf; font-size:35px;line-height:1.5em; padding-left:12%; font-family:Gabriola,Cooper,monospace;}
#content_wrapper{background-image:none; margin-top:-30px; height:770px;}
#content_wrapper img{ width:900px; height:800px; -webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px; position:absolute;}
#content{width:900px; position:relative; margin-bottom:0px;}
#priest_info{position:absolute; margin-top:350px;}
</style>
<img src='images/aaa.png' style='float'/>
<div id="content">
<?php $page="priests"; echo "<div id='contact_info'>";
$query = "SELECT * FROM contact WHERE position={$sub_page}";
$result=mysql_query($query,$db);
while($row = mysql_fetch_array($result)){
echo "<span id='name'>{$row['name']}</span>
<span id='contact_details'>";
if(isset($row['phone'])){echo "<br/> Phone :+91-{$row['phone']}<br/>";}
if(isset($row['email'])){echo " Email :{$row['email']}<br/>";}
echo "</span>";}echo "</div><br/><br/><br/>";
if($sub_page==1){echo "<img style='margin-left:-500px;margin-top:50px;-webkit-border-radius:0px;-moz-border-radius:0px;border-radius:0px;height:300px;width:300px;border:2px solid black;' src='images/priest1.jpg' />";}
if($sub_page==2){echo "<img style='margin-left:-500px;margin-top:50px;-webkit-border-radius:0px;-moz-border-radius:0px;border-radius:0px;height:300px;width:300px;border:2px solid black;' src='images/priest2.jpg' />";}
echo "<div id='priest_info'>";
include("include/display_page_content.php"); 
echo "</div>";
?>
<div class="cleaner"></div>