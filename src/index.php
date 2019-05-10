<?php include 'components/head.php' ?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php">
                <img src="./images/logo zwartwit.png" alt="Logo komiktoneel" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="./index.php">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="./over.php">Over</a>
                    <a class="nav-item nav-link" href="./reserveren.php">Reserveren</a>
                    <a class="nav-item nav-link" href="./voorstellingen.php">Voorstellingen</a>
                    <a class="nav-item nav-link" href="./album.php">Foto's</a>
                    <a class="nav-item nav-link" href="./contact.php">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <main>
            <section class="hero-image">
                <img class="hero-image" src="./images/Hero.jpg" alt="Foto" />
                <div class="hero-text">
                    <h1>Komik Toneel</h1>
                </div>
                <div class="hero-text2">
                    <p>Volgend stuk</p>
                    <p span style="font-size:2rem;">Tom, Dick & Harry</p>
                    <button class="button">Reserveer nu</button>
                </div>
            </section>

            <section class="reservatie">
                <img class="affiche" src="./images/Affiche TomDickHarry.png" alt="Affiche huidige toneel" />
                <p class="huidigstuk">Tom, Dick & Harry</p>
                <p class="tekst">
                    Tom en Linda willen samen een baby adopteren en de inspecteur van
                    het adoptiebureau, mevrouw Potter, komt zo meteen langs. Net tijdens
                    de voorbereiding op haar bezoek komen Dick en Harry, de twee broers
                    van Tom met een iets minder ontwikkeld moreel kompas, langs om hun
                    "hulp" aan te bieden. Met als gevolg dat binnen de kortste keren
                    twee illegale immigranten, een politieagent en een vuilzak met
                    mysterieuze inhoud ten tonele komen.
                </p>

                <div class="row">
                    <div class="col-6">
                        <form class="form-inline form-pos" action="/action_page.php">
                            <div id="aantal" class="form-group">
                                <label class="form-box" for="Aantal">Aantal</label>
                                <input class="form-control input-size" type="number" name="seats" max="40" min="1"
                                    placeholder="0" />
                            </div>
                    </div>
                    <div class="col-6">
                        <div id="datum" class="form-group">
                            <label class="form-box" for="Datum">Dag</label>

                            <select class="formulier custom-select form-control select-size" name="Datum">
                                <option value="keuze" disabled selected>
                                    Kies een datum
                                </option>
                                <option value="Dag1"> vrijdag 2 februari </option>
                                <option value="Dag2"> zaterdag 3 februari </option>
                                <option value="Dag3"> zondag 4 februari </option>
                                <option value="Dag4"> vrijdag 9 februari </option>
                                <option value="Dag5"> zaterdag 10 februari </option>
                                <option value="Dag6"> zondag 11 februari </option>
                                <option value="Dag7"> zaterdag 16 februari </option>
                                <option value="Dag8"> zondag 17 februari </option>
                            </select>
                        </div>
                        </form>
                    </div>
                </div>
                <button class="button btn-poslinks">Snel reserveren!</button>
                <button class="buttonreverse btn-posrechts">meer weten</button>
            </section>
        </main>

        <?php include 'components/foot.php' ?>