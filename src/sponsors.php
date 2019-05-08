<?php

  include "php/dbconfig.php";

  $sponsorsStatement = "SELECT * FROM sponsors";
  $sponsorsResult = mysqli_query($con, $sponsorsStatement);

?>

<!DOCTYPE html>
<head>
  <title>Sponsors</title>
</head>
<body>
<h1>Sponsors</h1>
  <?php if(mysqli_num_rows($sponsorsResult) > 0){
    while($row = mysqli_fetch_assoc($sponsorsResult)){ ?>
    <b><?= $row['naam'] ?></b>
    <ul>
      <li>Slogan: <?= $row['slogan'] ?></li>
      <li>URL: <?= $row['url'] ?></li>
    </ul>
  <?php }} ?>
</body>
</html>
</html>

