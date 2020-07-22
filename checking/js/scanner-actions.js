$(document).ready(function () {
  // sessionStorage.clear();
  // FUNCTIONES
  function modifyRecipentRemoveAppend(form, scanLine, shift, newStatus) {
    $.ajax({
      url: window.routes.rearrange,
      type: "post",
      data:
        form.serialize() +
        "&line=" +
        scanLine +
        "&shift=" +
        shift +
        "&status=" +
        newStatus,
      success: function (data) {
        $("div[name='1']").remove();
        $("#user-cards1").append(data);
      },
    });
  }
  function modifyRecipentAppend(
    form,
    scanLine,
    new_index,
    shift,
    newStatus,
    deletethis,
    sso
  ) {
    $.ajax({
      url: window.routes.modify_recipent,
      type: "post",
      data:
        form.serialize() +
        "&delete=" +
        deletethis +
        "&line=" +
        scanLine +
        "&index=" +
        new_index +
        "&shift=" +
        shift +
        "&status=" +
        newStatus,
      success: function (data) {
        //Apendizamos
        $("#user-cards1").append(data);
        socket.emit("append-into-livemapline", {
          sso: sso,
          index: new_index,
          line: scanLine,
          status: newStatus,
        });
        $("#scanner-input").val("").focus(); //limpiamos el input
        setLineConfig(scanLine, shift, "userstofetch", new_index);
      },
    });
  }
  function modifyRecipent(
    form,
    scanLine,
    new_index,
    shift,
    newStatus,
    deletethis
  ) {
    $.ajax({
      url: window.routes.modify_recipent,
      type: "post",
      data:
        form.serialize() +
        "&delete=" +
        deletethis +
        "&line=" +
        scanLine +
        "&index=" +
        new_index +
        "&shift=" +
        shift +
        "&status=" +
        newStatus,
      success: function (data) {
        if (deletethis != "nodelete") {
          setLineConfig(scanLine, shift, "userstofetch", new_index);
          $("#scanner-input").val("").focus(); //limpiamos el input
        }
      },
    });
  }
  $("#scanner-form").on("submit", function (e) {
    e.preventDefault();
    updateAll();
    // alert(currentTime);
    // Calculo del estado
    getStatus();
    var form = $(this);
    var scanLine = $("#line-selector").val();
    var container1length = $("#user-cards1 > div").length;
    var tempsso = $("#scanner-input").val();
    var sso = tempsso.replace(/^0+/, "");
    getLineConfig(scanLine, shift, "userstofetch");
    var new_index = parseInt(result) + 1;
    // El SSO comienza con los 0? o tiene longitud de 9?
    if (tempsso.match("^0000000") || tempsso.length == 9) {
      // sI
      // La linea es 0?
      if (scanLine != 0) {
        // NO
        //Esta lleno?
        if (container1length >= 8) {
          //Si, esta en la linea?
          if ($("#" + sso, "#user-cards1").length == 1) {
            // Si esta en la linea
            // TODO: Modificamos recipiente
            modifyRecipent(form, scanLine, shift, newStatus, "nodelete");
            fetchPrimaryUsers(shift, scanLine, parseInt(result));
            $("#scanner-input").val("").focus();
            //   FIN
          } else {
            // No esta en la linea
            modifyRecipentRemoveAppend(form, scanLine, shift, newStatus);
            fetchPrimaryUsers(shift, scanLine, parseInt(result));
            $("#scanner-input").val("").focus();
            // TODO: Modificamos recipiente, Remove y Append.
          }
        } else {
          //No, Esta en la linea?
          if ($("#" + sso, "#user-cards1").length == 1) {
            // TODO: Modificamos recipiente
            modifyRecipent(
              form,
              scanLine,
              new_index,
              shift,
              newStatus,
              "nodelete"
            );
            fetchPrimaryUsers(shift, scanLine, parseInt(result));
            $("#scanner-input").val("").focus();
            //   FIN
          } else {
            modifyRecipentAppend(
              form,
              scanLine,
              new_index,
              shift,
              newStatus,
              "delete",
              sso
            );
            $("#scanner-input").val("").focus();
            //   FIN
          }
        }
      } else {
        $.dialog({
          title: "Aviso",
          content: "No es posible escanear sin una linea seleccionada",
        });
        $("#scanner-input").val("").focus();
      }
    } else {
      // No
      $.dialog({
        title: "Aviso",
        content: "Este SSO no es válido.",
      });
      $("#scanner-input").val("").focus();
    }
  });
});
