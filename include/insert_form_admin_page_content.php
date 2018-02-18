<style>
#page_content{background-color:white; padding:20px;line-height:2em;}
#sub_title{color:black;font-style:italic;font-family:'Times New Roman',Cooper,serif; font-size:30px;}
#sub_content{color:blue; margin-left:50px;font-style:italic;font-family:'Times New Roman',Cooper,serif; font-size:20px;}
</style>
<?php
$count=0;
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result = mysqli_query($db,$query);
while($display = mysqli_fetch_array($result)){$count++;}
if($count==0){
echo "<br/> No contents in the page...";}
else {
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result = mysqli_query($db,$query);
confirm_query($result);
while($display = mysqli_fetch_array($result)){
	echo"<div id='page_content'><div id='sub_title'>{$display['sub_title']}</div>
	<span id='sub_content'>{$display['sub_content']}</span></div>";
}
echo "</table>";
}

echo"<br/><br/><br/>Insert new Content";
echo"<form method='post'>
	<br/>Sub Title :<input type='textbox' size='50' name='sub_title' maxlength='50' /><br/>
	<br/>Content :<textarea rows='5' cols='100' name='sub_content'></textarea>
	<input type='submit' value='Insert' name='insert_submit_admin_page_content' /></form>";

if(isset($_POST['insert_submit_admin_page_content'])){
	if(isset($_POST['sub_title'])){$sub_title=mysqli_prep($db,$_POST['sub_title']);}else{$sub_title=NULL;}
	if(isset($_POST['sub_content'])){$sub_content=mysqli_prep($db,$_POST['sub_content']);}else{$sub_content=NULL;}
	//to count the no of rows
	$count=1;
	$query="SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
	$res=mysqli_query($db,$query);
	confirm_query($res);
	if(!isset($res)){echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
	while($row = mysqli_fetch_array($res)){
	$count++;
	}
	/* $count=position of the sub title ... */
	$query = "INSERT INTO page_content (`page`,`sub_page`,`sub_no`,`temp_id`,`sub_title`,`sub_content`) 
		VALUES ('{$page}',{$sub_page},{$count},{$count},'{$sub_title}','{$sub_content}')";
	$result = mysqli_query($db,$query);
	if($result){
	if($page=='home')$sub_page=0;
	echo "<script>window.location='admin_{$page}.php?sub_page={$sub_page}&page={$page}'</script>";
	exit;
	}
	else{echo"Sorry ! ".mysqli_error()." Go to home page and retry...";}
}
?>