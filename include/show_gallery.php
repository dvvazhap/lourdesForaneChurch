<?php
require_once("connection.php");
if(isset($_POST['page'])){$page=$_POST['page'];}
if(isset($_POST['sub_page'])){$sub_page=$_POST['sub_page'];}

if($page!="gallery"){echo "<h2>Gallery Page....!</h2>";}
if(($page=='wards')||($page=='associations')){
	$path="../images/gallery/{$page}/{$sub_page}/";
}
elseif($page=="gallery"){
	if(!is_dir("../images/gallery/gallery")){
		mkdir("../images/gallery/gallery");
	}
	$path="../images/gallery/gallery/";
}
else{
	$page_name=0;
	if(!is_dir("../images/gallery/{$page}")){
		mkdir("../images/gallery/{$page}");
	} 
	$path="../images/gallery/{$page}/";
}
$num_rows=0;
if($page=='gallery'){
	$page_name=$_POST['album_name'];

	$sql1="SELECT DISTINCT page_name FROM albums WHERE page='{$page}' && sub_page={$sub_page} && page_name!='{$page_name}' ORDER BY page_name";
	$res1=mysqli_query($db,$sql1);
	echo "<div id='show_album' style='background-color:#fffeee;'>";
	while($display = mysqli_fetch_array($res1)){
		echo"<button  class='album' onclick='show_album(this.value)' value=\"{$display['page_name']}\" >{$display['page_name']}</button>";
	}
	echo "</div><br/>";
	
	echo"<h4><div style='color:#fff'>*Upload a jpg/jpeg Image of size less than 1 Mb</div></h4>";
	echo"<div id='one_image'>";
	if($page=="gallery"){echo "<h3 style='color:#fff'>ALBUM NAME: ".strtoupper($page_name)."</h3>";}
	

	echo "<div class='container-fluid'>
    	<div class='row'>
			<div class='col-md-3'>
				<h4 style='color:white;'>Upload a new Image...!</h4>
				<br/><br/><br/>
				<form method='post' enctype='multipart/form-data'>
				<input type='file' name='file' />";
				if($page=="gallery"){echo"<input type='hidden' value=\"{$page_name}\" name='album_name'>";}
				echo"<input type='submit' name='upload_image' value='Upload'>
				</form>
			</div>";
			$query="SELECT * FROM albums WHERE page='{$page}' && page_name='{$page_name}' && sub_page={$sub_page}";
			$res=mysqli_query($db,$query);
			$num_rows=mysqli_num_rows($res);
			if($num_rows >0){
				$sql="SELECT * FROM albums WHERE page='{$page}' && page_name='{$page_name}' && sub_page={$sub_page}";
				$result=mysqli_query($db,$sql);
				
				while($row=mysqli_fetch_array($result)){
					$img=$path."{$page_name}/{$row['name']}";
					$file_name=$row['name'];

					echo "<div class='col-md-3'>					
						<img src='{$img}'/>
						<form method='post'> <input type='hidden' value='{$img}' name='image'/>
						<input type='hidden' value='{$file_name}' name='file_name'/>
						<input type='hidden' value='{$page_name}' name='album_name'/>
						<input type='submit' value='Delete the image' name='delete_image'/></form>
						<br/><br/>
					</div>";
				}
			}

	echo "</div></div>";
}
elseif($page=='home'){
	echo"<div class='container-fluid' id='one_image'>
		<div class='row'>
			<div class='col-md-6'>
				<h4>*Upload a 660x280 jpg/jpeg Image of size less than 1 Mb</h4>
				<form method='post' enctype='multipart/form-data'>
				<input type='file' name='file' />
				<input type='submit' name='upload_image' value='Upload'>
				</form>	
			</div>";
			$query="SELECT * FROM albums WHERE page='{$page}' && sub_page={$sub_page}";
			$res=mysqli_query($db,$query);
			if($res)	$num_rows=mysqli_num_rows($res);
			if($num_rows >0){
				while($row=mysqli_fetch_array($res)){
					$page_name=$row['page_name'];
					$img=$path.$row['name'];
					$file_name=$row['name'];
					echo"<div class='col-md-6'>
						<img src='{$img}'/>";
						if($num_rows!=1){
							echo "<form method='post'> <input type='hidden' value='{$img}' name='image'/>
							<input type='hidden' value='{$file_name}' name='file_name'/>
							<input type='hidden' value='{$page_name}' name='album_name'/>
							<input type='submit' value='Delete the image' name='delete_image'/></form>";
						}
					echo"<br/><br/></div>";
				}
			}
	echo"</div></div><hr/>";
}
elseif($page!='gallery'){
	echo"<h4><div style='color:#272727'>*Upload a jpg/jpeg Image of size less than 1 Mb</div></h4>";
	
	echo"<div class='container-fluid' id='one_image'>
		<div class='row'>
			<div class='col-md-3'>
				<h4>Upload a new Image...!</h4>
				<form method='post' enctype='multipart/form-data'>
				<input type='file' name='file' />
				<input type='submit' name='upload_image' value='Upload'>
				</form>	
			</div>";
			$query="SELECT * FROM albums WHERE page='{$page}' && sub_page={$sub_page}";
			$res=mysqli_query($db,$query);
			if($res)	$num_rows=mysqli_num_rows($res);
			if($num_rows >0){
				while($row=mysqli_fetch_array($res)){
					$page_name=$row['page_name'];
					$img=$path.$row['name'];
					$file_name=$row['name'];
					echo"<div class='col-md-3'>
						<img src='{$img}'/>";
						if($num_rows!=1){
							echo "<form method='post'> <input type='hidden' value='{$img}' name='image'/>
							<input type='hidden' value='{$file_name}' name='file_name'/>
							<input type='hidden' value='{$page_name}' name='album_name'/>
							<input type='submit' value='Delete the image' name='delete_image'/></form>";
						}
					echo"<br/><br/></div>";
				}
			}
	echo"</div></div><hr/>";
}
?>