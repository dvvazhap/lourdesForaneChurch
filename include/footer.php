<div class="cleaner"></div></div>

<div id="fb_like" class="fb-like" data-href="https://www.facebook.com/LourdesForaneChurch" data-send="true" data-width="450" data-show-faces="true" data-font="verdana"></div>
<div id="footer"> 2018 | <a href="#">Lourdes Forane Church</a> | Copyright with DESIGN TREE - Dijil Varghese - +91-9894985156 / +91-9739091906</div>
<?php if(isset($_GET['page_name'])){ echo"<script>document.getElementById('content_wrapper').style.visibility='hidden';document.getElementById('fb_like').style.visibility='hidden';document.getElementById('footer').style.visibility='hidden';</script>";}?></div></div></div>
<?php if((($page=='associations')||($page=='wards')||($page=='gallery'))&&($sub_page==0)) include("include/alter_page_height.php"); ?>
</body><script type='text/javascript'>
window.onload=init;
function init(){
var myWidth=document.body.offsetWidth;
if(myWidth<1100){document.getElementById("body").style.width = 1100 + 'px';
document.getElementById("body").style.position = 'relative';}
}
</script>
</html><?php if(isset($reply)){if($reply==1){echo "<script>alert('Not a valid User...!')</script>";}}if(isset($db)){	mysqli_close($db);} ?>