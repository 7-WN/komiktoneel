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
  <section>
    <?php if($stukResult){ 
      while($row = mysqli_fetch_assoc($stukResult)){
        $dagenStatement = "SELECT dag_id, dag FROM dagen INNER JOIN stukken ON dagen.stuk_id = stukken.stuk_id WHERE stukken.stuk_id =" . $row['stuk_id'];
        $dagenResult = mysqli_query($con, $dagenStatement); ?>
      <h2>Uw reservatie voor <?= $row['titel'] ?></h2>
      <p>Dagen:</p>
      <ul>
      <!-- PER DAG -->
        <?php while($dag = mysqli_fetch_assoc($dagenResult)){ ?>
          <li><?= date("jS F, G:i", strtotime($dag["dag"])) ?>u</li>
        <?php } ?>
    </ul>
    <input type="number" name="aantal" value="<?= isset($aantalKeuze) ? $aantalKeuze : 0 ?>" />
    <?php }} else /* if($stukResult) */ { ?>
      Reservaties zijn momenteel niet open
    <?php } ?>
  </section>
</div>
<?php include 'components/foot.php' ?>