<?php

  include 'php/dbconfig.php';

  $statementStukken = "SELECT * from stukken";
  $resStukken = mysqli_query($con, $statementStukken);

  $statementDagen = "SELECT * FROM dagen /*INNER JOIN dagen ON stukken.stuk_id = dagen.stuk_id*/";
  $resDagen = mysqli_query($con, $statementDagen);

?>

<?php include 'components/head.php' ?>
<?php include 'components/header.php' ?>

<h1>Voorstellingen</h1>
<?php if(mysqli_num_rows($resStukken) > 0){
  while($row = mysqli_fetch_assoc($resStukken)){ ?>
  <h2><?= $row['titel'] ?></h2>
  <ul>
    <li>Beschrijving: <?= $row['beschrijving'] ?></li>
    <li>Regisseur: <?= $row['regisseur'] ?></li>
    <li>Schrijver: <?= $row['schrijver'] ?></li>
    <li><b>Dagen: </b>
      <ul>
        <?php while($row2 = mysqli_fetch_assoc($resDagen)){
          if($row2['stuk_id'] === $row['stuk_id']){ ?>
          <li><?= date("jS F, Y", strtotime($row2["dag"])) ?></li>
        <?php } else { break; }} ?>
      </ul>
    </li>
  </ul>
  <?php }} ?>

<?php include 'components/foot.php' ?>