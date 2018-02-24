<?php
$id=$_GET['id'];
/*------Delete images of Council Members-------*/
$sql="SELECT * FROM council_members WHERE page='{$page}' && sub_page={$id}";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
if(($row['image']!=NULL)&&($row['image']!=0)) 
unlink("../images/council_members/{$page}/{$id}/{$row['image']}");
}
rmdir("../images/council_members/{$page}/{$id}");
$query="DELETE FROM council_members WHERE page='{$page}' && sub_page={$id}";
$result = mysqli_query($db,$query);

/*---------Delete gallery images-------------*/
$sql="SELECT * FROM albums WHERE page='{$page}' && sub_page='{$id}'";
$res=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($res)){
	$img=$row['name'];
	unlink("../images/gallery/{$page}/{$id}/{$img}");
}
rmdir("../images/gallery/{$page}/{$id}");
$sql="DELETE FROM albums WHERE page='{$page}' && sub_page='{$id}'";
$result=mysqli_query($db,$sql);
/*---------Delete security table-------------*/
$query="DELETE FROM security WHERE admin_sub_page={$id} && admin_page='{$page}'";
$result = mysqli_query($db,$query);
/*---------Delete prayer meeting and ward info-------------*/
if($page=='wards'){
	$query="DELETE FROM prayer_meeting WHERE sub_page={$id}";
	$result = mysqli_query($db,$query);

	$query="DELETE FROM ward_info WHERE sub_page={$id}";
	$result = mysqli_query($db,$query);
}
/*---------Delete page table-------------*/
$query="SELECT * FROM {$page}_table WHERE id={$id}";
$result = mysqli_query($db,$query);
if($result)
while($row=mysqli_fetch_array($result)){if($row['image']!="")unlink("../images/{$page}_table/{$row['image']}");}
$query="DELETE FROM {$page}_table WHERE id={$id}";
	$result = mysqli_query($db,$query);
	if($result){
$count=0;
$query="SELECT * FROM {$page}_table";
$res=mysqli_query($db,$query);
if(!$res){ die("Error ".mysqli_connect_error());}
while($row = mysqli_fetch_array($res)){$count++;}
for($i=$id;$i<=$count;$i++){
	$tid=$i+1;
	$query = "UPDATE {$page}_table SET id={$i} WHERE temp_id={$tid}";
	$result= mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	$query = "UPDATE security SET id={$i} WHERE temp_id={$tid} && admin_page='{$page}'";
	$res= mysqli_query($db,$query);
	rename("../images/council_members/{$page}/{$tid}","../images/council_members/{$page}/0");
	rename("../images/gallery/{$page}/{$tid}","../images/gallery/{$page}/0");
	
	if((isset($result))&&(isset($res))){
		$sql="SELECT * FROM {$page}_table";
		$res=mysqli_query($db,$sql);
		while($row = mysqli_fetch_array($res)){
			$sql_query = "UPDATE {$page}_table SET temp_id={$row['id']} WHERE id={$row['id']}";
			$result= mysqli_query($db,$sql_query);
			rename("../images/council_members/{$page}/0" , "../images/council_members/{$page}/{$row['id']}");
			rename("../images/gallery/{$page}/0" , "../images/gallery/{$page}/{$row['id']}");
		}
		$sql="SELECT * FROM security WHERE admin_page='{$page}'";
		$res=mysqli_query($db,$sql);
		if(!$res){ die("Error ".mysqli_connect_error());}
		while($row = mysqli_fetch_array($res)){
			$sql_query = "UPDATE security SET temp_id={$row['id']},admin_sub_page={$row['id']} WHERE id={$row['id']} && admin_page='{$page}'";
			$result= mysqli_query($db,$sql_query);
		}
		$query = "UPDATE albums SET sub_page={$i} WHERE temp_id={$tid} && page='{$page}'";
		$result= mysqli_query($db,$query);
		if(isset($result)){
			$sql="SELECT * FROM albums WHERE page='{$page}'";
			$res=mysqli_query($db,$sql);
			while($row = mysqli_fetch_array($res)){
				$sql_query = "UPDATE albums SET temp_id={$row['sub_page']} WHERE sub_page={$row['sub_page']}";
				$result= mysqli_query($db,$sql_query);
			}
		}
		$query = "UPDATE council_members SET sub_page={$i} WHERE temp_id={$tid} && page='{$page}'";
	$result= mysqli_query($db,$query);
	if(!$result){ die("Error ".mysqli_connect_error());}
	if(isset($result)){
		$sql="SELECT * FROM council_members WHERE page='{$page}'";
		$res=mysqli_query($db,$sql);
		if(!$res){ die("Error ".mysqli_connect_error());}
		while($row = mysqli_fetch_array($res)){
			$sql_query = "UPDATE council_members SET temp_id={$row['sub_page']} WHERE sub_page={$row['sub_page']} && page='{$page}'";
			$result= mysqli_query($db,$sql_query);
		}
	}
	else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";} 
	
	if($page=='wards'){
		$query = "UPDATE prayer_meeting SET sub_page={$i} WHERE temp_id={$tid}";
		$result= mysqli_query($db,$query);
		if(!$result){ die("Error ".mysqli_connect_error());}
		if(isset($result)){
			$sql="SELECT * FROM prayer_meeting";
			$res=mysqli_query($db,$sql);
			if(!$res){ die("Error ".mysqli_connect_error());}
			while($row = mysqli_fetch_array($res)){
				$sql_query = "UPDATE prayer_meeting SET temp_id={$row['sub_page']} WHERE sub_page={$row['sub_page']}";
				$result= mysqli_query($db,$sql_query);
			}
		}
		else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";} 
	
		$query = "UPDATE ward_info SET sub_page={$i} WHERE temp_id={$tid}";
		$result= mysqli_query($db,$query);
		if(!$result){ die("Error ".mysqli_connect_error());}
		if(isset($result)){
			$sql="SELECT * FROM ward_info";
			$res=mysqli_query($db,$sql);
			if(!$res){ die("Error ".mysqli_connect_error());}
			while($row = mysqli_fetch_array($res)){
				$sql_query = "UPDATE ward_info SET temp_id={$row['sub_page']} WHERE sub_page={$row['sub_page']}";
				$result= mysqli_query($db,$sql_query);
			}
		}
		else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";}
	}
}
	else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
		Go to home page and retry...')</script>";}
}
echo "<script>window.location='admin_{$page}.php?page={$page}&sub_page={$sub_page}'</script>";
exit;
	}
	else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
				Go to home page and retry...')</script>";}
?>