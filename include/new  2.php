<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2-vsdoc.js"></script>
<script type="text/javascript">
$(function() { setInterval("rotateImages()", 2000); });
function rotateImages() { var oCurPhoto = $('#page_pic div.current');
var oNxtPhoto = oCurPhoto.next();
if (oNxtPhoto.length == 0)
oNxtPhoto = $('#page_pic div:first');
oCurPhoto.removeClass('current').addClass('previous');
oNxtPhoto.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, 1000,
function() { oCurPhoto.removeClass('previous');});}
</script>
<div><img id='page_pic_frame_image' src='images/hangwin11.png' />  
<div id='page_pic'>
<?php
if($sub_page==NULL){$sub_page=0;}
$cur=0;
if(($page=='wards')||($page=='associations')){
$sql="SELECT * FROM {$page}_table WHERE id={$sub_page}";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
		echo"<div class='current'><img src=\"images/{$page}_table/{$row['image']}\"/></div>";
}
$sql="SELECT * FROM albums WHERE page='{$page}' && sub_page={$sub_page}";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	echo"<div><img src=\"images/gallery/{$page}/{$sub_page}/{$row['name']}\" /></div>";	
}
}
else{
$sql="SELECT * FROM albums WHERE page='{$page}' && sub_page={$sub_page}";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	if($cur=0){
		echo"<div class='current'><img src=\"images/gallery/{$page}/{$row['name']}\"/></div>";
		$cur=1;
	}
	elseif($cur=1){
		echo"<div><img src=\"images/gallery/{$page}/{$row['name']}\" /></div>";
	}
}
}

?>
</div></div>