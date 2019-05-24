<?php 
    $title = "Reservatie bevestigd!";
    include('./components/head.php');
    include('./components/header.php');
?>
<div class="container">
    <h2>Bedankt voor uw reservatie!</h2>
    <h3 class="mt-5">Overzicht van uw reservatie #<?= "144" ?>:</h3>
    <ul>
        <li><?= "4" ?> personen op <?= "Zaterdag 9 februari" ?></li>
        <li>Naam: <?= "Op de Beeck" . " " .  "Jesse" ?></li>
        <li>Adres: <?= "Ranstsesteenweg" . " " . "173" . ", " . "2520" . " " . "Ranst" ?></li>
        <li>E-mail: <?= "jesseodb@hotmail.com" ?></li>
        <li>Telefoon: <?= "03 475 12 59" ?></li>
    </ul>
    <p>Gelieve het bedrag van <b>€ <?= "34,00" ?></b> aan de kassa te betalen. <br> Kaarten moeten ten minste vijftien minuten voor aanvang van de voorstelling afgehaald worden.</p>
</div>
<?php
include('./components/foot.php');
?>