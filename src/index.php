<?php

    include "php/dbconfig.php";
    $statement = "SELECT * FROM stukken ORDER BY stuk_id DESC LIMIT 1";

    $result = mysqli_query($con, $statement);
    $stuk = mysqli_fetch_assoc($result);

?>

<?php $title = "Komik Toneel"; include 'components/head.php' ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php">
                <img src="./images/logo-zwartwit.png" alt="Logo komiktoneel" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="./index.php">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="./over.php">Over</a>
                    <a class="nav-item nav-link" href="./reserveren.php">Reserveren</a>
                    <a class="nav-item nav-link" href="./voorstellingen.php">Voorstellingen</a>
                    <a class="nav-item nav-link" href="./album.php">Foto's</a>
                    <a class="nav-item nav-link" href="./contact.php">Contact</a>
                </div>
            </div>
        </nav>
    </header>

        <main>
            <section class="hero-image">
                <img class="hero-image" src="./images/Hero.jpg" alt="Foto" />
                <div class="hero-text">
                    <h1>Komik Toneel</h1>
                </div>
                <div class="hero-text2">
                    <p>Volgend stuk</p>
                    <p span style="font-size:2rem;"><?= $stuk["titel"] ?></p>
                    <button class="button">Reserveer nu</button>
                </div>
            </section>

        <div class="container">
            <section class="reservatie">
                <div class="row">

                    <div class="col-12 col-sm-4">

                        <img class="affiche" alt="Affiche huidig stuk" src='<?= $stuk["flyer_path"] ?>' />

                    </div>
                    <div class="col-12 col-sm-8">
                        <p class="huidigstuk"><?= $stuk["titel"] ?></p>
                        <p class="samenvatting">
                            <?= $stuk["beschrijving"] ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <form class="form-inline form-pos col-sm-8 offset-sm-4" action="reserveren.php">

                        <div class="form-group btn-position">
                            <label for="Aantal">Aantal</label>
                            <input class="form-control input-size" type="number" name="seats" max="40" min="1"
                                placeholder="0" />
                        </div>
                        <div class="form-group btn-position">
                            <label for="Datum">Dag</label>
                            <select class="formulier custom-select form-control select-size" name="datum">
                                <option value="keuze" disabled selected>
                                    Kies een datum
                                </option>
                                <?php $statementDagen = "SELECT dag_id, dag FROM dagen INNER JOIN stukken ON dagen.stuk_id = stukken.stuk_id WHERE stukken.stuk_id = " . $stuk['stuk_id'];
                            $resultDagen = mysqli_query($con, $statementDagen);
                            while($row = mysqli_fetch_assoc($resultDagen)){ ?>
                                <option value="<?= $row['dag_id'] ?>"><?= date("jS F, G:i", strtotime($row["dag"])) ?>u
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                </div>

                <div class="row">

                    <article class="offset-sm-4 col-sm-8">
                        <a href="./reserveren.php">
                            <input type="submit" class="button btn-position" value="Snel reserveren!" />
                        </a>
                        <button class="buttonreverse btn-position">Meer weten</button>
                    </article>
                </div>
                </form>

            </section>
        </main>
    </div>
<?php include 'components/foot.php' ?>