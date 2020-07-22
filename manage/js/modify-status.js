$(document).ready(function () {
  // Submit del Form
  $("#edit-status-form").on("submit", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var oldStatus = $(this).attr("data-oldstatus");
    var form = $(this);
    const url = "actions/modify-status.php";
    //   alert(form.serialize() + "&id=" + id);
    $.ajax({
      url: url,
      type: "post",
      data: form.serialize() + "&id=" + id + "&oldStatus=" + oldStatus,
      beforeSend: function () {},
      success: function () {
        $("#editStatusModal").modal("hide");
        reloadContent();
        // setTimeout(function () {
        //   $("#" + id).addClass("highlighted");
        //   setTimeout(function () {
        //     $("#" + id).removeClass("highlighted");
        //   }, 3000);
        // }, 250);
      },
      error: function () {
        $.alert({
          title: "Atención",
          content:
            "No se ha podido modificat el status, contacte al departamento de IT Support",
        });
      },
    });
    $("#edit-status-form").trigger("reset");
  });
});
//   Funcion de recarga
function reloadContent() {
  var type = $("#line-selector").val();
  const url2 = "actions/fetch-users.php";
  $.ajax({
    url: url2,
    type: "POST",
    data: { type: type },
    success: function (data) {
      $("#fetched-content").html(data);
    },
  });
}
