updateAll(); // Actualizacion de todas las variables de entorno
// Inicializamos el input de texto para adquirir solo numeros
setInputFilter(document.getElementById("scanner-input"), function (value) {
  return /^\d*?\d*$/.test(value);
});
// Dropdown configuration
$(document).on("click", ".dropleft .dropdown-menu", function (e) {
  e.stopPropagation();
});

// Revisamos que el input de escaneo este siempre focuseado una vez y cada 2 segundos
$("#scanner-input").focus();
var checkFocus;
checkFocus();
$("#dropdown-config-button").on("click", function () {
  $("#select-line-retro").hide();
});
currentLine = localStorage.getItem("currentLine");
if (currentLine == 0) {
  $("#select-message").show();
} else {
  $("#line-spinner").hide();
  $("#line-number").html(currentLine);
  $("#select-line-retro").hide();
}

// Mantenemos el valor en el selector de linea
if (currentLine === null) {
  // si currentLine es null la ponemos en 0
  localStorage.setItem("currentLine", 0);
  currentLine = 0;
  $("#line-selector").val(0);
}
// Si el current Line no es null
$("#line-selector").val(currentLine);
if (currentLine == 0) {
  // La linea actual es 0?
  // Si, es 0
  $("#select-message").show();
} else {
  // Preparacion del turno en carga.
  getLineConfig(currentLine, shift, "userstofetch");
  userstofetch = result;
  setShift(shiftHeader);
  fetchPrimaryUsers(shift, currentLine, userstofetch);
  loadSecondaryUsers(currentLine, nextShift, nextShiftHeader);
  setNextShift();
}

//
//
//
//
//
//   FUNCIONES
//   Modifica el Header 1 con el shiftHeader y ejecuta loadSecondaryUsers
function setShift(header) {
  //  PONEMOS EL HEADER DEL TURNO PRINCIPAL
  $("#shift-header1").html(header);
  // CARGAMOS LOS USUARIOS DEL SIGUIENTE TURNO
}
//   Modifica el shift-header2 con el nextShiftHeader y carga los usuarios secundarios
function loadSecondaryUsers(initLine, nextShift, nextShiftHeader) {
  $.ajax({
    url: window.routes.fetch_secondary_users,
    type: "post",
    data: { line: initLine, nextShift: nextShift },
    success: function (data) {
      $("#shift-header2").html(nextShiftHeader);
      $("#user-cards2").html(data);
    },
  });
}

//   Recaulcula currentTime y el shift.
function setNextShift() {
  updateAll();
  //   Se calcula el tiempo restante PARA QUE LOS TURNOS SE ACOMODEN CON UN MARGEN DE 15 MINUTOS
  getShift();
  setTimeout(() => {
    setShift(nextShiftHeader);
    loadSecondaryUsers(initLine, futureShift, futureShiftHeader);
    setNextShift();
  }, unixRemaining);
}

//   Update all Variables
function updateAll() {
  // Seteamos el tiempo actual.
  setCurrentTime();
  // Seteamos el turno actual.
  getShift();
}
// Fetchprimary Users
function fetchPrimaryUsers(shift, line, index) {
  $.ajax({
    url: window.routes.fetch_primary_users,
    type: "post",
    data: { shift: shift, line: line, index: index },
    beforeSend: function () {
      $("#user-cards1-spinner").show();
    },
    success: function (data) {
      $("#user-cards1-spinner").hide();
      $("#user-cards1").html(data);
    },
  });
}
// Only numbers scanner-input
function setInputFilter(textbox, inputFilter) {
  [
    "input",
    "keydown",
    "keyup",
    "mousedown",
    "mouseup",
    "select",
    "contextmenu",
    "drop",
  ].forEach(function (event) {
    textbox.addEventListener(event, function () {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
function setLineConfig(line, shift, param, value) {
  $.ajax({
    url: "actions/setlineconfig.php",
    type: "post",
    data: { line: line, shift: shift, param: param, value: value },
    async: false,
    success: function () {},
  });
}
function getLineConfig(line, shift, param) {
  $.ajax({
    url: "actions/getlineconfig.php",
    type: "post",
    data: { line: line, shift: shift, param: param },
    async: false,
    success: function (data) {
      result = data;
    },
  });
}

function checkFocus() {
  checkFocus = setInterval(innerCheckFocus, 5000);
}
function innerCheckFocus() {
  $("#scanner-input").focus();
}
