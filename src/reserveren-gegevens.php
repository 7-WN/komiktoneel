<?php 

    $title = "Reserveren - gegevens";
    include('./components/head.php');
    include('./components/header.php');

    session_start();

    if(isset($_POST['submit'])){
        $_SESSION['dag'] = $_POST['dag'];
        $_SESSION['aantal'] = $_POST['aantal'];

        $aantal = $_SESSION['aantal'];
        $dag = $_SESSION['dag'];

    } else {
        header("Location: reserveren.php");
    }

?>

<div class="container">
    <div class="lead">
        U gaat reserveren voor <?= $aantal ?> personen op <?= $dag ?>.
        <a href="reserveren.php">Klik hier om dit aan te passen.</a>
    </div>
    <p class="mb-5 mt-2">Vul hier uw gegevens in om de reservatie te vervolledigen. Voor meer info over het gebruik van uw gegevens, bekijk ons
        <a href="privacy.php">privacy-beleid</a>.
    </p>

    <form class="form" action="./reserveren-overzicht.php" method="POST">
    <div class="form-group">
        <label for="voornaam" class="buttonleft">Voornaam</label>    
        <input type="text" class="form-control" name="voornaam" 
            required placeholder="Uw voornaam">
        <label for="achternaam" class="buttonleft">Achternaam</label>
        <input type="text" class="form-control" name="achternaam" 
            required placeholder="Uw achternaam">
        <label for="email" class="buttonleft">E-mail</label>
        <input type="email" class="form-control" name="email"
            required placeholder="Uw e-mailadres">
        <label for="telefoon" class="buttonleft">Telefoon</label>
        <input type="text" class="form-control" name="telefoon" 
            required placeholder="Uw telefoonnummer">
    </div>
    <p>Laat hier uw adresgegevens achter om bij elke nieuwe voorstelling een flyer toegestuurd te krijgen.</p>
    <div class="form-group">
        <label for="straat" class="buttonleft">Straat + nr</label>
        <input type="text" class="form-control" name="straat"
            placeholder="Uw straatnaam">
        <label for="postcode" class="buttonleft">Postcode</label>
        <input type="text" class="form-control" name="postcode"
            placeholder="bv. 2520">
        <label for="plaats" class="buttonleft">Woonplaats</label>
        <input type="text" class="form-control" name="plaats"
            placeholder="bv. Oelegem">
    </div>
    <div class="form-group mt-5">
        <label for="extra" class="buttonleft">Opmerking</label>
        <textarea name="extra" class="col-12" rows="5"
            placeholder="Heeft u nog een vraag, commentaar of een opmerking?"></textarea>
    </div>
    <button type="submit" name="submit" class="button">Volgende stap</button>
    </form>
</div>

<?php include('./components/foot.php'); ?>