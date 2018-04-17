<?php

	//$message = $_POST['message'];
	//$username = $_SESSION['username'];
	session_start();

	if (ISSET($_POST['message']))
	{
		//connect db
		$link = mysqli_connect('localhost', 'IMuser', 'IMuser', 'IM');

		if(!$link)
		{
			die("Could not connect: " .mysqli_error());
		}
		else
		{
			//echo 'connect test' ;
		}

		$message = mysqli_real_escape_string($link, $city);
		$username = mysqli_real_escape_string($link, $city);

		$sql = "INSERT INTO messages (message, username) VALUES ('$message', '$username')";

		$result = msqli_query($link, $sql);

		//Close connection
		mysqli_close($link);
	}

	echo '<html><head></head><body>';
	echo '<form action="message.php" method="POST">';
	echo '<input type="text" name="message">';
	echo '<input type="submit" name="Send"/>';
	echo '</form>';
	echo '</body></html>';
?>