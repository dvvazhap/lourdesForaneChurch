<?php include("admin_header.php")?>
<h2>Contact Page</h2>
<?php if(isset($_GET['action'])){$action=$_GET['action'];} else{$action=NULL;}
echo "<div id='content'>
        <div class='container-fluid'>";
            if($action==NULL){
                $query="SELECT * FROM contact"; $result=mysqli_query($db,$query); 
                if(!$result){ die("Error ".mysqli_connect_error());}
                if(!isset($result)){echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
                echo "<div class='row'>";
                while($display = mysqli_fetch_array($result)){
                    echo"<div class='col-md-6'>
                    <form action =\"admin_contact.php?page={$page}&action=1&position={$display['position']} \" method=\"post\">
                        <div class='row'>
                            <div class='col-md-2'><span class='heading'> {$display['post']}  </span></div>
                            <div class='col-md-10'>
                                <div class='row'>
                                    <div class='col-md-2 contact'>Name</div>
                                    <div class='col-md-10 contact'><input type='text' name='name' size='20' value=\"{$display['name']}\" maxlength='30' /></div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-2 contact'>Address</div>
                                    <div class='col-md-10 contact'><textarea name='address' rows='5' size='50'>{$display['address']}</textarea></div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-2 contact'>Email</div>
                                    <div class='col-md-10 contact'><input type='text' name='email' size='15' value=\"{$display['email']}\" maxlength='30' /></div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-2 contact'>Phone</div>
                                    <div class='col-md-10 contact'><input type='text' name='phone' size='10' value=\"{$display['phone']}\" maxlength='10' /></div>
                                </div>
                                <div class='row'><div class='col-md-2 contact'>Landline</div>
                                    <div class='col-md-10 contact'><input type='text'  name='landline' size='7' value=\"{$display['landline']}\" maxlength='8' /></div>
                                </div>
                                <br/>
                                <div class='row'><div class='col-md-2'></div><div class='col-md-10'><input style='cursor:pointer' type='submit' value='Save'/></div></div>
                            </div>    
                        </div>
                    </form><br/><br/><br/>
                    </div>";
                }
                echo"</div>";
            }
            elseif($action==1){/*Save the Council member's info*/
            $position=$_GET['position']; $name=mysqli_prep($db,$_POST['name']);$address=mysqli_prep($db,$_POST['address']);if(isset($_POST['phone'])){$phone=mysqli_prep($db,$_POST['phone']);}else{$phone=NULL;}$landline=mysqli_prep($db,$_POST['landline']);$email=mysqli_prep($db,$_POST['email']);
            $query="UPDATE contact 
            SET `name`='{$name}', `address`='{$address}', `phone`='{$phone}',`landline`='{$landline}',`email`='{$email}' 
            WHERE position={$position} ";
            $result=mysqli_query($db,$query);
            if($result){echo "<script>window.location='admin_contact.php?page={$page}'</script>"; exit;}
            else{echo"Sorry ! ".mysqli_error($db)."<br/> Go to home page and retry...";}
            }?>
            <div class="row">
                <div class="col-md-6">
                    <h1>DESIGN TREE</h1>
                </div>
                <div class="col-md-6 contact">
                    <span>This website is developed by</span>
                    Dijil Varghese<br/>
                    Ph: +91-9894985156 / +91-9739091906
                </div>
            </div>
        </div>
    </div>

<?php include("admin_footer.php")?>


        
    
    
    
    
    


