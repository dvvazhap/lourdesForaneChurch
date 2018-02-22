<?php
require_once("connection.php");
?>
<style>
#event_wrapper{ height:80px; margin-bottom:20px; width:600px;}
.date_wrapper{ width:100px; border:2px solid #272727; text-align:center; font-size:25px; color:#272727;}
.month{height:35px; background-color:red;}
.day{ height:35px; background-color:green;}
.event{position:absolute; border:2px solid #272727; background-color:white; margin-left:101px; margin-top:-74px; height:70px; width:430px;font-size:18px; color:#272727;}
#del_button{width:50px; margin-left:550px; margin-top:-50px;}
</style>
<?php
if(isset($_POST['show'])){
	$q = mysqli_query($db,"SELECT * FROM events");
	while($row=mysqli_fetch_array($q)){
	$event_date = $row['date'];
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	$exp_date = strtotime($event_date);
	if ($exp_date < $today) {$a = mysqli_query($db,"DELETE FROM events WHERE id = {$row['id']}");}
	}
	$res=mysqli_query($db,"SELECT * FROM events ORDER BY date");
	while($row=mysqli_fetch_array($res)){
	$dt = explode('-',$row['date']);
	$month = $dt[1];
	if($month=='1'){$month='January';}elseif($month=='2'){$month='February';}elseif($month=='3'){$month='March';}elseif($month=='4'){$month='April';}
	elseif($month=='5'){$month='May';}elseif($month=='6'){$month='June';}elseif($month=='7'){$month='July';}elseif($month=='8'){$month='August';}
	elseif($month=='9'){$month='September';}elseif($month=='10'){$month='October';}elseif($month=='11'){$month='November';}elseif($month=='12'){$month='December';}
	$day = $dt[2];
	$id=$row['id'];
	echo "<div id='event_wrapper'>
	<div class='date_wrapper'><div class='month'>{$month}</div><div class='day'>{$day}</div></div>
	<div class='event'>{$row['event']}</div>
	<div id='del_button'><button onclick='delete_event({$id})'>DELETE</button></div>
	</div>";
	}
}
elseif(isset($_POST['date'])){
$date = mysqli_prep($db,$_POST['date']);
$event = mysqli_prep($db,$_POST['event']);
$id = rand(1,99999);
$sql = mysqli_query($db,"INSERT INTO events(id,date,event) VALUES({$id},'{$date}','{$event}')");
}
elseif(isset($_POST['id'])){
$id = $_POST['id'];
$q = mysqli_query($db,"DELETE FROM events WHERE id={$id}");
}
elseif(isset($_GET['create_event'])){
echo "<center>Create an event</center><br/>
	<table><tr><th>
	Date </th><th>:</th></th><td><select id='days'>";
	for($i=1;$i<=31;$i++)echo "<option value='{$i}'>{$i}</option>";
	echo "</select><select id='month'>
	<option  value='1'>January</option><option value='2'>February</option><option value='3'>March</option><option value='4'>April</option>
	<option value='5'>May</option><option value='6'>June</option><option value='7'>July</option><option value='8'>August</option>
	<option value='9'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option>
	</select><select id='year'>";
	for($j=2012;$j<=2030;$j++)echo "<option value='{$j}'>{$j}</option>";
	echo "</select></td><td></td></tr>
	<tr><th>Event </th><th>:</th><td><textarea rows='3' cols='30' id='event' ></textarea></td></tr></table>
	<button onclick='save_event()'>Save</button>";
}
?>