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

<?php $title = "Voorstellingen"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
    <?php while($row = mysqli_fetch_assoc($resStukken)){ ?>
    <section class="row stuk-row">
        <article class="col-4 offset-1 <?php echo($row['stuk_id']%2 ? 'stuk-tekst links' : 'stuk-flyer links') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <h2 class="stuk-titel links"><?= $row['titel'] ?></h2>
            <p class="stuk-desc links"><?= $row['beschrijving'] ?></p>
            <button href="javascript:void(0)" class="btn btn-primary btn-sm">Meer lezen</button>
            <?php } else { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } ?>
        </article>
        <div class="col-2 stuk-midden"></div>
        <article class="col-4 <?php echo($row['stuk_id']%2 ? 'stuk-tekst rechts' : 'stuk-flyer rechts') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } else { ?>
            <h2 class="stuk-titel rechts"><?= $row['titel'] ?></h2>
            <p class="stuk-desc rechts"><?= $row['beschrijving'] ?></p>
            <button href="javascript:void(0)" class="btn btn-primary btn-sm">Meer lezen</button>
            <?php } ?>
        </article>
        <div class="col-1"></div>
    </section>
    <?php } ?>
</div>
<?php include 'components/foot.php' ?>