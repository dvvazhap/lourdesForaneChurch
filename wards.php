<?php $page = 'wards';
require_once("include/connection.php");
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}else{$sub_page=0;}
if(isset($_GET['s_sub_page'])){$s_sub_page=$_GET['s_sub_page'];}else{$s_sub_page=0;}
?>
<style type="text/css">
#title{color:#632c01; text-align:center;font-family:Forte,Georgia,Fantasy;font-size:60px;}
#meeting_start{font-size:35px; color:#000000; line-height:1.5em;font-family:"Times New Roman",Cooper,Monospace; margin-left:100px;}
#meeting_info{color:#000045; font-size:30px;font-family:Forte,Cooper,Fantasy;}
#resi_info{font-size:35px;color:#000000;line-height: 1.5em;font-family:"Times New Roman",Cooper,Monospace;}
#wardname{color:#000063;font-size:30px;font-family:Forte,Cooper,Fantasy;}
#owner_name{color:#364546;font-size:32px;font-family:Forte,Cooper,Fantasy;}
#meeting_address{color:#364546;margin-top:0px;margin-left:200px;line-height: 1.5em;width:300px;font-size:20px;	font-family:Forte,Cooper,Fantasy;text-align:center;}
#thank_you{color:#489590;font-family:"Times New Roman",Cooper,Fantasy;margin-top:20px;margin-left:100px;margin-right:100px;text-align:center;font-size:20px;line-height: 1.5em;}
#information{color:#000354;margin-top:20px;font-family:"Times New Roman",'Arial Narrow',serif;font-size:35px;line-height: 1.5em;}
#ward_title{margin-left:0px;color:#632c01;font-size:30px; font-family:"Forte",Cooper,serif;}
#content_text{color:#000;font-style:italic; font-size:28px;line-height: 1.5em;font-family: "Times New Roman",Cooper,Monospace;	margin-left:100px;margin-right:100px;}
</style>
<?php $page="wards";
	$sql = "SELECT * FROM wards_table WHERE id={$sub_page}"; 
	$result=mysqli_query($db,$sql);
	while($row=mysqli_fetch_array($result)){$pagename = $row['name'];}
if($sub_page==0){
echo"<style>#content_wrapper {
clear:both;position:relative;margin-left:5%;width:1000px; padding: 40px 0px;
background-image:url(images/backg1.jpg); -webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#content{padding: 0px 50px;width: 89%;}#content p{margin-bottom: 10px;}</style>";
if($sub_page==NULL){$sub_pag=0;}
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
if($lr=="one_image_left"){$lr="one_image_centerl";}else if($lr=="one_image_centerl"){$lr="one_image_centerr";}
else if($lr=="one_image_centerr"){$lr="one_image_right";}else{$lr="one_image_left";}
echo "</div></a>";
}
}
elseif($s_sub_page==1){
echo"<style>#content_wrapper {clear: both;position:relative;margin-left:5%;
width:90%;padding: 4% 0%; background-image:url(images/backg1.jpg);
-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#content{padding: 0px 50px;width: 89%; text-align:justify;}
#content p{margin-bottom: 10px;}</style>";
 echo "<h2 id=\"title\"> {$pagename} Ward..!</h2><div class=\"hr_divider\"></div>";
include("include/display_page_content.php"); 
$query="SELECT * FROM ward_info WHERE sub_page={$sub_page}"; $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){ /*echo "<span id=\"content_text\">{$row['about']}</span><br/><br/>";
echo "<h3 id=\"ward_title\">Location of our ward </h3><span id=\"content_text\">{$row['location']}</span><br/><br/>*/echo "<h3 id=\"ward_title\">Number of Families : {$row['nof']}</h3><br/><br/>";}}		
elseif($s_sub_page==2){include("include/display_council_members.php");}
elseif($s_sub_page==3){
echo"<style>#content_wrapper{clear: both;position:relative;margin-left:5%;width:90%;padding: 4% 0%; 
background-image:url(images/aaa.png); background-size:100%;
-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#content{padding:0px 50px;width:700px;margin:20px 0px 0px 50px;}
#content p{margin-bottom: 10px;}</style>";
echo"<h2 id=\"title\">Prayer Meeting</h2><div class=\"hr_divider\"></div>";
$query="SELECT * FROM prayer_meeting WHERE sub_page={$sub_page}"; $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){ echo "<span id=\"meeting_start\">The next Prayer Meeting of Our <span id=\"wardname\">{$pagename} Ward</span> is to be held on <span id=\"meeting_info\">{$row['date']}</span> at <span id=\"meeting_info\">{$row['time']}</span>
in the House of <span id=\"owner_name\">{$row['name']}</span>.</span><br/><br/><p id=\"resi_info\">His/Her residential address is,</p> 
<div id=\"meeting_address\">{$row['address']}</div>";
if($row['information']!=NULL){ echo "<div id=\"information\">{$row['information']}</div>";}
echo"<div id=\"thank_you\">\"Ur presence in the meeting is very important for us. Please attend the meeting without fail...!\"</div>"; echo"<br/>";}}?>
<div class="cleaner"></div>