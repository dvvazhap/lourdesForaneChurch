<?php
require_once("include/connection.php");
?>
<div class="cleaner_h40"></div>
<div class="container-fluid">
<div class="row" >
	<div class="col-md-12 ">
		<div id='gen_topic'><b><i><?php
			$sql=mysqli_query($db,"SELECT * FROM page_content WHERE page='home' && sub_page=2 && sub_no=1");
			while($row=mysqli_fetch_array($sql)){
				echo $row['sub_content'];
			}
			?></i></b>
		</div>
		<div id='gen_content'>
			<?php
			$sql=mysqli_query($db,"SELECT * FROM page_content WHERE page='home' && sub_page=0");
			while($row=mysqli_fetch_array($sql)){
				echo "<p><b>".$row['sub_title']."</b><br/><span style='margin-left:30px;'>".$row['sub_content']."</span></p>";
			}
			?>
			<span style='margin-left:50px'><?php $sql=mysqli_query($db,"SELECT name FROM contact WHERE position=1");
			while($row=mysqli_fetch_array($sql)){echo "<b><i>".$row['name']."</i></b>"; }?>
			</span>
		</div>	
	</div>
</div>
<div class="cleaner_h40"></div>
<div class="row" >
	<div class="col-md-6" >
		<div class="col-md-12 ">
			<iframe frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
	src='latest_news.php' ></iframe>
		</div>
	</div>
	<div class="col-md-6 ">
	<div class="col-md-12 ">
		<h2 style="color:black"><b><i>IMPORTANT EVENTS</i></b></h2>
		<?php
			$res=mysqli_query($db,"SELECT * FROM events ORDER BY date");
			while($row=mysqli_fetch_array($res)){
			$dt = explode('-',$row['date']);
			$month = $dt[1];
			if($month=='1'){$month='Jan';}elseif($month=='2'){$month='Feb';}elseif($month=='3'){$month='Mar';}elseif($month=='4'){$month='Apr';}
			elseif($month=='5'){$month='May';}elseif($month=='6'){$month='Jun';}elseif($month=='7'){$month='Jul';}elseif($month=='8'){$month='Aug';}
			elseif($month=='9'){$month='Sep';}elseif($month=='10'){$month='Oct';}elseif($month=='11'){$month='Nov';}elseif($month=='12'){$month='Dec';}
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
</div>
</div>
<div class="cleaner"></div>