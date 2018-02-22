<?php
require_once("connection.php");
if(isset($_GET['user'])){
	$user = $_GET['user'];
	$c = $_GET['c'];
	mysqli_query($db,"UPDATE security SET password='{$c}' WHERE username='{$user}'");
}

elseif(!isset($_GET['username'])){
echo "<div id='password_help'>
<center><h3 >Recover Password</h3></center>
<table><tr><td><input placeholder='Username' type='text' id='get_username'></td>
<td><input type='text' placeholder='Mobile Number' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next</button></td></tr></table></div>";
}
elseif(isset($_GET['username'])){
$username = $_GET['username'];
$mobile = $_GET['mobile'];

$res=mysqli_query($db,"SELECT * FROM security WHERE username='{$username}'");
$c = mysqli_num_rows($res);
if($c==1)while($row=mysqli_fetch_array($res)){
$phone = $row['phone'];
$question = $row['question'];
$answer = $row['answer'];
if($question == ''){$question = "Administrator????";}
if($answer==''){$answer="DijilVarghese";}
if($mobile==$phone){
echo "<input type='hidden' id='db_answer' value='{$answer}'><input type='hidden' id='db_user' value='{$username}'>
<div id='password_help'>
<table><tr><td>{$question}</td><td><input placeholder='Answer' type='text' id='get_answer' ><button onclick='validate_pass()'>OK</button></td></tr></table></div>";
}
else{
echo "<div id='password_help'>
<center><h3 style='color:red'>Username & Mobile Number do not match</h3></center>
<table><tr><td><input type='text' placeholder='Username' id='get_username'></td>
<td><input type='text' placeholder='Mobile Number' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next</button></td></tr></table></div>";
}

}
else{echo "<div id='password_help'>
<center><h3 style='color:red'>Invalid User..!</h3></center>
<table><tr><td><input type='text' placeholder='Username' id='get_username'></td>
<td><input type='text' placeholder='Mobile Number' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next</button></td></tr></table></div>";
}
}
?>
<style>
#password_help{height:100px; width:600px;padding:10px; border:5px solid grey; z-index:100; -webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius:10px; background-color:#272727;}

#password_help table{color:#fff;}
</style>