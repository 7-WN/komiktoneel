<?php
  
  $host = "localhost";
  $user = "root";
  $pwd = "";
  $db = "komikdb";

  $con = mysqli_connect($host, $user, $pwd, $db);

  if($con->connect_error){
    die("Connection to database failed: " . $con->connect_error);
  }

  echo "<script>console.log('Database connection succesful')</script>";