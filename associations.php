<?php 
$page='associations';
require_once("include/connection.php");
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;}
?>
<?php $page='associations';
$sql = "SELECT * FROM associations_table WHERE id={$sub_page}"; 
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){$pagename = $row['name'];}
if($sub_page==NULL){$sub_pag=0;}
if($sub_page==0){
$sql="SELECT * FROM associations_table ORDER BY name "; 
$res=mysqli_query($db,$sql);
$lr="one_image_left"; 
while($row=mysqli_fetch_array($res)){
$id = $row['id'];
echo"<a href='#' onclick='show_associations({$id},1)'><div id='page_aw_wrapper' class='{$lr}'>
<div id='page_aw_name'>{$row['name']}</div><div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM {$page}_table WHERE id={$row['id']}"; $res1=mysqli_query($db,$sql1);
echo "<div id='page_pic_agw'>"; while($row1=mysqli_fetch_array($res1)){if($row['image']==NULL){
echo"<div><img src=\"images/no_image.jpg\" /></div>";}else echo"<div><img src=\"images/{$page}_table/{$row1['image']}\" /></div>";
}
echo "</div></div>";
if($lr=="one_image_left"){$lr="one_image_left1";}else if($lr=="one_image_left1"){$lr="one_image_center";}
else if($lr=="one_image_center"){$lr="one_image_right1";}else if($lr=="one_image_right1"){$lr="one_image_right";}else{$lr="one_image_left";}

echo "</div></a>";
}}
if($s_sub_page!=0){
	echo "<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-12' style='text-align:center'><h2 class='heading'> {$pagename}</h2></div>
			</div>
			</div>";
}
if($s_sub_page==1){
$sql="SELECT * FROM albums WHERE page='associations' && sub_page={$sub_page} && name='page.jpg'";
$c=0;
$result=mysqli_query($db,$sql);
$c=mysqli_num_rows($result);
if($c==1){
echo "<img style='width:80%;border:2px solid #272727; margin-left: auto;	margin-right: auto;	display: block; height:400px;position:relative' src='images/gallery/associations/{$sub_page}/page.jpg'>";
}
include("include/display_page_content.php");
}
elseif($s_sub_page==2){ include("include/display_council_members.php");} ?>
<div class="cleaner"></div>