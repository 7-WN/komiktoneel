<?php

    $title = "Detail voorstelling";
    include "./components/head.php";
    include "./components/header.php";

    include "php/dbconfig.php";

    if(isset($_GET['id'])){ // als er een GET in url staat
        $statement = "SELECT * FROM stukken WHERE stuk_id=" . $_GET['id'];
    } else { // anders automatisch het laatste stuk oproepen
        $statement = "SELECT * FROM stukken ORDER BY stuk_id DESC LIMIT 1";
    }

    $result = mysqli_query($con, $statement);
    $stuk = mysqli_fetch_assoc($result);

    $rollenStatement = "SELECT * from rollen INNER JOIN users ON rollen.user_id = users.user_id WHERE stuk_id=" . $stuk['stuk_id'];
    $dagenStatement = "SELECT * FROM dagen WHERE stuk_id=" . $stuk['stuk_id'];

?>
<div class="container">
<h1><?= $stuk['titel'] ?></h1>
<img src="<?= $stuk['flyer_path'] ?>" alt="Flyer stuk">
<h2>Rollen</h2>
<ul>
    <?php $rolResult = mysqli_query($con, $rollenStatement);
        while($rol = mysqli_fetch_assoc($rolResult)) { ?>
        <li><?= $rol['naam'] ?> als <?= $rol['rol'] ?></li> <!-- list item aangemaakt per rol voor dit stuk -->
    <?php } ?>
</ul>
<h2>Dagen</h2>
<ul>
    <?php $dagResult = mysqli_query($con, $dagenStatement);
        while($dag = mysqli_fetch_assoc($dagResult)){ ?>
        <li><?= date("l jS F", strtotime($dag["dag"])) ?></li> <!-- list item per dag voor dit stuk -->
    <?php } ?>
</ul>
</div>
<?php include "./components/foot.php" ?>