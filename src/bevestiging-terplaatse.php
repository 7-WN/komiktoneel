<?php 

    $title = "Reservatie bevestigd!";
    include('./components/head.php');
    include('./components/header.php');

    session_start();
    include "./php/dbconfig.php";

    if($_SESSION['res_gemaakt']){
        $statement = "SELECT * FROM reservaties ORDER BY res_id DESC LIMIT 1";
        $result = mysqli_query($con, $statement);
        $res = mysqli_fetch_assoc($result);

        $dagStatement = "SELECT dag FROM dagen WHERE dag_id=" . $res['dag_id'];
        $dagResult = mysqli_query($con, $dagStatement);
        $dag = mysqli_fetch_assoc($dagResult);

        session_destroy();
    } else {
        header("Location: ./reserveren.php");
    }

?>
<div class="container">
    <h2>Bedankt voor uw reservatie!</h2>
    <h3 class="mt-5">Overzicht van uw reservatie #<?= $res['res_id'] ?>:</h3>
    <ul>
        <li><?= $res['aantal'] ?> personen op <?= date("l jS F", strtotime($dag["dag"])) ?></li>
        <li>Naam: <?= $res['voornaam'] . " " .  $res['achternaam'] ?></li>
        <li>Adres: <?php if($res['straat'] != 0) {  
            echo $res['straat'] . ", " . $res['postcode'] . " " . $res['stad']; }
            else { echo "Geen adres opgegeven"; } ?></li>
        <li>E-mail: <?= $res['email'] ?></li>
        <li>Telefoon: <?= $res['telefoon'] ?></li>
    </ul>
    <p>Gelieve het bedrag van <b>€ <?= number_format($res['aantal'] * $prijsPerTicket, 2) ?></b> aan de kassa te betalen. <br> Kaarten moeten ten minste vijftien minuten voor aanvang van de voorstelling afgehaald worden.</p>
    <button onClick="window.print()" class="button col-2 offset-5">Afdrukken</button>
</div>
<?php
include('./components/foot.php');
?>