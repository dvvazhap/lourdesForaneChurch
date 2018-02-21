<?php
require_once("connection.php");
?>
<style>
#entire_content{padding:20px;line-height:5em;font-size:30px; font-style:italic; background-color:white; -webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px; overflow:hidden; }
#entire_content span{line-height:1.5em;}
#head{color:black;font-style:italic; font-size:50px; line-height:1.5em; height:20px; margin-left:-30px; margin-top:-30px; padding:20px 10px 30px 30px;}
</style>
<?php
echo "<div id='entire_content'><div id='head'><center>About Our Church</center></div>";
$page="home"; $sub_page=0;
include("display_page_content.php");
echo "</div>";
?>