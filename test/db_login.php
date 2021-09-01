<?php
	$db = mysqli_connect("localhost", "chansi5_admin", "cs28047548", "chansi5_demo") or die("Could not connect: " . mysql_error());
	mysqli_query($db, "SET CHARACTER SET UTF8");
	mysqli_query($db, "SET NAMES UTF8");
?>