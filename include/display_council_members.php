<style type="text/css">
#council_info{height:250px;}
#photo img{border:3px solid black; float:right; width:120px; height:160px; margin-left:50px; margin-top:10px;margin-right:150px; -webkit-border-radius:10px;-moz-border-radius:10px; border-radius:10px;}
#post{margin-left:70px;font-style:italic;color:#000000;font-size:25px;font-family:Cooper,Arial,serif;}
#info{margin-left:180px;font-family:Gabriola,Times,serif;font-size:20px;}
#name{	margin-left:180px;color:#001132;font-size:28px;font-family:Gabriola,Times,serif; text-align:center; width:250px;}
#address{	margin-left:180px; font-style:italic; color:#632c01;width:250px;font-size:22px; text-align:center;font-family:Gabriola,Times,serif;}
#phone{	margin-left:180px;font-style:italic;color:#002453;text-align:center;width:250px;font-family:Times,serif;font-size:16px;}
#content_wrapper {clear: both;position:relative;margin-left:5%;width:90%;padding: 4% 0%; background-image:url(images/backg1.jpg);-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#content{padding: 0px 50px;width: 89%;}
#content p{margin-bottom: 10px;}
#title{color:#632c01;}
</style>
<?php
echo"<h2 id=\"title\">Council members</h2><div class=\"hr_divider\"></div>";
$count=0;
$sql = "SELECT * FROM council_members WHERE page='{$page}'&&sub_page={$sub_page}";
$result=mysqli_query($db,$sql);
if(!isset($result)){echo "Error :".mysqli_error();}
while($dis=mysqli_fetch_array($result)){$count++;}
for($i=1;$i<=$count;$i++){
	$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$sub_page} && position={$i} ORDER by position";
	$result=mysqli_query($db,$query);
	while($row=mysqli_fetch_array($result)){
		echo"<div id=\"council_info\">";
		echo"<div id=\"photo\">";
		$path="images/council_members/".$page."/".trim($sub_page)."/".trim($row['image']);
		if((!file_exists($path))||($row['image']=="0")||($row['image']=="")){ $path="images/no-photo.png"; }
		echo"<img src='{$path}'/></div><h3 id=\"post\">{$row['post']}</h3>";
		echo "<p id=\"info\">
			<h5 id=\"name\">{$row['name']}</h5>
			<h6 id=\"address\">{$row['address']}</h6><br/>";
			if($row['phone']!=NULL){echo"<h6 id=\"phone\">Mobile : +91-{$row['phone']}</h6>";}
			if($row['landline']!=NULL){echo"<h6 id=\"phone\">Landline : 0422-{$row['landline']}</h6>";}
			echo"<br/></p><br/></div>";
}}?>