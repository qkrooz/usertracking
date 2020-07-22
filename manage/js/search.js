$(document).ready(function () {
  $("#search-form").on("submit", function (e) {
    e.preventDefault();
    var value = $("#search-input").val().toLowerCase();
    $("#fetched-content tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  $("#search-form2").on("submit", function (e) {
    e.preventDefault();
    var value = $("#search-input2").val().toLowerCase();
    $("#fetched-content2 tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  $("#date-picker").on("change", function () {
    var value = $(this).val();
    var date = moment(value, "YYYY-MM-DD").format("DD-MM-YYYY");
    $("#fetched-content2 tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(date) > -1);
    });
  });
});
