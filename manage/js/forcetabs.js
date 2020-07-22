$(document).ready(function () {
  $(".nav1 .manage-link").on("click", function () {
    $(".nav1").find(".active").removeClass("active");
    $(this).addClass("active");
    $("#nav-tabContent").find(".show").removeClass("show active");
    $("#nav-tabContent").find($(this).attr("href")).addClass("show active");
    $("#nav-profile").addClass("show active");
  });
});
