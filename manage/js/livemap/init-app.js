getShift();
$("#livemap-header").html(shiftHeader);
var currentLine = $("#livemap-line-selector").val();
// Mensaje a mostrar al iniciar la aplicacion
if (currentLine == 0) {
  $("#no-line-selected").removeClass("forced-none");
} else {
  $("#no-line-selected").addClass("forced-none");
}
