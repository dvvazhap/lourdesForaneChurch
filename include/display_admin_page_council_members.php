<?php
require_once("connection.php");
if(isset($_GET['page'])){$page=$_GET['page'];}
if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}
if(isset($_GET['page_name'])){$page_name=$_GET['page_name'];}
if(isset($_GET['admin_right'])){$admin_right=$_GET['admin_right'];}

$query="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$sub_page} ORDER by position";
$result=mysqli_query($db,$query);
if(!$result){ die("Error ".mysqli_connect_error());}
if(!isset($result)){
	echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";
}
echo"<h2 class='heading'>{$page_name} Council Members</h2>
<div class='container-fluid'>";
	while($display = mysqli_fetch_array($result)){

		echo "
		<div class='row' id='one_council_member'>
		<div class='col-md-12'>
		<form action =\"admin_{$page}.php?page={$page}&sub_page={$sub_page}&position={$display['position']}&admin_right={$admin_right}\" method='post' enctype='multipart/form-data'>
			<div class='row'>
			
				<div class='col-md-2'><br/><br/>
					<h3 id='one_council_member_post'>{$display['post']}</h3>
					
				</div>
				<div class='col-md-10' id='one_council_member_wrapper'>
					<div class='row'>
					<div class='col-md-3' id='photo_council_members'>";
						$path="../images/council_members/".$page."/".$sub_page."/".$display['image'];
						if((!file_exists($path))||($display['image']=="0")||($display['image']==""))
						$path="../images/no-photo.png";
						echo"<img src='{$path}'/>
						<input type='file' name='file' /><input type='submit' class='upload' value='Upload photo' name='upload'/>
						<input type='submit' value='Delete photo' class='delete' name='delete'/>
					</div>
					<div class='col-md-9' id='one_council_member_details'>
						<div class='row'>
							<div class='col-md-9'>
								<br/>
								<div class='row'>
									<div class='col-md-3'>
									Name:
									</div>
									<div class='col-md-9'><input type='text' placeholder='Name' name='name' size='54' value=\"{$display['name']}\" maxlength='30'/><br/><br/>
									</div>
								</div>
							</div>
							<div class='col-md-3'>
								<br/>
								<input type='submit' value=' Save ' name='update'/>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-6'>
								Address:<br/>
								<textarea name='address' placeholder='Address' rows='3' cols='17'>{$display['address']}</textarea>
							</div>
							<div class='col-md-6'>
								<div class='row'>
									<br/>
									<div class='col-md-3'>
										Phone:
									</div>
									<div class='col-md-9'>
										<input type='text' name='phone' placeholder='Phone' size='10' value=\"{$display['phone']}\" maxlength='10'/>
									</div>
									<br/><br/>
								</div>
								<div class='row'>
									<div class='col-md-3'>
										Landline:
									</div>
									<div class='col-md-9'>
										<input type='text' name='landline' size='11' placeholder='Landline' value=\"{$display['landline']}\" maxlength='7'/>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				
			</div>
			
		</form>
		</div>
		</div><br/>";
}echo "</div><hr/>";
?>


