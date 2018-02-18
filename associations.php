<?php 
$page='associations';
require_once("include/connection.php");
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;}
?>
<style type="text/css">#title{color:#632c01;text-align:center;font-family:Forte,Georgia,Fantasy;font-size:50px;}
</style>
<?php $page='associations';
$sql = "SELECT * FROM associations_table WHERE id={$sub_page}"; 
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){$pagename = $row['name'];}
if($sub_page==0){
echo"<style>#content_wrapper {
clear:both;height:100%; position:relative;margin-left:5%;width:1000px; padding: 40px 0px;
background-image:url(images/backg1.jpg);}
#content{padding: 0px 50px;width: 89%;}#content p{margin-bottom: 10px;}</style>";
if($sub_page==NULL){$sub_pag=0;}
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
if($lr=="one_image_left"){$lr="one_image_centerl";}else if($lr=="one_image_centerl"){$lr="one_image_centerr";}
else if($lr=="one_image_centerr"){$lr="one_image_right";}else{$lr="one_image_left";}

echo "</div></a>";
}}
if($s_sub_page==1){
echo"<style>#content_wrapper {clear: both;position:relative;margin-left:5%;
width:90%;padding: 4% 0%; background-image:url(images/backg1.jpg);}
#content{padding: 0px 50px;width: 89%; text-align:justify;}
#content p{margin-bottom: 10px;}</style>";
echo "<h2 id=\"title\"> {$pagename}..!</h2>";
echo"<div class=\"hr_divider\"></div>";
$sql="SELECT * FROM albums WHERE page='associations' && sub_page={$sub_page} && name='page.jpg'";
$c=0;
$result=mysqli_query($db,$sql);
$c=mysqli_num_rows($result);
if($c==1){
echo "<img style=\"width:880px;border:2px solid black; height:400px;position:relative\" src='images/gallery/associations/{$sub_page}/page.jpg'>";
}
include("include/display_page_content.php");
}
elseif($s_sub_page==2){ include("include/display_council_members.php");} ?>
<div class="cleaner"></div>