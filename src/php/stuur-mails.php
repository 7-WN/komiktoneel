<?php

    $from = $MAIL_FROM_ADDRESS;
    $to = "test@email.be";
    $subject = "Test E-mail";
    $message = "We zullen eens zien of dit werkt";
    $headers = "From: " . $from;

    mail($to, $subject, $message, $headers);
    echo "Het bericht is verzonden.";