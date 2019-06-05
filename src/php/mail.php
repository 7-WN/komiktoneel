<?php

    include "dbconfig.php";

    if(isset($_POST['submit'])){
        $to = "spificator@hotmail.com";
        $naam = $_POST['naam'];
        $email = $_POST['email'];
        $boodschap = $_POST['boodschap'];

        $subject = "Website-contact " . $naam;
        $msg = "Bericht van " . $naam . ":\n" . $boodschap . "\nE-mailadres: " . $email;
-
        mail($to, $subject, $msg);
    }