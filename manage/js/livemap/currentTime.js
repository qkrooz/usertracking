$("#time-spinner").show();
// Una sola llamada al servidor para la generacion de la hora actual
$.ajax({
  url: "./actions/livemap/time.php",
  type: "POST",
  async: false,
  data: { functionType: "styleTime" },
  success: function (data) {
    // Tiempo para mostrar
    showingTime = data;
  },
});
setCurrentTime();
function setCurrentTime() {
  $.ajax({
    type: "POST",
    url: "./actions/livemap/time.php",
    data: { functionType: "rawTime" },
    async: false,
    success: function (data) {
      // Definicion del tiempo actual
      currentTime = data;
      currentTime = Date.parse(currentTime);
    },
    error: function () {
      alert("ERROR 4500");
    },
  });
}
// currentTime = "01 Jan 2000 03:31:00 PM";
// currentTime = "01 Jan 2000 07:59:50 AM";
