<?php require_once("connection.php"); ?>
<script>
function del_teacher(){
	document.getElementById('del_teacher_button').style.visibility='hidden';
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("delete_teacher").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/del_teacher.php?del_teacher=1",true);
	xmlhttp.send();
}
function delete_teacher(){
	var id = document.getElementById("teacher_class").value;
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("delete_teacher").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/del_teacher.php?del_teacher_id="+id,true);
	xmlhttp.send();
}
</script>

<?php
if(!isset($_GET['del_teacher'])){echo "<div id='delete_teacher'></div>";}
else if(isset($_GET['del_teacher'])){
$res = mysqli_query($db,"SELECT * FROM teachers ORDER by class");
echo"<div class='container-fluid'>
<div class='row'>
<div class='col-md-6'>Select the teacher to be deleted</div>
<div class='col-md-4'>
<select id='teacher_class'>";

while($row=mysqli_fetch_array($res)){
echo "<option value='{$row['id']}' >{$row['name']}</option>";
}
echo "</select></div>
<div class='col-md-2'>
<button onclick='delete_teacher()' >Remove</button>
</div>

</div></div>";

}
if(isset($_GET['del_teacher_id'])){
$id = $_GET['del_teacher_id'];
mysqli_query($db,"DELETE FROM teachers WHERE id={$id}");
}
?>