<?php
  
  $host = "localhost";
  $user = "root";
  $pwd = "";
  $db = "komikdb";

  $conn = new mysqli($host, $user, $pwd, $db);

  if($conn->connect_error){
    die("Connection to database failed: " . $conn->connect_error);
  }

  echo "<script>console.log('Connection to database succeeded')</script>";