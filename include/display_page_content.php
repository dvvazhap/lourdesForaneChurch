<style type="text/css">
#page_content{ margin-top:10px; text-align:justify;}
#sub_title{	font-size:25px; font-family:"Times New Roman",serif; line-height:1em; color:#000000;}
#sub_content{color:black; font-style:italic; font-size:20px; line-height:2em; padding-left:100px; font-family:"Times New Roman",serif;margin-right:100px;}
</style>
<?php
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result=mysqli_query($db,$query);
$count=0;
confirm_query($result);
if(!isset($result)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
while($row = mysqli_fetch_array($result)){$count++;}
echo "<div id=\"page_content\">";
for($i=1;$i<=$count;$i++){
	$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page} && sub_no={$i}";
	$result=mysqli_query($db,$query);
	confirm_query($result);
	if(!isset($result)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
	while($row = mysqli_fetch_array($result)){
		echo "<b><span id=\"sub_title\">{$row['sub_title']}</span></b><br/>";
		echo "<span id=\"sub_content\">{$row['sub_content']}</span><br/><br/>";
	}
}echo "</div>";
?>