<?php

  include "php/dbconfig.php";

  $bestuurStatement = "SELECT naam, functie, tekst, image_path FROM users WHERE bestuur=1";
  $bestuurResult = mysqli_query($con, $bestuurStatement);

  $acteursStatement = "SELECT naam, image_path FROM users WHERE NOT level='onactief'";
  $acteursResult = mysqli_query($con, $acteursStatement);

?>

<?php $title = "Over Komik"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
  <img src="./images/over-groepsfoto.jpg" alt="Groepsfoto Komik toneel" class="img-fluid over-groepsfoto">
  <h1 class="my-5">Over Komik Toneel</h1>
  <p>Welkom bij Komik Toneel, een amateur toneelgezelschap voor en door mensen die graag lachen.</p>
  <h2 class="mt-5">Het bestuur</h2>
  <?php while($row = mysqli_fetch_assoc($bestuurResult)){ ?>
    <div class="row my-5">
        <div class="col-lg-2 col-sm-4">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0 over-bestuurfoto" 
            src="<?= $row['image_path'] ?>" alt="Groepsfoto Komik Toneel">
          </a>
        </div>
        <div class="col-lg-10 col-sm-8">
          <h3><?= $row['naam'] ?></h3>
          <span class="text-muted font-italic"><?= $row['functie'] ?></span>
          <p><?= $row['tekst'] ?></p>
        </div>
      </div>
  <?php } ?>
  <h2 class="mt-5">Onze mensen</h2>
  <?php while($row = mysqli_fetch_assoc($acteursResult)){
    if($row['image_path'] != "./images/leden/leeg.png") { ?>
    <img src="<?= $row['image_path'] ?>" 
    alt="Foto acteur" 
    class="col-lg-2 col-md-3 col-sm-4 col-xs-6 my-5 over-lidfoto"
    data-toggle="tooltip"
    data-placement="right"
    title="<?= $row['naam'] ?>">
  <?php }} ?>
  <h2 class="mt-5">Geschiedenis</h2>
  <p>Komik Toneel is ontstaan in het volleybal. Een aantal jeugdtrainers zochten een extra
    activiteit, en kwamen op het idee om een toneelstuk op te voeren. Na het zoeken van
    extra spelers en een regisseur viel de keuze op: <i>"Ruby van top tot teen"</i>. Dit werd
    een succes en een aantal spelers werden meteen met de theatermicrobe geveld. 2 jaar later
    speelden ze <i>"Piece of Cake"</i> en een jaar later <i>"De nonnen van Navaronne"</i>.
    Telkens vielen enkelen af, kwamen anderen bij, enkelen stopten met volleybal en voor nog
    anderen was volleybal en toneel iets wat niet samenpastte, met gevolg dat er even geen
    toneel meer werd gespeeld...
  </p>
  <p>
    Desalniettemin bleven een aantal mensen gebeten door de microbe en zij bleven niet bij de
    pakken zitten. Één bijeenkomst volstond om in oktober 2009 te kunnen klinken op de officiële
    geboorte van Komik Toneel: <i>"Toneel (door en) voor mensen die graag lachen"</i> werd onze
    leuze. Eind die maand brachten we reeds onze eerste productie <i>"Chez Dolly Encore"</i>,
    direct een schot in de roos voor onze jonge kring. Een jaar later werd <i>"Taxi Taxi"</i>
    op de planken gezet en zo proberen we elk jaar opnieuw een ander komisch stuk voor u te
    brengen. Welke stukken we reeds speelden kan u bekijken onder 
    <a href="./voorstellingen.php">"Voorstellingen"</a>.
  </p>
  <p>
    In de loop der jaren zijn we ook steeds wat talrijker geworden in de helpende handen vóor
    en achter de schermen, wat voor elke vereniging de perfecte basis blijft: dat je telkens
    weer op een geweldig team kan rekenen. Mocht je zin hebben om onze bende te vergezellen,
    hetzij als acteur, decorbouwer, tapper, ... kan je ons steeds contacteren via deze website
    of op één van onze voorstellingen.
  </p>
  <p>
    Wij danken u alvast om de tijd te nemen onze site te bekijken en hopen u te mogen
    verwelkomen op één van onze voorstellingen.
  </p>
</div>
<?php include 'components/foot.php' ?>