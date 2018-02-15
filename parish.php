<?php
require_once("include/connection.php");
require_once("include/functions.php");
if(isset($_GET['pid'])){$id=$_GET['pid'];
$sql = "SELECT * FROM parishes_table WHERE id={$id}";
$res = mysql_query($sql,$db);
$path = "images/parishes/";
}
if(isset($_GET['fid'])){$id=$_GET['fid'];
$sql = "SELECT * FROM forane_table WHERE id={$id}";
$res = mysql_query($sql,$db);
$path = "images/forane/";
}
while($row=mysql_fetch_array($res)){
$name=$row['name'];
$image=$row['image'];
$landline=$row['landline'];
$address=$row['address'];
$p_name=$row['p_name'];
$ap_name=$row['ap_name'];
$p_phone=$row['p_phone'];
$ap_phone=$row['ap_phone'];
$path=$path.$image;
}
?>
<style>
body{background-color:#c2a677;}
#parish_wrapper{width:860px; height:400px;position:relative; color:black;}
#name{height:100px;
text-align:center; font-size:30px; font-family:Cooper, Georgia, serif; color:#000000;}
#image_wrapper img{width:300px;height:400px; border:3px solid #642d07;}
#image_wrapper{overflow:hidden;width:306px; height:406px; margin-top:0px;}
#parish_content{height:400px; width:650px; margin-top:-400px;line-height:1.5em; margin-left:320px; 
font-family:Georgia, serif;font-size:20px; color:#ade450;}
#parish_priest td{color:#000000;font-style:italic; font-family:'Times New Roman',Georgia,serif;font-size:20px;}
#parish_address{color:#000038; padding-left:10%;width:400px;text-align:center;line-height:1.5em;}
</style>
<html>
<head><title><?php echo $name; ?></title></head>
<body>
<?php
echo"<div id='parish_wrapper'>";
echo "<div id='image_wrapper'>"; if($image!=NULL)echo "<img src='{$path}'>";
else echo"<img src='images/no_image.jpg'/>";
echo"</div><div id='parish_content'>
<div id='name'>{$name}</div>
<div id='parish_address'>Address :{$address}<br/>";
if($landline!=NULL)echo"Landline: 0422-{$landline}";echo"</div><br/>
<div id='parish_priest'>
<table><tr><td><b>Parish Priest :</b></td><td width='150'>{$p_name}</td><td>";if($p_phone)echo"Ph: +91-{$p_phone}";echo"</td></tr>";
if($ap_name!=NULL)
echo "<tr><td><b>Assistant Priest :</b></td><td>{$ap_name}</td><td>";if($ap_phone!="")echo" Ph: +91-{$ap_phone}";echo"</td></tr>";
echo "</table></div></div></div>";
?>
</body>
</html>