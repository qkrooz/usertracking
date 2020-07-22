$(document).ready(function () {
  var type = $("select[name=line-selector]").val();
  const url = "actions/fetch-users.php";
  const url2 = "actions/history/fetch-registries.php";
  $.ajax({
    url: url,
    type: "post",
    data: { type: type },
    success: function (data) {
      $("#fetched-content").html(data);
    },
    error: function () {
      alert("communication error");
    },
  });
  $.ajax({
    url: url2,
    type: "post",
    data: { type: type },
    success: function (data) {
      $("#fetched-content2").html(data);
    },
    error: function () {
      alert("communication error");
    },
  });
  $("select[name=line-selector]").on("change", function () {
    var type = $(this).val();
    const url = "actions/fetch-users.php";
    const url2 = "actions/history/fetch-registries.php";
    $.ajax({
      url: url,
      type: "post",
      data: { type: type },
      success: function (data) {
        $("#fetched-content").html(data);
      },
      error: function () {
        alert("communication error");
      },
    });
    $.ajax({
      url: url2,
      type: "post",
      data: { type: type },
      success: function (data) {
        $("#fetched-content2").html(data);
      },
      error: function () {
        alert("communication error");
      },
    });
  });
});
