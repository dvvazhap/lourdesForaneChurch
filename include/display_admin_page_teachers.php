<?php
require_once("connection.php");
require_once("functions.php");
if(isset($_GET['admin_right'])){$admin_right=$_GET['admin_right'];}

$query="SELECT * FROM teachers ORDER by class";
$result=mysql_query($query,$db);
confirm_query($result);
if(!isset($result)){echo"Sorry ! ".mysql_error()."<br/> Go to home page and retry...";}
echo"<h3><center>Catechism Teachers</center></h3>";
	while($display = mysql_fetch_array($result)){
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
	echo"<div id='one_council_member'>
		<form action =\"admin_catechism.php?page=catechism&id={$display['id']}\" method='post' enctype='multipart/form-data'>
			<h3 id='one_council_member_post'>{$class}</h3>
			<div id='one_council_member_wrapper'>
				<div id=\"photo_council_members\" >";
					if(!is_dir("../images/catechism")){mkdir("../images/catechism");}
					$path="../images/catechism/".$display['image'];
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
								<input type='text' name='landline' placeholder='Landline' size='7' value=\"{$display['landline']}\" maxlength='7'/>
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