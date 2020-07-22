$(document).ready(function () {
  $("#edit-form").on("submit", function (e) {
    e.preventDefault();
    const url = "actions/edit-user.php";
    var form = $(this);
    var id = $(this).attr("data-id");
    $.ajax({
      url: url,
      type: "post",
      data: form.serialize() + "&id=" + id,
      beforeSend: function () {},
      success: function () {
        // $.dialog({
        //   title: "",
        //   content: "Elemento modificado con éxito",
        // });
        $("#editModal").modal("hide");
        reloadContent();
        // setTimeout(function () {
        //   $("#" + id).addClass("highlighted");
        //   setTimeout(function () {
        //     $("#" + id).removeClass("highlighted");
        //   }, 3000);
        // }, 250);
      },
      error: function (data) {
        alert(data);
      },
    });
  });
  function reloadContent() {
    var type = $("#line-selector").val();
    const url2 = "actions/fetch-users.php";
    $.ajax({
      url: url2,
      type: "POST",
      data: { type: type },
      success: function (data) {
        $("#fetched-content").html(data);
      },
    });
  }
});
