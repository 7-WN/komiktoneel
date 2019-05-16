<?php
  
  include 'php/dbconfig.php';

  $statementStukken = "SELECT * from stukken";
  $resStukken = mysqli_query($con, $statementStukken);

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
    <li>Flyer: <img style="width: 350px; height: 200px; border: 2px solid black;" src="<?= $row['flyer_path'] ?>" /></li>
    <li><b>Dagen: </b>
      <ul>
        <?php 
        $statementDagen = "select * from stukken inner join dagen on stukken.id = dagen.stuk_id where stukken.id = " . $row['id'];
        $resDagen = mysqli_query($con, $statementDagen);
        while($row2 = mysqli_fetch_assoc($resDagen)){ ?>
          <li><?= date("jS F, Y", strtotime($row2["dag"])) ?></li>
        <?php } ?>
      </ul>
    </li>
  </ul>
  <?php }} ?>

<?php include 'components/foot.php' ?>