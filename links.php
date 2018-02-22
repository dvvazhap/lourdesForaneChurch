<?php $page = 'links'; if(isset($_GET['tab'])){	$tab=$_GET['tab'];} ?>
<style>
#pcb{margin-top:0px;float:right;width:28%;position:relative; }
#pope_content a,#cardinal_content a,#bishop_content a{ font-size:20px; color:#272727; line-height:1.5em;}
#pope_content a:hover,#cardinal_content a:hover,#bishop_content a:hover{color:orange;}
#pope_wrapper{cursor:pointer;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;padding-left:0px; float:right; width:100%;height:175px;overflow:hidden;margin-bottom:10px;background-color:white;line-height:2em;}
#pope_wrapper img{ margin-top:-20px; margin-left:20%; height:100px; width:60%;}
#pope_heading{font-size:18px;background-color:#eeeeee;line-height:1.5em; height:15px;margin-left:-2%; margin-top:-18px; padding:20px 0% 20px 1%; text-align:center; width:102%;}
#pope_content{font-style:italic; margin-top: -20px;}
#pope_content ul{text-decoration:none; line-height:1.4em; width:100%; margin-left:0px; list-style:none;}
#pope_content ul a:hover,#pope_name a:hover{text-decoration:none;}
#pope_name a{color:#272727;margin-left:10px; margin-bottom:10px;}

#cardinal_wrapper{cursor:pointer;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;padding-left:0px;float:right;width:100%;height:175px;overflow:hidden;margin-bottom:10px;background-color:white;line-height:2em;}
#cardinal_wrapper img{margin-top:-20px; margin-left:20%; height:100px; width:60%;}
#cardinal_heading{font-size:18px;background-color:#eeeeee;line-height:1.5em; height:15px;margin-left:-2%; margin-top:-18px; padding:20px 0% 20px 1%; text-align:center;width:102%;}
#cardinal_content{margin:0px;font-style:italic;}
#cardinal_content ul{text-decoration:none; line-height:1.4em; width:100%; margin-left:0px; list-style:none;}
#cardinal_content ul a:hover,#cardinal_name a:hover{text-decoration:none;}
#cardinal_name a{color:#272727;margin-left:10px; margin-bottom:10px;}

#bishop_wrapper{cursor:pointer;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;padding-left:0px;float:right;width:100%;height:175px;overflow:hidden;margin-bottom:10px;background-color:white;line-height:2em;}
#bishop_wrapper img{margin-top:-20px; margin-left:20%; height:100px; width:60%;}
#bishop_heading{font-size:18px;background-color:#eeeeee;line-height:1.5em; height:15px;margin-left:-2%; margin-top:-18px; padding:20px 0% 20px 1%;text-align:center;width:102%;}
#bishop_content{ margin:0px;font-style:italic;color:orange;}
#bishop_content ul{text-decoration:none; line-height:1.4em; width:100%; margin-left:0px; list-style:none;}
#bishop_content ul a:hover,#bishop_name a:hover{text-decoration:none;}
#bishop_name{margin-top:35px;}
#bishop_name a{color:#272727;margin-left:10px; margin-bottom:10px;}
#bishop_name{margin-top:0px;}

