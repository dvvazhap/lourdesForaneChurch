<script>
function show_information(){
	document.getElementById('show_information').style.visibility='visible';
	document.getElementById('show_information_button').style.visibility='hidden';
	document.getElementById('password_table').style.visibility='hidden';
	document.getElementById('change_password_button').style.visibility='visible';
	var admin_right= document.getElementById('admin_right').value;
	if(admin_right<=2){
	document.getElementById('add_user').style.visibility='hidden';
	document.getElementById('add_user_table').style.visibility='hidden';
	document.getElementById('add_user_button').style.visibility='visible';
	document.getElementById('view_users').style.visibility='hidden';
	document.getElementById('view_users_button').style.visibility='visible';
	}
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
				document.getElementById("save_information").innerHTML=xmlhttp.responseText;
			}
	}
	xmlhttp.open("POST","../include/info.php?info=2",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("mobile="+mobile_no+"&question="+question+"&answer="+answer);
}
</script>
<?php
if(!isset($_GET['info'])){
	echo "<div id='show_information'></div><div id='save_information'></div>";
}
if(isset($_GET['info'])){
$info = $_GET['info'];
if($info==1){
	if(!isset($_SESSION['user']))session_start();
	require_once("connection.php");
	require_once("functions.php");
	$name = $_SESSION['user'];
	$res = mysql_query("SELECT * FROM security WHERE username='{$name}'");
	while($row = mysql_fetch_array($res)){
		echo "<h3>Username :{$row['username']}</h3><br/>";
		echo "Phone :<input type='text' id='mobile_no' onchange='val_phone(this.value)' "; if(($row['phone']=='')||($row['phone']==NULL)) echo"value=''"; else echo"value='{$row['phone']}'"; echo "maxlength='10'><br/><br/>";
		echo "<table><tr><td>Security Question </td><td>:</td><td><select id='question' ><option "; if(($row['question']=="")||($row['question']==NULL)) echo"value=''"; else echo"value='{$row['question']}'"; echo " >{$row['question']}</option>
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
		</select></td><td></td></tr>";
		echo "<tr><td>Answer </td><td>:</td><td><textarea id='answer' rows='3' cols='30'>"; if(($row['answer']=="")||($row['answer']==NULL)) echo""; else echo"{$row['answer']}"; echo "</textarea></td>
		<td><button onclick='save_information()'>Save Information</button></td>
		</tr></table>";
	}
}
elseif($info==2){
	$mobile = $_POST['mobile'];
	$ques = $_POST['question'];
	$ans = $_POST['answer'];
	if(!isset($_SESSION['user']))session_start();
	require_once("connection.php");
	require_once("functions.php");
	$name = $_SESSION['user'];
	$res=mysql_query("UPDATE security SET phone='{$mobile}',question='{$ques}',answer='{$ans}' WHERE username='{$name}'");
}
}

?>