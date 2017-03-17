<?php
	session_start();
	include('includes/db.php');
	// "SELECT id, c_time, miles, duration, calories, bpm FROM log";
	$sql =  "SELECT * FROM log ORDER BY id DESC";
	$result = $db->query($sql);
 ?>
 <html>
 	<head>
 		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="css/log.css">
    	 <script type="text/javascript" src="js/script.js"></script>
 	</head>
	<body>
	<div class="container">
		<div id="chart-container">
			<div class="overlay"></div>
			<h1>My Progress</h1>
			<div id="chart"></div>
		</div>
		<div id="post-container">
			<div id="posts">
				<?php
					if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					    	echo'<div class="entry">' .
							    	"<p>Date: <span>" . $row["c_time"] . "</span></p>".
							    	"<p>Miles: <span>" . $row["miles"] . "</span></p>".
							    	"<p>Duration: <span>" . $row["duration"] . "</span></p>".
							    	"<p>Calories: <span>" . $row["calories"] . "</span></p>".
							    	"<p>BPM: <span>" . $row["bpm"] . "</span></p>".
					    		"</div>";
					    }
					}
					else {
					    echo "0 results";
					}
				 ?>
			</div>
		</div>
	</div>
	</body>
 </html>
