<?php include("admin_header.php")?>
<div id="content">
<h2>Parishes Page</h2>
<?php 

if(isset($_POST['add_parish'])){
    $sql="SELECT * FROM parishes_table"; $res=mysqli_query($db,$sql);
    $count=mysqli_num_rows($res); $c=$count+1;
    $sql="INSERT into parishes_table(`page`,`id`,`forane`)VALUES('{$page}',{$c},2)"; 
    $result = mysqli_query($db,$sql);
    echo "<script>window.alert('New parish added to the last of the page. Kindly save the details of the Parish');window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";
}
if(isset($_POST['delete_parish'])){
    $id=$_POST['id'];
    $sql="DELETE FROM parishes_table WHERE id='{$id}'";
    $result = mysqli_query($db,$sql);
    echo "<script>window.alert('Parish deleted.');window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";
}
elseif(isset($_POST['update_parish'])){
    $id=$_POST['id'];
    $forane=$_POST['forane'];
    $place=mysqli_prep($db,$_POST['place']);
    $name=mysqli_prep($db,$_POST['name']); $landline=mysqli_prep($db,$_POST['landline']);
    $address=mysqli_prep($db,$_POST['address']); $p_name=mysqli_prep($db,$_POST['p_name']);
    $p_phone=mysqli_prep($db,$_POST['p_phone']); $ap_name=mysqli_prep($db,$_POST['ap_name']);
    $ap_phone=mysqli_prep($db,$_POST['ap_phone']);
    $sql="UPDATE parishes_table SET name='{$name}',place='{$place}',forane={$forane},landline='{$landline}',address='{$address}',p_name='{$p_name}',ap_name='{$ap_name}',p_phone='{$p_phone}',ap_phone='{$ap_phone}' WHERE id={$id}";
    $result=mysqli_query($db,$sql);
    echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";
}
elseif(isset($_POST['update_forane'])){
    $id=$_POST['id'];
    $place=mysqli_prep($db,$_POST['place']);
    $name=mysqli_prep($db,$_POST['name']); $landline=mysqli_prep($db,$_POST['landline']);
    $address=mysqli_prep($db,$_POST['address']); $p_name=mysqli_prep($db,$_POST['p_name']);
    $p_phone=mysqli_prep($db,$_POST['p_phone']); $ap_name=mysqli_prep($db,$_POST['ap_name']);
    $ap_phone=mysqli_prep($db,$_POST['ap_phone']);
    $sql="UPDATE forane_table SET name='{$name}',place='{$place}',landline='{$landline}',address='{$address}',p_name='{$p_name}',ap_name='{$ap_name}',p_phone='{$p_phone}',ap_phone='{$ap_phone}' WHERE id={$id}";
    $result=mysqli_query($db,$sql);
    echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";
}
if(isset($_POST['upload_parish'])){
    if($_FILES['file']['name']==NULL){ echo "<script>window.location='admin_parishes.php?page=parishes&sub_page={$sub_page}&if=1'</script>";}
    if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 500000))
    { if ($_FILES["file"]["error"] > 0){ echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
    else {$id=$_POST['id'];
    if(!is_dir("../images/parishes")){mkdir("../images/parishes");}
    if($_FILES['file']['name']!=NULL){
    $query="SELECT * FROM parishes_table WHERE id={$id}";
    $result=mysqli_query($db,$query);
    while($row=mysqli_fetch_array($result)){
    if($row['image']!=NULL)unlink("../images/parishes/{$row['image']}");}}
    $path="../images/parishes/";
    move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
    $name=$_FILES["file"]["name"];
    $query="UPDATE parishes_table SET `image`='{$name}' WHERE id={$id} ";
    $result=mysqli_query($db,$query);
    if($result){echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";exit;}
    else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
    Go to home page and retry...')</script>";}}}else{echo"Error..!";}
}

if(isset($_POST['upload_forane'])){
    if($_FILES['file']['name']==NULL){ echo "<script>window.location='admin_parishes.php?page=parishes&sub_page={$sub_page}&if=1'</script>";}
    if ((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg")||($_FILES["file"]["type"] == "image/png"))&&($_FILES["file"]["size"] < 500000))
    { if ($_FILES["file"]["error"] > 0){ echo "Return Code: " . $_FILES["file"]["error"] . "<br />";}
    else {$id=$_POST['id'];
    if(!is_dir("../images/forane")){mkdir("../images/forane");}
    if($_FILES['file']['name']!=NULL){
    $query="SELECT * FROM forane_table WHERE id={$id}";
    $result=mysqli_query($db,$query);
    while($row=mysqli_fetch_array($result)){unlink("../images/forane/{$row['image']}");}}
    $path="../images/forane/";
    move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
    $name=$_FILES["file"]["name"];
    $query="UPDATE forane_table SET `image`='{$name}' WHERE id={$id} ";
    $result=mysqli_query($db,$query);
    if($result){echo "<script>window.location='admin_parishes.php?page=parishes&sub_page=0'</script>";exit;}
    else{echo"<script type='text/javascript'>alert('Sorry ! Something went wrong with the page<br/>
    Go to home page and retry...')</script>";}}}else{echo"Error..!";}
}

$page='parishes'; 
echo "<div class='container-fluid'>
<div class='row'>
    <div class='col-md-9'>
    </div>
    <div class='col-md-3'>
    <form method='post'><input type='submit' value='Add a new parish' name='add_parish'></form>
    </div>
</div>";

echo "<h3 class='heading'>FORANE CHURCHES <h3><hr/>";
$sql = "SELECT * FROM forane_table"; $result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
    $id=$row['id'];
    echo "<div class='row'>
        <div class='col-md-3'>";
            if($row['image']==NULL)	echo "<img style='height:220px;width:100%;' src='../images/no_image.jpg'/>";
            else echo"<img style='height:220px;width:100%;' src='../images/forane/{$row['image']}'/>";
            echo"<form id='form2' method='post' enctype='multipart/form-data'><input type='file' name='file' />
            <input type='hidden' value='{$id}' name='id'>
            <input type='submit' value='Upload' name='upload_forane'/>
            </form>
        </div>
        <div class='col-md-9'>
            <form id='form1' method='post'>";
            $place=mysqli_prep($db,$row['place']);
            $landline=mysqli_prep($db,$row['landline']);
            $name=mysqli_prep($db,$row['name']);
            $address=mysqli_prep($db,$row['address']);
            $p_name=mysqli_prep($db,$row['p_name']);
            $ap_name=mysqli_prep($db,$row['ap_name']);
            $p_phone=mysqli_prep($db,$row['p_phone']);
            $ap_phone=mysqli_prep($db,$row['ap_phone']);
            echo "<div class='row'>
                <div class='col-md-8'></div>
                <div class='col-md-4'>
                    <input type='hidden' value='{$id}' name='id'>
                    <input type='submit' value='Save Changes' name='update_forane'/>
                </div>
            </div>
            <br/>
            <div class='row'>
                <div class='col-md-3'>Name of the Forane:</div>
                <div class='col-md-3'><input type='text' name='name' size='28' maxlength='50' value='".$name."' /></div>
                <div class='col-md-2'>Landline:</div>
                <div class='col-md-4'><input type='text' name='landline' size='6' maxlength='8' value='".$landline."' /></div>
            </div>
            <div class='row'>
                <div class='col-md-3'>Place:</div>
                <div class='col-md-3'><input type='text' name='place' size='20' maxlength='50' value='".$place."' /></div>
                <div class='col-md-2'>Address:</div>
                <div class='col-md-4'><textarea name='address' rows='4' cols='25' >{$row['address']}</textarea></div>
            </div>
            <div class='row'>
                <div class='col-md-2 heading'>Parish Priest</div>
                <div class='col-md-1'>Name:</div>
                <div class='col-md-4'><input type='text' name='p_name' size='20' maxlength='50' value='{$row['p_name']}'/></div>
                <div class='col-md-1'>Phone:</div>
                <div class='col-md-4'><input type='text' name='p_phone' size='8' maxlength='10' value='{$row['p_phone']}'/></div>
            </div>
            <br/>
            <div class='row'>
                <div class='col-md-2 heading'>Asst. Parish Priest</div>
                <div class='col-md-1'>Name:</div>
                <div class='col-md-4'><input type='text' name='ap_name' size='20' maxlength='50' value='{$row['ap_name']}'/></div>
                <div class='col-md-1'>Phone:</div>
                <div class='col-md-4'><input type='text' name='ap_phone' size='8' maxlength='10' value='{$row['ap_phone']}'/></div>
            </div>
            </form>        
        </div>
    </div><br/><br/><hr/>";
}

echo "<br/><br/><br/><h3 class='heading'>PARISHES UNDER THE FORANE</h3><hr/>";
$sql = "SELECT * FROM parishes_table"; 
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
    $id=$row['id'];
    echo "<div class='row'>
        <div class='col-md-3'>";
            if($row['image']==NULL)	echo "<img style='height:220px;width:100%;' src='../images/no_image.jpg'/>";
            else echo"<img style='height:220px;width:100%;' src='../images/parishes/{$row['image']}'/>";
            echo"<form method='post' enctype='multipart/form-data'>
                <input type='file' name='file' />
                <input type='hidden' value='{$id}' name='id'>
                <input type='submit' value='Upload' name='upload_parish'/>
            </form>
        </div>
        <div class='col-md-9'>
            <form id='form1' method='post'>";
            $place=mysqli_prep($db,$row['place']); 
            $forane=$row['forane'];
            if($forane==1){$for='Ramanathapuram';}
            elseif($forane==2){$for='Gandhipuram';}
            elseif($forane==3){$for='Erode';}
            else{$for='Gandhipuram';$forane=2;}
            $landline=mysqli_prep($db,$row['landline']);
            $name=mysqli_prep($db,$row['name']);
            $address=mysqli_prep($db,$row['address']);
            $p_name=mysqli_prep($db,$row['p_name']);
            $ap_name=mysqli_prep($db,$row['ap_name']);
            $p_phone=mysqli_prep($db,$row['p_phone']);
            $ap_phone=mysqli_prep($db,$row['ap_phone']);
            echo "<div class='row'>
                <div class='col-md-3'>Under the Forane of </div>
                <div class='col-md-3'>
                    <select name='forane'><option value='{$forane}'>{$for}</option>";
                    if($forane!=1)echo "<option value='1'>Ramanathapuram</option>";
                    if($forane!=2)echo "<option value='2'>Gandhipuram</option>";
                    if($forane!=3)echo "<option value='3'>Erode</option>";
                    echo "</select>
                </div>
                <div class='col-md-3'><input type='submit' value='Delete this Parish' name='delete_parish'/></div>
                <div class='col-md-3'>
                    <input type='hidden' value='{$id}' name='id'>
                    <input type='submit' value='Save Changes' name='update_parish'/>
                </div>
            </div>
            <br/>
            <div class='row'>
                <div class='col-md-3'>Name of the Parish:</div>
                <div class='col-md-3'><input type='text' name='name' size='28' maxlength='50' value='".$name."' /></div>
                <div class='col-md-2'>Landline:</div>
                <div class='col-md-4'><input type='text' name='landline' size='6' maxlength='8' value='".$landline."' /></div>
            </div>
            <div class='row'>
                <div class='col-md-3'>Place:</div>
                <div class='col-md-3'><input type='text' name='place' size='20' maxlength='50' value='".$place."' /></div>
                <div class='col-md-2'>Address:</div>
                <div class='col-md-4'><textarea name='address' rows='3' cols='25' >{$row['address']}</textarea></div>
            </div>
            <div class='row'>
                <div class='col-md-2 heading'>Parish Priest</div>
                <div class='col-md-1'>Name:</div>
                <div class='col-md-4'><input type='text' name='p_name' size='20' maxlength='50' value='{$row['p_name']}'/></div>
                <div class='col-md-1'>Phone:</div>
                <div class='col-md-4'><input type='text' name='p_phone' size='8' maxlength='10' value='{$row['p_phone']}'/></div>
            </div>
            <br/>
            <div class='row'>
                <div class='col-md-2 heading'>Asst. Parish Priest</div>
                <div class='col-md-1'>Name:</div>
                <div class='col-md-4'><input type='text' name='ap_name' size='20' maxlength='50' value='{$row['ap_name']}'/></div>
                <div class='col-md-1'>Phone:</div>
                <div class='col-md-4'><input type='text' name='ap_phone' size='8' maxlength='10' value='{$row['ap_phone']}'/></div>
            </div>
            
            </form>
        </div>
    </div><br/><br/><hr/>";
}
echo "</div>"; //closing container-fluid
if(isset($_GET['if'])){echo "<script type='text/javascript'>alert('No file selected')</script>";}
?></div>
<?php include("admin_footer.php")?>