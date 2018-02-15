<?php $page ='gallery';
require_once("include/connection.php");
require_once("include/functions.php");
?>
<style type="text/css">
#content_wrapper{background-image:url(images/backg1.jpg); -webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
</style>

<?php
$sql="SELECT DISTINCT page_name FROM albums WHERE page='gallery'";
$res=mysql_query($sql,$db);
$a=mysql_num_rows($res);
$lr="one_image_left";while($row=mysql_fetch_array($res)){
$page_name=$row['page_name'];
echo"<div id='page_aw_wrapper' class='{$lr}'>
	<div id='book' onclick=\"show_album('gallery',0,'{$page_name}')\"> 
		<input type='hidden' name='page_name' value='{$page_name}'>
		<div id='page_aw_name'>{$row['page_name']}</div>
		<div id='page_pic_agw_frame'>";
			$sql1="SELECT * FROM albums WHERE page='gallery' && page_name='{$page_name}'"; 
			$res1=mysql_query($sql1,$db);
		echo "<div id='page_pic_agw'>";
		while($row1=mysql_fetch_array($res1)){
			echo"<div><img src=\"images/gallery/{$row1['page']}/{$row1['page_name']}/{$row1['name']}\" /></div>";
			break;
		}
	echo "</div></div>";
if($lr=="one_image_left"){$lr="one_image_centerl";}else if($lr=="one_image_centerl"){$lr="one_image_centerr";}
else if($lr=="one_image_centerr"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></div>";
} 


$sql="SELECT DISTINCT page_name FROM albums WHERE page='wards'";
$res=mysql_query($sql,$db);
$a=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
$page_name=$row['page_name']; 

$query="SELECT * FROM albums WHERE page='wards' && page_name='{$page_name}'";
$result=mysql_query($query,$db);
while($disp=mysql_fetch_array($result)){
$sub_page=$disp['sub_page'];
}


echo"<div id='page_aw_wrapper' class='{$lr}'>
<div id='book' onclick=\"show_album('wards',{$sub_page},'{$page_name}')\">
<input type='hidden' name='page_name' value='{$page_name}'>
<div id='page_aw_name'>{$row['page_name']} Ward</div>
<div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM albums WHERE page='wards' && page_name='{$page_name}'";
$res1=mysql_query($sql1,$db);
echo "<div id='page_pic_agw'>";
while($row1=mysql_fetch_array($res1)){
echo"<div><img src=\"images/gallery/wards/{$row1['sub_page']}/{$row1['name']}\" /></div>";
break;
}
echo "</div></div>";
if($lr=="one_image_left"){$lr="one_image_centerl";}else if($lr=="one_image_centerl"){$lr="one_image_centerr";}
else if($lr=="one_image_centerr"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></div>";
}


$sql="SELECT DISTINCT page_name FROM albums WHERE page='associations'";
$res=mysql_query($sql,$db);
$a=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
$page_name=$row['page_name'];
$query="SELECT * FROM albums WHERE page='associations' && page_name='{$page_name}'";
$result=mysql_query($query,$db);
while($disp=mysql_fetch_array($result)){
$sub_page=$disp['sub_page'];
}
echo"<div id='page_aw_wrapper' class='{$lr}'>
<div id='book' onclick=\"show_album('associations',{$sub_page},'{$page_name}')\"> 
<input type='hidden' name='page_name' value='{$page_name}'>";
echo "<div id='page_aw_name'>{$row['page_name']} Association</div>
<div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM albums WHERE page='associations' && page_name='{$page_name}'";
$res1=mysql_query($sql1,$db); 
echo "<div id='page_pic_agw'>";
while($row1=mysql_fetch_array($res1)){
echo"<div><img src=\"images/gallery/associations/{$row1['sub_page']}/{$row1['name']}\" /></div>";
break;
}
echo"</div></div>";
if($lr=="one_image_left"){$lr="one_image_centerl";}else if($lr=="one_image_centerl"){$lr="one_image_centerr";}
else if($lr=="one_image_centerr"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></div>";}

?>
<div class="cleaner"></div>