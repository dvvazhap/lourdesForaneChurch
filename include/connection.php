<?php
	$db = mysqli_connect('localhost','root','','church');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	function mysqli_prep($db, $value){
		$new_enough_php = function_exists("mysqli_real_escape_string"); 
		if($new_enough_php){
			$value = mysqli_real_escape_string($db, $value);
		} 
		return $value; 
	}
?>