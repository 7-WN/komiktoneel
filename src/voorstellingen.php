<?php

  include 'php/dbconfig.php';

  $statement = "SELECT * FROM stukken";
  $result = mysqli_query($con, $statement);

?>

<?php include 'components/head.php' ?>
<?php include 'components/header.php' ?>

<h1>Voorstellingen</h1>
<?php if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){ ?>
  <h2><?= $row['titel'] ?></h2>
  <ul>
    <li>Beschrijving: <?= $row['beschrijving'] ?></li>
    <li>Regisseur: <?= $row['regisseur'] ?></li>
    <li>Schrijver: <?= $row['schrijver'] ?></li>
    <li><b>Dagen: </b>Dag 1, Dag 2, Dag 3</li>
  </ul>
  <?php }} ?>

<?php include 'components/foot.php' ?>