#pope_content,#cardinal_content,#bishop_content{width:300px;float:right; margin:600px -300px 0px 0px;}
#details{width:550px; height:500px; position:absolute;}
#table{color:#272727; width:550px; font-size:20px; text-align:left; margin-top:50px; margin-left:50px;}
#table tr{height:60px;}
#links_wrapper{ width:620px; height:1350px; position:relative;}
#pope{ width:620px; height:600px; position:relative;}
#cardinal{ width:620px; height:600px; position:relative;}
#bishop{ width:620px; height:600px; position:relative;}
#pope_name_img,#cardinal_name_img,#bishop_name_img{
color:#272727; text-align:center;font-size:30px;}
#important_links ul{list-style:none; float:left;width:580px;margin-top:-10px; position:relative; margin-left:0px;}
.one_link{position:relative;}
.one_link a{margin:0px; margin-right:0px;width:100%; color:#272727;font-size:20px; line-height:2em;}
.one_link a:hover{margin:0px; margin-right:0px;width:100%; color:orange;font-size:20px; line-height:2em;}
</style>
<div id='pcb'>
<div id='pope_wrapper' onclick='show_links(1)'><h2 style='color:#272727'><div id='pope_heading'>HOLY FATHER / VATICAN</div></h2><img src='images/pope.png' /><br/>
<div id='pope_name'><b><center><a href='#'>Pope Francis I</a></center></b><br/></div></div>
<div id='cardinal_wrapper' onclick='show_links(2)' ><h2 style='color:#272727'><div id='cardinal_heading'>MAJOR ARCHBISHOP</div></h2><img src='images/cardinal1.jpg' />
<div id='cardinal_name'><b><center><a href='#'>Mar George Cardinal Alencherry </a></center></b><br /></div></div>
<div id='bishop_wrapper' onclick='show_links(3)' ><h2 style='color:#272727'><div id='bishop_heading'>OUR BISHOP</div></h2><img src='images/alapatt.png' />
<div id='bishop_name'><b><center><a href='#'>Mar Paul Alapatt</a></center></b><br/></div></div>
</div>
<div id='links_wrapper'>
<?php
if($tab==0){
echo "<div id='important_links' style='height:1400px;'><h2 style='color:#272727;margin-bottom:30px;'><b><i>IMPORTANT LINKS</i></b></h2>
<br/><br/><ul>
<li class='one_link'><a href='http://www.pocbible.com' target='_blank'>Malayalam Bible</a></li>
<li class='one_link'><a href='http://www.syromalabarchurch.in' target='_blank'>Syro Malabar Church</a></li>
<li class='one_link'><a href='http://www.syromalabarmatrimony.org' target='_blank'>Syro Malabar Matrimony</a></li>
<li class='one_link'><a href='http://www.apostolicnunciatureindia.com/' target='_blank'>The Apostolic Nunciature, India</a></li>
<li class='one_link'><a href='http://www.caritasindia.org/' target='_blank'>Caritas India</a></li>
<li class='one_link'><a href='http://cbci.in/' target='_blank'>Catholic Bishop's Conference of India (CBCI)</a></li>
<li class='one_link'><a href='http://www.nccrs.org/cms/index.php' target='_blank'>Catholic Charismatic Service</a></li>
<li class='one_link'><a href='http://www.icym.net/' target='_blank'>Indian Catholic Youth</a></li>
<li class='one_link'><a href='http://www.jesusyouth.org/' target='_blank'>Jesus Youth</a></li>
<li class='one_link'><a href='http://www.kcym.in/' target='_blank'>Kerala Catholic Youth Movement (KCYM)</a></li>
<li class='one_link'><a href='http://rexband.jesusyouth.org/main/component/option,com_remository/Itemid,31/func,select/id,1/' target='_blank'>Rex Band</a></li>
<li class='one_link'><a href='http://www.shalomtv.tv/' target='_blank'>Shalom Television</a></li>
<li class='one_link'><a href='http://www.catholic-saints.info/' target='_blank'>Catholic Saints</a></li>
<li class='one_link'><a href='http://www.syromalabarchurch.in/' target='_blank'>Syro Malabar Bishop's Synod</a></li>
<li class='one_link'><a href='http://www.ucanews.com/' target='_blank'>Union of Catholic Asian News</a></li>
</ul>
<div style='height:50px; margin-top:10px; font-size:20px; color:#272727;'><b><i>RETREAT CENTRES :</i></b></div>
<ul style='margin-top:30px'>
<li class='one_link'><a href='http://www.sehion.org' target='_blank'>Sehion</a></li>
<li class='one_link'><a href='http://www.drcm.org/' target='_blank'>Divine Retreat Centre, Chalakudy</a></li>
</ul>
<div style='height:30px; margin-top:250px; font-size:20px; color:#272727;'><b><i>DIOCESES :</i></b></div>
<ul style='margin-top:30px'>
<li class='one_link'><a href='http://www.ramanathapuramdiocese.org/home.php' target='_blank'>Diocese of Ramanathapuram</a></li>
<li class='one_link'><a href='http://www.archdiocesechanganacherry.org/' target='_blank'>Archdiocese of Changanacherry</a></li>
<li class='one_link'><a href='http://www.ernakulamarchdiocese.org/' target='_blank'>Archdiocese of Ernakulam</a></li>
<li class='one_link'><a href='http://kottayamad.org/' target='_blank'>Archdiocese of Kottayam</a></li>
<li class='one_link'><a href='http://www.belthangadydiocese.com/' target='_blank'>Diocese of Belthangady</a></li>
<li class='one_link'><a href='http://www.stthomasdiocese.org/' target='_blank'>Diocese of Chicago</a></li>
<li class='one_link'><a href='http://www.irinjalakudadiocese.com/' target='_blank'>Diocese of Irinjalakuda</a></li>
<li class='one_link'><a href='http://kanjirapallydiocese.com/' target='_blank'>Diocese of Kanjirappally</a></li>
<li class='one_link'><a href='http://www.kothamangalamdiocese.org/' target='_blank'>Diocese of Kothamangalam</a></li>
<li class='one_link'><a href='http://www.palaidiocese.com/' target='_blank'>Diocese of Palai</a></li>
<li class='one_link'><a href='http://www.palghatdiocese.org/' target='_blank'>Diocese of Palghat</a></li>
</ul>
</div>";
}
else if($tab==1){
echo "<div id='pope'>
<div id='pope_name_img'>Pope Francis I</div>
<img src='images/pope.png' style='margin-left:50px;width:500px;height:500px;'/>
<div id='details'>
<table id='table'>
<tr><th>Born </th><th>:</th><td>17 December 1936, Buenos Aires, Argentina</td></tr>
<tr><th>Birth Name </th><th>:</th><td>Jorge Mario Bergoglio</td></tr>
<tr><th>Nationality </th><th>:</th><td>Argentina with Vatican Citizenship</td></tr>
<tr><th>Ordination </th><th>:</th><td>13 December 1969</td></tr>
<tr><th>Created Cardinal </th><th>:</th><td>21 February 2001</td></tr>
<tr><th>Motto </th><th>:</th><td>Miserando atque eligendo(\"Lowly, but chosen\")</td></tr>
<tr><th>Predecessor </th><th>:</th><td>Benedict XVI</td></tr>
<tr><th>Papacy began </th><th>:</th><td>13 April 2013</td></tr>
</table>
</div>
<div id='pope_content'>
<b style='color:#272727;font-size:25px;'><i>See Also :</i></b>
<ul><li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/apost_letters/index_en.htm'>Apostolic Letters</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/apost_exhortations/index_en.htm'>Apost Exhortations</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/biography/documents/papa-francesco-biografia-bergoglio_en.html'>Biography</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/audiences/2012/index_en.htm'>Audience</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/encyclicals/index_en.htm'>Encyclicals</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/homilies/2012/index_en.htm'>Homilies</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/index.htm?openMenu=10'>Messages</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/prayers/index_en.htm'>Prayers</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/speeches/2013/march/index_en.htm'>Speeches</a></li>
<li><a target='_blank' href='http://www.vatican.va/holy_father/francesco/travels/index_outside-italy_en.htm'>Travels</a></li>
</ul></div>
</div>";
}
else if($tab==2){
echo "<div id='cardinal'>
<div id='cardinal_name_img'>Cardinal Mar George Alencherry</div>
<img src='images/alenchery.png' style='margin-left:100px;width:400px;height:500px;'/>
<div id='details'>
<table id='table'>
<tr><th>Born </th><th>:</th><td>19 April 1945, Thuruthy, Kerala</td></tr>
<tr><th>Ordination </th><th>:</th><td>19 November 1972</td></tr>
<tr><th>Bishop </th><th>:</th><td>11th  November 1996</td></tr>
<tr><th>Major Arch Bishop </th><th>:</th><td>24 May 2011</td></tr>
<tr><th>Predecessor </th><th>:</th><td>Mar Varkey Vithayathil</td></tr>
</table>
</div>

<div id='cardinal_content'>
<b style='color:#272727;font-size:25px;'><i>See Also :</i></b>
<ul>
<li> <a target='_blank'  href='http://www.smcim.org/bp/alenchery/article/4'>Profile</a></li><li> <a target='_blank'  href='http://www.smcim.org/bp/alenchery/gallery/4'>Gallery</a></li><li> <a target='_blank'  href='http://www.smcim.org/bp/alenchery/messages'>Messages</a></li><li> <a target='_blank'  href='http://www.smcim.org/bp/alenchery/updates'>News Updates</a></li></ul></div>
</div>";
}
else if($tab==3){
echo"<div id='bishop'>
<div id='bishop_name_img'>Mar Paul Alappatt</div>
<img src='images/bishop1.png' style='margin-left:100px;width:400px;height:500px;' />
<div id='details'>
<table id='table'>
<tr><th>Born </th><th>:</th><td>21 April 1962, Edathuruthy, Thrissur</td></tr>
<tr><th>Ordination </th><th>:</th><td>27 December 1987</td></tr>
<tr><th>Appointed Bishop </th><th>:</th><td>18 January 2010</td></tr>
<tr><th>Ordained Bishop </th><th>:</th><td>11 April 2010</td></tr>
</table>
</div>

<div id='bishop_content'>
<b style='color:#272727;font-size:25px;'><i>See Also :</i></b>
<ul>
<li> <a target='_blank'  href='http://www.ramanathapuramdiocese.org/about_us.html'>Eparchy of Ramanathapuram</a></li><li> <a target='_blank'  href='http://www.ramanathapuramdiocese.org/album/'>Gallery</a></li>
</ul></div>
</div>";
}
?>
</div>