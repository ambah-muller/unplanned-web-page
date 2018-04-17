<html>

	<head>
		<title>chat room</title>
	</head>

	<?php
		session_start();
	?>

	<body align="center" valign="middle">

		<form action="chatroom.php" method="POST">
			Please enter your name below:
			<input type="text" name="username">
			<input type="submit" name="Enter">
		</form>

	</body>

</html>