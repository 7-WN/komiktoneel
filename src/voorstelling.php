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
    <h2><?= $stuk['titel'] ?></h2>
    <section class="row">
        <img src="<?= $stuk['flyer_path'] ?>" alt="Flyer stuk" class="col-12 col-lg-6">
        <article class="col-lg-6">
            <p class="voorstelling-desc"> <?php echo $stuk['beschrijving'] ?> </p>
        </article>
    </section>

    <section class="row">
        <article class="col-md-6">
            <div class="container container-box">
                <div class="row">
                    <table class="voorstelling-tabel col-12">
                        <tr>
                            <td> <strong> Regisseur <strong></td>
                            <td id="regisseur"> <?= $stuk['regisseur']?> </td>
                        </tr>
                        <tr>
                            <td><strong>Schrijver<strong></td>
                            <td id="schrijver"><?= $stuk['schrijver']?> </td>
                        </tr>
                    </table>
                </div>
                <div class="row container-box margin-btn">
                    <div class="col-6 container-box">
                        <a href="./voorstellingen.php">
                            <button class="btn voorstelling-button">Alle voorstellingen </button>
                        </a>
                    </div>
                    <div class="col-6 container-box">
                        <a href="./album.php">
                            <button class="btn voorstelling-button float-right">Foto's</button>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <article class="col-md-6">
            <table class="col-12 voorstelling-tabel">
                <?php $rolResult = mysqli_query($con, $rollenStatement);
        while($rol = mysqli_fetch_assoc($rolResult)) { ?>
                <!-- list item aangemaakt per rol voor dit stuk -->
                <tr>
                    <td><?= $rol['naam']?> </td>
                    <td class="voorstelling-als"> als </td>
                    <td class="voorstelling-rol"><?= $rol['rol'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </article>
    </section>
</div>
<?php include "./components/foot.php" ?>