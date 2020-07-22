$("#livemap-line-selector").on("change", function () {
  var selectedLine = $(this).val();
  if (selectedLine == 0) {
    $("#no-line-selected").removeClass("forced-none");
  } else {
    $("#no-line-selected").addClass("forced-none");
  }
});
