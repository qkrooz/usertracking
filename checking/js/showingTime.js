$(document).ready(function () {
  // Guardamos maquinamos y formateamos la hora para añadir un segundo cada segundo y lo mostramos, todo procesado desde cliente
  setInterval(function () {
    var ss = showingTime.split(":");
    var dt = new Date();
    dt.setHours(ss[0]);
    dt.setMinutes(ss[1]);
    dt.setSeconds(ss[2]);
    var dt2 = new Date(dt.valueOf() + 1000);
    showingTime = dt2.toTimeString().split(" ")[0];
    $("#time-spinner").hide();
    $("#identificador-de-hora").html(showingTime);
    $("#clock").html(showingTime);
  }, 1000);
});
