$(document).ready(function () {
  //   Aviso y apertura del modal
  $("a[name=edit-status-btn]").on("click", function () {
    var id = $(this).attr("data-id");
    $("#edit-status-form").attr("data-id", id);
    var sso = $(this).attr("data-sso");
    $("#sso-status-edit").val(sso);
    var oldStatus = $(this).attr("data-status");
    $("#edit-status-form").attr("data-oldstatus", oldStatus);
    $("#status-edit").val(oldStatus);
    $.confirm({
      title: "Aviso",
      content:
        "Modificar el estatus es una acción puntual que necesita una justificación.",
      buttons: {
        confirmar: function () {},
      },
    });
  });
});
