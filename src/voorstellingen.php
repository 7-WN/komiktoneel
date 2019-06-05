<?php
  
  $title = "Voorstellingen";
  include 'components/head.php';
  include 'components/header.php';

  include 'php/dbconfig.php';

  $statementStukken = "SELECT * from stukken ORDER BY stuk_id DESC";
  $resStukken = mysqli_query($con, $statementStukken);

?>

<div class="container">
    <?php while($row = mysqli_fetch_assoc($resStukken)){ ?>
    <section class="row stuk-row">
        <article class="col-xl-4 offset-xl-1 col-lg-5 col-md-12"
            <?php echo($row['stuk_id']%2 ? 'stuk-tekst' : 'stuk-flyer') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <h2 class="stuk-titel"><?= $row['titel'] ?></h2>
            <p class="stuk-desc"><?= $row['beschrijving'] ?></p>
            <a href="./voorstelling.php?id=<?= $row['stuk_id'] ?>"><button class="button-stuk">Meer lezen</button></a>
            <?php } else { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } ?>
        </article>
        <div class="col-lg-2 timeline">
            <div class="timeline__group d-none d-lg-block">
                <span class="timeline__year d-none d-lg-block">
                    <?= $row['jaar']?></span>
            </div>
        </div>
        <article class="col-xl-4 col-lg-5 col-md-12<?php echo($row['stuk_id']%2 ? 'stuk-tekst' : 'stuk-flyer') ?>">
            <?php if($row['stuk_id']%2) { ?>
            <img class="stuk-flyer" src="<?= $row['flyer_path'] ?>" />
            <?php } else { ?>
            <h2 class="stuk-titel"><?= $row['titel'] ?></h2>
            <p class="stuk-desc"><?= $row['beschrijving'] ?></p>
            <a href="./voorstelling.php?id=<?= $row['stuk_id'] ?>"> <button class="button-stuk">Meer lezen </button></a>
            <?php } ?>
        </article>
        <div class="col-xl-1">
    </section>
    <?php } ?>
</div>
<?php include 'components/foot.php' ?>