<?php 

    session_start();

    $title = "Reservatie - overzicht";
    include('./components/head.php');
    include('./components/header.php');

    include 'php/dbconfig.php';

    function storeAllInSession() {
        $_SESSION['voornaam'] = $_POST['voornaam'];
        $_SESSION['achternaam'] = $_POST['achternaam'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telefoon'] = $_POST['telefoon'];
        $_SESSION['extra'] = $_POST['extra'];

        if(isset($_POST['straat']) && isset($_POST['postcode']) && isset($_POST['plaats'])){
            $_SESSION['straat'] = $_POST['straat'];
            $_SESSION['postcode'] = $_POST['postcode'];
            $_SESSION['plaats'] = $_POST['plaats'];
        }
    }

    if(isset($_POST['submit']) || isset($_SESSION)){
        storeAllInSession();

        $naam = $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
        $aantal = $_SESSION['aantal'];
        $dag = $_SESSION['dag'];
        $email = $_SESSION['email'];
        $tel = $_SESSION['telefoon'];
        $extra = $_SESSION['extra'];

        if(isset($_SESSION['straat']) && isset($_SESSION['postcode']) && isset($_SESSION['plaats'])){
            $adres = $_SESSION['straat'] . ", " . $_SESSION['postcode'] . " " . $_SESSION['plaats'];
        }
    } else {
        header("Location: reserveren.php");
    }

    $dagStatement = "SELECT * FROM dagen WHERE dag_id=" . $dag;
    $dagResult = mysqli_query($con, $dagStatement);
    $dag = mysqli_fetch_assoc($dagResult);

?>
<div class="container">
    <section class="row">
        <figure class="progress-margin">
            <a href="./reserveren.php">
                <img src="./images/arrow-1-light.png" alt="Pijtljes" class="progress-arrow">
            </a>
            <a href="./reserveren-gegevens.php">
                <img src="./images/arrow-2-light.png" alt="Pijtljes" class="progress-arrow">
            </a>
            <a href="./reserveren-overzicht.php">
                <img src="./images/arrow-3-dark.png" alt="Pijtljes" class="progress-arrow-active">
            </a>
        </figure>
    </section>
    <h1 class="my-5">Uw reservatie</h1>
    <p>Gelieve onderstaande gegevens nog eens na te kijken. Als deze kloppen, kan u een betalingsmethode kiezen.</p>
    <ul>
        <li><b>Naam: </b><?= $naam ?></li>
        <li><b>Adres: </b><?= $adres ?></li>
        <li><b>E-mail: </b><?= $email ?></li>
        <li><b>Telefoon: </b><?= $tel ?></li>
    </ul>
    <a href="reserveren-gegevens.php">Uw gegevens aanpassen</a>
    <p class="mt-5">U reserveert voor <b><?= $aantal ?></b> personen op
        <b><?= date("l jS F", strtotime($dag["dag"])) ?></b>.
        De voorstelling begint om <b><?= date("G:i", strtotime($dag["dag"])) ?>u.</b></p>
    <a href="reserveren.php">Aantal of datum aanpassen</a>
    <p class="my-5 text-center display-4 ">€ <?= number_format($prijsPerTicket * $aantal, 2) ?></p>
    <div class="row">
        <button class="button betaling-keuze-button">Overschrijving</button>
        <button class="button buttonreverse betaling-keuze-button">Ik betaal ter plaatse</button>
    </div>
    <button class="button my-5">Betalen</button>
</div>
<?php
include('./components/foot.php');
?>