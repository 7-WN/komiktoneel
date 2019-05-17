<?php

  include "php/dbconfig.php";

  if(isset($_GET['datum']) && isset($_GET['aantal'])){
    $dagKeuze = $_GET['datum'];
    $aantalKeuze = $_GET['aantal'];
  } else {
    $dagKeuze = null;
    $aantalKeuze = null;
  }

?>

<?php $title = "Reserveren"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">

  <?php if($dagKeuze && $aantalKeuze){ ?>
    <div class="alert alert-primary">
    U gaat voor <b><?= $aantalKeuze ?></b> reserveren op <b><?= $dagKeuze ?></b>
    </div>
  <?php } ?>
  
</div>
<?php include 'components/foot.php' ?>