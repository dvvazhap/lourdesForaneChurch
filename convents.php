<style>
#content_wrapper{background-image:none; margin-top:-30px;}
td{color:black;}
#tab_content table,#tab_content td,#tab_content th{border-color: #b17023; border-style:solid;}
#tab_content table{margin-bottom:30px;border-width: 1px 1px 1px 1px; border-spacing: 0;border-collapse:collapse;}
#tab_content th{margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center;}
#tab_content td{color:black; valign:top; height:20px;margin: 0;padding: 0px;border-width: 0px 1px 1px 0px;text-align:center; }
#tab_content td p{height:30px;text-align:center;margin:0px;padding:0px; color:black;}
.tab-content{width:800px;  margin-top:-27px; background-color:#c2a677; padding:50px 20px 50px 20px;}
#tabs{text-decoration:none; list-style:none; padding:0px; height:40px; margin-left:30px;}
#tabs li{display:inline; cursor:pointer; font-style:italic; padding:10px 17px; height:30px; background-color:#642d07; margin-top:40px; font-style:Forte,Cooper,serif; font-size:20px;
-webkit-border-top-left-radius:20px;-webkit-border-top-right-radius:20px;-webkit-border-bottom-left-radius:0px;-webkit-border-bottom-right-radius:0px;
-moz-border-top-left-radius:20px;-moz-border-top-right-radius:20px;-moz-border-bottom-left-radius:10px;-moz-border-bottom-right-radius:0px;
border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;}
#tabs li a{color:#fff;}
#place{color:#000;}
.s_h{color:#642d07; font-size:20px; margin-top:30px;}
b{color:black; font-size:18px; font-style:italic;}
</style>
<?php
$page='convents';
if(isset($_GET['tab'])){
$tab=$_GET['tab'];
echo "<script>alert({$tab});</script>";
if($tab==1){
echo"<ul id='tabs'>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul>
 <div class='tab-content' id='tab-content'>
 <b> CONGREGATION OF THE MOTHER OF CARMEL </b><br/>
<div id='place'>Jai Christo Province, Palakkad</div><br/>

<p><span class='s_h'>Provincial Superior:</span> Sr. Pushpa<br> 
<span class='s_h'>Councillors:</span> Sr. Finber, Sr. Sunitha, Sr. Hitha, Sr. Priya<br> <span class='s_h'>Treasurer: </span> Sr. Laya<br>
<span class='s_h'>Secretary: </span> Sr. Jincy Maria<br></p>
<p><u>Jai Christo Provincial House</u><br> Noorani P. O., Palakkad - 678 004<br>
Ph: 0491-2534929 <br>E-mail: jaichristo@gmail.com</p>
    <table border='1' cellspacing='0' cellpadding='0' width='800'>
      <tr>
        <td width='61' valign='top'><p class='newp'><strong>No.</strong></p></td>
        <td width='162' valign='top'><p class='newp'><strong>Place</strong></p></td>
        <td width='240' valign='top'><p class='newp'><strong>Name</strong></p></td>
        <td width='108' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
        <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>1</p></td>
        <td width='162' valign='top'><p class='newp'>Coimbatore</p></td>
        <td width='240' valign='top'><p class='newp'>Avila</p></td>
        <td width='108' valign='top'><p class='newp'>1967</p></td>
        <td width='126' valign='top'><p class='newp'>0422 2430190</p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>2</p></td>
        <td width='162' valign='top'><p class='newp'>Periyanaikkampalayam</p></td>
        <td width='240' valign='top'><p class='newp'>Infant Jesus</p></td>
        <td width='108' valign='top'><p class='newp'>1997</p></td>
        <td width='126' valign='top'><p class='newp'>0422 2693551</p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>3</p></td>
        <td width='162' valign='top'><p class='newp'>Saravanampatty</p></td>
        <td width='240' valign='top'><p class='newp'>Carmel</p></td>
        <td width='108' valign='top'><p class='newp'>1984</p></td>
        <td width='126' valign='top'><p class='newp'>0422 2667531</p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>4</p></td>
        <td width='162' valign='top'><p class='newp'>Saravanampatty </p></td>
        <td width='240' valign='top'><p class='newp'>Vimal Jyothi</p></td>
        <td width='108' valign='top'><p class='newp'>1981</p></td>
        <td width='126' valign='top'><p class='newp'>0422 2667065</p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>5</p></td>
        <td width='162' valign='top'><p class='newp'>Tirupur </p></td>
        <td width='240' valign='top'><p class='newp'>Little Flower</p></td>
        <td width='108' valign='top'><p class='newp'>1977</p></td>
        <td width='126' valign='top'><p class='newp'>0421 2261167</p></td>
      </tr>
      <tr>
        <td width='61' valign='top'><p class='newp'>6</p></td>
        <td width='162' valign='top'><p class='newp'>Udumalpettu</p></td>
        <td width='240' valign='top'><p class='newp'>Lourd Matha</p></td>
        <td width='108' valign='top'><p class='newp'>2006</p></td>
        <td width='126' valign='top'><p class='newp'>04252 221849</p></td>
      </tr>
    </table>
	
    </div>";}
	elseif($tab==2){
	echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b> FRANCISCAN CLARIST CONGREGATION </b><br/>
      <div id='place'>Seraphic Province, Palakkad</div><br/>
      
      <p><span class='s_h'>Provincial Superior:</span> Sr. Chriset</p>
      <p>Seraphic Provincial House, 18/415<br>
West Fort Road, Palakkad � 678 001<br>
Ph: 0491 2534939, 2504939, 2500436<br>
</p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Chennimalai</p></td>
          <td width='234' valign='top'><p class='newp'>Vimala</p></td>
          <td width='102' valign='top'><p class='newp'>1985</p></td>
          <td width='126' valign='top'><p class='newp'>04294 250245</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Erode</p></td>
          <td width='234' valign='top'><p class='newp'>Annai Mary</p></td>
          <td width='102' valign='top'><p class='newp'>1984</p></td>
          <td width='126' valign='top'><p class='newp'>0424 2210197</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>3</p></td>
          <td width='174' valign='top'><p class='newp'>Erode</p></td>
          <td width='234' valign='top'><p class='newp'>Christu    Jyothi</p></td>
          <td width='102' valign='top'><p class='newp'>1974</p></td>
          <td width='126' valign='top'><p class='newp'>0424 2293218</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>4</p></td>
          <td width='174' valign='top'><p class='newp'>Erode</p></td>
          <td width='234' valign='top'><p class='newp'>Jyothi    Bhavan</p></td>
          <td width='102' valign='top'><p class='newp'>1989</p></td>
          <td width='126' valign='top'><p class='newp'>0424 2292772</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>5</p></td>
          <td width='174' valign='top'><p class='newp'>Gandhipuram</p></td>
          <td width='234' valign='top'><p class='newp'>Mary Rani</p></td>
          <td width='102' valign='top'><p class='newp'>1969</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2529493</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>6</p></td>
          <td width='174' valign='top'><p class='newp'>Kangayam</p></td>
          <td width='234' valign='top'><p class='newp'>Mercy</p></td>
          <td width='102' valign='top'><p class='newp'>1995</p></td>
          <td width='126' valign='top'><p class='newp'>04257 247287</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>7</p></td>
          <td width='174' valign='top'><p class='newp'>Karamadai</p></td>
          <td width='234' valign='top'><p class='newp'>Karunai    Illam</p></td>
          <td width='102' valign='top'><p class='newp'>1999</p></td>
          <td width='126' valign='top'><p class='newp'>04254 275463</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>8</p></td>
          <td width='174' valign='top'><p class='newp'>Karamadai</p></td>
          <td width='234' valign='top'><p class='newp'>Good    Shepherd</p></td>
          <td width='102' valign='top'><p class='newp'>1977</p></td>
          <td width='126' valign='top'><p class='newp'>04254 272231</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>9</p></td>
          <td width='174' valign='top'><p class='newp'>Karur</p></td>
          <td width='234' valign='top'><p class='newp'>St. Antony</p></td>
          <td width='102' valign='top'><p class='newp'>1982</p></td>
          <td width='126' valign='top'><p class='newp'>04324 225153</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>10</p></td>
          <td width='174' valign='top'><p class='newp'>Karur</p></td>
          <td width='234' valign='top'><p class='newp'>Anto Bhavan</p></td>
          <td width='102' valign='top'><p class='newp'>2006</p></td>
          <td width='126' valign='top'><p class='newp'>9750579849</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>11</p></td>
          <td width='174' valign='top'><p class='newp'>Kumarapuram</p></td>
          <td width='234' valign='top'><p class='newp'>Little    Flower</p></td>
          <td width='102' valign='top'><p class='newp'>1989</p></td>
          <td width='126' valign='top'><p class='newp'>04254 222798</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>12</p></td>
          <td width='174' valign='top'><p class='newp'>Mettupalayam</p></td>
          <td width='234' valign='top'><p class='newp'>San Jose</p></td>
          <td width='102' valign='top'><p class='newp'>1980</p></td>
          <td width='126' valign='top'><p class='newp'>04254 222701</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>13</p></td>
          <td width='174' valign='top'><p class='newp'>Palladam</p></td>
          <td width='234' valign='top'><p class='newp'>Infant Jesus</p></td>
          <td width='102' valign='top'><p class='newp'>1993</p></td>
          <td width='126' valign='top'><p class='newp'>04255 254485</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>14</p></td>
          <td width='174' valign='top'><p class='newp'>Ramanathapuram</p></td>
          <td width='234' valign='top'><p class='newp'>St. George</p></td>
          <td width='102' valign='top'><p class='newp'>1966</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2314109</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>15</p></td>
          <td width='174' valign='top'><p class='newp'>Salem</p></td>
          <td width='234' valign='top'><p class='newp'>Shalom</p></td>
          <td width='102' valign='top'><p class='newp'>2007</p></td>
          <td width='126' valign='top'><p class='newp'>0427 2480341</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>16</p></td>
          <td width='174' valign='top'><p class='newp'>Thottipalayam</p></td>
          <td width='234' valign='top'><p class='newp'>Clare Illam</p></td>
          <td width='102' valign='top'><p class='newp'>1991</p></td>
          <td width='126' valign='top'><p class='newp'>9443899881</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>17</p></td>
          <td width='174' valign='top'><p class='newp'>Valparai</p></td>
          <td width='234' valign='top'><p class='newp'>Karunya</p></td>
          <td width='102' valign='top'><p class='newp'>2005</p></td>
          <td width='126' valign='top'><p class='newp'>04253 222036</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==3){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>CONGREGATION OF THE HOLY FAMILY </b><br/>
      <div id='place'>Marian Province, Palakkad</div><br/>
     <p> <span class='s_h'>Provincial Superior:</span> Sr. Pushpa</p>
      <p>Marian Provincial House, Maryland<br>
Muttikulangara, Palakkad � 678 594<br>
Ph: 0491 2555234
</p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Pollachi</p></td>
          <td width='234' valign='top'><p class='newp'>Arokiamatha</p></td>
          <td width='102' valign='top'><p class='newp'>1970</p></td>
          <td width='126' valign='top'><p class='newp'>04259 237724</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Pollachi</p></td>
          <td width='234' valign='top'><p class='newp'>Holy Family</p></td>
          <td width='102' valign='top'><p class='newp'>1981</p></td>
          <td width='126' valign='top'><p class='newp'>04259 222563</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>3</p></td>
          <td width='174' valign='top'><p class='newp'>Sulur</p></td>
          <td width='234' valign='top'><p class='newp'>Holy Family    Bhavan</p></td>
          <td width='102' valign='top'><p class='newp'>1984</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2687641</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>4</p></td>
          <td width='174' valign='top'><p class='newp'>Ukkadam</p></td>
          <td width='234' valign='top'><p class='newp'>Holy Family</p></td>
          <td width='102' valign='top'><p class='newp'>1993</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2260322</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==4){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>SISTERS OF THE ADORATION OF THE BLESSED SACRAMENT </b><br/>
      <div id='place'>Vimal Rani Adoration Province, Palakkad</div><br/>
      <p><span class='s_h'>Provincial Superior:</span> Sr. Vincentia</p>
      
      <p>Vimal Rani Provincial House, Mundur,<br> Palakkad � 678 592<br>
Ph: 0491 2833318
</p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Kuniamuthur</p></td>
          <td width='234' valign='top'><p class='newp'>Nirmala    Matha</p></td>
          <td width='102' valign='top'><p class='newp'>1993</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2252632</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Moolakarai</p></td>
          <td width='234' valign='top'><p class='newp'>Nirmala    Matha</p></td>
          <td width='102' valign='top'><p class='newp'>2000</p></td>
          <td width='126' valign='top'><p class='newp'>0424 2555314</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>3</p></td>
          <td width='174' valign='top'><p class='newp'>Podanur</p></td>
          <td width='234' valign='top'><p class='newp'>Karunya    Matha</p></td>
          <td width='102' valign='top'><p class='newp'>2002</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2413074</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>4</p></td>
          <td width='174' valign='top'><p class='newp'>Poomarket</p></td>
          <td width='234' valign='top'><p class='newp'>Amaithi    Illam</p></td>
          <td width='102' valign='top'><p class='newp'>2000</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2413074</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==5){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li style='background-color:#c2a677;' ><a  style='color:#000' onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>ASSISI SISTERS OF MARY IMMACULATE </b><br/>
      <div id='place'>St. Joseph Province, Ernakulam</div><br/>
      <p><span class='s_h'>Provincial Superior:</span> Sr. Camilla Francis</p>
      <p>St. Joseph Provintialate, <br>Vaduthala, Ernakulam<br>
Ph: 0484 2393228, 2382286
</p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Akkarkoduvery</p></td>
          <td width='234' valign='top'><p class='newp'>Assisi</p></td>
          <td width='102' valign='top'><p class='newp'>1995</p></td>
          <td width='126' valign='top'><p class='newp'>04259 264250</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Avinasi </p></td>
          <td width='234' valign='top'><p class='newp'>Assisi</p></td>
          <td width='102' valign='top'><p class='newp'>1994</p></td>
          <td width='126' valign='top'><p class='newp'>04296 275223</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>3</p></td>
          <td width='174' valign='top'><p class='newp'>Coimbatore </p></td>
          <td width='234' valign='top'><p class='newp'>Assisi</p></td>
          <td width='102' valign='top'><p class='newp'>1993</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2441973</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==6){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>CONGREGATION OF THE SISTERS OF CHARITY</b> <br/>
      <div id='place'>Maria Province, Koorkenchery</div><br/>
      <p><span class='s_h'>Provincial Superior:</span> Sr. Preethy CSC</p>
      <p>Maria Provincial House, <br>Koorkenchery P. O., - 680 007<br>
Ph: 2426516, 2427344
</p>
      
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Coimbatore </p></td>
          <td width='234' valign='top'><p class='newp'>Nazareth    Bhavan</p></td>
          <td width='102' valign='top'><p class='newp'>1990</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2422696</p></td>
        </tr>
      </table>
      </div>";
	}	
	elseif($tab==7){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>CONGREGATION OF SAMARITAN SISTERS</b><br/>
      <div id='place'>Snehodaya Province, Mannuthy</div>
      <p><span class='s_h'>Provincial Superior:</span> Sr. Mary Melani</p> 
      <p>Snehodaya Provincial House, <br>Mannuthy � 680 651<br>
Ph: 0487 2372484</p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Podanur</p></td>
          <td width='234' valign='top'><p class='newp'>St. Joseph�s    Home</p></td>
          <td width='102' valign='top'><p class='newp'>1968</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2413298</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Pollachi</p></td>
          <td width='234' valign='top'><p class='newp'>Lisieux    Bhavan</p></td>
          <td width='102' valign='top'><p class='newp'>1988</p></td>
          <td width='126' valign='top'><p class='newp'>04252 258429</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==8){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>CONGREGATION OF SISTERS OF ST. MARTHA</b><br>
      <div id='place'>Nirmala Matha Region, Palakkad</div>
      <p><span class='s_h'>Regional Superior:</span> Sr. Beatha</p>
      <p>St. Martyha�s Regional House, Puzhakkal <br>
Kannadi, Palakkad � 678 701<br>
Ph: 9544519739
</p> 
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Palayamkottai</p></td>
          <td width='234' valign='top'><p class='newp'>St. Antony</p></td>
          <td width='102' valign='top'><p class='newp'>2003</p></td>
          <td width='126' valign='top'><p class='newp'>0424 2335559</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==9){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(9)' >CSN</a></li>
<li><a onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>CONGREGATION OF THE SISTERS OF NAZARETH </b><br>
	<div id='place'>St. Joseph Province, Angamaly</div>

<p><span class='s_h'>Provincial Superior:</span> Sr. Gladys CSN</p> 
<p>Sisters of Nazareth, St. Joseph Provincial House<br>
Angamaly South � 683 573<br>
Ph: 0484 2452438
</p>     
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Edayapalayam</p></td>
          <td width='234' valign='top'><p class='newp'>Holy Family</p></td>
          <td width='102' valign='top'><p class='newp'>2009</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2400045</p></td>
        </tr>
      </table>
      </div>";
	}
	elseif($tab==10){
		echo "<ul id='tabs'>
<li><a onclick='show_convents(1)' >CMC</a></li>
<li><a onclick='show_convents(2)' >FCC</a></li>
<li><a onclick='show_convents(3)' >CHF</a></li>
<li><a onclick='show_convents(4)' >SABS</a></li>
<li><a onclick='show_convents(5)' >ASMI</a></li>
<li><a onclick='show_convents(6)' >CSC</a></li>
<li><a onclick='show_convents(7)' >CSS</a></li>
<li><a onclick='show_convents(8)' >CSM</a></li>
<li><a onclick='show_convents(9)' >CSN</a></li>
<li style='background-color:#c2a677;' ><a style='color:#000' onclick='show_convents(10)' >SKD</a></li>
</ul><div class='tab-content' id='tab-content'>
      <b>SOCIETY OF KRISTU DASIS</b><br>
      <div id='place'>Kristu Dasi Generalate, Mannuthy</div>
            <p></p>
      <table border='1' cellspacing='0' cellpadding='0' width='800'>
        <tr>
          <td width='61' valign='top'><p class='newp'><strong>S.    No.</strong></p></td>
          <td width='174' valign='top'><p class='newp'><strong>Place</strong></p></td>
          <td width='234' valign='top'><p class='newp'><strong>Name</strong></p></td>
          <td width='102' valign='top'><p class='newp'><strong>Estd.</strong></p></td>
          <td width='126' valign='top'><p class='newp'><strong>Phone</strong></p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>1</p></td>
          <td width='174' valign='top'><p class='newp'>Annur</p></td>
          <td width='234' valign='top'><p class='newp'>St. Mary</p></td>
          <td width='102' valign='top'><p class='newp'>1995</p></td>
          <td width='126' valign='top'><p class='newp'>04254 263423</p></td>
        </tr>
        <tr>
          <td width='61' valign='top'><p class='newp'>2</p></td>
          <td width='174' valign='top'><p class='newp'>Kavundampalayam</p></td>
          <td width='234' valign='top'><p class='newp'>Kristu Dasi</p></td>
          <td width='102' valign='top'><p class='newp'>1996</p></td>
          <td width='126' valign='top'><p class='newp'>0422 2435753</p></td>
        </tr>
      </table>
      </div>";
	}
	}?>