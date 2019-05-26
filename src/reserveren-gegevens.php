<?php 
    include('./components/head.php');
    include('./components/header.php');

    if(isset($_POST['submit'])){
        $dagKeuze = $_POST['dag'];
        $aantalKeuze = $_POST['aantal'];
    } else {
        header("Location: reserveren.php");
    }

?>
<div class="container">
    <div class="alert alert-info">
        U gaat reserveren voor <?= $aantalKeuze ?> personen op <?= $dagKeuze ?>.
        <a href="reserveren.php">Klik hier om dit aan te passen.</a>
    </div>
</div>
<?php include('./components/foot.php'); ?>