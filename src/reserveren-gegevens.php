<?php 

    $title = "Reserveren - gegevens";

    include('./components/head.php');
    include('./components/header.php');
    include 'php/dbconfig.php';

    session_start();

    if(isset($_POST['submit'])){
        $_SESSION['dag'] = $_POST['dag'];
        $_SESSION['aantal'] = $_POST['aantal'];

        $aantal = $_SESSION['aantal'];
        $dag = $_SESSION['dag'];
    } elseif(isset($_SESSION['dag']) && isset($_SESSION['aantal'])) {
        $aantal = $_SESSION['aantal'];
        $dag = $_SESSION['dag'];
    } else {
        header("Location: reserveren.php");
    }

    $dagenStatement = "SELECT dag_id, dag FROM dagen WHERE dag_id=" . $dag;
    $dagenResult = mysqli_query($con, $dagenStatement);
    $dag = mysqli_fetch_assoc($dagenResult);

?>

<main class="container">
    <section class="row">
        <figure class="progress-margin">
            <a href="./reserveren.php">
                <img src="./images/arrow-1-light.png" alt="Pijtljes" class="progress-arrow">
            </a>
            <a href="./reserveren-gegevens.php">
                <img src="./images/arrow-2-dark.png" alt="Pijtljes" class="progress-arrow-active">
            </a>
            <img src="./images/arrow-3-light.png" alt="Pijtljes" class="progress-arrow">
        </figure>
    </section>
    <article class="lead">
        <h2> U gaat reserveren voor <?= $aantal ?> personen op <?= date("l jS F", strtotime($dag["dag"])) ?>.</h2>
        <a href="reserveren.php">Klik hier om dit aan te passen.</a>
        <p class="mb-5 mt-2">Vul hier uw gegevens in om de reservatie te vervolledigen. Voor meer info over het
            gebruik
            van
            uw gegevens, bekijk ons
            <a href="privacy.php">privacy-beleid</a>.
        </p>
    </article>

    <form class="form" action="./reserveren-overzicht.php" method="POST">
        <div class="form-row">
            <div class="form-group col-12 col-sm-6">
                <label for="voornaam" class="">Voornaam</label>
                <input type="text" class="form-control" name="voornaam" required placeholder="Uw voornaam"
                    <?php if(isset($_SESSION['voornaam'])){ echo "value='" . $_SESSION['voornaam'] . "'"; } ?>>
            </div>
            <div class="form-group col-12 col-sm-6">
                <label for="achternaam" class="">Achternaam</label>
                <input type="text" class="form-control" name="achternaam" required placeholder="Uw achternaam"
                    <?php if(isset($_SESSION['achternaam'])){ echo "value='" . $_SESSION['achternaam'] . "'"; } ?>>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-sm-6">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" required placeholder="Uw e-mailadres"
                    <?php if(isset($_SESSION['email'])){ echo "value='" . $_SESSION['email'] . "'"; } ?>>
            </div>
            <div class="form-group col-12 col-sm-6">
                <label for="telefoon">Telefoon</label>
                <input type="text" class="form-control" name="telefoon" required placeholder="Uw telefoonnummer"
                    <?php if(isset($_SESSION['telefoon'])){ echo "value='" . $_SESSION['telefoon'] . "'"; } ?>>
            </div>
        </div>
        <p>Laat hier uw adresgegevens achter om bij elke nieuwe voorstelling een flyer toegestuurd te krijgen.
        </p>

        <div class="form-row">
            <div class="form-group col-12 col-sm-6">
                <label for="straat">Straat + nr</label>
                <input type="text" class="form-control" name="straat" placeholder="Uw straatnaam"
                    <?php if(isset($_SESSION['straat'])){ echo "value='" . $_SESSION['straat'] . "'"; } ?>>
            </div>
            <div class="form-group col-12 col-sm-3">
                <label for="postcode">Postcode</label>
                <input type="text" class="form-control" name="postcode" placeholder="bv. 2520"
                    <?php if(isset($_SESSION['postcode'])){ echo "value='" . $_SESSION['postcode'] . "'"; } ?>>
            </div>
            <div class="form-group col-12 col-sm-3">
                <label for="plaats">Woonplaats</label>
                <input type="text" class="form-control" name="plaats" placeholder="bv. Oelegem"
                    <?php if(isset($_SESSION['plaats'])){ echo "value='" . $_SESSION['plaats'] . "'"; } ?>>
            </div>
        </div>
        <div class="form-group mt-5">
            <label for="extra">Opmerking</label>
            <textarea name="extra" class="col-12" rows="5"
                placeholder="Heeft u nog een vraag, commentaar of een opmerking?"><?php if(isset($_SESSION['extra'])){ echo $_SESSION['extra']; } ?></textarea>
        </div>
        <button type="submit" name="submit" class="button">Volgende stap</button>
    </form>
</main>

<?php include('./components/foot.php'); ?>