<?php 

    $title = "Reservatie bevestigd!";
    include('./components/head.php');
    include('./components/header.php');

    include "./php/dbconfig.php";

    if($_SESSION['reservatie_gemaakt']){
        $statement = "SELECT * FROM reservaties ORDER BY res_id DESC LIMIT 1";
        $result = mysqli_query($con, $statement);
        $res = mysqli_fetch_assoc($result);

        $dagStatement = "SELECT dag FROM dagen WHERE dag_id=" . $res['dag_id'];
        $dagResult = mysqli_query($con, $dagStatement);
        $dag = mysqli_fetch_assoc($dagResult);
    } else {
        header("Location: ./reserveren.php");
    }

?>
<div class="container">
    <h2>Bedankt voor uw reservatie!</h2>
    <p>Uw reservatie voor <?= "" ?> personen op <?= "" ?> is pas definitief na ontvangst van uw betaling met onderstaande gegevens.</p>
    <ul class="my-4 list-unstyled offset-1 overschrijving-gegevens">
        <li>Komik Toneel VZW</li>
        <li>BE97 5899 5425 1223 4745</li>
        <li>KREDBEBB</li>
        <li class="mt-3"><b>Bedrag</b>: € <?= number_format($res['aantal'] * $prijsPerTicket, 2) ?></li>
        <li><b>Mededeling</b>: "Betaling reservatie #<?= $res['res_id'] ?>"</li>
    </ul>
    <p>Binnen enkele dagen na uw betaling ontvangt u nog een bevestigingsmail.</p>
    <ul class="my-4 list-unstyled offset-1 overschrijving-gegevens">
        <li>Overzicht van uw reservatie #<b><?= $res['res_id'] ?></b>:</li>
        <li><?= $res['aantal'] ?> personen op <?= date("l jS F", strtotime($dag["dag"])) ?></li>
        <li class="mt-3">Naam: <?= $res['voornaam'] . " " . $res['achternaam'] ?></li>
        <li>Adres: <?= $res['straat'] !== null ? 
            $res['straat'] . ", " . $res['postcode'] . " " . $res['stad'] 
            : "Geen adres opgegeven" ?></li>
        <li>E-mail: <?= $res['email'] ?></li>
        <li>Telefoon: <?= $res['telefoon'] ?></li>
    </ul>
    <p>Bij reservatie minder dan 5 dagen voor de voorstelling, gelieve een bewijs van betaling mee te brengen. 
    Kaarten moeten ten laatste 15 minuten voor aanvang van de voorstelling afgehaald worden.</p>
    <p>Indien u 8 dagen na betaling nog steeds geen bevestiging van ons heeft ontvangen, contacteer ons dan 
    <a href="./contact.php" target="_blank" class="blauwe-link">via de website</a> of het telefoonnummer 0497 49 63 96 (tussen 16u30 en 18u30).</p>
    <button class="button btn btn-lg col-2 offset-5">Afdrukken</button>
</div>
<?php include('./components/foot.php'); ?>