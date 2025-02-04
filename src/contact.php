<?php $title = "Contact"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container">
    <main>
        <h2>Contact</h2>

        <p> <span style="text-align:center">Een probleem met uw reservatie? Een vraag in verband met de website? Kan u
                het gewoon niet weerstaan om
                de
                acteurs een complimentje te geven? Wilt u meehelpen achter de schermen of schuilt er een acteur in u?
                Contacteer ons via dit formulier of onderstaande gegevens. </span>
        </p>
        <form class="contactpage" action="php/mail.php" method="POST">
            <div class="form-group contactpage col-8">
                <label for="naam">Uw naam</label>
                <input type="text" class="form-control" name="naam" placeholder="Hoe kunnen we u aanspreken?" />
            </div>
            <div class="form-group contactpage col-8">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Hoe kunnen we u beantwoorden?" />
            </div>

            <div class="form-group contactpage col-8">
                <label for="boodschap">Boodschap</label>
                <textarea class="form-control" name="boodschap" cols="100" rows="5"
                    placeholder="Hoe kunnen we u helpen?"></textarea>
            </div>
            <div class="form-group verzendknop contactpage">
                <button type="submit" name="submit" class="button">Verzenden</button>
            </div>
        </form>

        <div class="row">
            <article class="contact-padding col-sm-12 col-md-6 col-xl-3">
                <h4>Komik Toneel VZW</h4>
                <ul class="contact-info">
                    <li>komik@telenet.be</li>
                    <li>Emblemseweg 85</li>
                    <li>2520 Emblem</li>
                    <li>BE0820233483</li>
                    <ul>
            </article>
            <article class="contact-padding col-sm-12 col-md-6 col-xl-3">
                <h4>Voorzitter</h4>
                <ul class="contact-info">
                    <li>Jeroen Beckers</li>
                    <li><a href="tel:0032497550923">+32 (0)497 55 09 23</a></li>
                    <ul>
            </article>
            <article class="contact-padding col-sm-12 col-md-6 col-xl-3">
                <h4>Reservaties</h4>
                <ul class="contact-info">
                    <li> Renilde Op de Beeck</li>
                    <li> <a href="tel:0032497496396"> +32 (0)497 49 63 96</a></li>
                    <li>(tussen 16u en 19u)</li>
                    <ul>
            </article>
            <article class="contact-padding col-sm-12 col-md-6 col-xl-3">
                <h4>Website</h4>
                <ul class="contact-info">
                    <li>Jesse Op de Beeck</li>
                    <li> <a href="tel:0032471391588">+32 (0)471 39 15 88</a></li>
                    <li>jesseodb@hotmail.com</li>
                    <ul>
            </article>
        </div>

        <div class="row">
            <article class="contact-padding col-12 col-xl-9">
                <h3>De zaal bereiken</h3>
                <iframe width="100%" height="600"
                    src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=Venusstraat%2010%2C%20250%20Oelegem+(Parochiezaal)&ie=UTF8&t=&z=15&iwloc=B&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
            </article>
            <article class="contact-plaats col-12 col-xl-3">
                <p>Dit jaar spelen we weer in de Parochiezaal van Oelegem:</p>
                <p>Venusstraat 10, 2520 Oelegem</p>
                <p>Er zijn 60 parkeerplaatsen beschikbaar.
                    Er is een fietsenstalling aanwezig.
                    De zaal is rolstoeltoegankelijk, gelieve ons te contacteren indien u met een rolstoel komt kijken.
                </p>
            </article>
        </div>

    </main>
</div>

<?php include 'components/foot.php' ?>