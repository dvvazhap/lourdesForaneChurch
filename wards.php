<?php $page = 'wards';
require_once("include/connection.php");
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;}
?>
<style type="text/css">
#title{color:#632c01; text-align:center;font-size:60px;}
#meeting_start{font-size:35px; color:#272727; line-height:1.5em; margin-left:100px;}
#meeting_info{color:#272727045; font-size:30px;}
#resi_info{font-size:35px;color:#272727;line-height: 1.5em;}
#wardname{color:#272727063;font-size:30px;}
#owner_name{color:#364546;font-size:32px;}
#meeting_address{color:#364546;margin-top:0px;margin-left:200px;line-height: 1.5em;width:300px;font-size:20px;	text-align:center;}
#thank_you{color:#489590;margin-top:20px;margin-left:100px;margin-right:100px;text-align:center;font-size:20px;line-height: 1.5em;}
#information{color:#272727354;margin-top:20px;font-size:35px;line-height: 1.5em;}
#ward_title{margin-left:0px;color:#632c01;font-size:30px;}
#content_text{color:#272727;font-style:italic; font-size:28px;line-height: 1.5em;	margin-left:100px;margin-right:100px;}
</style>
<?php $page="wards";
	$sql = "SELECT * FROM wards_table WHERE id={$sub_page}"; 
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){$pagename = $row['name'];}
if($sub_page==NULL){$sub_pag=0;}
if($sub_page==0){
$sql="SELECT * FROM wards_table ORDER BY name "; 
$res=mysqli_query($db,$sql); 
$lr="one_image_left";
while($row=mysqli_fetch_array($res)){
$id = $row['id'];
 echo"<a href='#' onclick='show_wards({$id},1)'><div id='page_aw_wrapper' class='{$lr}'>
<div id='page_aw_name'>{$row['name']}</div><div id='page_pic_agw_frame'>";
$sql1="SELECT * FROM {$page}_table WHERE id={$row['id']}"; $res1=mysqli_query($db,$sql1);
echo "<div id='page_pic_agw'>"; while($row1=mysqli_fetch_array($res1)){if($row['image']==NULL){echo"<div><img src=\"images/no_image.jpg\" /></div>";}else echo"<div><img src=\"images/{$page}_table/{$row1['image']}\" /></div>";}
echo "</div></div>";
if($lr=="one_image_left"){$lr="one_image_left1";}else if($lr=="one_image_left1"){$lr="one_image_center";}
else if($lr=="one_image_center"){$lr="one_image_right1";}else if($lr=="one_image_right1"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></a>";
}
}
if($s_sub_page!=0){
	echo "<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-12' style='text-align:center'><h2 class='heading'> {$pagename}</h2></div>
			</div>
			</div>";
}
if($s_sub_page==1){
include("include/display_page_content.php"); 
$query="SELECT * FROM ward_info WHERE sub_page={$sub_page}"; $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){ echo "<span id=\"content_text\">{$row['about']}</span><br/><br/>";
if($row['location']!="")
	echo "<h3 id=\"ward_title\">Location of our ward </h3><span id=\"content_text\">{$row['location']}</span><br/><br/>";
if($row['nof']!=0)
	echo "<h3 id=\"ward_title\">Number of Families : {$row['nof']}</h3><br/><br/>";}}		
elseif($s_sub_page==2){include("include/display_council_members.php");}
?>
<div class="cleaner"></div>