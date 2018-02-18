<?php
require_once("connection.php");
if(isset($_GET['user'])){
	$user = $_GET['user'];
	$c = $_GET['c'];
	mysqli_query($db,"UPDATE security SET password='{$c}' WHERE username='{$user}'");
}

elseif(!isset($_GET['username'])){
echo "<div id='password_help'>
<center><h3>Recover Password</h3></center>
<table><tr><th>Username :</th><td><input type='text' id='get_username'></td><th>Mobile Number :</th>
<td><input type='text' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next Step</button></td></tr></table></div>";
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
<table><tr><th>Question :</th><td>{$question}</td></tr><tr><th>Answer :</th>
<td><input type='text' id='get_answer' ><button onclick='validate_pass()'>OK</button></td></tr></table></div>";
}
else{
echo "<div id='password_help'>
<center><h3 style='color:red'>Username & Mobile Number do not match</h3></center>
<table><tr><th>Username :</th><td><input type='text' id='get_username'></td><th>Mobile Number :</th>
<td><input type='text' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next Step</button></td></tr></table></div>";
}

}
else{echo "<div id='password_help'>
<center><h3 style='color:red'>Invalid User..!</h3></center>
<table><tr><th>Username :</th><td><input type='text' id='get_username'></td><th>Mobile Number :</th>
<td><input type='text' id='get_mobile' maxlength='10'></td><td><button onclick='show_question()'>Next Step</button></td></tr></table></div>";
}
}
?>
<style>
#password_help{height:70px; width:700px;padding:10px; color:white; border:5px solid grey; z-index:100; background-color:black; -webkit-border-radius: 30px;-moz-border-radius: 30px;border-radius:30px;}
</style>