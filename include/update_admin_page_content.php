<?php 
if(isset($_GET['sub_no'])){$sub_no=$_GET['sub_no'];}
else{$sub_no=NULL;}
if(isset($_POST['sub_title'])){$sub_title=mysql_prep($_POST['sub_title']);}else{$sub_title=NULL;}
if(isset($_POST['sub_content'])){$sub_content=mysql_prep($_POST['sub_content']);}else{$sub_content=NULL;}
$query="UPDATE `page_content` 
SET `sub_title`='{$sub_title}',`sub_content`='{$sub_content}' 
WHERE `sub_no`={$sub_no} && `sub_page`={$sub_page} && page='{$page}'";
$result = mysql_query($query,$db);
	if($result){
		if($page=='home')$sub_page=0;
		echo "<script>window.location='admin_{$page}.php?sub_page={$sub_page}&page={$page}'</script>";
		exit;
		}
		else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
				Go to home page and retry...')</script>";}
?>