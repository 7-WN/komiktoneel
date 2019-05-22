<footer class="footer mt-5">
    <img class="footer-img" src="./images/logo-zwartwit.png" alt="Logo Komiktoneel" />
    <nav class="footer-nav">
        <ul>
            <li class="footer-txt">
                <a class="nav-item nav-link" href="./sponsors.php">Sponsors</a>
            </li>
            <li class="footer-txt">
                <a class="nav-item nav-link" href="./login.php">Login</a>
            </li>
        </ul>
    </nav>
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    if ($(window).width() < 768) {
        $("#artikelaantal").removeClass("offset-4");
        $("#reservatieknop").removeClass("offset-4");
        $("#txtalign").removeClass("txtalign");
        $("#btnmeer").removeClass("buttonright");
        $("#labelres").removeClass("buttonleft");
        $("#btndag").removeClass("paddingleft");
        $("#resknop").removeClass("buttonleft");
    }
    if ($(window).width() > 768) {
        $("#artikelaantal").addClass("offset-4");
        $("#reservatieknop").addClass("offset-4");
        $("#txtalign").addClass("txtalign");
        $("#btnmeer").addClass("buttonright");
        $("#labelres").addClass("buttonleft");
        $("#btndag").addClass("paddingleft");
        $("#resknop").addClass("buttonleft");
    }

});
</script>
</body>

</html>