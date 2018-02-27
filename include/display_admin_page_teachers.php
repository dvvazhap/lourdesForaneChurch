<?php
require_once("connection.php");
if(isset($_GET['admin_right'])){$admin_right=$_GET['admin_right'];}

$query="SELECT * FROM teachers ORDER by class";
$result=mysqli_query($db,$query);
if(!$result){ die("Error ".mysqli_connect_error());}
if(!isset($result)){echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
echo"<h2 class='heading'>Catechism Teachers</h2>
<div class='container-fluid'>";

	while($display = mysqli_fetch_array($result)){
	$class = $display['class'];
	if($class==0){$class="Non-Teaching Staff";}
	elseif($class==1){$class="L.K.G";}elseif($class==2){$class="U.K.G";}
	elseif($class==3){$class="I";}elseif($class==4){$class="I-A";}elseif($class==5){$class="I-B";}
	elseif($class==6){$class="II";}elseif($class==7){$class="II-A";}elseif($class==8){$class="II-B";}
	elseif($class==9){$class="III";}elseif($class==10){$class="III-A";}elseif($class==11){$class="III-B";}
	elseif($class==12){$class="IV";}elseif($class==13){$class="IV-A";}elseif($class==14){$class="IV-B";}
	elseif($class==15){$class="V";}elseif($class==16){$class="V-A";}elseif($class==17){$class="V-B";}
	elseif($class==18){$class="VI";}elseif($class==19){$class="VI-A";}elseif($class==20){$class="VI-B";}
	elseif($class==21){$class="VII";}elseif($class==22){$class="VII-A";}elseif($class==23){$class="VII-B";}
	elseif($class==24){$class="VIII";}elseif($class==25){$class="VIII-A";}elseif($class==26){$class="VIII-B";}
	elseif($class==27){$class="IX";}elseif($class==28){$class="IX-A";}elseif($class==29){$class="IX-B";}
	elseif($class==30){$class="X";}elseif($class==31){$class="X-A";}elseif($class==32){$class="X-B";}
	elseif($class==33){$class="XI";}elseif($class==34){$class="XI-A";}elseif($class==35){$class="XI-B";}
	elseif($class==36){$class="XII";}elseif($class==37){$class="XII-A";}elseif($class==38){$class="XII-B";}
	elseif($class==39){$class="Malayalam";}elseif($class==40){$class="Tamil";}
	echo "
	<div class='row' id='one_council_member'>
	<div class='col-md-12'>
	<form action =\"admin_catechism.php?page=catechism&id={$display['id']}\" method='post' enctype='multipart/form-data'>
		<div class='row'>
		
			<div class='col-md-2'><br/><br/>
				<h3 id='one_council_member_post'>{$class}</h3>
				
			</div>
			<div class='col-md-10' id='one_council_member_wrapper'>
				<div class='row'>
				<div class='col-md-3' id='photo_council_members'>";
					if(!is_dir("../images/catechism")){mkdir("../images/catechism");}
					$path="../images/catechism/".$display['image'];
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
								<div class='col-md-3'>Name:</div>
								<div class='col-md-9'><input type='text' placeholder='Name' name='name' size='54' value=\"{$display['name']}\" maxlength='30'/><br/><br/></div>
								
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
								<div class='col-md-3'>Phone:</div>
								<div class='col-md-9'><input type='text' name='phone' placeholder='Phone' size='10' value=\"{$display['phone']}\" maxlength='10'/></div>
								<br/><br/>
							</div>
							<div class='row'>
							<div class='col-md-3'>Landline:</div>
							<div class='col-md-9'><input type='text' name='landline' placeholder='Landline' size='11' value=\"{$display['landline']}\" maxlength='7'/></div>
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
}
echo "</div><hr/>";
?>