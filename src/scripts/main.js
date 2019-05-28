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

$(document).ready(function() {
  $(".filter-button").click(function() {
    var value = $(this).attr("data-filter");

    if (value == "all") {
      //$('.filter').removeClass('hidden');
      $(".filter").show("1000");
    } else {
      //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
      //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
      $(".filter")
        .not("." + value)
        .hide("3000");
      $(".filter")
        .filter("." + value)
        .show("3000");
    }
  });

  if ($(".filter-button").removeClass("active")) {
    $(this).removeClass("active");
  }
  $(this).addClass("active");
});

// RESERVATIE OVERZICHT SELECTIE BETALING
$(document).ready(function() {
  // OVERSCHRIJVING
  $("#overschrijvingKnop").click(function() {
    var knop = $("#overschrijvingKnop");
    var andereKnop = $("#terPlaatseKnop");
    var input = $("#overschrijvingKeuze");
    var andereInput = $("#terPlaatseKeuze");

    knop.addClass("gekozen");
    andereKnop.removeClass("gekozen");

    input.attr("checked", "checked");
    andereInput.removeAttr("checked");
  });

  // TER PLAATSE
  $("#terPlaatseKnop").click(function() {
    var knop = $("#terPlaatseKnop");
    var andereKnop = $("#overschrijvingKnop");
    var input = $("#terPlaatseKeuze");
    var andereInput = $("#overschrijvingKeuze");

    knop.addClass("gekozen");
    andereKnop.removeClass("gekozen");

    input.attr("checked", "checked");
    andereInput.removeAttr("checked");
  });
});
