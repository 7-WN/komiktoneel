<?php $title = "Contact"; include 'components/head.php' ?>
<?php include 'components/header.php' ?>
<div class="container contactpage">
    <main>
        <h1>Contact</h1>
        <p>Een probleem met uw reservatie? Een vraag in verband met de website? Kan u het gewoon niet weerstaan om de
            acteurs een complimentje te geven? Wilt u meehelpen achter de schermen of schuilt er een acteur in u?
            Contacteer ons via dit formulier of onderstaande gegevens. </p>
        <form action="php/mail.php">
            <div class="form-group col-md-6">
                <label for="naam">Uw naam</label>
                <input type="text" class="form-control" name="naam" placeholder="Hoe kunnen we u aanspreken?" />
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Hoe kunnen we u beantwoorden?" />
            </div>

            <div class="form-group col-md-6">
                <label for="boodschap">Boodschap</label>
                <textarea class="form-control" name="boodschap" cols="100" rows="5"
                    placeholder="Hoe kunnen we u helpen?"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Verzenden</button>
            </div>
        </form>

        <div class="row my-5">
            <article class="col">
                <h3>Komik Toneel VZW</h3>
                <p>komik@telenet.be</p>
                <p>Emblemseweg 85</p>
                <p>2520 Emblem</p>
                <p>0820233483</p>
            </article>
            <article class="col">
                <h4>Voorzitter</h4>
                <p>Jeroen Beckers</p>
                <p>+32 (0)497 55 09 23</p>
            </article>
            <article clas="col">
                <h4>Reservaties</h4>
                <p>Renilde Op de Beeck</p>
                <p>+32 (0)497 49 63 96</p>
            </article>
            <article class="col">
                <h4>Website</h4>
                <p>Jesse Op de Beeck</p>
                <p>+32 (0)471 39 15 88</p>
                <p>jesseodb@hotmail.com</p>
            </article>

        </div>

        <div class="row my-5">
            <article class="col">
                <h3>De zaal bereiken</h3>
                <div style="width: 700px;position: relative;"><iframe width="700" height="440"
                        src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Venusstraat%2010%202520%20Oelegem+(Komiktoneel)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <div
                        style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                        <small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a
                                href="http://www.googlemapsgenerator.com/zh/"></a> & <a
                                href="https://kpnherladen.be/"></a></small></div>
                    <style>
                    #gmap_canvas img {
                        max-width: none !important;
                        background: none !important
                    }
                    </style>
                </div><br />
            </article>
            <article class="col">
                <p>Dit jaar spelen we weer in de arochiezaal van Oelegem:</p>
                <p>Venusstraat 10, 2520 Oelegem</p>
                <p>Er zijn 60 parkeerplaatsen beschikbaar.
                    Er is een fietsenstalling aanwezig.
                    De zaal is rolstoeltoegankelijk, gelieve ons te contacteren indien u met een rolstoel komt.
                </p>
            </article>
        </div>

    </main>
</div>

<?php include 'components/foot.php' ?>