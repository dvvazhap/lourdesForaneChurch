<style>
#content_wrapper{background-image:none; margin-top:-30px;}
#tab_content table,#tab_content td,#tab_content th{border-color: #b17023; border-style:solid;}
#tab_content table{margin-bottom:30px;border-width: 1px 1px 1px 1px; border-spacing: 0;border-collapse:collapse;}
#tab_content th{margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center;}
#tab_content td{color:black; valign:top; height:20px;margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center; }
#tab_content td p{height:30px;text-align:center;margin:0px;padding:0px; color:black;}
.tab-content{width:800px;  margin-top:-27px; background-color:#c2a677; padding:50px 20px 50px 20px; -webkit-border-radius: 30px;-moz-border-radius: 30px;border-radius:30px;}
#tabs{text-decoration:none; list-style:none; padding:0px; height:40px; margin-left:50px;}
#tabs li{display:inline; cursor:pointer; font-style:italic; padding:10px 20px; height:30px; background-color:#642d07; margin-top:40px; font-style:Forte,Cooper,serif; font-size:20px;
-webkit-border-top-left-radius:20px;-webkit-border-top-right-radius:20px;-webkit-border-bottom-left-radius:0px;-webkit-border-bottom-right-radius:0px;
-moz-border-top-left-radius:20px;-moz-border-top-right-radius:20px;-moz-border-bottom-left-radius:10px;-moz-border-bottom-right-radius:0px;
border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;}
#tabs li a{color:#fff;}
.s_h{color:#642d07; font-size:20px; margin-top:30px;}
b{color:black; font-size:18px; font-style:italic;}
</style>xcx

<?php
if(isset($_GET['tab'])){
$tab=$_GET['tab'];
if($tab==1){
echo"<ul id='tabs'>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_institutions(1)' >Ecclesiastical</a></li>
<li><a onclick='show_institutions(2)' >Educational</a></li>
<li><a onclick='show_institutions(3)' >Medical</a></li>
<li><a onclick='show_institutions(4)' >Charitable</a></li>
<li><a onclick='show_institutions(5)' >Social</a></li>
</ul>
<div class='tab-content' id='tab_content'>
<p><span class='s_h'>i)	Minor Seminaries</span><br>
</p>
<table border='1' cellspacing='0' cellpadding='0' align='left' width='800'>
<tr><td width='100'><p><strong>S. No.</strong></p></td><td width='174'><p><strong>Place</strong></p></td><td width='300'><p><strong>Name</strong></p></td><td width='102'><p><strong>Estd.</strong></p></td><td width='200'><p><strong>Phone</strong></p></td></tr>
<tr><td width='100'><p>1</p></td><td width='174'><p>Edayapalayam</p></td><td width='300'><p>St. Mary</p></td><td width='102'><p>2011</p></td><td width='200'><p>0422 3300972</p></td></tr>
</table>
<p>
<span class='s_h'>ii)	Retreat Centres</span><br>
</p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Divine Dhiyana Illam</p></td>
<td width='102'><p>2004</p></td>
<td width='200'><p>0422 237080</p></td>
</tr>
</table>
<p><span class='s_h'>iii)	Animation Centres</span><br>
</p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Gandhipuram</p></td>
<td width='300'><p>Eparchial Catechetical Centre</p></td>
<td width='102'><p>2010</p></td>
<td width='200'><p>9092924025</p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Thottipalayam</p></td>
<td width='300'><p>Jeevan Jyothi Centre</p></td>
<td width='102'><p>1998</p></td>
<td width='200'><p>04254 272873</p></td>
</tr>
</table>
<p><span class='s_h'>iv)	Perpetual Adoration Centres</span><br>
</p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Poomarket</p></td>
<td width='300'><p>Amaithi Illam</p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>0422 2550765</p></td>
</tr>
</table>
</div>";
}
if($tab==2){
echo"<ul id='tabs'>
<li><a onclick='show_institutions(1)'>Ecclesiastical</a></li>
<li style='background-color:#c2a677'><a style='color:#000' onclick='show_institutions(2)'>Educational</a></li>
<li><a onclick='show_institutions(3)'>Medical</a></li>
<li><a onclick='show_institutions(4)'>Charitable</a></li>
<li><a onclick='show_institutions(5)'>Social</a></li>
</ul>";
echo "<div class='tab-content' id='tab_content'>
<span class='s_h'> i)	Schools</span><br>
<b>Higher Secondary </b>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><stong>No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Annur</p></td>
<td width='300'><p>St. Mary</p></td>
<td width='102'><p>1982</p></td>
<td width='200'><p>04254-263626 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Alvernia</p></td>
<td width='102'><p>1978</p></td>
<td width='200'><p>0422 2316205</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Avila</p></td>
<td width='102'><p>1967</p></td>
<td width='200'><p>0422 2432443</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Chavara Vidya Bhavan</p></td>
<td width='102'><p>1986</p></td>
<td width='200'><p>0422 2430051</p></td>
</tr>
<tr>
<td width='100'><p>5</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Lisieux</p></td>
<td width='102'><p>1972</p></td>
<td width='200'><p>0422 2440537</p></td>
</tr>
<tr>
<td width='100'><p>6</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Trinity</p></td>
<td width='102'><p>1993</p></td>
<td width='200'><p>0422 2312918</p></td>
</tr>
<tr>
<td width='100'><p>7</p></td>
<td width='174'><p>Jadayampalayam</p></td>
<td width='300'><p>St. Joseph</p></td>
<td width='102'><p>2006</p></td>
<td width='200'><p>04254 226260</p></td>
</tr>
<tr>
<td width='100'><p>8</p></td>
<td width='174'><p>Mettupalayam</p></td>
<td width='300'><p>San Jose</p></td>
<td width='102'><p>2004</p></td>
<td width='200'><p>04254 223001</p></td>
</tr>
<tr>
<td width='100'><p>9</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Vimal Jyothi</p></td>
<td width='102'><p>1981</p></td>
<td width='200'><p>0422 2667065</p></td>
</tr>
</table>
</p>
<b>High School</b>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Annur</p></td>
<td width='300'><p>St. Mary</p></td>
<td width='102'><p>1996</p></td>
<td width='200'><p>04254 263626 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Chenniamalai</p></td>
<td width='300'><p>Vimala</p></td>
<td width='102'><p>1985</p></td>
<td width='200'><p>04294 251033</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Alvernia</p></td>
<td width='102'><p>1966</p></td>
<td width='200'><p>0422 2316205</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Avila</p></td>
<td width='102'><p>1967</p></td>
<td width='200'><p>0422 2432443</p></td>
</tr>
<tr>
<td width='100'><p>5</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Chavara Vidya Bhavan</p></td>
<td width='102'><p>1986</p></td>
<td width='200'><p>0422 2430051</p></td>
</tr>
<tr>
<td width='100'><p>6</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Lisieux</p></td>
<td width='102'><p>1972</p></td>
<td width='200'><p>0422 2440537</p></td>
</tr>
<tr>
<td width='100'><p>7</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Trinity</p></td>
<td width='102'><p>1993</p></td>
<td width='200'><p>0422 2312918</p></td>
</tr>
<tr>
<td width='100'><p>8</p></td>
<td width='174'><p>Jadayampalayam</p></td>
<td width='300'><p>St. Joseph</p></td>
<td width='102'><p>2006</p></td>
<td width='200'><p>04254 226260</p></td>
</tr>
<tr>
<td width='100'><p>9</p></td>
<td width='174'><p>Mettupalayam</p></td>
<td width='300'><p>San Jose</p></td>
<td width='102'><p>1979</p></td>
<td width='200'><p>04254 223001</p></td>
</tr>
<tr>
<td width='100'><p>10</p></td>
<td width='174'><p>Periyanaikkampalayam</p></td>
<td width='300'><p>Infant Jesus</p></td>
<td width='102'><p>1997</p></td>
<td width='200'><p>0422 2693551</p></td>
</tr>
<tr>
<td width='100'><p>11</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Vimal Jyothi</p></td>
<td width='102'><p>1981</p></td>
<td width='200'><p>0422 2667065</p></td>
</tr>
</table></p>
<b>Primary</b>
<p> <table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Annur</p></td>
<td width='300'><p>St. Mary</p></td>
<td width='102'><p>1996</p></td>
<td width='200'><p>04254 263626 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Chenniamalai</p></td>
<td width='300'><p>Vimala</p></td>
<td width='102'><p>1985</p></td>
<td width='200'><p>04294 251033</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Alvernia</p></td>
<td width='102'><p>1966</p></td>
<td width='200'><p>0422 2316205</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Avila</p></td>
<td width='102'><p>1967</p></td>
<td width='200'><p>0422 2432443</p></td>
</tr>
<tr>
<td width='100'><p>5</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Chavara Vidhya Bhavan</p></td>
<td width='102'><p>1986</p></td>
<td width='200'><p>0422 2430051</p></td>
</tr>
<tr>
<td width='100'><p>6</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Lisieux</p></td>
<td width='102'><p>1972</p></td>
<td width='200'><p>0422 2440537</p></td>
</tr>
<tr>
<td width='100'><p>7</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Trinity</p></td>
<td width='102'><p>1993</p></td>
<td width='200'><p>0422 2312918</p></td>
</tr>
<tr>
<td width='100'><p>8</p></td>
<td width='174'><p>Gandhipuram</p></td>
<td width='300'><p>Mary Rani</p></td>
<td width='102'><p>1969</p></td>
<td width='200'><p>0422 2529394</p></td>
</tr>
<tr>
<td width='100'><p>9</p></td>
<td width='174'><p>Jadayampalayam</p></td>
<td width='300'><p>St. Joseph</p></td>
<td width='102'><p>2006</p></td>
<td width='200'><p>04254 226260</p></td>
</tr>
<tr>
<td width='100'><p>10</p></td>
<td width='174'><p>Mahalingapuram</p></td>
<td width='300'><p>Arokiamatha</p></td>
<td width='102'><p>1979</p></td>
<td width='200'><p>04259 225330</p></td>
</tr>
<tr>
<td width='100'><p>11</p></td>
<td width='174'><p>Mettupalayam</p></td>
<td width='300'><p>San Jose</p></td>
<td width='102'><p>1979</p></td>
<td width='200'><p>04254 223001</p></td>
</tr>
<tr>
<td width='100'><p>12</p></td>
<td width='174'><p>Moolakarai</p></td>
<td width='300'><p>Nirmala Matha</p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>0424 2555778</p></td>
</tr>
<tr>
<td width='100'><p>13</p></td>
<td width='174'><p>Periyanaikkampalayam</p></td>
<td width='300'><p>Infant Jesus</p></td>
<td width='102'><p>1997</p></td>
<td width='200'><p>0422 2693551</p></td>
</tr>
<tr>
<td width='100'><p>14</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Vimal Jyothi</p></td>
<td width='102'><p>1981</p></td>
<td width='200'><p>0422 2667065</p></td>
</tr>
</table></p>
<b>Creches</b><br>
<p> <table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Mahalingapuram</p></td>
<td width='300'><p>Arokiamatha</p></td>
<td width='102'><p>2004</p></td>
<td width='200'><p>04259 225330 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Moolakarai</p></td>
<td width='300'><p>Nirmala Matha</p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>0424 2555778</p></td>
</tr>
</table>
</p>
<b>Boarding Houses</b><br>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Chennimalai</p></td>
<td width='300'><p>Vimala</p></td>
<td width='102'><p>1985</p></td>
<td width='200'><p>0429 4251033 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Alvernia</p></td>
<td width='102'><p>1966</p></td>
<td width='200'><p>0422 2316205</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Coimbatore </p></td>
<td width='300'><p>Avila</p></td>
<td width='102'><p>1967</p></td>
<td width='200'><p>0422 2432443</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Moolakarai</p></td>
<td width='300'><p>Nirmala Matha</p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>0424 2555778</p></td>
</tr><tr>
<td width='100'><p>5</p></td>
<td width='174'><p>Poomarket</p></td>
<td width='300'><p>Amaithi Illam </p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>0422 2550765</p></td>
</tr>
<tr>
<td width='100'><p>6</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Vimal Jyothi</p></td>
<td width='102'><p>1984</p></td>
<td width='200'><p>0422 2666469</p></td>
</tr>
</table>
</p>
<b>Technical Training Centres</b><br>
<p> <table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Nazareth Tailoring Centre</p></td>
<td width='102'><p>1992</p></td>
<td width='200'><p>0422 2422696 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Good Shepherd Garment Unit</p></td>
<td width='102'><p>1995</p></td>
<td width='200'><p>04254 272029</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Good Shepherd Tailoring Centre </p></td>
<td width='102'><p>1980</p></td>
<td width='200'><p>04254 272029</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Good Shepherd Computer Centre</p></td>
<td width='102'><p>2006</p></td>
<td width='200'><p>04254 272029</p></td>
</tr>
<tr>
<td width='100'><p>5</p></td>
<td width='174'><p>Kumarapuram</p></td>
<td width='300'><p>Little Flower Book Binding</p></td>
<td width='102'><p>1995</p></td>
<td width='200'><p>04254 222798</p></td>
</tr>
</table>
</p>
<p><span class='s_h'>ii)	Colleges</span><br>
</p>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Lisieux College of Education</p></td>
<td width='102'><p>1982</p></td>
<td width='200'><p>0422 2666432</p></td>
</tr>
</table>
</p>
</div>";
}
if($tab==3){
echo"<ul id='tabs'>
<li><a onclick='show_institutions(1)'>Ecclesiastical</a></li>
<li><a onclick='show_institutions(2)'>Educational</a></li>
<li style='background-color:#c2a677'><a style='color:#000' onclick='show_institutions(3)'>Medical</a></li>
<li><a onclick='show_institutions(4)'>Charitable</a></li>
<li><a onclick='show_institutions(5)'>Social</a></li>
</ul>
<div class='tab-content' id='tab_content'>
<span class='s_h'> Dispesaries & Hospitals</span><br>
<p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Akkaraikoduvery</p></td>
<td width='300'><p>Assisi</p></td>
<td width='102'><p>1955</p></td>
<td width='200'><p>04295 264250</p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Anagoor</p></td>
<td width='300'><p>Preshitha Rural</p></td>
<td width='102'><p>1991</p></td>
<td width='200'><p>04252 258429</p></td>
</tr><tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Saravanampatty</p></td>
<td width='300'><p>Vimal Jyothi</p></td>
<td width='102'><p>1984</p></td>
<td width='200'><p>0422 2666469</p></td>
</tr>
</table>
</p></div>";
}
if($tab==4){
echo"<ul id='tabs'>
<li><a onclick='show_institutions(1)'>Ecclesiastical</a></li>
<li><a onclick='show_institutions(2)'>Educational</a></li>
<li><a onclick='show_institutions(3)'>Medical</a></li>
<li  style='background-color:#c2a677'><a style='color:#000' onclick='show_institutions(4)'>Charitable</a></li>
<li><a onclick='show_institutions(5)'>Social</a></li>
</ul>";

echo "<div class='tab-content' id='tab_content'>
<span class='s_h'>Charitable Institutions </span><br>
<p> <table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Deepthi Centre</p></td>
<td width='102'><p>&nbsp;</p></td>
<td width='200'><p>9944967689</p></td>
</tr>
</table>
</p>
<p>
<span class='s_h'> Counselling & Rehabilitation Centres</span><br>
</p>
<p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Avinasi</p></td>
<td width='300'><p>Assisi</p></td>
<td width='102'><p>1994</p></td>
<td width='200'><p>04296 302302 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Ettimada</p></td>
<td width='300'><p>Assisi Snehalaya</p></td>
<td width='102'><p>2005</p></td>
<td width='200'><p>0422 265694</p></td>
</tr>
</table>
</p>
<p><span class='s_h'>Homes for the Mentally Challenged</span><br>
</p>
<p> <table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Chennimalai</p></td>
<td width='300'><p>Udayam</p></td>
<td width='102'><p>2005</p></td>
<td width='200'><p>04294 253219 </p></td>
</tr>
</table>
</p>
<p><span class='s_h'>Homes for the Aged</span><br>
</p>
<p>
<table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>St. Thomas Home</p></td>
<td width='102'><p>1973</p></td>
<td width='200'><p>0422 2318967 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Karunai Illam</p></td>
<td width='102'><p>2000</p></td>
<td width='200'><p>04254 275463</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Kavundampalayam</p></td>
<td width='300'><p>Karunai Illam</p></td>
<td width='102'><p>2010</p></td>
<td width='200'><p>0422 2448839</p></td>
</tr>
<tr>
<td width='100'><p>4</p></td>
<td width='174'><p>Selvapuram</p></td>
<td width='300'><p>Zion Illam</p></td>
<td width='102'><p>2007</p></td>
<td width='200'><p>0422 2902968</p></td>
</tr>
</table>
</p>
<p><span class='s_h'>Orphanages & Bala Bhavans</span><br></p>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Chennimalai</p></td>
<td width='300'><p>Udayam</p></td>
<td width='102'><p>2005</p></td>
<td width='200'><p>04294 253219 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>Nazareth Bhavan</p></td>
<td width='102'><p>&nbsp;</p></td>
<td width='200'><p>0422 2422696</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Clare Bhavan</p></td>
<td width='102'><p>1990</p></td>
<td width='200'><p>04254 272231</p></td>
</tr>
</table>
</p>
</div>";

}
if($tab==5){
echo"<ul id='tabs'>
<li><a onclick='show_institutions(1)'>Ecclesiastical</a></li>
<li><a onclick='show_institutions(2)'>Educational</a></li>
<li><a onclick='show_institutions(3)'>Medical</a></li>
<li><a onclick='show_institutions(4)'>Charitable</a></li>
<li style='background-color:#c2a677' ><a style='color:#000' onclick='show_institutions(5)'>Social</a></li>
</ul><div class='tab-content' id='tab_content'>
<span class='s_h'> Welfare Centres</span><br>
<p><table border='1' cellspacing='0' cellpadding='0' width='800'>
<tr>
<td width='100'><p><strong>S. No.</strong></p></td>
<td width='174'><p><strong>Place</strong></p></td>
<td width='300'><p><strong>Name</strong></p></td>
<td width='102'><p><strong>Estd.</strong></p></td>
<td width='200'><p><strong>Phone</strong></p></td>
</tr>
<tr>
<td width='100'><p>1</p></td>
<td width='174'><p>Avinasi</p></td>
<td width='300'><p>Assisi</p></td>
<td width='102'><p>1994</p></td>
<td width='200'><p>04296 275223 </p></td>
</tr>
<tr>
<td width='100'><p>2</p></td>
<td width='174'><p>Coimbatore</p></td>
<td width='300'><p>CBE Dvpt. Society</p></td>
<td width='102'><p>1992</p></td>
<td width='200'><p>0422 2317366</p></td>
</tr>
<tr>
<td width='100'><p>3</p></td>
<td width='174'><p>Karamadai</p></td>
<td width='300'><p>Good Shepherd</p></td>
<td width='102'><p>1977</p></td>
<td width='200'><p>04254 272231</p></td>
</tr>
</table>
</p>
</div>";

}
}
?>