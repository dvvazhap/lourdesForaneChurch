<?php require_once("../include/connection.php")?>
<?php include("admin_header.php")?>
<style type="text/css"> #table_content{	text-align:center;}</style>
<div id="content"><h2>Priests Page</h2>
<?php if(isset($_GET['action'])){ $action=$_GET['action'];} else{$action=NULL;} ?>
<?php if($action==NULL){
if($sub_page==1){ echo "Welcome Parish Priest<br/>";}
elseif($sub_page==2){ echo "Welcome Assist Parish Priest<br/>";}
include("../include/display_admin_page_content.php");
}
elseif($action==11){  //Insert Content Form 
if($sub_page==1){ echo "Welcome Parish Priest";} elseif($sub_page==2){ echo "Welcome Assist Parish Priest";}
include("../include/insert_form_admin_page_content.php");}
elseif($action==13){  //Update the page_content 
include("../include/update_admin_page_content.php");}
elseif($action==14){  //Delete the page_content
include("../include/delete_admin_page_content.php");} ?>
</div><?php include("admin_footer.php")?>