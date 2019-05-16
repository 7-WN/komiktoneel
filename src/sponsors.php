<?php

  include "php/dbconfig.php";

  $sponsorsStatement = "SELECT * FROM sponsors";
  $sponsorsResult = mysqli_query($con, $sponsorsStatement);

?>

<?php $title = "Sponsors"; include 'components/head.php' ?>

<body>
    <?php include 'components/header.php' ?>

    <h1>Sponsors</h1>
    <?php if(mysqli_num_rows($sponsorsResult) > 0){
    while($row = mysqli_fetch_assoc($sponsorsResult)){ ?>
    <b><?= $row['naam'] ?></b>
    <ul>
        <li>Slogan: <?= $row['slogan'] ?></li>
        <li>URL: <?= $row['url'] ?></li>
    </ul>
    <?php }} ?>
    <?php include 'components/foot.php' ?>