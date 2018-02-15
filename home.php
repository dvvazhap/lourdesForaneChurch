<?php session_start();
if(isset($_GET['action'])){$action=$_GET['action'];}else{$action=NULL;}
$page='home';
include("include/header.php");
?>
<div id='home_top_wrapper' >
	<img id="mass_image" src="images/mass.png" style="float:left">
	<div id="left_overlay">
	<div id='show_mass'><a href="#" onmouseout='hide_mass()' onmouseover='show_mass()'>MASS TIMINGS</a></div>
		<div id='mass_timing_wrapper'><table style='margin-top:-40px;margin-left:30px;'>
		<tr><td><h4 style='width:70px;height:30px;'>Sunday:</h4></td><td><h5 style='width:130px;'>6.30 a.m,8.30 a.m, 10.30 a.m,5.30 p.m</h5></td></tr>
		<tr  style='height:0px;'><td><h4>Mon-Sat:</h4></td><td><h5>6.15 a.m, 6.00 p.m </h5></td></tr>
		<tr  style='height:0px;'><td><h4>First Friday:</h4></td><td><h5>6.00 p.m (Mass & Adoration)</h5></td></tr>				
		</table>
		</div>
	</div>
	<link href="themes/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/js-image-slider.js" type="text/javascript"></script>
	<div id="sliderFrame">
        <div id="slider">
            <a href="#" onclick="show_tab('service')" ><img src="slider/pray.jpg" alt="" /></a>
			<?php
			$sql=mysql_query("SELECT * FROM albums WHERE page='home'");
			while($row=mysql_fetch_array($sql)){
				$name=$row['name'];
				echo "<img src='images/gallery/home/{$name}' />";
			}
			?>
		</div>
    </div>
	<div class="cleaner"></div>
<div id="bible_verse">
	<script type="text/javascript">window.setTimeout('bible1()',1)
	function bible1(){document.getElementById("bible_verse").innerHTML = "He was in the beginnning with God (John 1:1)";window.setTimeout('bible2()',3000);}
	function bible2(){document.getElementById("bible_verse").innerHTML = "The mighty one has done many great things";window.setTimeout('bible3()',3000);}
	function bible3(){document.getElementById("bible_verse").innerHTML = "In the beginning God created the Universe";window.setTimeout('bible1()',3000)}</script>
</div>
</div>
<div id="page_top_wrapper"></div>
<style>
#content_wrapper {font-family: Lucida,Cooper,serif;position:relative;margin-left:5%;width:90%; overflow:hidden;
background-image:url(images/backg1.jpg); padding: 4% 0%;}
#content{padding: 0px 50px;width: 89%;
font-size:20px; line-height:1.2em; font-family: 'Times New Roman',Cooper,serif; color:black;
text-align:justify;
}
#content p{margin-bottom: 10px;}
</style>
<div id="content_wrapper">
<div id="content">
<?php if($action==NULL){include("index_default.php");}?>
</div>
<script type="text/javascript" src="style.js"></script>
<?php include("include/footer.php")?>