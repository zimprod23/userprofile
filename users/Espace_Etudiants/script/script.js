//FETCH ITEMS FROM THE DATABASE
$(document).ready(() => {
  $(".load-course").load("load-course.php");
});

//SEARCH-BAR
$("form").submit((evet) => {
  event.preventDefault();
  $.ajax({
    url: "search-items.php",
    type: "post",
    data: $("form").serialize(),
    success: function (response) {
      $(".load-course").html(response);
    },
  });
});
