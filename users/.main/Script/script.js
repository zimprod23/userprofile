text = '<button class="fetch">fetch users</button>';
const search = $(".search").val();
var username = $("#hiddenusr").val();
const id = $("#hiddenid").val();
const welcomepage =
  '<div class="Wlcome"><div><h1>WELCOME</h1></div><div class="content"><div>' +
  "<p>VOUS POUVEZ MAINTENANT CREER SUPPRIMER OU MODIFIER VOS COURS</p></div><div>" +
  '<img src="pictures/logo.png"></div></div></div>';
const usersearch =
  '<div class="Container"><div class="LoadItem"><div id="title"><h2>GET COURSE INFORMATIONS</h2>' +
  '</div><div  class="search-form"><form action="../includes/loaditem.inc.php" method="POST">' +
  '<label for="bookid">Enter course name : </label><input type="text" id="search" width="100">' +
  '<input type="submit" name="consult" id="sendInfo"></form><div class="ItemPlace"></div></div></div></div>';
const useroptions =
  '<div class="Container">' +
  '<div id="title"><h2>USER SETTINGS</h2></div>' +
  '<div id="options">' +
  '<label for="Changerpass">Change Password?!</label>' +
  '<input type="password" name="chngPass" class="chng" id="new_password">' +
  '<button id="btn1">Apply</button>' +
  '<br><br> <label for="Changeruser">Changer Username?!</label><input type="text" name="chngUser" id="new_username" class="chng">' +
  '<button id="btn2">Apply</button>' +
  '<br> <br><form method="post" action="" enctype="multipart/form-data" id="myform"><label for="Changerpic">Change Picture?!</label><input type="hidden" name="MAX_FILE_SIZE" value="512000">' +
  '<input type="file" name="file" id="file" class="chngPic"><button id="btn3">Apply</button></form></div></div>';

//READ varriables
$("#settings").click(() => {
  $(".Addcourse").empty();
  $("#username-cont").html(useroptions);
  //change password
  $("#btn1").click(() => {
    var password = $("#new_password").val();
    $(".hidden-operation").load("../includes/changepassword.inc.php", {
      new_password: password,
      curr_username: id,
    });
  });

  //change username
  $("#btn2").click(() => {
    var upt_username = $("#new_username").val();
    $(".hidden-operation").load("../includes/changeusername.inc.php", {
      new_username: upt_username,
      curr_username: id,
    });
  });

  //change avatar

  $("#file").change(function (event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("img")
      .fadeIn("fast")
      .attr("src", URL.createObjectURL(event.target.files[0]));
    $("#btn3").click(function () {
      var fd = new FormData();
      var files = $("#file")[0].files[0];
      fd.append("file", files);
      $.ajax({
        url: "../includes/changepic.inc.php?id=" + id,
        type: "post",
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
          window.location.reload();
        },
      });
    });
  });
});

//COURSES OPERATIONS
$("#courses").click(() => {
  $(".hidden-operation").empty();
  $("#username-cont").html(usersearch);
  $("form").submit((event) => {
    event.preventDefault();
    $(".Addcourse").empty();
    const search1 = $("#search").val();
    //FETCHING COURSES FROM THE DATABASE;
    $(".Addcourse").load(
      "../includes/loaditem.inc.php?id=" + id,
      {
        search: search1,
      },
      (bindid = (id1) => {
        //CALLBACK FUNCTION FOR DELETING AND UPDATING DATA
        $.ajax({
          //DELETE COURSES
          url: "../includes/deletecourse.inc.php?id=" + id1,
          type: "post",
          data: id1,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response == "DATA REMOVED") {
              $(".Addcourse").load("../includes/loaditem.inc.php?id=" + id, {
                search: search1,
              });
            }
          },
        });
      }),
      (getid = (id2) => {
        //UPDATE COURSE
        document.location = "update-course.php?id=" + id2;
      })
    );
  });
});

$("#overview").click(() => {
  $("#username-cont").html(welcomepage);
});
$(document).ready(() => {
  $("#username-cont").html(welcomepage);
});
$("#update-course").click(() => {
  document.location = "update-course.php";
});
//SOME TRASH
//DONT READ THE CODE DOWN BELLOW
$("form").submit((event) => {
  event.preventDefault();
  var search1 = $("#search").val();
  $(".ItemPlace").load("../includes/loaditem.inc.php", {
    search: search1,
  });
});
$("#push").click(() => {
  $("#username-cont").html(useroptions);

  $(".fetch").click(function () {
    $("#username-cont").load("../includes/loaddata.inc.php", {
      new_username: username,
    });
  });
});
