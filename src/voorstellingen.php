<?php
  
  include 'php/dbconfig.php';

  $statementStukken = "SELECT * from stukken";
  $resStukken = mysqli_query($con, $statementStukken);

?>

<?php $title = "Voorstellingen"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
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
        $statementDagen = "SELECT * FROM stukken INNER JOIN dagen ON stukken.stuk_id = dagen.stuk_id WHERE stukken.stuk_id = " . $row['stuk_id'];
        $resDagen = mysqli_query($con, $statementDagen);
        while($row2 = mysqli_fetch_assoc($resDagen)){ ?>
          <li><?= date("jS F, Y", strtotime($row2["dag"])) ?></li>
        <?php } ?>
      </ul>
    </li>
  </ul>
  <?php }} ?>
</div>
<?php include 'components/foot.php' ?>

<!-- 

  werking:
  Toon alle voorstellingen
  Als stuk_id even is, genereer eerst flyer (col-4), dan tijdlijn (col-2), dan tekst (col-4)
  Oneven = andersom

  Middenstuk is steeds een lijn op volledige hoogte
  Verbindt zich dus met de lijn erboven en eronder
  Kader met het jaartal in het verticale midden

  Lagere resoluties:
  Afbeelding (en tekst?) verstopping zich: alleen titel (en knop)

-->