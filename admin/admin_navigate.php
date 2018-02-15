<div id="navigate"><h2>Navigate</h2>
<ul><li><a href="admin_home.php?page=home&sub_page=0" >Home</a></li>
<li>Priests<ul><li><a href="admin_priests.php?page=priests&sub_page=1">Parish Priest</a></li><li><a href="admin_priests.php?page=priests&sub_page=2">Assist Parish Priest</a></li></ul></li>
<li><a href="admin_parishes.php?page=parishes&sub_page=0">Parishes</a></li>
<li><a href="admin_associations.php?page=associations&sub_page=0">Associations</a><ul>
<?php $sql = "SELECT * FROM associations_table ORDER by name"; $result=mysql_query($sql,$db); if(isset($result)){while($row = mysql_fetch_array($result)){echo "<li><a href=\"admin_associations.php?page=associations&sub_page={$row['id']} \">{$row['name']}</a></li>";}} ?></ul></li>
<li><a href="admin_service.php?page=service">Service</a></li>
<li><a href="admin_wards.php?page=wards&sub_page=0">Wards</a><ul>
<?php $sql = "SELECT * FROM wards_table ORDER by name"; $result=mysql_query($sql,$db);
if(isset($result)){ while($row = mysql_fetch_array($result)){echo "<li><a href=\"admin_wards.php?page=wards&sub_page={$row['id']} \">{$row['name']}</a></li>";}} ?></ul></li>
<li><a href="admin_gallery.php?page=gallery&sub_page=0">Gallery</a></li>
<!--<li><a href="admin_institutions.php?page=institutions&sub_page=0">Institutions</a></li>-->
<li><a href="admin_catechism.php?page=catechism&sub_page=0">Catechism</a><ul>
<li><a href="admin_catechism.php?page=catechism&sub_page=1">Teaching Staff</a></li>
<li><a href="admin_catechism.php?page=catechism&sub_page=2">Student Representatives</a></li>
<li><a href="admin_catechism.php?page=catechism&sub_page=3">Students Info</a></li></ul></li>
<li><a href="admin_contact.php?page=contact&sub_page=0">Contact</a></li>
</ul></div>