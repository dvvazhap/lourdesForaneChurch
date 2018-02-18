<?php	
$page=$_GET['page'];
$count=0;
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result = mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){$count++;}
if($count>0){echo"<table cellpadding=10 cellspacing=2><tr><th> Title</th><th>Content</th></tr>";}
else{ echo"<div id='error_notify'>No content exists in your page...!</div>";}
$query = "SELECT * FROM page_content WHERE page='{$page}' && sub_page={$sub_page}";
$result = mysqli_query($db,$query);
confirm_query($result);
while($display = mysqli_fetch_array($result)){
	echo "<form action=\"admin_{$page}.php?sub_page={$sub_page}&sub_no={$display['sub_no']}&action=13&page={$page}\" method=\"post\"><tr>
	<td><input type=\"text\" name =\"sub_title\" size=\"30\" value=\"{$display['sub_title']}\" maxlength='50'/></td>
	<td><textarea name=\"sub_content\" rows=\"5\" cols=\"50\">{$display['sub_content']}</textarea></td>
	<td><input type=\"button\" onClick=\"location.href='admin_{$page}.php?sub_page={$sub_page}&sub_no={$display['sub_no']}&action=14&page={$page}&username={$username}&password={$password}'\" value=\"Delete\"/></td>
	<td><input type=\"submit\" value= \"Save\" /></td>
	</tr></form>";
}
echo "</table>";
echo"<br/><a href =\"admin_{$page}.php?sub_page={$sub_page}&action=11&page={$page}\"><button>Insert information about your page</button></a><br/>";
?>