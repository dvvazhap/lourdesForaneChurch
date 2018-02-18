<div class="cleaner"></div></div>

<div id="fb_like" class="fb-like" data-href="https://www.facebook.com/LourdesForaneChurch" data-send="true" data-width="450" data-show-faces="true" data-font="verdana"></div>
<div id="footer">Copyright 2012 <a href="#">Lourdes Forane Church</a> | Website Designed by <a href="http://www.w3creatorz.org" target="_blank">w3creatorz(Dijil Varghese)</a></div>
<?php if(isset($_GET['page_name'])){ echo"<script>document.getElementById('content_wrapper').style.visibility='hidden';document.getElementById('fb_like').style.visibility='hidden';document.getElementById('footer').style.visibility='hidden';</script>";}?></div></div></div>
<?php if((($page=='associations')||($page=='wards')||($page=='gallery'))&&($sub_page==0)) include("include/alter_page_height.php"); ?>
</body><script type='text/javascript'>
window.onload=init;
function init(){
var myWidth=document.body.offsetWidth;
if(myWidth<1100){document.getElementById("body").style.width = 1100 + 'px';
document.getElementById("body").style.position = 'relative';}
else if(myWidth>1100){
margin = (myWidth-1100)/2; 
document.getElementById("map_doc").style.marginLeft =  margin + "px";
}
}
</script>
</html><?php if(isset($reply)){if($reply==1){echo "<script>alert('Not a valid User...!')</script>";}}if(isset($db)){	mysqli_close($db);} ?>