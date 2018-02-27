<?php
require_once("include/connection.php");
?>
<html>
<body>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<style>
#latest_news_wrapper{width:100%;z-index:3; height:400px; overflow:hidden;}
#latest_news_content{width:100%;position:absolute; margin-top:10px;z-index:2;cursor:pointer;font-size:20px; color:#272727;}

</style>
<div id="latest_news_wrapper" ><div id="latest_news_content" onmouseover='stopnews()' onmouseout='rollnews()'>
<?php $sql="SELECT * FROM latest_news WHERE visible=1";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	if($row['visible']==1){
		echo "<br/><span style='padding:20px;'>";
		if($row['file_name']!='0') // attachment
			echo "<a target='_blank' href=\"latest_news/{$row['file_name']}\">".$row['file_desc']."</a>";
		else 
			echo $row['file_desc'];
		if($row['new_file']==1){echo"&nbsp;&nbsp;&nbsp;&nbsp;<i style='color:red;' class='fas fa-flag'></i>";}
		echo"</span><br/>";
	}
}?> </div>
</div>
<script>
window.onload=init;
var y = -10;
var a = $("#latest_news_content").height();
var dest_y = a+250;
var time = 3;
var new_img=0;
var roll=1;
function init(){
window.setTimeout('latest()',10);
}
function stopnews(){roll=0;}
function rollnews(){roll=1;}
function latest(){
if((y<dest_y)&&(roll==1)) y = y + time;
document.getElementById("latest_news_content").style.top = -y+'px';
if (y + 40 < dest_y){window.setTimeout('latest()',100);}
else{ y = -300; dest_y = a+250; latest(); }
}
</script>
</body>
</html>