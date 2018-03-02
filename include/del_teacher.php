<?php require_once("connection.php"); ?>
<script>
function del_teacher(){
var cpb= document.getElementById('change_password_button'); if(cpb) document.getElementById('change_password_button').style.visibility='visible';
var pt = document.getElementById('password_table'); if(pt) document.getElementById('password_table').style.visibility='hidden';

var sib = document.getElementById('show_information_button'); if(sib) document.getElementById('show_information_button').style.visibility='visible';
var si = document.getElementById('show_information'); if(si) document.getElementById('show_information').style.visibility='hidden';

var aub = document.getElementById('add_user_button'); if(aub) document.getElementById('add_user_button').style.visibility='visible';
var au = document.getElementById('add_user'); if(au) document.getElementById('add_user').style.visibility='hidden';
var aut = document.getElementById('add_user_table'); if(aut) document.getElementById('add_user_table').style.visibility='hidden';

var vub = document.getElementById('view_users_button'); if(vub) document.getElementById('view_users_button').style.visibility='visible';
var vu = document.getElementById('view_users'); if(vu) document.getElementById('view_users').style.visibility='hidden';

var atb = document.getElementById('add_teacher_button'); if(atb) document.getElementById('add_teacher_button').style.visibility='visible';
var at = document.getElementById('add_teacher'); if(at) document.getElementById('add_teacher').style.visibility='hidden';

var dtb = document.getElementById('del_teacher_button'); if(dtb) document.getElementById('del_teacher_button').style.visibility='hidden';
var dt = document.getElementById('delete_teacher'); if(dt) document.getElementById('delete_teacher').style.visibility='visible';

var smb = document.getElementById('show_mass_button'); if(smb) document.getElementById('show_mass_button').style.visibility='visible';
var mt = document.getElementById('mass_table'); if(mt) document.getElementById('mass_table').style.visibility='hidden';


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
if(isset($_GET['del_teacher'])){
$res = mysqli_query($db,"SELECT * FROM teachers ORDER by class");
echo"<div class='container-fluid'>
<div class='row'>
<div class='col-md-6'>Select the teacher to be deleted</div>
<div class='col-md-4'>
<select id='teacher_class'>";

while($row=mysqli_fetch_array($res)){
echo "<option value={$row['id']} >{$row['name']}</option>";
}
echo "</select></div>
<div class='col-md-2'>
<button onclick='delete_teacher()' >Remove</button>
</div>

</div>
<div class ='row'><div class='col-md-12' id='delete_teacher_notify' ></div>
</div>";

}
if(isset($_GET['del_teacher_id'])){
	$id = $_GET['del_teacher_id'];
	$res = mysqli_query($db,"DELETE FROM teachers WHERE id={$id}");
	if($res)
		echo "<span style='color:green'>Deleted the teacher. Reload the page to see the updated list of teachers. </span>";
	else	
		echo "Something went wrong.";
}
?>