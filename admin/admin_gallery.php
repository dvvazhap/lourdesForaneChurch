<?php include("admin_header.php")?>
<div id="content">
<h2>Gallery Page</h2>
<?php
$fn="../images/gallery";
$abc = is_dir($fn);
if(!$abc){mkdir("../images/gallery");}
if(isset($_GET['action'])){	$action = $_GET['action'];}else{$action = NULL;}
if($action==NULL){include("../include/add_gallery_image.php");}
?>
</div>
<?php include("admin_footer.php")?>
