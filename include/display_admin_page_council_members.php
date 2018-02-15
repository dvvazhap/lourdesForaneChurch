<?php
require_once("connection.php");
require_once("functions.php");
if(isset($_GET['page'])){$page=$_GET['page'];}
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}
if(isset($_GET['page_name'])){$page_name=$_GET['page_name'];}
if(isset($_GET['admin_right'])){$admin_right=$_GET['admin_right'];}

$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$sub_page} ORDER by position";
$result=mysql_query($query,$db);
confirm_query($result);
if(!isset($result)){
	echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";
}
echo"<h3><center>{$page_name} Council Members</center></h3>";
	while($display = mysql_fetch_array($result)){
	echo"<div id='one_council_member'>
		<form action =\"admin_{$page}.php?page={$page}&sub_page={$sub_page}&position={$display['position']}&admin_right={$admin_right}\" method='post' enctype='multipart/form-data'>
			<h3 id='one_council_member_post'>{$display['post']}</h3>
			<div id='one_council_member_wrapper'>
				<div id=\"photo_council_members\" >";
					$path="../images/council_members/".$page."/".$sub_page."/".$display['image'];
					if((!file_exists($path))||($display['image']=="0")||($display['image']==""))
					$path="../images/no-photo.png";
					echo"<img src='{$path}'/></div><div id=\"photo_edit_council_members\" >
					<input type='file' name='file' /><input type='submit' value='Upload' name='upload'/>
					<input type='submit' value='Delete' name='delete'/></div>
					<div id='one_council_member_details'>
					<table id='one_council_member_name'>
					<tr>
						<th width='90' align='left'>Name :</th>
						<td><input type='text' placeholder='Name' name='name' size='54' value=\"{$display['name']}\" maxlength='30'/></td>
					</tr>
					</table>
					<table>
						<tr>
							<th align='left'>Address :<br/><br/><br/></th>
							<td><textarea name='address' placeholder='Address' rows='4' cols='17'>{$display['address']}</textarea></td>
							<th align='left'>Phone :<br/><br/>Landline :</th>
							<td><input type='text' name='phone' placeholder='Phone' size='10' value=\"{$display['phone']}\" maxlength='10'/><br/><br/>
								<input type='text' name='landline' size='10' placeholder='Landline' value=\"{$display['landline']}\" maxlength='7'/>
							</td>
						</tr>
						<tr><br/></tr>
						<tr><td></td>
							<td><input type='submit' value=' Save ' name='update'/></td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</div>";
}echo"<hr/>"; 
?>