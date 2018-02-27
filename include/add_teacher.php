<?php
require_once("connection.php");
if(isset($_GET['add_teacher_submit'])){
$n=mysqli_prep($db,$_POST['n']);
$p=mysqli_prep($db,$_POST['p']);
$l=mysqli_prep($db,$_POST['l']);
$c=mysqli_prep($db,$_POST['c']);
$a=mysqli_prep($db,$_POST['a']);
$rand = rand(1,9999);
mysqli_query($db,"INSERT INTO teachers(`id`,`name`,`phone`,`landline`,`class`,`address`,`image`) VALUES({$rand},'{$n}','{$p}','{$l}',{$c},'{$a}','')");
}
if(!isset($_GET['teacher'])){echo "<div id='add_teacher'></div>";
}
elseif(isset($_GET['teacher'])){
echo "<div class='container-fluid'>
<div class='row'>
	<div class='col-md-6'><button onclick='add_teacher_submit()'>Add a Teacher</button><br/><br/></div>
	<div class='col-md-6'></div>
</div>

<div class='row'>
<div class='col-md-6'>
	<div class='row'>
	<div class='col-md-2'>Name:</div>
	<div class='col-md-10'><input type='text' id='teacher_name'></div>
	</div>
	<div class='row'>
	<div class='col-md-2'>Phone:</div>
	<div class='col-md-10'><input type='text' id='teacher_phone' maxlength='10'></div>
	</div>
	<div class='row'>
	<div class='col-md-2'>Landline:</div>
	<div class='col-md-10'><input type='text' id='teacher_landline' maxlength='7'></div>
	</div>

</div>
<div class='col-md-6'>
	<div class='row'>
	<div class='col-md-2'>Class:</div>
	<div class='col-md-10'>
		<select id='teacher_class'>
		<option value='0'>Non-Teaching Staff</option><option value='1'>L.K.G</option><option value='2'>U.K.G</option><option value='3'>I</option><option value='4'>I-A</option><option value='5'>I-B</option>
		<option value='6'>II</option><option value='7'>II-A</option><option value='8'>II-B</option><option value='9'>III</option><option value='10'>III-A</option><option value='11'>III-B</option>
		<option value='12'>IV</option><option value='13'>IV-A</option><option value='14'>IV-B</option><option value='15'>V</option><option value='16'>V-A</option><option value='17'>V-B</option>
		<option value='18'>VI</option><option value='19'>VI-A</option><option value='20'>VI-B</option><option value='21'>VII</option><option value='22'>VII-A</option><option value='23'>VII-B</option>
		<option value='24'>VIII</option><option value='25'>VIII-A</option><option value='26'>VIII-B</option><option value='27'>IX</option><option value='28'>IX-A</option><option value='29'>IX-B</option>
		<option value='30'>X</option><option value='31'>X-A</option><option value='32'>X-B</option><option value='33'>XI</option><option value='34'>XI-A</option><option value='35'>XI-B</option>
		<option value='36'>XII</option><option value='37'>XII-A</option><option value='38'>XII-B</option><option value='39'>Malayalam</option><option value='40'>Tamil</option>
		</select>
	</div>
	</div>
	<div class='row'>
	<div class='col-md-2'>Address:</div>
	<div class='col-md-10'><textarea rows='2' cols='30' id='teacher_address'></textarea></div>
	</div>
</div>
</div>

</div>";
}
?>
<script>
function add_teacher_submit(){
	var n = document.getElementById('teacher_name').value;
	if(n == "")return;
	var p = document.getElementById('teacher_phone').value;
	var l = document.getElementById('teacher_landline').value;
	var c = document.getElementById('teacher_class').value;
	var a = document.getElementById('teacher_address').value;
	document.getElementById('add_teacher_button').style.visibility='visible';
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("add_teacher").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","../include/add_teacher.php?add_teacher_submit=1",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("n="+n+"&p="+p+"&l="+l+"&c="+c+"&a="+a);
}
function add_teacher(){
	document.getElementById('add_teacher_button').style.visibility='hidden';
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("add_teacher").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/add_teacher.php?teacher=1",true);
	xmlhttp.send();
}
</script>