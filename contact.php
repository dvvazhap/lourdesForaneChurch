<?php $page = 'contact';
require_once("include/connection.php");
require_once("include/functions.php");
?><style type="text/css">
#title{color:#ff3747;text-align:center;font-family:Forte,Georgia,Fantasy;font-size:50px;}
#row1{line-height:1.5em;font-size:40px;font-family:Forte,Cooper,monospace;padding:0%;margin-bottom:120px;text-align:center;height:330px;color:#000111;}
#row2{line-height:1.5em; font-size:40px; font-family:Forte,Cooper,monospace;padding:0%;text-align:center;margin-bottom:30px;height:300px;color:#000111;}
#c1{line-height:1em;font-size:30px;margin-top:10px;margin-left:0%;width:45%;height:350px; padding:20px 0% 0px 0%;position:absolute;}
#contact_detail_wrapper{width:80%;height:250px;margin-left:10%;margin-top:-300px;transform:rotate(355deg);-ms-transform:rotate(355deg);-moz-transform:rotate(355deg);-webkit-transform:rotate(355deg);-o-transform:rotate(355deg);}
#c2{line-height:1em; font-size:30px; position:absolute; margin-top:10px; margin-left:45%; width:45%; height:350px;padding:20px 0% 0px 0%;}
#c23{padding:0px; position:absolute; margin-top:60px; margin-left:50px; width:800px; height:250px;
-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#c23 img{margin-top:-30px; float:left; width:350px; height:350px;}
#c23 div{width:400px;margin-top:50px;margin-left:330px; font-weight:bold;font-family:'Times New Roman',serif;
float:right;text-align:center; line-height:1.5em;font-size:25px; font-style:italic; position:absolute;}
#content{height:1100px;} #name{color:#ff5430; width:100%;} #c1_1,#c1_2,#c2_1,#c2_2{height:280px;width:100%;}
#contact_details{position:relative;font-size:20px;margin-top:10px;margin-bottom:10px;line-height:1.2em;color:#004748;}
#address{color:#000032;font-style:italic;height:80px;font-size:20px;padding-top:20px;margin-top:10px;font-family:Cooper,Georgia,Monospace;}
#content_wrapper {background-image:url(images/backg1.jpg); -webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px;}
#name{color:#632c01;}
</style>

<div id="row1">Priests of Lourdes Forane Church...!<div id="c1"><img id="c1_1" src="images/2.png" /><div id="contact_detail_wrapper">
<?php $query="SELECT * FROM contact WHERE position = 1";
$result=mysql_query($query,$db); while($row=mysql_fetch_array($result)){echo "<div id=\"name\">{$row['name']}<br/></div><div id=\"address\">{$row['address']}<br/></div>";echo "<div id=\"contact_details\">"; if($row['email']!=NULL){echo "Email :{$row['email']}<br/>";}if($row['phone']!=NULL){echo "Phone : +91-{$row['phone']}<br/>";} if($row['landline']!=NULL){echo "Landline : 0422-{$row['landline']}<br/>";} echo "</div>";} ?></div></div>
<div id="c2"><img id="c2_1" src="images/2.png" /><div id="contact_detail_wrapper">
<?php $query="SELECT * FROM contact WHERE position=2"; $result=mysql_query($query,$db);
while($row=mysql_fetch_array($result)){ echo "<div id=\"name\">{$row['name']}<br/></div><div id=\"address\">{$row['address']}<br/></div>";
echo "<div id=\"contact_details\">"; if($row['email']!=NULL){ echo "Email :{$row['email']}<br/>";} if($row['phone']!=NULL){
echo "Phone : +91-{$row['phone']}<br/>";} if($row['landline']!=NULL){ echo "Landline : 0422-{$row['landline']}<br/>";} echo "</div>";} ?>
</div></div></div><div id="row2">Kaikkaran's...!<div id="c1"><img id="c1_2" src="images/2.png" /><div id="contact_detail_wrapper">
<?php $query="SELECT * FROM contact WHERE position=3"; $result=mysql_query($query,$db);
while($row=mysql_fetch_array($result)){ echo "<div id=\"name\">{$row['name']}<br/></div><div id=\"address\">{$row['address']}<br/></div>";
echo "<div id=\"contact_details\">"; if($row['email']!=NULL){echo "Email :{$row['email']}<br/>";} if($row['phone']!=NULL){ echo "Phone : +91-{$row['phone']}<br/>";}if($row['landline']!=NULL){ echo "Landline : 0422-{$row['landline']}<br/>";}echo "</div>";}?>
</div></div><div id="c2"><img id="c2_2" src="images/2.png" /><div id="contact_detail_wrapper">
<?php $query="SELECT * FROM contact WHERE position=4"; $result=mysql_query($query,$db);
while($row=mysql_fetch_array($result)){ echo "<div id=\"name\">{$row['name']}<br/></div><div id=\"address\">{$row['address']}<br/></div>"; echo "<div id=\"contact_details\">";if($row['email']!=NULL){echo "Email :{$row['email']}<br/>";} if($row['phone']!=NULL){echo "Phone : +91-{$row['phone']}<br/>";} if($row['landline']!=NULL){echo "Landline : 0422-{$row['landline']}<br/>";}echo "</div>";}?>
</div></div></div><div id="c23"><a href="http://www.w3creatorz.org" target="_blank"><img src='images/logo2.png'></a>
<div>"The Pioneers in Web Designing "<br/><br/>
Dijil Varghese<br/>
Ph: +91-9894985156
</div>
</div><div class="cleaner"></div>