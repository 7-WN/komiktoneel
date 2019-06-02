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

  /* SMTP SETTINGS */
  $MAIL_DRIVER="smtp";
  $MAIL_HOST="smtp.mailtrap.io";
  $MAIL_PORT="2525";
  $MAIL_USERNAME="d21aa279970d63";
  $MAIL_PASSWORD="7d14befbab6332";
  
  $MAIL_FROM_ADDRESS="komik@testemail.be";
  $MAIL_FROM_NAME="Komik Test";

  /* VARIABELEN DIE GE-EDIT MOETEN WORDEN */
  $maxAantal = 180;
  $prijsPerTicket = 9;