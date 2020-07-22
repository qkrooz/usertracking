// Rutas para consultas y modificaciones.
var routes = {
  time: "actions/time.php",
  fetch_primary_users: "actions/fetch-primary-users.php",
  fetch_secondary_users: "actions/fetch-secondary-users.php",
  modify_recipent: "actions/modify-recipent.php",
  modify_status: "actions/modify-status.php",
  rearrange: "actions/rearrange.php",
};
// Horarios de entrada para los turnos
var shiftStart = {
  first: Date.parse("01 Jan 2000 06:00:00 AM"),
  seccond: Date.parse("01 Jan 2000 03:30:00 PM"),
  seccondFix: Date.parse("01 Jan 2000 12:00:00 AM"),
  third: Date.parse("01 Jan 2000 12:30:00 AM"),
};
// Horarios de salida para los turnos
var shiftEnd = {
  first: Date.parse("01 Jan 2000 03:30:00 PM"),
  seccond: Date.parse("01 Jan 2000 11:59:59 PM"),
  seccondFix: Date.parse("01 Jan 2000 12:30:00 AM"),
  third: Date.parse("01 Jan 2000 06:00:00 AM"),
};
var margin = 1800000;
// Tiempo para mostrar.
var showingTime;
// Tiempo actual
var currentTime;
// Turno actual
var shift;
var shiftHeader;
var nextShift;
var nextShiftHeader;
var futureShift;
var futureShiftHeader;
// Cabeceras de turnos
var firstShiftHeader = "Primer Turno";
var secondShiftHeader = "Segundo Turno";
var thirdShiftHeader = "Tercer Turno";
// Turno del SSO
var ssoshift;
// Estado
var newStatus;
// Linea Actual
var currentLine;
// LineConfiguration
var result;
var userstofetch;
// TODO: Si el usuario ya se encuentra en una linea, y este mismo escanea en otra linea mientras sigue en turno, bsucar la linea anterior de este mismo usuario, recorrer todos los usuarios para que los 0 queden en los ultimos index de esa misma linea anterior, despues a esta misma linea, restar uno en lineconfig.
