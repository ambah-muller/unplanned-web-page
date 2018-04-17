<html>

	<head>
		<!--Refresh every 2 sec-->
		<meta http-equiv="refresh" content"2">  
	</head>

	<body>
		<?php
			//this is where server messages will go

			//connect to db
			$link = mysqli_connect('localhost', 'IMuser', 'IMuser', 'IM');

			if(!$link)
			{
				die("Could not connect: " .mysqli_error());
			}
			else
			{
				//echo 'connect test' ;
			}

			//query the database
			$query = "SELECT * FROM messages";

			if ($result = mysqli_query($link, $query))
			{
				//fetch ass array
				while($row = mysqli_fetch_row($result))
				{
					echo $row['3']. 'says: '.$row['1'].'</br>';
				}
				mysqli_free_result($result);
			}

			//close connection
			mysqli_close($link);
		?>
</html>