<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div class="container">
			<div id="user-input">
				<h1>Input Running Data</h1>
				<form action="process.php" method="post" class="login">
					<div class="info-cont">
						<p>Distance (Miles):</p>
						<input type="number" name="miles"/>
					</div>
					<div class="info-cont">
						<p>Duration (Hr:Min:Sec):</p>
						<input type="text" name="duration" value="12:00:00"/>
					</div>
					<div class="info-cont">
						<p>Calories Burned:</p>
						<input type="text" name="calories"/>
					</div>
					<div class="info-cont">
						<p>Avg. Heart Rate:</p>
						<input type="text" name="bpm"/>
					</div>
					<br>
					<input id="submit" type="submit" value="Submit" name="submit"/>
				</form>
			</div>
		</div>
		<footer>
			<div id="footer-cont">
				<a href="log.php">My Progress</a>
			</div>
		</footer>
	</body>
</html>
