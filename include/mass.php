<?php
require_once("connection.php");

if(isset($_GET['update_mass'])){
    $id= $_POST['id'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];
$sql=mysqli_query($db,"UPDATE mass SET heading='{$heading}', content='{$content}' WHERE id={$id}");
mysqli_query($db,$sql);
}
if(!isset($_GET['view'])){
    echo "<div id='mass_table'></div>";
}
if(isset($_GET['view'])||isset($_GET['update_mass'])){
    echo "<div class='container-fluid' style='max-height:250px;overflow-y:scroll;'>";
    $sql=mysqli_query($db,"SELECT * FROM mass ORDER BY id");

    $count = 1;
    while($row=mysqli_fetch_array($sql)){
        echo "<div class='row'>
                <div class='col-md-1'>{$count}.</div>
                <div class='col-md-4'><input type='text' id='heading{$count}' value=\"{$row['heading']}\" /></div>
                <div class='col-md-4'><input type='text' id='content{$count}' value=\"{$row['content']}\" /></div>
                <div class='col-md-3'><input type='hidden' value={$row['id']}><button OnClick=\"update_mass({$row['id']})\">Save</button></div>
            </div>
            <div class='cleaner_h20'></div> ";
        $count++;
    }
    echo "</div>";
}
?>

<script>
function show_mass(){
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

var dtb = document.getElementById('del_teacher_button'); if(dtb) document.getElementById('del_teacher_button').style.visibility='visible';
var dt = document.getElementById('delete_teacher'); if(dt) document.getElementById('delete_teacher').style.visibility='hidden';

var smb = document.getElementById('show_mass_button'); if(smb) document.getElementById('show_mass_button').style.visibility='hidden';
var mt = document.getElementById('mass_table'); if(mt) document.getElementById('mass_table').style.visibility='visible';

var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("mass_table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../include/mass.php?view=1",true);
	xmlhttp.send();

}
function update_mass(id){
    var heading = document.getElementById("heading"+id).value;
    var content = document.getElementById("content"+id).value;
    var xmlhttp;
    if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
    else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("mass_table").innerHTML=xmlhttp.responseText;
            }
    }
    xmlhttp.open("POST","../include/mass.php?update_mass=1",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("id="+id+"&heading="+heading+"&content="+content);
}
</script>