<?php

  include "php/dbconfig.php";

  $sponsorsStatement = "SELECT naam, image_path, url, slogan FROM sponsors";
  $sponsorsResult = mysqli_query($con, $sponsorsStatement);

?>

<?php $title = "Sponsors"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
  <div class="row">
  <?php while($row = mysqli_fetch_assoc($sponsorsResult)){ ?>
    <div class="card col-12 col-lg-3 col-md-4 col-sm-12 sponsor-card mx-3 my-3">
      <img src="<?= $row['image_path'] ?>" alt="Afbeelding <?= $row['naam'] ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?= $row['naam'] ?></h5>
        <p class="card-text"><?= $row['slogan'] ?></p>
        <a href="<?= $row['url'] ?>" class="btn btn-primary btn-sm" target="_blank">Bezoek website</a>
      </div>
    </div>
  <?php } ?>
  </div>
</div>
<?php include 'components/foot.php' ?>