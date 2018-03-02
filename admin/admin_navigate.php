<div id="navigate">

<?php echo "<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-8'>Welcome ".strtoupper($username)."
        </div>
        <div class='col-md-4'><form action='admin_verify.php?logout=1' method='post' /><input type='submit' value='Logout' /></form></div>
    </div>
</div>"; 
if($admin_right<=1){
    echo"<ul><li><a href='admin_home.php?page=home&sub_page=0' >Home</a></li>
    <li><a href='admin_parishes.php?page=parishes&sub_page=0'>Parishes</a></li>
    <li><a href='admin_associations.php?page=associations&sub_page=0'>Associations</a><ul>";
    $sql = 'SELECT * FROM associations_table ORDER by name'; 
    $result=mysqli_query($db,$sql); if(isset($result)){while($row = mysqli_fetch_array($result)){
        echo "<li><a href=\"admin_associations.php?page=associations&sub_page={$row['id']} \">{$row['name']}</a></li>";
    }}
    echo"</ul></li>
        <li><a href='admin_wards.php?page=wards&sub_page=0'>Wards</a><ul>";
        $sql = "SELECT * FROM wards_table ORDER by name"; $result=mysqli_query($db,$sql);
        if(isset($result)){ 
            while($row = mysqli_fetch_array($result)){
                echo "<li><a href=\"admin_wards.php?page=wards&sub_page={$row['id']} \">{$row['name']}</a></li>";
            }
        }
    echo"</ul></li>
    <li><a href='admin_gallery.php?page=gallery&sub_page=0'>Gallery</a></li>
    <li><a href='admin_catechism.php?page=catechism&sub_page=0'>Catechism</a><li>
    <li><a href='admin_contact.php?page=contact&sub_page=0'>Contact</a></li>
    </ul>";
}?>
</div>


