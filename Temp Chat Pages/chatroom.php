<?php
	session_start();

	//echo $_POST['username'];
	$_SESSION['username']=$_POST['username'];
?>


<html>

	<head>
		<title>chat room</title>
	</head>

	<FRAMESET cols="200, *">
		<FRAME src="sidebar.php">
		<FRAMESET rows="*, 200">
			<FRAME src="messages.php">
			<FRAME src="message.php">
		</FRAMESET>
	</FRAMESET>


</html>


