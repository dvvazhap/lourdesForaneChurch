<?php $page='parishes'; ?>
<style type="text/css">
#content_wrapper{background-image:none;}
#tab_content table,#tab_content td,#tab_content th{border-color: #b17023; border-style:solid;}
#tab_content table{margin-bottom:30px;border-width: 1px 1px 1px 1px; border-spacing: 0;border-collapse:collapse;}
#tab_content th{margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center;}
#tab_content td{valign:top; height:20px;margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center; }
#tab_content td p{height:30px;text-align:center;margin:0px;padding:0px; color:black;}
#tabs_wrapper{position:relative;height:100%;}
#tab_content{width:800px; margin-top:-27px; background-color:#c2a677; padding:50px 20px 50px 20px; 
-webkit-border-radius: 30px;-moz-border-radius: 30px;border-radius:30px; 
position:relative; height:80%;}
#tabs{text-decoration:none; list-style:none; padding:0px; height:40px; margin-left:100px;}
#tabs li{display:inline;cursor:pointer; font-style:italic; padding:10px 20px; height:30px; background-color:#642d07; margin-top:40px; font-style:Forte,Cooper,serif; font-size:20px;
-webkit-border-top-left-radius:20px;-webkit-border-top-right-radius:20px;-webkit-border-bottom-left-radius:0px;-webkit-border-bottom-right-radius:0px;
-moz-border-top-left-radius:20px;-moz-border-top-right-radius:20px;-moz-border-bottom-left-radius:10px;-moz-border-bottom-right-radius:0px;
border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;}
#tabs li a{color:#fff;}
b{color:black; font-size:18px; font-style:italic;}
#link_parish a{color:black; cursor:pointer; text-decoration:underline;}
#link_parish a:hover{text-decoration:none;}
#link_parish a:link{text-decoration:underline;}
</style>
<?php
require_once("include/connection.php");
require_once("include/functions.php");
if(isset($_GET['tab'])){
$tab=$_GET['tab'];
echo"<div id='tabs_wrapper'><ul id='tabs'>";
if($tab==1){
echo "<li style='background-color:#c2a677;'><a style='color:#000' onclick='show_parishes(1)'>Ramanathapuram</a></li>
<li><a onclick='show_parishes(2)' >Gandhipuram</a></li>
<li><a onclick='show_parishes(3)' >Erode</a></li> ";}
elseif($tab==2){
echo "<li><a onclick='show_parishes(1)' >Ramanathapuram</a></li>
<li style='background-color:#c2a677;'><a style='color:#000' onclick='show_parishes(2)' >Gandhipuram</a></li>
<li><a onclick='show_parishes(3)' >Erode</a></li> ";}
elseif($tab==3){
echo "<li><a onclick='show_parishes(1)' >Ramanathapuram</a></li>
<li><a onclick='show_parishes(2)' >Gandhipuram</a></li>
<li style='background-color:#c2a677;'><a style='color:#000' onclick='show_parishes(3)' >Erode</a></li> ";}
echo "</ul>
<div id='tab_content'>
<table border='1' cellspacing='0' cellpadding='0' align='left' width='800'>
<tr><td width='100'><p><strong>S. No.</strong></p></td><td width='174'><p><strong>Parish</strong></p></td><td width='300'><p><strong>Place</strong></p></td></tr>";
$sql="SELECT * FROM forane_table WHERE forane={$tab}"; $result=mysql_query($sql,$db); $count = mysql_num_rows($result); 
if($count>0) while($row=mysql_fetch_array($result))
{ $id=$row['id'];
$name=$row['name'];$place=$row['place'];
echo "<tr><td width='100'><p>1</p></td><td id='link_parish' width='174'><p>
<a onClick=\"MyWindow=window.open('parish.php?fid={$id}','MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1000,height=450'); return true;\" >{$name}</a>
</p></td><td width='300'><p>{$place}</p></td></tr>"; }
$sql="SELECT * FROM parishes_table WHERE forane={$tab}"; $result=mysql_query($sql,$db); $count = mysql_num_rows($result); 
$sno=2;
if($count>0)while($row=mysql_fetch_array($result))
{$id=$row['id'];
$name=$row['name'];$place=$row['place'];
echo "<tr><td width='100'><p>{$sno}</p></td><td id='link_parish' width='174'><p><a onClick=\"MyWindow=window.open('parish.php?pid={$id}','MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1000,height=450'); return true;\" >{$name}</a></p></td><td width='300'><p>{$place}</p></td></tr>";
$sno = $sno +1;
}echo "</table></div></div>";} ?>