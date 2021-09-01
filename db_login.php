<?php
	$db = mysqli_connect("localhost", "root", "", "test") or die("Could not connect: " . mysql_error());
	mysqli_query($db, "SET CHARACTER SET UTF8");
?>