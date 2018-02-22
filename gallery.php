<?php $page ='gallery';
require_once("include/connection.php");

$sql="SELECT DISTINCT page_name FROM albums WHERE page='gallery'";
$res=mysqli_query($db,$sql);
$a=mysqli_num_rows($res);
$lr="one_image_left";while($row=mysqli_fetch_array($res)){
$page_name=$row['page_name'];
echo"<div id='page_aw_wrapper' class='{$lr}'>
	<div id='book' onclick=\"show_album('gallery',0,'{$page_name}')\"> 
		<input type='hidden' name='page_name' value='{$page_name}'>
		<div id='page_aw_name'>{$row['page_name']}</div>
		<div id='page_pic_agw_frame'>";
			$sql1="SELECT * FROM albums WHERE page='gallery' && page_name='{$page_name}'"; 
			$res1=mysqli_query($db,$sql1);
		echo "<div id='page_pic_agw'>";
		while($row1=mysqli_fetch_array($res1)){
			echo"<div><img src=\"images/gallery/{$row1['page']}/{$row1['page_name']}/{$row1['name']}\" /></div>";
			break;
		}
	echo "</div></div>";
	if($lr=="one_image_left"){$lr="one_image_left1";}else if($lr=="one_image_left1"){$lr="one_image_center";}
	else if($lr=="one_image_center"){$lr="one_image_right1";}else if($lr=="one_image_right1"){$lr="one_image_right";}else{$lr="one_image_left";}	
echo "</div></div>";
} 


$sql="SELECT DISTINCT page_name FROM albums WHERE page='wards'";
$res=mysqli_query($db,$sql);
$a=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res)){
$page_name=$row['page_name']; 

$query="SELECT * FROM albums WHERE page='wards' && page_name='{$page_name}'";
$result=mysqli_query($db,$query);
while($disp=mysqli_fetch_array($result)){
$sub_page=$disp['sub_page'];
}


echo"<div id='page_aw_wrapper' class='{$lr}'>
<div id='book' onclick=\"show_album('wards',{$sub_page},'{$page_name}')\">
<input type='hidden' name='page_name' value='{$page_name}'>
<div id='page_aw_name'>{$row['page_name']} Ward</div>
<div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM albums WHERE page='wards' && page_name='{$page_name}'";
$res1=mysqli_query($db,$sql1);
echo "<div id='page_pic_agw'>";
while($row1=mysqli_fetch_array($res1)){
echo"<div><img src=\"images/gallery/wards/{$row1['sub_page']}/{$row1['name']}\" /></div>";
break;
}
echo "</div></div>";
if($lr=="one_image_left"){$lr="one_image_left1";}else if($lr=="one_image_left1"){$lr="one_image_center";}
else if($lr=="one_image_center"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></div>";
}


$sql="SELECT DISTINCT page_name FROM albums WHERE page='associations'";
$res=mysqli_query($db,$sql);
$a=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res)){
$page_name=$row['page_name'];
$query="SELECT * FROM albums WHERE page='associations' && page_name='{$page_name}'";
$result=mysqli_query($db,$query);
while($disp=mysqli_fetch_array($result)){
$sub_page=$disp['sub_page'];
}
echo"<div id='page_aw_wrapper' class='{$lr}'>
<div id='book' onclick=\"show_album('associations',{$sub_page},'{$page_name}')\"> 
<input type='hidden' name='page_name' value='{$page_name}'>";
echo "<div id='page_aw_name'>{$row['page_name']} Association</div>
<div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM albums WHERE page='associations' && page_name='{$page_name}'";
$res1=mysqli_query($db,$sql1); 
echo "<div id='page_pic_agw'>";
while($row1=mysqli_fetch_array($res1)){
echo"<div><img src=\"images/gallery/associations/{$row1['sub_page']}/{$row1['name']}\" /></div>";
break;
}
echo"</div></div>";
if($lr=="one_image_left"){$lr="one_image_left1";}else if($lr=="one_image_left1"){$lr="one_image_center";}
else if($lr=="one_image_center"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></div>";}

?>
<div class="cleaner"></div>