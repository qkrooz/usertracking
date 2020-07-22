$(document).ready(function () {
  $("#sso-error-msg").hide();
  var proceed = null;
  // Chequeo al abrir el modal de agregar
  $("#add-btn").on("click", function () {
    const url = "actions/check-duplicated.php";
    var sso = $("#sso").val();
    $.ajax({
      url: url,
      type: "post",
      data: { sso: sso },
      beforeSend: function () {},
      success: function (data) {
        switch (data) {
          case "0":
            $("#sso-error-msg").hide();
            proceed = true;
            break;
          case "1":
            $("#sso-error-msg").show();
            proceed = false;
            break;
          default:
            break;
        }
      },
      error: function () {},
    });
  });
  // Chequeo al escribir
  $("#sso").on("change keyup input", function () {
    var sso = $.trim($(this).val());
    const url = "actions/check-duplicated.php";
    $.ajax({
      url: url,
      type: "post",
      data: { sso: sso },
      beforeSend: function () {},
      success: function (data) {
        switch (data) {
          case "0":
            $("#sso-error-msg").hide();
            proceed = true;
            break;
          case "1":
            $("#sso-error-msg").show();
            proceed = false;
            break;
          default:
            break;
        }
      },
      error: function () {},
    });
  });
  // Agregar con comprobacion
  $("#add-form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var jsonForm = form.serializeJSON();
    const url = "actions/add-user.php";
    if (proceed === true) {
      // Agregamos con Ajax
      $.ajax({
        url: url,
        type: "post",
        data: form.serialize(),
        success: function () {
          $("#addModal").modal("hide");
          socket.emit("add-user-data", jsonForm);
          $.confirm({
            title: "",
            content: "¡Se ha guardado usuario exitosamente!",
            buttons: {
              confirm: function () {},
            },
          });
        },
        error: function () {
          $.alert({
            title: "Atención",
            content:
              "No se ha podido guardar el usuario, contacte al departamento de IT Support",
          });
        },
      });
      $(this).trigger("reset");
    } else {
      $.dialog({
        title: "",
        content: "Este SSO ya existe",
      });
    }
  });
});
