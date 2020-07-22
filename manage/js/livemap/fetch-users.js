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
var line = $("#livemap-line-selector").val();
$.ajax({
  url: "./actions/livemap/fetch-users.php",
  type: "post",
  data: { shift: shift, line: line },
  success: function (data) {
    var response = JSON.parse(data);
    response.forEach((element) => {
      var index = element.index;
      if (index == 5 || index == 6) {
        printCard(element.sso, element.status, 1);
      } else {
        printCard(element.sso, element.status, 3);
      }

      $("#user-card" + index).html(carduser);
    });
  },
  error: function () {
    alert("error");
  },
});
