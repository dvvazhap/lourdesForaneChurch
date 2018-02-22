<?php $page='parishes'; ?>
<style type="text/css">
#tabs_wrapper{position:relative;height:100%;}
#tab_content{width:100%; margin-top:-27px; background-color:#EDE4E4; padding:50px 20px 50px 20px; 
-webkit-border-radius: 30px;-moz-border-radius: 30px;border-radius:30px; 
position:relative; height:90%;}
#tab_content div{line-height:2em;}
#tabs{text-decoration:none; list-style:none; padding:0px; height:40px; margin-left:100px;}
#tabs li{display:inline;cursor:pointer; font-style:italic; padding:10px 20px; height:30px; background-color:#642d07; margin-top:40px; font-style:Forte,Cooper,serif; font-size:20px;
-webkit-border-top-left-radius:20px;-webkit-border-top-right-radius:20px;-webkit-border-bottom-left-radius:0px;-webkit-border-bottom-right-radius:0px;
-moz-border-top-left-radius:20px;-moz-border-top-right-radius:20px;-moz-border-bottom-left-radius:10px;-moz-border-bottom-right-radius:0px;
border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;}
#tabs li a{color:#fff;}
b{color:#272727; font-size:18px; font-style:italic;}
#link_parish a{color:#272727; cursor:pointer; text-decoration:underline;}
#link_parish a:hover{text-decoration:none;}
#link_parish a:link{text-decoration:underline;}
</style>
<?php
require_once("include/connection.php");
if(isset($_GET['tab'])){
$tab=$_GET['tab'];
echo"<div id='tabs_wrapper'><ul id='tabs'>";
if($tab==1){
echo "<li style='background-color:#EDE4E4;'><a style='color:#272727' onclick='show_parishes(1)'>Ramanathapuram</a></li>
<li><a onclick='show_parishes(2)' >Gandhipuram</a></li>
<li><a onclick='show_parishes(3)' >Erode</a></li> ";}
elseif($tab==2){
echo "<li><a onclick='show_parishes(1)' >Ramanathapuram</a></li>
<li style='background-color:#EDE4E4;'><a style='color:#272727' onclick='show_parishes(2)' >Gandhipuram</a></li>
<li><a onclick='show_parishes(3)' >Erode</a></li> ";}
elseif($tab==3){
echo "<li><a onclick='show_parishes(1)' >Ramanathapuram</a></li>
<li><a onclick='show_parishes(2)' >Gandhipuram</a></li>
<li style='background-color:#EDE4E4;'><a style='color:#272727' onclick='show_parishes(3)' >Erode</a></li> ";}
echo "</ul>
<div id='tab_content' class='container-fluid'>
    <div class='row'>
        <div class='col-md-2'><strong>S. No.</strong></div>
        <div class='col-md-5'><strong>Parish</strong></div>
        <div class='col-md-5'><strong>Place</strong></div>
    </div>";
$sql="SELECT * FROM forane_table WHERE forane={$tab}"; $result=mysqli_query($db,$sql); $count = mysqli_num_rows($result); 
if($count>0) while($row=mysqli_fetch_array($result))
{ $id=$row['id'];
$name=$row['name'];$place=$row['place'];
echo "<div class='row'>
<div class='col-md-2'>1</div><div class='col-md-5' id='link_parish'><a onClick=\"MyWindow=window.open('parish.php?fid={$id}','MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1000,height=450'); return true;\" >{$name}</a>
</div><div class='col-md-5'>{$place}</div></div>"; }
$sql="SELECT * FROM parishes_table WHERE forane={$tab}"; $result=mysqli_query($db,$sql); $count = mysqli_num_rows($result); 
$sno=2;
if($count>0)while($row=mysqli_fetch_array($result))
{$id=$row['id'];
$name=$row['name'];$place=$row['place'];
echo "<div class='row'>
<div class='col-md-2'>{$sno}</div><div class='col-md-5' id='link_parish'><a onClick=\"MyWindow=window.open('parish.php?pid={$id}','MyWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1000,height=450'); return true;\" >{$name}</a>
</div><div class='col-md-5'>{$place}</div></div>";
$sno = $sno +1;
}echo "</div></div>";} ?>