<?php

  include "php/dbconfig.php";

  $sponsorsStatement = "SELECT * FROM sponsors";
  $sponsorsResult = mysqli_query($con, $sponsorsStatement);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sponsors</title>
</head>
<body>
<h1>Alle data</h1>
<h2>Sponsors</h2>
    <?php if(mysqli_num_rows($sponsorsResult) > 0){
      while($row = mysqli_fetch_assoc($sponsorsResult)){ ?>
      <b><?= $row['naam'] ?></b>
      <ul>
        <li>Slogan: <?= $row['slogan'] ?></li>
        <li>URL: <?= $row['url'] ?></li>
      </ul>
      <?php }} ?>
  </ul>
  <h2>Gebruikers</h2>
  <ul>
    <?php ?>
  </ul>
  
  <h2>Stukken</h2>
  <ul>
    <?php ?>
  </ul>
  <h2>Reservaties</h2>
  <ul>
    <?php ?>
  </ul>
</body>
</html>
</html>

