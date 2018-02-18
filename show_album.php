<?php
	require_once("include/connection.php");
	if(isset($_GET['page'])){$page=$_GET['page'];}
	if(isset($_GET['sub_page'])){$sub_page=$_GET['sub_page'];}
	if(isset($_GET['page_name'])){$page_name=$_GET['page_name'];}
	echo "<h1 style='color:black'>{$page_name}</h1>";
	?>
	<style>
	a#next_page_button,a#prev_page_button{border:solid red;
	display:none;position:absolute;width:41px;height:40px;cursor:pointer;margin-top:-20px;top:50%;
	background:transparent url(images/buttons.png) no-repeat 0px -40px;}
a#prev_page_button{left:0px; position:relative;}
a#next_page_button{right:0px;background-position:-41px -40px; position:relative;}
a#next_page_button:hover{background-position:-41px 0px;}
a#prev_page_button:hover{background-position:0px 0px;}
.book_wrapper{margin:0 auto;padding:0px; position:relative;background:none; overflow:scoll;}
.book_wrapper img{cursor:pointer; margin:10px 0px 5px 15px;width:20%;height:80px;
padding:4px;border:1px solid #ddd;-moz-box-shadow:1px 1px 1px #fff;-webkit-box-shadow:1px 1px 1px #fff;box-shadow:1px 1px 1px #fff;}
/*.book_wrapper h1{color:#13386a;margin:5px 5px 5px 15px;font-size:26px;background:transparent url(../images/h1.png) no-repeat bottom left;padding-bottom:7px;}
.book_wrapper p{font-size:16px;margin:5px 5px 5px 15px;}
.book_wrapper a.article,.book_wrapper a.demo{
background:transparent url(../images/circle.png) no-repeat 50% 0px;display:block;width:95px;height:41px;text-decoration:none;outline:none;font-size:16px;color:#555;float:left;line-height:41px;padding-left:47px;}
.book_wrapper a.demo{margin-left:50px;}
.book_wrapper a.article:hover,.book_wrapper a.demo:hover{background-position:50% -41px;color:#13386a;}
.book_wrapper img{margin:10px 0px 5px 35px;width:300px;height:300px;padding:4px;border:1px solid #ddd;-moz-box-shadow:1px 1px 1px #fff;-webkit-box-shadow:1px 1px 1px #fff;box-shadow:1px 1px 1px #fff;}
.booklet .b-wrap-right img{border:1px solid #E6E3C2;}
*/
	</style>
	<div class="book_wrapper">
<a id="next_page_button" style="border:2px solid black"></a><a id="prev_page_button" style="border:2px solid black"></a>
<?php
$sql="SELECT * FROM albums WHERE page_name='{$page_name}'"; $res=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($res)){
	$pagee=$row['page'];
	$image=$row['name'];
	
	if($pagee=='gallery'){
		echo "<img src='images/gallery/gallery/{$page_name}/{$image}' onclick=\"show_album_image(this.src)\" alt=''/>";	
	}
	else if(($pagee=='wards')||($pagee=='associations')){
		$page=$row['page'];
		$image=$row['name'];
		$sub_page=$row['sub_page'];
		echo "<img src='images/gallery/{$page}/{$sub_page}/{$image}'  onclick=\"show_album_image(this.src)\" alt=''/>";
	}
}
?>
</div>
<div id='show_album_image'></div>