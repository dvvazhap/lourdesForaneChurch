<?php
require_once("include/connection.php");
?>
<html>
<body>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<style>
#latest_news_wrapper{width:100%;z-index:3; height:400px; overflow:hidden;}
#latest_news_content{width:100%;position:absolute; margin-top:10px;z-index:2;cursor:pointer;}
#latest_news_content a{font-size:20px; color:black;}
#latest_news_content {font-size:20px; color:black;}
#latest_space{clear:both;height:0px;}
#link a{text-decoration:none;}
#link a:hover{color:#500050; text-decoration:underline;}
#no_link a:hover{color:black;}
#latest_news_content a:link{text-decoration:none;}</style>
<div id="latest_news_wrapper"><div id="latest_news_content" onmouseover='stopnews()' onmouseout='rollnews()'>
<?php $sql="SELECT * FROM latest_news WHERE visible=1";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	echo "<div id=\"latest_space\"></div>";			
	if($row['new_file']==1){echo"<div id='new_file' >";}
	else{echo "<div id='file'>";}
	if($row['file_name']=='0'){echo "<br/><b><i><div id='no_link'><a href='#'>".$row['file_desc']."</a></div></i></b></div>";}
	else echo "<br/><div id='link' ><a target='_blank' href=\"latest_news/{$row['file_name']}\"><b><i>".$row['file_desc']."</i></b></a></div></div>";
}?> </div>
</div>
<script>
window.onload=init;
var y = -300;
var a = $("#latest_news_content").height();
var dest_y = a+250;
var time = 3;
var new_img=0;
var roll=1;
function init(){
window.setTimeout('latest()',10);
}
$("document").ready(function() {
	$('#new_file a').after("<img id=\"img\" src='images/images4.png' align='absbottom' />");
});
function stopnews(){
roll=0;
}
function rollnews(){
roll=1;
}
function latest(){
if((y<dest_y)&&(roll==1)) y = y + time;
document.getElementById("latest_news_content").style.top = -y+'px';
if (y + 40 < dest_y){window.setTimeout('latest()',100);}
else{ y = -300; dest_y = a+250; latest(); }
}
</script>
</body>
</html>