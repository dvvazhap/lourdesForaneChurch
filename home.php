<?php session_start();
if(isset($_GET['action'])){$action=$_GET['action'];}else{$action=NULL;}
$page='home';
include("include/header.php");
?>
<link href="themes/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="themes/js-image-slider.js" type="text/javascript"></script>
<div id='home_top_wrapper' class="row">
	<div class="col-md-4" id='show_mass' style="border:solid red;" >MASS TIMINGS
	<div class="row">
		<div class="col-md-4">Sunday:</div><div class="col-md-8">6.30 a.m,8.30 a.m, 10.30 a.m,5.30 p.m</div>
	</div>
	<div class="row">
		<div class="col-md-4">Mon-Sat:</div><div class="col-md-8">6.15 a.m, 6.00 p.m</div>
	</div>
	<div class="row">
		<div class="col-md-4">First Friday:</div><div class="col-md-8">6.00 p.m (Mass & Adoration)</div>
	</div>
	</div>
	<div class="col-md-8" id="sliderFrame" style="border:solid red;">
        <div id="slider">
            <a href="#" onclick="show_tab('service')" ><img src="slider/pray.jpg" alt="" /></a>
			<?php
			$sql=mysqli_query($db,"SELECT * FROM albums WHERE page='home'");
			while($row=mysqli_fetch_array($sql)){
				$name=$row['name'];
				echo "<img src='images/gallery/home/{$name}' />";
			}
			?>
		</div>
    </div>
	</div>
	<div class="row">
		<div id="bible_verse" class="col-md-12" style="border:solid red;">
				<script type="text/javascript">window.setTimeout('bible1()',1)
				function bible1(){document.getElementById("bible_verse").innerHTML = "He was in the beginnning with God (John 1:1)";window.setTimeout('bible2()',3000);}
				function bible2(){document.getElementById("bible_verse").innerHTML = "The mighty one has done many great things";window.setTimeout('bible3()',3000);}
				function bible3(){document.getElementById("bible_verse").innerHTML = "In the beginning God created the Universe";window.setTimeout('bible1()',3000)}</script>			
		</div>
	</div>
	<div class="cleaner"></div>
</div>
<div id="page_top_wrapper" ></div>
<style>
#content_wrapper {font-family: Lucida,Cooper,serif;position:relative;margin-left:5%;width:90%; overflow:hidden;
padding: 4% 0%;}
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