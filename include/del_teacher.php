<?php
require_once("connection.php");
//require_once("functions.php");
?>
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
function delete_teacher(id){
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
$res = mysql_query("SELECT * FROM teachers ORDER by class");
while($row=mysql_fetch_array($res)){
echo "<button style='width:500px' onclick='delete_teacher(this.value)' value='{$row['id']}'>Remove {$row['name']} from the list</button><br/>";}}
if(isset($_GET['del_teacher_id'])){
$id = $_GET['del_teacher_id'];
mysql_query("DELETE FROM teachers WHERE id={$id}");
}
?>