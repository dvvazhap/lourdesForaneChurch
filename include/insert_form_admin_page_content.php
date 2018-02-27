<style>
#page_content{ padding:20px;line-height:2em;}
#sub_title{color:#272727;font-style:italic;font-size:30px;}
#sub_content{color:blue; margin-left:50px;font-style:italic;font-size:20px;}
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
if(!$result){ die("Error ".mysqli_connect_error());}
while($display = mysqli_fetch_array($result)){
	echo"<div id='page_content'><div id='sub_title'>{$display['sub_title']}</div>
	<span id='sub_content'>{$display['sub_content']}</span></div>";
}
}

echo"<br/><br/>Insert new content to this page <br/><br/><div class='container-fluid'><div class='row'><div class='col-md-12'><form method='post'><div class='row'><div class='col-md-2'>Sub Title:</div><div class='col-md-6'><input type='textbox' size='50' name='sub_title' maxlength='50' /></div><div class='col-md-2'><input type='submit' value='Insert' name='insert_submit_admin_page_content' /></div></div><div class='row'><div class='col-md-2'>Content:</div><div class='col-md-10'><textarea rows='5' cols='100' name='sub_content'></textarea></div></div></form></div></div></div><br><br>";

if(isset($_POST['insert_submit_admin_page_content'])){
	if(isset($_POST['sub_title'])){$sub_title=mysqli_prep($db,$_POST['sub_title']);}else{$sub_title=NULL;}
	if(isset($_POST['sub_content'])){$sub_content=mysqli_prep($db,$_POST['sub_content']);}else{$sub_content=NULL;}
	//to count the no of rows
	$count=1;
	$query="SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
	$res=mysqli_query($db,$query);
	if(!$res){ die("Error ".mysqli_connect_error());}
	if(!isset($res)){echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
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
	else{echo"Sorry ! ".mysqli_error($db)." Go to home page and retry...";}
}
?>