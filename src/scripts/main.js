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

  // WANNEER KLIK OP EEN DAG IN RES.DATUM
  $(".een-dag").click(function() {
    var inputBox = $(this).find("#dagInputBox");
    if (!inputBox.prop("disabled")) {
      var alleDagen = $(".een-dag");
      var i;
      for (i = 0; i < alleDagen.length; i++) {
        if (alleDagen[i].classList.contains("gekozen-dag")) {
          alleDagen[i].classList.remove("gekozen-dag");
        }
      }
      inputBox.prop("checked", "checked");
      $(this).addClass("gekozen-dag");
    }
  });

  // KLEUREN VAN PROGRESS BARS
  var progressBars = $(".dagProgressBar");
  var i;

  function disableDay(progressBar) {
    var bar = progressBar;
    var day = bar.parentElement.parentElement;
    var input = day.querySelector("#dagInputBox");

    day.classList.add("volgeboekt");
    bar.innerHTML = "VOLZET";
    input.setAttribute("disabled", "disabled");
    day.style.cursor = "default";
  }

  for (i = 0; i < progressBars.length; i++) {
    var currentProgress = progressBars[i].getAttribute("aria-valuenow");
    var maxProgress = progressBars[i].getAttribute("aria-valuemax");

    if (currentProgress >= maxProgress * 0.8) {
      progressBars[i].style.backgroundColor = "#F26638";
    }

    if (currentProgress >= maxProgress * 1) {
      progressBars[i].style.backgroundColor = "#DF222A";
      disableDay(progressBars[i]);
    }
  }
});
