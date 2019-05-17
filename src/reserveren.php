<?php

  include "php/dbconfig.php";

  if(isset($_GET['submit'])){
    $dagKeuze = $_GET['datum'];
    $aantalKeuze = $_GET['aantal'];
  } else {
    $dagKeuze = null;
    $aantalKeuze = null;
  }

?>

<?php $title = "Reserveren"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container my-3">
<div class="alert alert-primary">
  <?php if($dagKeuze && $aantalKeuze){ ?>
    U gaat voor <b><?= $aantalKeuze ?></b> reserveren op <b><?= $dagKeuze ?></b>
  <?php } else { ?>
    Geen waarden gekozen
  <?php } ?>
  </div>
</div>
<?php include 'components/foot.php' ?>