<?php $page = 'catechism';
require_once("include/connection.php");
?>
<style>
#class_wrapper{position:relative; width:100%; height:100%;}
#class{font-size:50px; margin-bottom:30px; margin-left:50px; color:#272727;}
#class_wrapper img{border:2px solid #272727; width:100%; height:100%; margin-left: auto;	margin-right: auto;	display: block;}
</style>
<?php
if(isset($_GET['tab'])){$tab=$_GET['tab'];}else{$tab=0;}
		if($tab==0){
		$sub_page=0;
		echo "<h2 class='heading'> CATECHISM</h2>";
		echo "<div id='class_wrapper'><img src='images/teachers.jpg' /></div>";
		include("include/display_page_content.php"); }
		elseif($tab==1){
		echo "<style>
#council_info{height:250px;}
#photo img{float:right; border:3px solid #272727; width:120px; height:160px; margin-left:50px; margin-top:10px; margin-right:150px; -webkit-border-radius:5px;-moz-border-radius:5px; border-radius:5px;}
#info{margin-left:180px;font-size:20px;}
#name{margin-left:180px;color:#001132;font-size:28px; text-align:center; width:250px;}
#post{margin-left:70px;font-style:italic;color:#272727;font-size:25px;}
#address{margin-left:180px; font-style:italic; color:#632c01;width:250px;font-size:22px;line-height:1.5em; text-align:center;}
#phone{	margin-left:180px;font-style:italic;color:#002453;text-align:center;width:250px;font-size:16px;}
</style>";
	$query="SELECT * FROM teachers ORDER by class DESC";
	$result=mysqli_query($db,$query);
	while($row=mysqli_fetch_array($result)){
	$class = $row['class'];
	if($class==0){$class="Non-Teaching Staff";}
	elseif($class==1){$class="L.K.G";}elseif($class==2){$class="U.K.G";}
	elseif($class==3){$class="I";}elseif($class==4){$class="I-A";}elseif($class==5){$class="I-B";}
	elseif($class==6){$class="II";}elseif($class==7){$class="II-A";}elseif($class==8){$class="II-B";}
	elseif($class==9){$class="III";}elseif($class==10){$class="III-A";}elseif($class==11){$class="III-B";}
	elseif($class==12){$class="IV";}elseif($class==13){$class="IV-A";}elseif($class==14){$class="IV-B";}
	elseif($class==15){$class="V";}elseif($class==16){$class="V-A";}elseif($class==17){$class="V-B";}
	elseif($class==18){$class="VI";}elseif($class==19){$class="VI-A";}elseif($class==20){$class="VI-B";}
	elseif($class==21){$class="VII";}elseif($class==22){$class="VII-A";}elseif($class==23){$class="VII-B";}
	elseif($class==24){$class="VIII";}elseif($class==25){$class="VIII-A";}elseif($class==26){$class="VIII-B";}
	elseif($class==27){$class="IX";}elseif($class==28){$class="IX-A";}elseif($class==29){$class="IX-B";}
	elseif($class==30){$class="X";}elseif($class==31){$class="X-A";}elseif($class==32){$class="X-B";}
	elseif($class==33){$class="XI";}elseif($class==34){$class="XI-A";}elseif($class==35){$class="XI-B";}
	elseif($class==36){$class="XII";}elseif($class==37){$class="XII-A";}elseif($class==38){$class="XII-B";}
	elseif($class==39){$class="Malayalam";}elseif($class==40){$class="Tamil";}
		echo"<div id=\"council_info\">";
		echo"<div id=\"photo\">";
		$path="images/catechism/".trim($row['image']);
		if((!file_exists($path))||($row['image']=="0")||($row['image']=="")){ $path="images/no-photo.png"; }
		echo"<img src='{$path}'/></div><h3 id=\"post\">{$class}</h3>";
		echo "<p id=\"info\">
			<h5 id=\"name\">{$row['name']}</h5>
			<h6 id=\"address\">{$row['address']}</h6><br/>";
			if($row['phone']!=NULL){echo"<h6 id=\"phone\">Mobile : +91-{$row['phone']}</h6>";}
			if($row['landline']!=NULL){echo"<h6 id=\"phone\">Landline : 0422-{$row['landline']}</h6>";}
			echo"<br/></p><br/></div>";
}}
elseif($tab==2){
	echo "<div id='class_wrapper'><div id='class'>XII</div><img src='cat_pics/12.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>XI</div><img src='cat_pics/11.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>X</div><img src='cat_pics/10.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>VIII-A</div><img src='cat_pics/8a.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>VIII-B</div><img src='cat_pics/8b.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>VII</div><img src='cat_pics/7.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>VI</div><img src='cat_pics/6.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>V</div><img src='cat_pics/5.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>IV</div><img src='cat_pics/4.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>III</div><img src='cat_pics/3.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>II</div><img src='cat_pics/2.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>I</div><img src='cat_pics/1.jpg' /></div><br/><br/><br/><br/><br/>";
	echo "<div id='class_wrapper'><div id='class'>Malayalam</div><img src='cat_pics/mal.jpg' /></div><br/><br/><br/><br/><br/>";
    echo "<div id='class_wrapper'><div id='class'>Tamil</div><img src='cat_pics/tam.jpg' /></div><br/><br/><br/><br/><br/>";
}?>
<div class="cleaner"></div>