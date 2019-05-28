<?php

  session_start();
  include 'dbconfig.php';

  // DATA OPHALEN
  if(isset($_POST['submit'])){
    $voornaam = $_SESSION['voornaam'];
    $achternaam = $_SESSION['achternaam'];
    $aantal = $_SESSION['aantal'];
    $dag = $_SESSION['dag'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['telefoon'];
    $extra = $_SESSION['extra'];

    $betalingsWijze = $_POST['betalingsWijze'];

    if(isset($_SESSION['straat']) && isset($_SESSION['postcode']) && isset($_SESSION['plaats'])){
      $straat = $_SESSION['straat'];
      $postcode = $_SESSION['postcode'];
      $plaats = $_SESSION['plaats'];
    } else {
      $straat = "NULL";
      $postcode = "NULL";
      $plaats = "NULL";
    }

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

      $result = mysqli_query($con, $statement);

      if($betalingsWijze === "terplaatse"){
        header("Location: ../bevestiging-terplaatse.php");
      } elseif ($betalingsWijze === "overschrijving") {
        header("Location: ../bevestiging-overschrijving.php");
      }

  } else {
    echo "no submit seen";
  }