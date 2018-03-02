<?php $page = 'contact';
require_once("include/connection.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class='col-md-12'><h2 class='heading'> PRIESTS </h2></div>
    </div>
    <div class="row">
        <div class="col-md-6 contact">
        <?php $query="SELECT * FROM contact WHERE position = 1";
            $result=mysqli_query($db,$query); while($row=mysqli_fetch_array($result)){
                echo "<h3>{$row['name']}</h3>{$row['address']}<br/>";
                if($row['email']!=""){echo "Email :{$row['email']}<br/>";}
                if($row['phone']!=""){echo "Phone : +91-{$row['phone']}<br/>";} 
                if($row['landline']!=""){echo "Landline : {$row['landline']}<br/>";}
            }?>
        </div>
        <div class="col-md-6 contact">
        <?php $query="SELECT * FROM contact WHERE position=2"; 
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<h3>{$row['name']}</h3>{$row['address']}<br/>";
            if($row['email']!=""){ echo "Email :{$row['email']}<br/>";} 
            if($row['phone']!=""){ echo "Phone : +91-{$row['phone']}<br/>";} 
            if($row['landline']!=""){ echo "Landline : {$row['landline']}<br/>";} 
        }?>
        </div>
    </div>
    <div class="cleaner_h30"></div>
    <div class="row">
        <div class='col-md-12' ><h2 class='heading'> KAIKARAN'S</h2></div>
    </div>
    <div class="row">
        <div class="col-md-6 contact">
        <?php $query="SELECT * FROM contact WHERE position=3"; $result=mysqli_query($db,$query);
            while($row=mysqli_fetch_array($result)){ 
                echo "<h3>{$row['name']}</h3>{$row['address']}<br/>";
                if($row['email']!=""){echo "Email :{$row['email']}<br/>";} 
                if($row['phone']!=""){ echo "Phone : +91-{$row['phone']}<br/>";}
                if($row['landline']!=""){ echo "Landline : {$row['landline']}<br/>";}
            }?>
        </div>
        <div class="col-md-6 contact">
        <?php $query="SELECT * FROM contact WHERE position=4"; $result=mysqli_query($db,$query);
            while($row=mysqli_fetch_array($result)){ 
                echo "<h3>{$row['name']}</h3>{$row['address']}<br/>"; 
                if($row['email']!=""){echo "Email :{$row['email']}<br/>";} 
                if($row['phone']!=""){echo "Phone : +91-{$row['phone']}<br/>";} 
                if($row['landline']!=""){echo "Landline : {$row['landline']}<br/>";}
            }?>
        </div>
    </div>
    <div class="cleaner_h30"></div><div class="cleaner_h30"></div><div class="cleaner_h30"></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 company">
            <div class="row">
            <div class="col-md-4"><img src='images/logo.png' /></div>
            <div class="col-md-8 contact" ><br/>Developed by <br/>
                <b>Dijil Varghese</b><br/>
                <b>Ph: +91-9894985156 / +91-9739091906</b></div>
            </div>  
        </div>
        <div class="col-md-3"></div>
    </div>
</div>