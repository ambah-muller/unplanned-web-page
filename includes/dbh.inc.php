<?php
  $dbServername="localhost";
  $dbUsername="root";
  $dbPassword=""; //xampp by deafult doesnt hve a password
  $dbName=""; //Unplanned Pregnancy Database Name

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
  //Connection - refer to this page each time need to connect to db
?>
