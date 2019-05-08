<?php include 'components/head.php' ?>


<body>
    <?php include 'components/header.php' ?>

    <div class="container">
        <main>
            <h1>Contact</h1>
            <form>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Voornaam</label>
                    <input type="text" class="form-control" id="inputEmail4"
                        placeholder="Hoe mogen wij u aanspreken?" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Email</label>
                    <input type="email" class="form-control" id="inputAddress"
                        placeholder="Hoe kunnen we u bereiken?" />
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Boodschap</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" cols="100" rows="5"
                        placeholder="Hoe kunnen we u helpen?"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="button">Verzenden</button>
                </div>
            </form>
        </main>

        <?php include 'components/foot.php' ?>