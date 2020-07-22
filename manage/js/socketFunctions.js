// Despues de agregar un usuario
socket.on("add-user-callback", function (data) {
  var line_selector = $("#line-selector").val();
  var line = data.line;
  var sso = data.sso;
  if (line === line_selector || line_selector === "all") {
    const url = "actions/fetch-single-user.php";
    $.ajax({
      url: url,
      type: "post",
      data: { sso: sso },
      success: function (data) {
        $("#tbody-innerfetched-content-table").append(data);
        // Quitamos el script y lo volvemos a poner para que funcione con contenido dinamico
        $('script[src="js/delete.js"]').remove();
        $("#fetched-content").append("<script src='js/delete.js'></script>");
        $('script[src="js/catch-edit-data.js"]').remove();
        $("#fetched-content").append(
          "<script src='js/catch-edit-data.js'></script>"
        );
        $('script[src="js/catch-modify-status-data.js"]').remove();
        $("#fetched-content").append(
          "<script src='js/catch-modify-status-data.js'></script>"
        );
      },
    });
  }
});
// Cuando se elimina un usuario
socket.on("delete-user-callback", function (data) {
  var id = data.id;
  $("#" + id).remove();
});
// Add to livemap
socket.on("append-into-livemapline-callback", function (data) {
  var sso = data.sso;
  var index = data.index;
  var status = data.status;
  var carduser;
  function printCard(sso, status, padding) {
    switch (status) {
      case "entrada":
        var tc = "text-success";
        break;
      case "salida":
        var tc = "text-danger";
        break;
      case "na":
        var tc = "";
        var textcolor = "";
        break;
      default:
        var tc = "";
        var textcolor = "";
        break;
    }
    carduser = `                      
  <!-- Usercard -->
  <div
    class="${tc} col-auto p-2 d-flex flex-column justify-content-center h-auto"
  >
    <div
      class="row no-gutters user-icon d-flex justify-content-center p-${padding} mb-0"
    >
      <i class="fas fa-user livemap-user-icon"></i>
    </div>
    <div
      class="row no-gutters user-sso d-flex justify-content-center p-${padding}"
    >
      <p class="mb-0 font-weight-bold text-black livemap-sso">${sso}</p>
    </div>
  </div>
  <!-- Usercard -->
  `;
  }
  if (index == 5 || index == 6) {
    printCard(sso, status, 1);
  } else {
    printCard(sso, status, 3);
  }
  $("#user-card" + index).html(carduser);
});
