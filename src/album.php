<?php $title = "Fotos"; include 'components/head.php' ?>

<?php include 'components/header.php'?>
<main>
    <div class="container album">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>Gallerij</h2>
            </div>

            <div class="row btnAlbum">
                <button class="btn btn-default filter-button button" data-filter="all">Alles</button>
                <?php
            //aanmaken van een button adhv de directory naam
            $dirs = array_filter(glob("images/albums/*"),"is_dir");
                foreach ($dirs as $dir){
                    $map = ltrim(strstr($dir, "/"),"/albums/");
                    $stuk = str_replace('_',' ', $map);
                    echo "<button class='btn btn-default filter-button button' data-filter='".$map."'>".$stuk."</button>";
                }

                ?>
            </div>
        </div>
        <div class="row">

            <?php
                //een foto met klasse plaatsen     
                $dirs = array_filter(glob("images/albums/*"),"is_dir");
                foreach ($dirs as $dir){
                    $map = ltrim(strstr($dir, "/"),"/albums/");
                    $pics = glob($dir."/*");
                    foreach($pics as $pic){
                        echo "<div class='imgAlbum col-lg-3 col-md-4 col-sm-4 col-xs-6 filter $map'> <img class='imgAlbum' src='./$pic'/> </div>";
                    }
                }
                ?>
        </div>

</main>
<?php include 'components/foot.php' ?>