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
