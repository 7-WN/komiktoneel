<?php 

    $title = "Reserveren - overzicht";
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

        if(isset($SESSION['straat']) && isset($SESSION['postcode']) && isset($SESSION['plaats'])){
            $adres = $SESSION['straat'] . ", " . $SESSION['postcode'] . " " . $SESSION['plaats'];
        }
    }

?>



<?php
include('./components/foot.php');
?>