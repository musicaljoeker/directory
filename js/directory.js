$(document).ready(function() {
  //Togglers for Drop Down Menus
  //Top Nav
  $(".toggle-nav").click(function(e) {
    $(this).toggleClass("top-nav");
    $("#main-navigation").toggleClass("top-nav");
  });
  //Quick Links
  $(".toggle-quickLinks").click(function(e) {
    $(this).toggleClass("quick-links");
    $(".quicklinks").toggleClass("right-menu-active");
  });
  // pills logic
  //boostrap-pills (making sure the "active" class moves independently for each pill row)
  $("#boostrap-pills1 a").click(function() {
    $("#boostrap-pills1 a").removeClass("active");
    $(this).addClass("active");
  });
  $("#bootstrap-pills2 a").click(function() {
    $("#bootstrap-pills2 a").removeClass("active");
    $(this).addClass("active");
    $("#errorName").css("display", "none");
    $("#errorNameDepartment").css("display", "none");
    $("#errorNamePhone").css("display", "none");
    $("#errorNameMinCharacter").css("display", "none");
  });

  $("#faculty-staff-pill").click(function() {
    $("#select-dept-dropdown").removeClass("hidden");
    $("#inputName").removeClass("hidden");
    $("#inputPhone").addClass("hidden");
  });

  $("#all-pill, #students-pill").click(function() {
    $("#select-dept-dropdown").addClass("hidden");
    $("#inputName").removeClass("hidden");
    $("#inputPhone").addClass("hidden");
  });

  $("#phone-pill").click(function() {
    $("#select-dept-dropdown").addClass("hidden");
    $("#inputName").addClass("hidden");

    $("#inputPhone").removeClass("hidden");
  });

  //search tab toggle
  $("#search-pill").click(function() {
    $("#update-information").addClass("hidden");
    $("#printed-directory").addClass("hidden");
    $("#retired-staff").addClass("hidden");

    $("#update-information").removeClass("active");
    $("#printed-directory").removeClass("active");
    $("#retired-staff").removeClass("active");

    $("#search").addClass("active");
  });

  //update information toggle
  $("#update-pill").click(function() {
    $("#search").addClass("hidden");
    $("#printed-directory").addClass("hidden");
    $("#retired-staff").addClass("hidden");

    $("#search").removeClass("active");
    $("#printed-directory").removeClass("active");
    $("#retired-staff").removeClass("active");

    $("#update-information").addClass("active");
  });

  //printed directory toggle
  $("#print-pill").click(function() {
    $("#search").addClass("hidden");
    $("#update-information").addClass("hidden");
    $("#retired-staff").addClass("hidden");

    $("#search").removeClass("active");
    $("#update-information").removeClass("active");
    $("#retired-staff").removeClass("active");

    $("#printed-directory").addClass("active");
  });

  //retired staff toggle
  $("#retired-pill").click(function() {
    $("#search").addClass("hidden");
    $("#update-information").addClass("hidden");
    $("#printed-directory").addClass("hidden");

    $("#search").removeClass("active");
    $("#update-information").removeClass("active");
    $("#printed-directory").removeClass("active");

    $("#retired-staff").addClass("active");
  });

  // Hiding the results tables
  $("#bootstrap-pills2 .nav-item").click(function() {
    $(".department-row").css("display", "none");
    $(".results-row").css("display", "none");
  });

  // adding logic to display the info box when the green plus arrow is displayed
  if ($("#directory").hasClass("collapsed")) {
    $(".alert").css("display", "block");
  } else {
    $(".alert").css("display", "none");
  }
  $(window).resize(function() {
    if ($("#directory").hasClass("collapsed")) {
      $(".alert").css("display", "block");
    } else {
      $(".alert").css("display", "none");
    }
  });

  // department select logic
  //edited to support a select element instead of a dropdown button
  $("#select-department-content").change(function() {
    var selectBox = document.getElementById("select-department-content");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    $("#select-department-content").attr("value", selectedValue);
  });

  var group;
  var department;
  var firstname;
  var lastname;
  var phone;
  // displaying the results when the search button is clicked

  $("#search-btn").click(function() {
    //debugger;
    checkVars();
    checkEmpty();
    if (typeof grecaptcha !== "undefined") {
      grecaptcha.reset(); // resets the reCAPTCHA
    }
  });
  //enter key => search
  $("#first-name-search").keypress(function(event) {
    if (event.which == 13) {
      checkVars();
      checkEmpty();
    }
  });
  $("#last-name-search").keypress(function(event) {
    if (event.which == 13) {
      checkVars();
      checkEmpty();
    }
  });

  function checkEmpty() {
    //if the search fields are empty do not display a table, instead display an error message
    if (
      (department == "" && firstname == "" && lastname == "" && phone == "") ||
      firstname == " " ||
      lastname == " "
    ) {
      $(".results-row").css("display", "none");
      if (group == "all" || group == "students") {
        $("#errorNameDepartment").css("display", "none");
        $("#errorNamePhone").css("display", "none");
        $("#errorNameMinCharacter").css("display", "none");

        $("#errorName").css("display", "flex");
      } else if (group == "faculty-and-staff") {
        $("#errorName").css("display", "none");
        $("#errorNamePhone").css("display", "none");
        $("#errorNameMinCharacter").css("display", "none");
        $("#errorNameDepartment").css("display", "flex");
      }
      //if the search fields are not empty, display the table (and hide any error messages)
    } else {
      //make sure that phone is equal to 4 digits
      if (group == "phone") {
        phone = $("#phone").val();
        //if phone length isn't equal to 4
        if (phone.length != 4) {
          $("#errorNameDepartment").css("display", "none");
          $("#errorName").css("display", "none");
          $("#errorNamePhone").css("display", "flex");
        } else {
          //phone length is 4
          $("#errorNamePhone").css("display", "none");
          $("#errorNameMinCharacter").css("display", "none");
          $("#errorNameDepartment").css("display", "none");
          $("#errorName").css("display", "none");

          $(".results-row").css("display", "flex");
          makeTable();
        }
      }
      //not phone group at all
      else {
        var first = $("#first-name-search").val();
        var last = $("#last-name-search").val();
        var dept = $("#select-department-content").val();

        if (first.length >= 3 || last.length >= 3 || dept != "Select a Department") {
          $("#errorNameDepartment").css("display", "none");
          $("#errorName").css("display", "none");
          $("#errorNamePhone").css("display", "none");
          $("#errorNameMinCharacter").css("display", "none");
  
          $(".results-row").css("display", "flex");
          makeTable();
        } else {
          // search criteria is less than minimum requirements
          $("#errorNameMinCharacter").css("display", "flex");
        }
      }
    }
  }

  // creating the datatable
  function checkVars() {
    group = $("#bootstrap-pills2 li .active").attr("value");
    //var department = "";

    if (
      $("#select-department-content").attr("value") == "Select a department" ||
      $("#select-department-content").attr("value") == "Select a Department"
    ) {
      department = "";
    } else {
      department = $("#select-department-content").attr("value");
    }

    if (group != "faculty-and-staff") {
      department = "";
    }

    if (group != "phone") {
      firstname = $("#first-name-search").val();
      lastname = $("#last-name-search").val();
      phone = "";
    } else {
      firstname = "";
      lastname = "";
      phone = $("#phone").val();
    }
  }

  function makeTable() {
    // checks if the grecaptcha variable exists and if the IP is from UWO
    var recaptcha_data = null;
    if (typeof grecaptcha !== "undefined") {
      recaptcha_data = grecaptcha.getResponse();
    }

    var data = {
      group: group,
      department: department,
      firstname: firstname,
      lastname: lastname,
      phone: phone,
      grecaptcharesponse: recaptcha_data
    };

    // Emptying the tables
    $("#department-results-table-body").empty();
    $("#results-table-body").empty();

    // Getting the data
    $.ajax({
      url: "search.php",
      data: data,
      type: "POST",
      success: function(data) {
        data = JSON.parse(data);
        department_results = data["department_result"];
        persons_results = data["persons_result"];

        // Creating the department data table
        if (department != "") {
          $(".department-row").css("display", "flex");

          $("#department-directory").DataTable({
            searching: false,
            paging: false,
            bDestroy: true,
            autoWidth: false,
            rowReorder: {
              selector: "td:nth-child(2)"
            },
            responsive: true,
            data: department_results,
            columns: [
              { data: "description" },
              {
                data: "phone",
                fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                  if (oData.phone != null) {
                    $(nTd).html(
                      "<a href='tel:920424" +
                        oData.phone +
                        "'>920-424-" +
                        oData.phone +
                        "</a>"
                    );
                  }
                }
              },
              { data: "location" }
            ]
          });
        }

        // Creating the people data table
        $("#directory").DataTable({
          searching: false,
          bDestroy: true,
          autoWidth: false,
          rowReorder: {
            selector: "td:nth-child(2)"
          },
          responsive: true,
          data: persons_results,
          columns: [
            { data: "firstname" },
            { data: "lastname" },
            {
              data: "username",
              fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                $(nTd).html(
                  "<a href='mailto:" +
                    oData.username +
                    "@uwosh.edu'>" +
                    oData.username +
                    "@uwosh.edu</a>"
                );
              }
            },
            {
              data: "phone",
              fnCreatedCell: function(nTd, sData, oData, iRow, iCol) {
                if (oData.phone != null) {
                  $(nTd).html(
                    "<a href='tel:920424" +
                      oData.phone +
                      "'>920-424-" +
                      oData.phone +
                      "</a>"
                  );
                }
              }
            },
            { data: "department" },
            { data: "mailstop" },
            { data: "building" },
            { data: "room" }
          ]
        });
      }
    });
  }
});

