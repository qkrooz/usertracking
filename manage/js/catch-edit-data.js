$(document).ready(function () {
  $("a[name=edit-btn]").on("click", function () {
    var sso = $(this).attr("data-sso");
    $("#sso-edit").val(sso);
    var line = $(this).attr("data-line");
    $("#line-edit").val(line);
    var station = $(this).attr("data-station");
    $("#station-edit").val(station);
    var shift = $(this).attr("data-shift");
    $("#shift-edit").val(shift);
    var id = $(this).attr("data-id");
    $("#edit-form").attr("data-id", id);
    $("#editModal").modal("show");
  });
});
