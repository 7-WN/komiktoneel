<?php

  include "php/dbconfig.php";
 
  /* MAXIMUM AANTAL TOESCHOUWERS PER DAG */
  $maxAantal = 180;

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

  if(isset($_SESSION['dag']) && isset($_SESSION['aantal'])){
      header("Location: reserveren-gegevens.php");
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
                    Gegevens
                </p>
            </div>
            <div class="arrow-light col-3">
                <p class="arrow-text-inactive">
                    Betaling
                </p>
            </div>
        </section>
        <p> Denk eraan: eerst besteld is eerst gesteld. Vroegere reservaties worden dichter tegen het podium geplaatst.
            We kunnen hier geen uitzonderingen in maken.</p>

        <form class="form" action="./reserveren-gegevens.php" method="POST">
            <?php if($stukResult){ 
      /*HAAL STUK UIT DATABASE DAT ACTIEF STAAT*/
      while($stuk = mysqli_fetch_assoc($stukResult)){
        /* HAAL ALLE DAGEN VAN DAT STUK UIT DB */
        $dagenStatement = "SELECT dag_id, dag FROM dagen INNER JOIN stukken ON dagen.stuk_id = stukken.stuk_id WHERE stukken.stuk_id =" . $stuk['stuk_id'];
        $dagenResult = mysqli_query($con, $dagenStatement); ?>
            <h2>Uw reservatie voor <?= $stuk['titel'] ?></h2>
            <p>Dagen:</p>
                <?php while($dag = mysqli_fetch_assoc($dagenResult)){
                    $dagAantalStatement = "SELECT SUM(aantal) AS 'totaalAantal' FROM reservaties WHERE dag_id=" . $dag["dag_id"]; 
                    $dagAantalResult = mysqli_query($con, $dagAantalStatement);
                    $dagAantal = mysqli_fetch_assoc($dagAantalResult);
                    $dagPercent = 100 * ($dagAantal['totaalAantal'] / $maxAantal) ?>
                <div class="row">
                    <span class="progress-label">
                    <input 
                        class="mr-3" 
                        type="radio" 
                        name="dag" 
                        value=<?= $dag["dag_id"] ?>
                        <?php if(isset($dagKeuze)) { 
                            echo $dagKeuze === $dag["dag_id"] ? "checked" : "" ;
                        } ?>
                        required
                    />
                    <?= date("jS F, G:i", strtotime($dag["dag"])) ?>u
                    </span>
                    <div class="progress col-8">
                        <div 
                            class="progress-bar" 
                            role="progressbar" 
                            style="<?= "width: " . $dagPercent . "%;" ?>"
                            aria-valuenow=<?= $dagAantal['totaalAantal'] ?>
                            aria-valuemin="0" 
                            aria-valuemax=<?= $maxAantal ?>>
                        <?= floor($dagPercent) ?>%
                        </div>
                    </div>
                </div>
                <?php } ?>
                <br />
            <h3>Aantal:</h3>
            <input 
                class="col-1 form-control" 
                type="number" 
                name="aantal"
                min="1"
                value="<?= isset($aantalKeuze) ? $aantalKeuze : 0 ?>" 
                required />
            <button name="submit" type="submit" class="button">Volgende</button>
            <?php }} else /* if($stukResult) */ { ?>
            Reservaties zijn momenteel niet open
            <?php } ?>
        </form>
</div>
<?php include 'components/foot.php' ?>