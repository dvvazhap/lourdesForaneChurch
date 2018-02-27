<?php	
$page=$_GET['page'];
$count=0;
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result = mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){$count++;}

echo "<div class='container-fluid'>";
if($count==0){echo "<div class='row'><div class='col-md-12' id='error_notify'>No content exists in your page...!</div></div>";}
else{
	$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
	$result = mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	while($display = mysqli_fetch_array($result)){
		echo "<div class='row'>
		<div class='col-md-12'>
		<form action=\"admin_{$page}.php?sub_page={$sub_page}&sub_no={$display['sub_no']}&action=13&page={$page}\" method=\"post\">
			<div class='row'>
				<div class='col-md-2'>Title:</div>
				<div class='col-md-6'><input type='text' name ='sub_title' size='30' value=\"{$display['sub_title']}\" maxlength='50'/></div>
				<div class='col-md-2'><input type=\"submit\" value= \"Save\" /></div>
				<div class='col-md-2'><input type='button' onClick=\"location.href='admin_{$page}.php?sub_page={$sub_page}&sub_no={$display['sub_no']}&action=14&page={$page}&username={$username}&password={$password}'\" value='Delete'/></div>
			</div>
			<div class='row'>
				<div class='col-md-2'>Content:</div>
				<div class='col-md-10'><textarea name=\"sub_content\" rows=\"5\" cols=\"50\">{$display['sub_content']}</textarea></div>
			</div>
		</form><br/></div></div>";
	}
}
echo "</div>";
echo"<br/><a href =\"admin_{$page}.php?sub_page={$sub_page}&action=11&page={$page}\"><button>Insert information about your page</button></a><br/>";
?>