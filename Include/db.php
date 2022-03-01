<?php
  //We establish a connection with our database
  $Connection = mysqli_connect("localhost", "root", "");
  $ConnectingDB = mysqli_select_db($Connection, "registration_system");
?>