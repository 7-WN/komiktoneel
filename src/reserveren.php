<?php

  include "php/dbconfig.php";
 
  /* MAXIMUM AANTAL TOESCHOUWERS PER DAG */
  $maxAantal = 180;

  session_start();

  /* ZET HET STUK */
  if(isset($_GET['stuk'])){
    $stukKeuze = $_GET['stuk'];
    $stukStatement = "SELECT * FROM stukken WHERE actief=1 AND stuk_id=" . $stukKeuze;
    $stukResult = mysqli_query($con, $stukStatement);
  } else {
    $stukKeuze = false;
    $stukStatement = "SELECT * FROM stukken WHERE actief=1 ORDER BY stuk_id DESC LIMIT 1";
    $stukResult = mysqli_query($con, $stukStatement);
  }
  
  /* CHECK OF KEUZES GEMAAKT ZIJN VIA FORM OP HOMEPAGINA */
  if(isset($_GET['datum']) && isset($_GET['aantal'])){
    $dagKeuze = $_GET['datum'];
    $aantalKeuze = $_GET['aantal'];
  }

  /* CHECK OF ER SESSIEVARIABELEN ZIJN */
  if(isset($_SESSION['dag']) && isset($_SESSION['aantal'])){
      $dagKeuze = $_SESSION['dag'];
      $aantalKeuze = $_SESSION['aantal'];
  }

?>

<?php $title = "Reserveren"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
    <section class="row">
        <figure class="progress-margin">
            <a href="./reserveren.php">
                <img src="./images/arrow-1-dark.png" alt="Pijtljes" class="progress-arrow-active">
            </a>
            <img src="./images/arrow-2-light.png" alt="Pijtljes" class="progress-arrow">
            <img src="./images/arrow-3-light.png" alt="Pijtljes" class="progress-arrow">
        </figure>
    </section>
    <span style="text-align:justify">
        <p> Denk eraan: eerst besteld is eerst gesteld. Vroegere reservaties worden
            dichter tegen
            het podium geplaatst.
            We kunnen hier geen uitzonderingen in maken.
        </p>
    </span>

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
        <div class="form-row">
            <div class="form-group col-12 een-dag <?php if(isset($dagKeuze) && $dagKeuze === $dag['dag_id']){ echo "gekozen-dag"; } ?>">
                <span class="progress-label">
                    <input class="mr-3" id="dagInputBox" type="radio" name="dag" value=<?= $dag["dag_id"] ?> <?php if(isset($dagKeuze) || isset($_SESSION['dagkeuze'])) { 
                            echo $dagKeuze === $dag["dag_id"] ? "checked" : "" ;
                        } ?> required />
                    <?= date("l jS F, G:i", strtotime($dag["dag"])) ?>u
                </span>
                <div class="progress col-12 col-md-6">
                    <div class="progress-bar" role="progressbar" style="<?= "width: " . $dagPercent . "%;" ?>"
                        aria-valuenow=<?= $dagAantal['totaalAantal'] ?> aria-valuemin="0"
                        aria-valuemax=<?= $maxAantal ?>>
                        <?= floor($dagPercent) ?>%
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <br />
        <div class="form-group row">
            <article class="offset-md-5 col-xs-2">
                <h3>Aantal plaatsen</h3>
                <input class="form-control input-aantal" max-length="8" type="number" name="aantal" min="1"
                    value="<?= isset($aantalKeuze) ? $aantalKeuze : "" ?>" required />
                <button name="submit" type="submit" class="button btn-next">Volgende stap</button>
            </article>
        </div>
        <?php }} else /* if($stukResult) */ { ?>
        Reservaties zijn momenteel niet open
        <?php } ?>
    </form>
</div>
<?php include 'components/foot.php' ?>