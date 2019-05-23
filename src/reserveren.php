<?php

  include "php/dbconfig.php";

  if(isset($_GET['stuk'])){
    $stukKeuze = $_GET['stuk'];
    $stukStatement = "SELECT * FROM stukken WHERE actief=1 AND stuk_id=" . $stukKeuze;
    $stukResult = mysqli_query($con, $stukStatement);
  } else {
    $stukKeuze = false;
    $stukStatement = "SELECT * FROM stukken WHERE actief=1 ORDER BY stuk_id DESC LIMIT 1";
    $stukResult = mysqli_query($con, $stukStatement);
  }
  
  if(isset($_GET['datum']) && isset($_GET['aantal'])){
    $dagKeuze = $_GET['datum'];
    $aantalKeuze = $_GET['aantal'];
  }

?>

<?php $title = "Reserveren"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
<main class="container">
    <section class="row">
        <div class="arrow-dark col-3">
            <p class="arrow-text-active">
                Datum
            </p>
        </div>
        <div class="arrow-light col-3">
            <p class="arrow-text-inactive">
                Betaling
            </p>
        </div>
        <div class="arrow-light col-3">
            <p class="arrow-text-inactive">
                Afronding
            </p>
        </div>
    </section>
    <p> Denk eraan: eerst besteld is eerst gesteld. Vroegere reservaties worden dichter tegen het podium geplaatst.
        We kunnen hier geen uitzonderingen in maken.</p>

    <article>
        <input type="checkbox" aria-label="Checkbox for following text input">
    </article>

  <form class="form" action="./reserveren-gegevens.php" method="POST">
    <?php if($stukResult){ 
      while($row = mysqli_fetch_assoc($stukResult)){
        $dagenStatement = "SELECT dag_id, dag FROM dagen INNER JOIN stukken ON dagen.stuk_id = stukken.stuk_id WHERE stukken.stuk_id =" . $row['stuk_id'];
        $dagenResult = mysqli_query($con, $dagenStatement); ?>
      <h2>Uw reservatie voor <?= $row['titel'] ?></h2>
      <p>Dagen:</p>
      <ul>
      <!-- PER DAG -->
        <?php while($dag = mysqli_fetch_assoc($dagenResult)){ ?>
          <li>
            <span class="col-4"><?= date("jS F, G:i", strtotime($dag["dag"])) ?>u</span>
            <div class=" col-4 progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valumax="100"></div>
            </div>
          </li>
        <?php } ?>
    </ul>
      <h3>Aantal:</h3>
      <input class="col-1 form-control" type="number" name="aantal" value="<?= isset($aantalKeuze) ? $aantalKeuze : 0 ?>" />
      <button type="submit" class="button">Volgende</button>
    <?php }} else /* if($stukResult) */ { ?>
      Reservaties zijn momenteel niet open
    <?php } ?>
  </form>
</div>
<?php include 'components/foot.php' ?>