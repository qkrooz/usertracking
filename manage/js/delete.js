$(document).ready(function () {
  $("a[name='delete-btn']").on("click", function (e) {
    e.preventDefault();
    const url = "actions/delete-user.php";
    var id = $(this).attr("data-id");
    $.confirm({
      title: "¡Atención!",
      content: "¿Está seguro de eliminar este elemento?",
      buttons: {
        confirmar: {
          text: "Confirmar",
          btnClass: "btn-blue",
          keys: ["enter", "shift"],
          action: function () {
            socket.emit("delete-user", { id: id });
            // Borramos el contenido
            $.ajax({
              url: url,
              type: "post",
              data: { id: id },
              beforeSend: function () {},
              success: function () {
                // reloadContent();
                $.dialog({
                  title: "",
                  content: "Elemento eliminado con éxito",
                });
              },
              error: function () {},
            });
          },
        },
        cancelar: {
          text: "Cancelar",
          btnClass: "btn-red",
          keys: ["enter", "shift"],
          action: function () {},
        },
      },
    });
  });
});
