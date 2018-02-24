<?php
require_once("include/connection.php");
?>
<div class="container-fluid">
<div class="row">
		<div id='gen_topic' class="col-md-12"><h2 class="heading"><?php
			$sql=mysqli_query($db,"SELECT * FROM page_content WHERE page='home' && sub_page=2 && sub_no=1");
			while($row=mysqli_fetch_array($sql)){
				echo $row['sub_content'];
			}
			?></h2>
		</div>
		<div id='gen_content'>
			<?php
			$sql=mysqli_query($db,"SELECT * FROM page_content WHERE page='home' && sub_page=0");
			while($row=mysqli_fetch_array($sql)){
				echo "<p><b>".$row['sub_title']."</b><span style='margin-left:30px;'>".$row['sub_content']."</span></p>";
			}
			?>
		</div>
</div>
<div class="cleaner_h40"></div>
<div class="row" >
	<div class="col-md-6">
		<div><h2 class="heading">LATEST UPDATES</h2></div>
		<iframe id="latestNewsFrame" frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='latest_news.php' ></iframe>
	</div>
	<div class="col-md-6">
		<h2 class="heading">IMPORTANT EVENTS</h2>
		<?php
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
			<div class='event'><b>{$row['event']}</b></div>
			</div>";
			}
		?>
	</div>
</div>
<div class="cleaner_h40"></div>
<div class="row">
	<div class="col-md-12" >
		<h2 class="heading">CONTACT US<h2>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-4 contact">
		<h3>Lourdes Forane Church</h3>Sathy Road, Near GP Hospital<br/>Gandhipuram, Coimbatore<br/>Tamil Nadu, India<br/>Pincode: 641012<br/><br/>Tel: 0422-2525284
	</div>
	<div class="col-md-4">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15665.119239035694!2d76.96981929666941!3d11.017620532050037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85853e2d5501d%3A0x221ec16d5881ee34!2sLourdes+Forane+Church!5e0!3m2!1sen!2sin!4v1519182694742" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="col-md-4 contact">
	<?php $sql="SELECT * FROM contact WHERE position=1"; $result=mysqli_query($db,$sql); if(!$result){ die("Error ".mysqli_connect_error());}
		while($row=mysqli_fetch_array($result)){echo "<h3 style='color:#002537'>{$row['name']}</h3>";if($row['phone']!=""){echo "Phone: +91-{$row['phone']}<br/>";} if($row['email']!=""){echo "EMail: {$row['email']}<br/>";}echo "<br/><br/><br/>";}
		$sql="SELECT * FROM contact WHERE position=2"; $result=mysqli_query($db,$sql); if(!$result){ die("Error ".mysqli_connect_error());}
		while($row=mysqli_fetch_array($result)){ echo "<h3 style='color:#002537'>{$row['name']}</h3>";if($row['phone']!=""){echo "Phone: +91-{$row['phone']}<br/>";} if($row['email']!=""){echo "EMail: {$row['email']}<br/>";}} ?>
	</div>
</div>
</div>
<div class="cleaner"></div>
<!-- Contact/Area Container -->
