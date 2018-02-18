<div id='page_name_bar'><div id='page_name'>
<?php
	require_once("include/connection.php");
	if(isset($_GET['page'])){$page=$_GET['page'];}
	if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
	if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;}
	$sql = "SELECT * FROM {$page}_table WHERE id={$sub_page}"; 
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){$pagename = $row['name']; echo $row['name'];} echo "</div></div>"; ?>
<style>
#page_name_bar{ float:left;margin-left:0%;width:40%;height:250px;margin-top:-30px;}
#page_name{ margin-top:100px;margin-left:1%;height:60px;
line-height:1.5em;width:100%;text-align:center; font-size:60px; font-family: Forte, Georgia, serif;color:#fff;}
#page_pic_frame_image{z-index:3;margin:-20px 0px 0px 0px;position:absolute;float:right;width:50%;height:360px;}
#page_pic{ position:absolute; z-index:1;margin-top:5px;margin-left:530px;height:260px;width:340px;overflow:hidden;}
#page_pic img{height:255px;width:350px; margin-top:23px;}
#page_pic div {position:absolute;z-index:0;}
#page_pic div.previous{z-index:1;}
#page_pic div.current{z-index:2;}
.one_image_left{position:relative;margin-left:5%;}
.one_image_right{position:relative;margin-left:55%;margin-top:-235px;}
</style>
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
<div>
<img id='page_pic_frame_image' src='images/hangwin11.png' /> 
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
}}
?>
</div></div>