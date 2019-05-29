<?php
  
  include 'php/dbconfig.php';

  $statementStukken = "SELECT * from stukken ORDER BY stuk_id DESC";
  $resStukken = mysqli_query($con, $statementStukken);

  /* DAGEN : per stuk in html
    $statementDagen = "SELECT * FROM stukken INNER JOIN dagen ON stukken.stuk_id = dagen.stuk_id WHERE stukken.stuk_id = " . $row['stuk_id'];
    $resDagen = mysqli_query($con, $statementDagen);
    while($row2 = mysqli_fetch_assoc($resDagen)) {
      <li><?= date("jS F, Y", strtotime($row2["dag"])) ?></li>
}
*/
?>

<?php $title = "voorstellingen"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
    <?php while($row = mysqli_fetch_assoc($resStukken)){ ?>
    <section class="row stuk-row">
        <article class="col-xl-4 offset-xl-1 col-lg-5 col-md-12"
            <?php echo($row['stuk_id']%2 ? 'stuk-tekst' : 'stuk-flyer') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <h2 class="stuk-titel"><?= $row['titel'] ?></h2>
            <p class="stuk-desc"><?= $row['beschrijving'] ?></p>
            <button href="javascript:void(0)" class="button-stuk">Meer lezen</button>
            <?php } else { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } ?>
        </article>
        <div class="col-lg-2"></div>
        <article class="col-xl-4 col-lg-5 col-md-12<?php echo($row['stuk_id']%2 ? 'stuk-tekst' : 'stuk-flyer') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } else { ?>
            <h2 class="stuk-titel"><?= $row['titel'] ?></h2>
            <p class="stuk-desc"><?= $row['beschrijving'] ?></p>
            <button href="javascript:void(0)" class="button-stuk">Meer lezen</button>
            <?php } ?>
        </article>
        <div class="col-xl-1">
    </section>
    <?php } ?>
</div>
<?php include 'components/foot.php' ?>