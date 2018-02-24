<?php
if(isset($_GET['name'])){$get_name=mysqli_prep($db,$_GET['name']);}else{$get_name=NULL;}
if(isset($_POST['name'])){$post_name=mysqli_prep($db,$_POST['name']);}else{$post_name=NULL;}
if(isset($_POST['nop'])){$nop=mysqli_prep($db,$_POST['nop']);}else{$nop=NULL;}
if(isset($_POST['username'])){$temp_username=mysqli_prep($db,$_POST['username']);}else{$temp_username=NULL;}
if(isset($_POST['password'])){$temp_password=mysqli_prep($db,$_POST['password']);}else{$temp_password=NULL;}
if(isset($_GET['reply'])){$reply=$_GET['reply'];}else{$reply=NULL;}
if($get_name==NULL){$name=$post_name;}else{$name=$get_name;}
if($reply==1){ echo "<br/>Sorry...!<br/> Some one have already registered with that user name,...<br/>Pls try with an alternate username";}
if(($post_name==NULL)||($temp_username==NULL)||($temp_password==NULL)){
echo "<table>
<form action=\"admin_{$page}.php?page={$page}&action=20\" method=\"post\">
<tr><th align=\"left\">Enter the {$pag} name </th><td>:</td><td><input type=\"text\" name=\"name\" size=\"30\" maxlength=\"30\" value=\"{$name}\"></td></tr>
<tr><th align=\"left\">Username</th><td>:</td><td><input type=\"text\" size=\"30\" maxlength=\"30\" name=\"username\" placeholder=\"Username\" /></td></tr>
<tr><th align=\"left\">Password</th><td>:</td><td><input type=\"password\" size=\"30\" maxlength=\"30\" name=\"password\" placeholder=\"Password\" /></td></tr>
<tr><th align=\"left\">Enter the Number of posts</th><td>:</td><td>
<select name=\"nop\">
<option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option><option value=\"4\">4</option>
<option value=\"5\">5</option><option value=\"6\">6</option><option value=\"7\">7</option><option value=\"8\">8</option>
<option value=\"9\">9</option><option value=\"10\">10</option><option value=\"11\">11</option><option value=\"12\">12</option>
<option value=\"13\">13</option><option value=\"14\">14</option><option value=\"15\">15</option><option value=\"16\">16</option>
<option value=\"17\">17</option><option value=\"18\">18</option><option value=\"19\">19</option><option value=\"20\">20</option>
<option value=\"21\">21</option><option value=\"22\">22</option><option value=\"23\">23</option><option value=\"24\">24</option>
<option value=\"25\">25</option><option value=\"26\">26</option><option value=\"27\">27</option><option value=\"28\">28</option>
<option value=\"29\">29</option><option value=\"30\">30</option>
</select></td></tr>
<tr><th></th><td></td><td><input type=\"submit\" value=\"NEXT STEP\"></td></tr></form></table>";}
else{ 
$sql="SELECT * FROM security WHERE username='{$temp_username}'";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
    echo "<script>window.location='admin_{$page}.php?page={$page}&id={$count}&action=20&name={$post_name}&reply=1'</script>";
}

echo "<table><form action=\"admin_{$page}.php?page={$page}&action=21\" method=\"post\">
<tr><th>{$page} Name :</th><td><input type=\"hidden\" name=\"name\" value=\"{$post_name}\" />{$post_name}</td></tr>
<tr><input type=\"hidden\" name=\"nop\" value=\"{$nop}\" /></tr>
<tr><td><input type=\"hidden\" size=\"30\" maxlength=\"30\" name=\"username\" value=\"{$temp_username}\" /></td></tr>
<tr><td><input type=\"hidden\" size=\"30\" maxlength=\"30\" name=\"password\" value=\"{$temp_password}\" /></td></tr>";
for($i=1;$i<=$nop;$i++){ echo "<tr><th>Post {$i} :</th><td><input type=\"text\" name=\"post{$i}\" maxlength=\"30\" ></td>";}	
echo "<td><input type=\"submit\" value=\"CREATE\" /></td></tr></form></table>"; } ?>