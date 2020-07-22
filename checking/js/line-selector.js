$(document).ready(function () {
  $("#line-selector").on("change", function () {
    var lineselector = $(this).val();
    if (lineselector == 0) {
      $("#line-spinner").show();
      $("#line-number").hide();
      $("#turnos")
        .prepend(`<div id="select-message" class="w-100 h-100 d-flex justify-content-center align-items-center">
                <h1 class="mb-0 text-muted">
                  Selecciona una Línea para comenzar
                </h1>
              </div>`);
      localStorage.setItem("currentLine", 0);
      $("#user-cards1").empty();
      $("#shift-header1").empty();
      $("#user-cards2").empty();
      $("#shift-header2").empty();
    } else {
      $(".initial-selector").addClass("animated fadeOutUp");
      $("#select-message").remove();
      $("#line-spinner").hide();
      $("#line-number").show().html(lineselector);
      localStorage.setItem("currentLine", lineselector);
      getLineConfig(lineselector, shift, "userstofetch");
      userstofetch = result;
      setShift(shiftHeader);
      fetchPrimaryUsers(shift, lineselector, userstofetch);
      loadSecondaryUsers(lineselector, nextShift, nextShiftHeader);
      setNextShift();
    }
  });
});
