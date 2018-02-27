<?php
require_once("connection.php");
?>
<style>
/* #del_button{width:50px; margin-left:550px; margin-top:-50px;} */
#event_wrapper{height:80px; margin-bottom:10px; width:100%;}
.date_wrapper{overflow:hidden; width:100px; height:80px; text-align:center; background-color:#272727; color:white;
    font-family: Superior Title Black,Georgia,serif; line-height: 1.5em;
}
.month{font-size:20px;}
.day{ font-size:60px;}
.event{ font-style:italic; font-size:20px; color:#272727;border:solid #272727;}
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
	echo "<div class='container-fluid'><div class='row'>";
	while($row=mysqli_fetch_array($res)){
		$dt = explode('-',$row['date']);
		$month = $dt[1];
		if($month=='1'){$month='January';}elseif($month=='2'){$month='February';}elseif($month=='3'){$month='March';}elseif($month=='4'){$month='April';}
		elseif($month=='5'){$month='May';}elseif($month=='6'){$month='June';}elseif($month=='7'){$month='July';}elseif($month=='8'){$month='August';}
		elseif($month=='9'){$month='September';}elseif($month=='10'){$month='October';}elseif($month=='11'){$month='November';}elseif($month=='12'){$month='December';}
		$day = $dt[2];
		$id=$row['id'];
		echo "<div class='col-md-6'><div class='row'><div class='col-md-3 date_wrapper'><div class='month'>{$month}</div><div class='day'>{$day}</div></div><div class='col-md-5 event'>{$row['event']}</div><div class='col-md-3' id='del_button' ><button onclick='delete_event({$id})'>DELETE</button></div></div><br/><br/></div>";
	}
	echo "</div></div>";
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
echo "<div class='container-fluid'>	<div class='row'><div class='col-md-12'>EVENT DETAILS</div></div><div class='row'><div class='col-md-2'>Date:<br/><br/></div><div class='col-md-2'><select id='days'>";
for($i=1;$i<=31;$i++)echo "<option value='{$i}'>{$i}</option>";
echo"</select></div><div class='col-md-4'><select id='month'><option  value='1'>January</option><option value='2'>February</option><option value='3'>March</option><option value='4'>April</option>
<option value='5'>May</option><option value='6'>June</option><option value='7'>July</option><option value='8'>August</option>
<option value='9'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option>
</select></div><div class='col-md-3'><select id='year'>";
for($j=2018;$j<=2030;$j++)echo "<option value='{$j}'>{$j}</option>";
echo "</select></div></div><div class='row'><div class='col-md-2'>Event:</div><div class='col-md-8'><textarea rows='2' cols='30' id='event' ></textarea></div>
<div class='col-md-2'><button onclick='save_event()'>Save</button></div></div></div>";
}
?>