function setMainDim() {
  //set body-wrapper for the directory's max-width to the same as logoTitle's width (so that the heading and the content inside of the page are
  //the same width)
  var logoWidth = $(".logoTitle").css("max-width");

  //fix height of header that adds extra white space because of the Nav styling needing some extra space to place the text
  //using the actual height of top-nav + logo-section to get the height of the header to get rid of extra white space
  var topNavHeight = $(".top-nav").height();
  var logoSectionHeight = $(".logo-section").height();
  //+5 because the logoSection has a 5px top border
  var wrapperHeight = topNavHeight + logoSectionHeight + 5;

  $("header").css("height", wrapperHeight);

  //recalculates the  minimum height of main based on what is leftover from the header and footer in the window
  //fixes white space issue beneath footer
  var winHeight = $(window).height();
  var headerHeight = $("header").height();
  var footerHeight = $("footer").height();

  var mainHeight = winHeight - headerHeight - footerHeight;
  $("main").css("min-height", mainHeight);
}
setMainDim();

//all things that it needs to keep in line when the window resizes
$(window).resize(function() {
  setMainDim();
});

var randomBG = [
  "images/background/horizon1.jpg",
  "images/background/awcc1.jpg",
  "images/background/aroundCampus1.jpg"
];
//0, 1, 2
var randomInt = Math.floor(Math.random() * 3 + 0);

document.getElementById("directory-background").src = randomBG[randomInt];

//Callback function to allow the search button to be clickable.
function recaptchaCallback() {
  $("#search-btn").removeAttr("disabled");
}

function clearFields() {
  // clear out all input fields for all screens
  $("#first-name-search").val(""); // clears first name
  $("#last-name-search").val(""); // clears last name
  $("#select-department-content").val("Select a Department"); // clears value of the data
  $("#select-department-content").attr("value", "Select a Department"); // clears the attribute on the select tag
  $("#phone").val(""); // clears the phone number
}
