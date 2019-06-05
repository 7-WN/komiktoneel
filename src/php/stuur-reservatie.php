<?php

  session_start();
  include 'dbconfig.php';

  if(isset($_POST['submit'])){
    $voornaam = $_SESSION['voornaam'];
    $achternaam = $_SESSION['achternaam'];
    $aantal = $_SESSION['aantal'];
    $dag = $_SESSION['dag'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['telefoon'];
    $extra = $_SESSION['extra'];

    $betalingsWijze = $_POST['betalingsWijze'];

    if(!empty($_SESSION['straat']) && !empty($_SESSION['postcode']) && !empty($_SESSION['plaats'])){
      $straat = $_SESSION['straat'];
      $postcode = $_SESSION['postcode'];
      $plaats = $_SESSION['plaats'];
    } else {
      $straat = 0;
      $postcode = 0;
      $plaats = 0;
    }
    
    /* MAILS */
    $from = $MAIL_FROM_ADDRESS;
    $to = $_POST['email'];
    $subject = "Uw reservatie";
    $message = "Uw reservatie voor ". $aantal . " op " . date("l jS F", strtotime($dag["dag"])) . " is verzonden!";
    $headers = "From: " . $from;

    mail($to, $subject, $message, $headers);

    $statement = 
      "INSERT INTO reservaties 
        (voornaam, achternaam, aantal, dag_id, straat, postcode, stad, telefoon, email, extra)
      VALUES
        ('" . $voornaam . "', '"
        . $achternaam . "', '"
        . $aantal . "', '"
        . $dag . "', '"
        . $straat . "', '"
        . $postcode . "', '"
        . $plaats . "', '"
        . $tel . "', '"
        . $email . "', '"
        . $extra . "')"
      ;

      $_SESSION['res_gemaakt'] = true;

      if($result = mysqli_query($con, $statement)){
        if($betalingsWijze === "terplaatse"){
          header("Location: ../bevestiging-terplaatse.php");
        } elseif ($betalingsWijze === "overschrijving") {
          header("Location: ../bevestiging-overschrijving.php");
        }
      } else {
        echo "Er ging iets fout: kijk na of alle nodige gegevens zijn ingevuld en probeer opnieuw. \n" 
        . mysqli_error($con);
        var_dump($statement);
      }
  } else {
    header("Location: ../reserveren.php");
  }