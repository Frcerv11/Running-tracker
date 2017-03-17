<?php
	session_start();
	include('includes/db.php');

	$errors = [];
	$_SESSION['post-data'] = $_POST;
	$time =  date("H:i:s", strtotime($_POST['duration']));
	$time = str_replace(":","",$time);
	if(isset($_POST['submit'])){
		$miles = $_POST['miles'];
		$duration = $time;
		$calories = $_POST['calories'];
		$bpm = $_POST['bpm'];
		// $miles = $db->real_escape_string($miles);
		// $body = $db->real_escape_string($body);
		$query = $db->query("INSERT INTO log (id, c_time, miles, duration, calories, bpm) VALUES(NULL,NOW(),'$miles','$duration','$calories','$bpm')");
		if($query){
			header("Location: index.php");
		}else{
			echo "error";
		}
	}else{
		echo "false";
	}
?>
