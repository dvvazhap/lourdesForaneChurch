<script>
function show_information(){
var atb = document.getElementById('add_teacher_button'); if(atb) document.getElementById('add_teacher_button').style.visibility='visible';
var at = document.getElementById('add_teacher'); if(at) document.getElementById('add_teacher').style.visibility='hidden';
var dtb = document.getElementById('del_teacher_button'); if(dtb) document.getElementById('del_teacher_button').style.visibility='visible';
var dt = document.getElementById('delete_teacher'); if(dt) document.getElementById('delete_teacher').style.visibility='hidden';
var sib = document.getElementById('show_information_button'); if(sib) document.getElementById('show_information_button').style.visibility='hidden';
var si = document.getElementById('show_information'); if(si) document.getElementById('show_information').style.visibility='visible';
var cpb= document.getElementById('change_password_button'); if(cpb) document.getElementById('change_password_button').style.visibility='visible';
var pt = document.getElementById('password_table'); if(pt) document.getElementById('password_table').style.visibility='hidden';
var aub = document.getElementById('add_user_button'); if(aub) document.getElementById('add_user_button').style.visibility='visible';
var au = document.getElementById('add_user'); if(au) document.getElementById('add_user').style.visibility='hidden';
var aut = document.getElementById('add_user_table'); if(aut) document.getElementById('add_user_table').style.visibility='hidden';
var vub = document.getElementById('view_users_button'); if(vub) document.getElementById('view_users_button').style.visibility='visible';
var vu = document.getElementById('view_users'); if(vu) document.getElementById('view_users').style.visibility='hidden';
var smb = document.getElementById('show_mass_button'); if(smb) document.getElementById('show_mass_button').style.visibility='visible';
var mt = document.getElementById('mass_table'); if(mt) document.getElementById('mass_table').style.visibility='hidden';
	
	var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("show_information").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("GET","../include/info.php?info=1",true);
	xmlhttp.send();
}
function val_phone(no){
	if((isNaN(no))||(no.length<10))
		{
			alert('Invalid Mobile Number');
			document.getElementById('mobile_no').value="";
		}
}
function save_information(){
var mobile_no = document.getElementById('mobile_no').value;
var question = document.getElementById('question').value;
var answer = document.getElementById('answer').value;
var xmlhttp;
	if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest();}
	else{ xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("save_information_notify").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/info.php?update=1",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("mobile="+mobile_no+"&question="+question+"&answer="+answer);
}
</script>
<?php
if(!isset($_GET['info'])){
	echo "<div id='show_information'></div>";
}
if(isset($_GET['info'])){
	if(!isset($_SESSION['user']))session_start();
	require_once("connection.php");
	$name = $_SESSION['user'];
	$res = mysqli_query($db,"SELECT * FROM security WHERE username='{$name}'");
	while($row = mysqli_fetch_array($res)){
		echo"<div class='container-fluid'>
			<div class='row'>
				<div class='col-md-4'>Phone:</div>
				<div class='col-md-6'><input type='text' id='mobile_no' onchange='val_phone(this.value)' "; 
				if(($row['phone']=='')||($row['phone']==NULL)) echo"value=''"; 
				else echo"value='{$row['phone']}'"; 
				echo "maxlength='10'><br/></div>
			</div>
			<div class='row'>
				<div class='col-md-4'>Security Question:</div>
				<div class='col-md-6'>
					<select id='question' ><option "; 
					if(($row['question']=="")||($row['question']==NULL)) echo"value=''"; 
					else echo"value='{$row['question']}'"; 
					echo " >{$row['question']}</option>
					<option value='Name of your first grade teacher'>Name of your first grade teacher</option>
					<option value='Name of the School you studied'>Name of the School you studied</option>
					<option value='Your favourite pet'>Your favourite pet</option>
					<option value='The person whom you like the most'>The person whom you like the most</option>
					<option value='The person whom you hate'>The person whom you hate</option>
					<option value='Your lucky colour'>Your lucky colour</option>
					<option value='Your son/daughter name'>Your son/daughter name</option>
					<option value='Your spouce name'>Your spouce name</option>
					<option value='Your first mobile number'>Your first mobile number</option>
					<option value='Your favourite sport'>Your favourite sport</option>
					<option value='The car you wished to have'>The car you wished to have</option>
					<option value='Your character'>Your character</option>
					<option value='Your chatnote email id'>Your chatnote email id</option>
					<option value='Your gmail id'>Your gmail id</option>
					<option value='Your mothers native'>Your mothers native</option>
					<option value='Your hometown'>Your hometown</option>
					<option value='Your son in law name'>Your son in law name</option>
					<option value='The class in which your child study'>The class in which your child study</option>
					<option value='The name of the school you are studying'>The name of the school you are studying</option>
					<option value='The College you got your graduation'>The College you got your graduation</option>
					<option value='The school in which your son/daughter study'>The school in which your son/daughter study</option>
					<option value='Number of rooms in your house'>Number of rooms in your house</option>
					<option value='The year which you can never forget'>The year which you can never forget</option>
					<option value='The city you were born'>The city you were born</option>
					<option value='The name you like the most'>The name you like the most</option>
					<option value='Your role model'>Your role model</option>
					<option value='The model of your mobile phone'>The model of your mobile phone</option>
					<option value='Your wife phone number'>Your wife phone number</option>
					</select>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>Answer:</div>
				<div class='col-md-6'>
				<input id='answer' type='text' value='"; 
				if(($row['answer']=="")||($row['answer']==NULL)) echo""; 
				else echo"{$row['answer']}"; 
				echo "'/>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-6'><button onclick='save_information()'>Save Information</button></div>
				<div class='col-md-6' id='save_information_notify'></div>
			</div>
		</div>";
	}
}
if(isset($_GET['update'])){
	$mobile = $_POST['mobile'];
	$ques = $_POST['question'];
	$ans = $_POST['answer'];
	if(!isset($_SESSION['user']))session_start();
	require_once("connection.php");
	$name = $_SESSION['user'];
	$res=mysqli_query($db,"UPDATE security SET phone='{$mobile}',question='{$ques}',answer='{$ans}' WHERE username='{$name}'");
	echo "<span style='color:green'>Information updated.</span>";
}

?>