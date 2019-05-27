<?php 

    $title = "Reservatie - overzicht";
    include('./components/head.php');
    include('./components/header.php');

    session_start();

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

    if(isset($_POST['submit'])){
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
    }

?>
<div class="container">
    <h1 class="my-5">Uw reservatie</h1>
    <p>Gelieve onderstaande gegevens nog eens na te kijken. Als deze kloppen, kan u een betalingsmethode kiezen.</p>
    <ul>
        <li><b>Naam: </b><?= $naam ?></li>
        <li><b>Adres: </b><?= $adres ?></li>
        <li><b>E-mail: </b><?= $email ?></li>
        <li><b>Telefoon: </b><?= $tel ?></li>
    </ul>
    <a href="reserveren-gegevens.php">Uw gegevens aanpassen</a>
    <p class="lead mt-5">U reserveert voor <?= " " ?> personen op <?= " " ?></p>
    <a href="reserveren.php">Aantal of datum aanpassen</a>
</div>
<?php
include('./components/foot.php');
?>